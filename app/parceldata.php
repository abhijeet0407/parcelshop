<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class parceldata extends Model
{
	use SoftDeletes;
    //
    protected $fillable = [
        'producttype', 'destination', 'price','parcel_id'

    ];

    public function parceldata(){
        return $this->hasOne('App\parcel');
    }
}
