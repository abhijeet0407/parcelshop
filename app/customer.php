<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $fillable = [
        'account_type', 'phone', 'address','bankname','bankaccount','cod','user_id'

    ];


    public function user(){
        return $this->hasOne('App\user');
    }
}
