<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [

        'brand',
        'model',
        'year',
        'seats',
        'price_per_day',
        'status',
        'image',
        'descriptions',

    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
