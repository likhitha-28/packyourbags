<?php

namespace App\Http\Controllers\Hotel;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hotel\HotelApproved;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HotelReserveController extends Controller
{
    public function viewHotelDetatils($hotel_approved_id){
        $hotel = HotelApproved::where('id', $hotel_approved_id)->first();

    if ($hotel) {
        return view('hotel.view-hotel', compact('hotel'));
    } else {
        //if hotel id not found
        return redirect()->back()->with('error', 'Hotel not found.');
    }
    }

    public function viewReservations()
    {
        $hotelApprovedId = Auth::guard('hotel')->user()->hotel_approved_id;
        $reservations = Availability::where('hotel_approved_id', $hotelApprovedId)
                            ->with('accommodation')
                            ->get();
        return view('hotel.reservations', compact('reservations'));
    }

    public function confirmedReservations(){
        $hotelApprovedId = Auth::guard('hotel')->user()->hotel_approved_id;
        $reservations = Availability::where('hotel_approved_id', $hotelApprovedId)
                            ->with('approvedaccommodation')
                            ->get();
        return view('hotel.accepted-reservations', compact('reservations'));
    }
    

}



