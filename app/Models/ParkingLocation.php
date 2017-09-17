<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLocation extends Model
{
    protected $table = 'parking_locations';

    protected $fillable = ['name', 'cost', 'longitude', 'latitude', 'location', 'cover_image', 'levels'];

    
}
