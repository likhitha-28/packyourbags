<?php

namespace App\Models\Hotel;

use App\Models\HotelImage;
use App\Models\Availability;
use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelApproved extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [ 'name', 'email' , 'adress', 'city', 'area', 'distance', 'property_type', 'telephone', 'number_of_rooms', 'place_type', 'resto', 'breakfast',
    'pool', 'price', 'star' , 'bed_type', 'chain', 'cancle', 'price',
     ];

     public function hotelImages()
     {
         return $this->hasMany(HotelImage::class, 'hotel_approved_id');
     }
     
     public function availabilities()
     {
         return $this->hasMany(Availability::class, 'hotel_approved_id');
     }

     public function hotelLog()
    {
        return $this->hasOne(HotelLog::class, 'hotel_approved_id');
    }
    public function credentialsExist()
    {
        // Check if a record exists in the hotellog table for this hotel
        return $this->hotelLog()->exists();
    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }


}



