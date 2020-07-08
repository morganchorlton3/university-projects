<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paySlip extends Model
{
    public function staff(){
        return $this->hasOne('App\User', 'id', 'userID');
    }
}
