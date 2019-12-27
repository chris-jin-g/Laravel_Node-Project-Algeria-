<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCurrentProvider extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'request_id'
    ];
}
