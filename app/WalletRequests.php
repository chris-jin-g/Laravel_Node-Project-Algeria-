<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletRequests extends Model
{
    protected $fillable = [
        'alias_id','request_from','from_id','from_desc','type','amount','send_by','send_desc','status'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function provider(){
    	return $this->belongsTo('App\Provider', 'from_id');
    }
}
