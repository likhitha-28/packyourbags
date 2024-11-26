<?php

namespace App\Models;

use App\Models\Hotel\HotelApproved;
use App\Models\ApprovedAccommodation;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function approvedaccommodation()
    {
        return $this->belongsTo(ApprovedAccommodation::class, 'approved_accommodations_id');
    }

}
