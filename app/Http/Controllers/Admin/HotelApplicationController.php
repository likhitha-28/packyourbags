<?php

namespace App\Http\Controllers\Admin;

use view;
use App\Mail\ApprovalMail;
use App\Mail\RejectionMail;
use App\Models\Hotel\Hotel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelLog;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel\HotelApproved;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Hotel\HotHotelApplicationControllerelApproved;

class HotelApplicationController extends Controller
{

    public function addHotelInDB(Request $request){        //  to save data to the database

        $incoming = $request->validate([    
           'name' => 'required|string',
           'email' => 'required|email',
           'adress' => 'required|string',
           'city' => 'required|string',
           'area' => 'required|string',
           'distance' => 'required|string',
           'property_type' => 'required|string',
           'telephone' => 'required|string',
           'number_of_rooms' => 'required|integer',
           'place_type' => 'required|string',
           'resto' => 'nullable|boolean',
           'breakfast' => 'nullable|boolean',
           'pool' => 'nullable|boolean',
           'price' => 'required|integer',
           'star' => 'required|string',
           'bed_types' => 'required|string',
           'chain' => 'nullable|boolean',
           'cancle' => 'nullable|boolean',
           
        ]);

       $incoming['name'] = strip_tags($incoming['name']);
       $incoming['email'] = strip_tags($incoming['email']);
       $incoming['adress'] = strip_tags($incoming['adress']);
       $incoming['city'] = strip_tags($incoming['city']);
       $incoming['area'] = strip_tags($incoming['area']);
       $incoming['distance'] = strip_tags($incoming['distance']);
       $incoming['property_type'] = strip_tags($incoming['property_type']);
       $incoming['telephone'] = strip_tags($incoming['telephone']);
       $incoming['number_of_rooms'] = strip_tags($incoming['number_of_rooms']);
       $incoming['place_type'] = strip_tags($incoming['place_type']);
       $incoming['resto'] = $request->input('resto');
       $incoming['breakfast'] = $request->input('breakfast');
       $incoming['pool'] = $request->input('pool');
       $incoming['price'] = strip_tags($incoming['price']);
       $incoming['star'] = strip_tags($incoming['star']);
       $incoming['bed_types'] = strip_tags($incoming['bed_types']);
       $incoming['cancle'] = $request->input('cancle');
        
       if (HotelApproved::create($incoming)) {
           $request->session()->regenerate();
           return redirect('/admin')->with('success', 'Hotel added succesfully');
        } else {
            return redirect('/add_hotel')->with('fail', 'please check all your files are correctly filled');
       }

    }

    public function addHotel(){
        return view('admin.add-hotel');
    }
    public function editHotel($hotel){
        $hotel = HotelApproved::findOrFail($hotel);
        return view('admin.edit-it', compact('hotel'));
    }


    public function deleteTask(Request $request, HotelApproved $hotel){

        $hotel->delete();
        return redirect('/accepted-hotels-edit')-with('error', 'deleted');
    }

    public function sendDetails(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hotel_approved_id' => 'required|exists:hotel_approveds,id',
            
        ]);
        $newHotelLog = new HotelLog([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'hotel_approved_id' => $validatedData['hotel_approved_id'],
        ]);
    
        //save the new HotelLog
        $newHotelLog->save();
    
        return redirect('/accepted-hotels')->with('success', 'Login details added successfully.');
    }
    
    
    public function loginDetalis(){
        $hotel = HotelApproved::all();
        return view('admin.add-login-data');
    }

    public function editAccepted(){
        $hotels = HotelApproved::all();
        return view('admin.accepted-hotels-edit', compact('hotels'));
    }
    public function viewAccepted(){
        $hotels = HotelApproved::all();
        return view('admin.accepted-hotels', compact('hotels'));
    }

    public function viewApplications()
    {
        $hotels = Hotel::all();
        return view('admin.view-applications', compact('hotels'));
    }

    public function individualPage($id){
        $hotel = Hotel::find($id);
        if (!$hotel) {
            //check if hotel is there
            return view('admin.individualhotelapplication')->with('hotel', null);
        }
    
        return view('admin.individualhotelapplication', compact('hotel'));
    }

    public function acceptHotel($id)
    {
        $hotel = Hotel::find($id);
    
        if ($hotel) {
            $this->moveData($hotel);
            Mail::to($hotel->email)->send(new ApprovalMail($hotel));
            
            //move data to the hotel_approveds table
    
            return redirect('/accepted-hotels')->with('accepted', 'Hotel has been accepted (mail sent)')->with('hotel', $hotel);
        } else {
            return redirect('/hotel-list-pending')->with('not_found', 'Hotel not found');
        }
    }

    public function showCreateCredentialsForm($id)
    {
        $hotel = HotelApproved::find($id);
        return view('admin.login-details', compact('hotel'));
    }
    

    public function dontAddHotel($id){
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return redirect('/hotel-list-pending')->with('not_found', 'Hotel not found');
        }
        if ($this->deleteentry($id)) {
            Mail::to($hotel->email)->send(new RejectionMail($hotel));
            return redirect('/hotel-list-pending')->wBookingRejectionMailith('rejected', 'Hotel application rejected (mail sent)');
        } else {
            return redirect('/hotel-list-pending')->with('error', 'Failed to reject hotel application');
        }
    }

    public function deleteentry($id)
    {
        $hotel = Hotel::find($id);

        if ($hotel) {
            $hotel->delete();
            return true; // deletion success
        }

        return false; //fail
    }

    public function moveData(Hotel $dataToMove)
    {
        try {
            $newHotelApproved = new HotelApproved([
                'name' => $dataToMove->name,
                'email' => $dataToMove->email,
                'adress' => $dataToMove->adress,
                'city' => $dataToMove->city,
                'area' => $dataToMove->area,
                'distance' => $dataToMove->distance,
                'property_type' => $dataToMove->property_type,
                'telephone' => $dataToMove->telephone,
                'number_of_rooms' => $dataToMove->number_of_rooms,
                'place_type' => $dataToMove->place_type,
                'resto' => $dataToMove->resto,
                'breakfast' => $dataToMove->breakfast,
                'pool' => $dataToMove->pool,
                'star' => $dataToMove->star,
                'bed_types' => $dataToMove->bed_types,
                'chain' => $dataToMove->chain,
                'cancle' => $dataToMove->cancle,
                'price' => $dataToMove->price,
            ]);
    
            //save new in HotelApproved
            $newHotelApproved->save();
    
            //delete the original row from Hotel
            $dataToMove->delete();
    
            return "Data moved successfully!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}