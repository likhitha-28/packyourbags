<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Hotel\HotelApproved;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{


    public function showMyReviews(){

        $userEmail = Auth::user()->email;
        $userReviews = Review::with('accommodation.availability.hotelApproved')
        ->where('user_email', auth()->user()->email)
        ->get();
        return view('home.user_reviews', ['userReviews' => $userReviews]);
        
    }
    public function showReviewForm()
    {
        //check if authenticated user has an entry in the accommodations table
        $accommodation = Accommodation::where('user_id', Auth::id())->first();
        
        if ($accommodation) {
            return view('review', ['accommodation' => $accommodation]);
        } else {
            return redirect()->back()->with('error', 'You do not have any accommodations to review.');
        }
    }

    public function submitReview(Request $request)
    {
        $validatedData = $request->validate([
            'approved_accommodation_id' => 'required|exists:approved_accommodation,id',
            'user_name' => 'required',
            'user_email' => 'required|email',
            'comment' => 'required',
            'cleanliness' => 'required|integer|min:0|max:10',
            'accessibility' => 'required|integer|min:0|max:10',
            'staff' => 'required|integer|min:0|max:10',
            'location' => 'required|integer|min:0|max:10',
            'value_for_money' => 'required|integer|min:0|max:10',
        ]);

        //create and save the review
        $review = new Review();
        $review->approved_accommodation_id = $validatedData['approved_accommodation_id'];
        $review->user_name = $validatedData['user_name'];
        $review->user_email = $validatedData['user_email'];
        $review->comment = $validatedData['comment'];
        $review->cleanliness = $validatedData['cleanliness'];
        $review->accessibility = $validatedData['accessibility'];
        $review->staff = $validatedData['staff'];
        $review->location = $validatedData['location'];
        $review->value_for_money = $validatedData['value_for_money'];
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }



}

