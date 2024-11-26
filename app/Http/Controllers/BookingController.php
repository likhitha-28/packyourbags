<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Mail\RejectionMail;
use App\Models\Availability;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\Accommodation;
use App\Mail\BookingApprovalMail;
use App\Mail\BookingRejectionMail;
use App\Models\Hotel\HotelApproved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ApprovedAccommodation;

class BookingController extends Controller
{
    public function confirmedReservations(){

    }

    public function acceptBooking($id){
        $hotel = Accommodation::find($id);
    
        if ($hotel) {
            $this->moveReservations($hotel);
            Mail::to($hotel->user_email)->send(new BookingApprovalMail($hotel));
    
            return redirect()->back()->with('success', 'application accepted');
        } else {
            return redirect()->back()->with('error', 'not found');
        }
    }

    public function dontAccept($id){
        $hotel = Accommodation::find($id);

        if (!$hotel) {
            return redirect()->back()->with('not_found', 'Hotel not found');
        }
        if ($this->deleteentry($id)) {
            Mail::to($hotel->user_email)->send(new BookingRejectionMail($hotel));
            return redirect()->back()->with('success', 'booking has been rejected');
        } else {
            return redirect()->back()->with('error', 'Failed to reject hotel application');
        }
    }

    public function deleteentry($id)
    {
        $hotel = Accommodation::find($id);

        if ($hotel) {
            $hotel->delete();
            return true; // deletion success
        }

        return false; //fail
    }

    public function moveReservations(Accommodation $dataToMove)
    {
        try {
            $newBookingApproved = new ApprovedAccommodation([
                'availability_id' => $dataToMove->availability_id,
                'user_id' => $dataToMove->user_id,
                'user_name' => $dataToMove->user_name,
                'user_email' => $dataToMove->user_email,
            ]);
    
            //save new in AccomodationsApproved
            $newBookingApproved->save();
    
            //delete the original row from Hotel
            $dataToMove->delete();
    
            return "Data moved successfully!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function delete(Request $request, Availability $booking){
        $booking->delete();
        return redirect()->back();
    }

    public function showMyBookings(){
        $userEmail = Auth::user()->email;
    
        // Retrieve user's unapproved accommodations
        $userBookings = Accommodation::with('availability.hotelApproved')
            ->where('user_email', auth()->user()->email)
            ->get();
    
        // Retrieve user's approved accommodations
        $userConfirmedBookings = ApprovedAccommodation::with('availability.hotelApproved')
            ->where('user_email', auth()->user()->email)
            ->get();
    
        // Merge user's unapproved and approved bookings
        $allBookings = $userBookings->merge($userConfirmedBookings);
    
        return view('home.user_bookings', ['allBookings' => $allBookings]);
    }
    

    public function bookNow(Request $request)
    {
        //check login
        if (!Auth::check()) {
            return redirect()->route('register')->with('notsuccess', 'You need to register an account before booking.');
        }

        $incoming = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'hotel_approved_id' => 'required',
        ]);

        //check availability
        $start_date = $incoming['start_date'];
        $end_date = $incoming['end_date'];
        $hotel_approved_id = $incoming['hotel_approved_id'];
        $isAvailable = $this->checkAvailability($start_date, $end_date, $hotel_approved_id);

        if (!$isAvailable) {
            return redirect()->back()->with('notsuccess', 'Rooms are not available on your date, would you like to check other dates?');
        }

        //if rooms are free ->> payment
        return $this->checkout($request);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $hotelName = $request->input('name');
        $hotel = HotelApproved::where('name', $hotelName)->first();

        if (!$hotel) {
            return redirect()->back()->with('error', 'Hotel not found.');
        }
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $hotel->name,
                        ],
                        'unit_amount' => $hotel->price * 100, 
                    ],
                    'quantity' => 1, 
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'), 
            'cancel_url' => route('index'), 
        ]);

        
        $availability = new Availability($request->all());                      //add booking in availability table
        $availability->save();

        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;

        $accommodation = new Accommodation([                                     //add booking in accomodation table
            'availability_id' => $availability->id,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ]);
        $accommodation->save();
        return redirect()->to($session->url);
    }

    public function checkAvailability($start_date, $end_date, $hotel_approved_id)
    {
        $hotel = HotelApproved::findOrFail($hotel_approved_id);

        if (empty($start_date) || empty($end_date) || empty($hotel_approved_id)) {
            return false; 
        }

        $conflictingAvailabilities = $hotel->availabilities()
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('start_date', '<=', $start_date)
                            ->where('end_date', '>=', $end_date);
                    });
            })
            ->count();

        //check availanility
        $availableRoomsCount = $hotel->number_of_rooms - $conflictingAvailabilities;
        //true if rooms are available, otherwise false
        return $availableRoomsCount > 0;                                          
    }

        public function checkAvailabilityFrom(Request $request)
        {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $hotel_approved_id = $request->input('hotel_approved_id');

            
            $hotel = HotelApproved::findOrFail($hotel_approved_id);
            if (empty($start_date) || empty($end_date) || empty($hotel_approved_id)) {
            return redirect('/')->with('sorry', "please fill the fields to filter");
            }
            $conflictingAvailabilities = $hotel->availabilities()
                ->where(function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('start_date', [$start_date, $end_date])
                        ->orWhereBetween('end_date', [$start_date, $end_date])
                        ->orWhere(function ($query) use ($start_date, $end_date) {
                            $query->where('start_date', '<=', $start_date)
                                ->where('end_date', '>=', $end_date);
                        });
                })
                ->count();
                
            //check the available rooms based on the number of rooms and availabilities
            $availableRoomsCount = $hotel->number_of_rooms - $conflictingAvailabilities;
            if ($availableRoomsCount > 0) {
                return  redirect()->back()->with('success', 'rooms available on your date, do you want to book?');
            } else {
                return redirect()->back()->with('notsuccess', 'rooms not available on your date, would you like to check other dates?');
            }
        }
    public function checkAvailabilityFromCal(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $hotel_approved_id = $request->input('hotel_approved_id');
        
        //hotel information
        $hotel = HotelApproved::findOrFail($hotel_approved_id);

        $conflictingAvailabilities = $hotel->availabilities()
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('start_date', '<=', $start_date)
                            ->where('end_date', '>=', $end_date);
                    });
            })
            ->count();

        $availableRoomsCount = $hotel->number_of_rooms - $conflictingAvailabilities;

        //check availability status
        $availabilityStatus = $availableRoomsCount > 0 ? "available" : "not available";
        
        //get availability data
        $availabilities = $hotel->availabilities()
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                    ->orWhereBetween('end_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('start_date', '<=', $start_date)
                            ->where('end_date', '>=', $end_date);
                    });
            })
            ->get();
        
        return view('check-availability', [
            'availabilities' => $availabilities,
            'availabilityStatus' => $availabilityStatus,
        ]);
    }

}

