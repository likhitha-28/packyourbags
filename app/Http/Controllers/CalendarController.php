<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelApproved;

class CalendarController extends Controller
{
    public function checkAvailability(Request $request)
    {
        $hotelId = $request->input('hotel_approved_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        //array to store each day
        $availabilityData = [];
    
        //loop for all dates
        $currentDate = $startDate;
        while ($currentDate <= $endDate) {
            $availableRoomCount = Availability::where('hotel_approved_id', $hotelId)
                ->where('start_date', '<=', $currentDate)
                ->where('end_date', '>=', $currentDate)
                ->count();
    
            //total number of rooms
            $totalRoomCount = HotelApproved::where('id', $hotelId)
                ->value('number_of_rooms');
    
            $isAvailable = ($availableRoomCount == $totalRoomCount);
    
            //availability status for the current date
            $availabilityData[] = [
                'title' => $isAvailable ? 'Not Available' : 'Available',
                'start' => $currentDate,
                'color' => $isAvailable ? 'red' : 'green',
            ];
    
            //next
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }
    
        return view('check-availability', compact('availabilityData'));
    }
    
    
}
