<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    protected $table = "companies";

    protected $fillable = ['id','name', 'ownerUID', 'employees', 'payFrequency', 'payDate'];
    
    public function owner(){
        return $this->belongsTo('App\User', 'ownerUID', 'id');
    }
    public function staff(){
        return $this->hasMany('App\User', 'company');
    }

    public function roles(){
        return $this->hasMany('App\CompanyRole','company');
    }
    public function contactDetails(){
        return $this->hasOne('App\ContactDetails', 'companyID', 'id');
    }
}
