<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hotel\HotelApproved;
use Illuminate\Support\Facades\Auth;
use App\Models\ApprovedAccommodation;

class WelcomeController extends Controller
{
    public function bookingPage($hotelName) {
        $hotel = HotelApproved::where('name', $hotelName)->first();
        $accommodation = ApprovedAccommodation::where('user_id', Auth::id())
                    ->whereHas('availability', function ($query) use ($hotel) {
                    $query->where('hotel_approved_id', $hotel->id);
                    })
                    ->first();
        $reviews = Review::whereHas('approvedaccommodation.availability', function ($query) use ($hotel) {
                    $query->where('hotel_approved_id', $hotel->id);
                })
                ->get();
                    
        $averageRatings = [
            'cleanliness' => $reviews->avg('cleanliness'),
            'accessibility' => $reviews->avg('accessibility'),
            'staff' => $reviews->avg('staff'),
            'location' => $reviews->avg('location'),
            'value_for_money' => $reviews->avg('value_for_money')
        ];
        $images = $hotel->images;
        return view('explore.hotel-individual-page', compact('hotel', 'images', 'accommodation','reviews', 'averageRatings'));

    }

    public function index()
    {
        $approvedHotels = HotelApproved::all();
        return view('welcome', compact('approvedHotels'));
    }

    
    public function liveSearch(Request $request)
        {
            $query = $request->input('query');
            $hotels = HotelApproved::where('name', 'like', "%$query%")
                                    ->orWhere('area', 'like', "%$query%")
                                    ->orWhere('city', 'like', "%$query%")
                                    ->get();

            return response()->json($hotels);
        }


        public function searchResult(Request $request)
        {
            $search_text = $request->input('query');
            $from = $request->input('from');
            $to = $request->input('to');
            $people = $request->input('people');
            //dd($request);
            $hotels = HotelApproved::where('name', 'LIKE', '%'.$search_text.'%')
                                    ->orWhere('area', 'LIKE', '%'.$search_text.'%')
                                    ->orWhere('city', 'LIKE', '%'.$search_text.'%')
                                    ->get();
            
            $request->session()->put('query', $search_text);
            $request->session()->put('from', $from);
            $request->session()->put('to', $to);
            $request->session()->put('people', $people);
            //dd($hotels);
            return view('explore.result-hotels', [
                'hotels' => $hotels,
                'query' => $search_text,
                'from' => $from,
                'to' => $to,
                'people' => $people,
            ]);
        }

}
