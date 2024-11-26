<?php

namespace App\Http\Controllers\Hotel;

use App\Models\HotelImage;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelApproved;
use App\Http\Controllers\Controller;

class HotelActions extends Controller
{

    public function editTask(Request $request, $hotelId){
        //dd($request);
        $incomingFields = $request->all();
        $hotel = HotelApproved::find($hotelId);
        $hotel->name = $incomingFields['name'];
        $hotel->email = $incomingFields['email'];
        $hotel->adress = $incomingFields['adress'];
        $hotel->city = $incomingFields['city'];
        $hotel->area = $incomingFields['area'];
        $hotel->distance = $incomingFields['distance'];
        $hotel->property_type = $incomingFields['property_type'];
        $hotel->telephone = $incomingFields['telephone'];
        $hotel->number_of_rooms = $incomingFields['number_of_rooms'];
        $hotel->place_type = $incomingFields['place_type'];
        $hotel->resto = $request->has('resto') ? true : null; 
        $hotel->breakfast = $request->has('breakfast') ? true : null; 
        $hotel->pool = $request->has('pool') ? true : null; 
        $hotel->star = $incomingFields['star'];
        $hotel->bed_types = $incomingFields['bed_types'];
        $hotel->chain = $request->has('chain') ? true : null; 
        $hotel->cancle = $request->has('cancel') ? true : null;
        $hotel->price = $incomingFields['price'];
        $hotel->save();
        return redirect('/hotel')->with('success', 'edited succesfully');

    }
    public function editView($hotel){
        $hotel = HotelApproved::findOrFail($hotel);
        return view('hotel.edit', compact('hotel'));
    }

    public function saveImages(Request $request) {
            //not used
        return 'ok';
    }


    public function show($id)
    {
        $hotel = HotelApproved::findOrFail($id);
        $images = $hotel->images; 

        return view('explore.hotel-individual-page', compact('hotel', 'images'));
    }
}



