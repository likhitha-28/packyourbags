<?php

namespace App\Models;

use App\Models\Hotel\HotelApproved;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $guarded = [];

    public function hotelApproved()
    {
        return $this->belongsTo(HotelApproved::class, 'hotel_approved_id');
    }
}




