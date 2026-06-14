<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
class Feature extends Model

{
    protected $fillable = [
        'name',
        'description',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
