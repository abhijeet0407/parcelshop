<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class parcel extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'parceltoken', 'customer_id', 'shopmanager_id','cartnumber'

    ];

     protected $dates = ['deleted_at'];

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
