<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\Hotel\HotelApproved;



// this controller is a test controller it is not used in actual tasks
class StripeController extends Controller
{
    public function index(){
        return view('index');
    }

        
    public function checkout(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string',
        ]);
        $hotelName = $request->input('name');
        $hotel = HotelApproved::where('name', $hotelName)->first();
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        //create a Checkout Session
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $hotel->name,
                ],
                'unit_amount' => $hotel->price,
            ],
            'quantity' => 1, 
        ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'), 
            'cancel_url' => route('index'), 
        ]);

        return redirect()->to($session->url);

    }
    public function success(){
    return redirect()->back()->with('success', 'Booking successful!');
}

}


