<?php

namespace App\Models;

use App\Models\Availability;
use App\Models\Hotel\HotelApproved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovedAccommodation extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'user_name', 'user_email', 'availability_id' ];

    public function availability()
    {
        return $this->belongsTo(Availability::class,  'availability_id', 'id');
    }

    public function hotelApproved()
    {
        return $this->belongsTo(HotelApproved::class,'hotel_approved_id');
    }
    public static function getPostByHotelId($hotelApprovedId)
    {
        return ApprovedAccommodation::where('user_id', $hotelApprovedId)->get();
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'approved_accommodations_id');
    }
    public function reviewedByUser($userEmail)
    {
        return $this->reviews()->where('user_email', $userEmail)->exists();
    }
    
}



 