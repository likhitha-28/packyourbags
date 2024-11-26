<?php

namespace App\Models\Hotel;

use App\Models\HotelApproved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'email' , 'adress', 'city', 'area', 'distance', 'property_type', 'telephone', 'number_of_rooms', 'place_type', 'resto', 'breakfast',
       'pool', 'price', 'star' , 'bed_type', 'chain', 'cancle', 'price',
        ];
       
}



// public function moveData()
// {
    
//     $originalHotel = Hotel::find(1); 
//     $newHotel = new HotelApproved();
//     $newHotel->name = $originalHotel->name;
//     $newHotel->email = $originalHotel->email;
//     $newHotel->adress = $originalHotel->adress;
//     // Repeat the process for other columns

//     // Save the new hotel instance to the other table
//     $newHotel->save();

//     // Optionally, you can delete the original row from the original table
//     // $originalHotel->delete();

//     return redirect()->route('/admin')->with('success', 'Data moved successfully');
// }
