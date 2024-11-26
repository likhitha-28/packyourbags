<?php

namespace App\Models;

use App\Models\Accommodation;
use App\Models\Hotel\HotelApproved;
use App\Models\ApprovedAccommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [ 'hotel_approved_id', 'start_date', 'end_date' ];
    
    public function scopeGetPostByHotelId($query, $hotelApprovedId)
    {
        return $query->where('hotel_approved_id', $hotelApprovedId);
    }


    //relations 
    public function hotelApproved()
    {
        return $this->belongsTo(HotelApproved::class,'hotel_approved_id');
    }
    
    public function approvedaccommodation()
    {
        return $this->hasOne(ApprovedAccommodation::class, 'availability_id', 'id');
    }
    public function accommodation()
    {
        return $this->hasOne(Accommodation::class, 'availability_id', 'id');
    }

    public function hotellog()
    {
        return $this->belongsTo(HotelLog::class, 'hotel_approved_id', 'hotel_approved_id');
    }


}

