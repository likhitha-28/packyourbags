<?php

namespace App\Http\Controllers\hotel;

use App\Models\HotelImage;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HotelImageController extends Controller           //this controller adds images
{
    public function create()
    {
        $user =  Auth::guard('hotel')->user(); 
        $hotelApprovedId = $user->hotel_approved_id;
        $hotelLog = HotelLog::where('hotel_approved_id', $user->hotel_approved_id)->first();
        return view('hotel.add-images-page', compact('hotelApprovedId'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'hotel_approved_id' => 'required|exists:hotel_approveds,id',
            'image_url_1' => 'required|url',
        ]);
        //dd($validatedData);
        $hotelImage = HotelImage::create([
            'hotel_approved_id' => $validatedData['hotel_approved_id'],
            'image_url_1' => $validatedData['image_url_1'],
        ]);
        //return 'added';
        return redirect('/hotel')->with('success', 'Hotel image added successfully.');
    }
}
