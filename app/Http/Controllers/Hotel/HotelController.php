<?php

namespace App\Http\Controllers\Hotel;

use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{

    public function logout(){
        Auth::guard('hotel')->logout();
        return redirect('/hotel')->with('success', 'you have succesfully logged out');
    }

    public function login(Request $request)
    {
        $incoming = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        //authenticate user
        if (Auth::guard('hotel')->attempt(['email' => $incoming['loginemail'], 'password' => $incoming['loginpassword']])) {
            $request->session()->regenerate();

            return redirect('/hotel')->with('success', 'You have successfully logged in');
        } else {
            return redirect('/hotel')->with('fail', 'Please check email and password');
        }
    }
    public function showCorrectHomepage()
    {
        if (Auth::guard('hotel')->check()) {
            $hotel = Auth::guard('hotel')->user();
            return view('hotel.loggedin', compact('hotel'));
        } else {
            return view('hotel.homepage');
        }
    }
    


    public function storeApplication(Request $request){        //  to save data to the database

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
         
        if (Hotel::create($incoming)) {
            $request->session()->regenerate();
            return redirect('/hotel-application')->with('success', 'application sent succesfully');
        } else {
            return redirect('/fill_form')->with('fail', 'please check all your files are correctly filled');
        }
    
    }
}
