<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Hotel\HotelApproved;
use App\Http\Controllers\Controller;

class HomeRedirectionController extends Controller
{

    public function aboutUs(){
        return view('explore.about-us');
    }

    public function showHotelregistration(){
        return view('home.join-us-info-page');
    }

    public function fillForm(){
        return view('home.join-form');
    }

    public function viewHotel(){
        $originalHotel = HotelApproved::find(); 
    }
}
