<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parcel extends Model
{
    //
    protected $fillable = [
        'parceltoken', 'customer_id', 'shopmanager_id','cartnumber'

    ];

    public function customer(){
        return $this->belongsTo('App\User','customer_id');
    }


    public function shopmanager(){
        return $this->belongsTo('App\User','shopmanager_id');
    }

    public function parceldata(){
        return $this->hasOne('App\parceldata','parcel_id');
    }


    
}
