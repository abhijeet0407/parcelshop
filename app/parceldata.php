<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parceldata extends Model
{
    //
    protected $fillable = [
        'producttype', 'destination', 'price','parcel_id'

    ];
}
