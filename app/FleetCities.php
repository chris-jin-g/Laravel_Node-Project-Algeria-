<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FleetCities extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'fleet_id', 'city_id', 'city_name', 'estate_name'
    ];
}
