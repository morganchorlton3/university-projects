<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'email', 'password', 'companyStatus', 'last_login_at', 'last_login_ip', 'notificationPref',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Roles
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
    //Company
    public function companyInfo(){
        return $this->belongsTo('App\Company', 'company');
    }
    public function companyID(){
        $company = Company::where('ownerUID', Auth::id())->first();
        return $company->id;
    }
    public function hasCompany($company){
        if($this->company()->where('name', $company)->first()){
            return true;
        }
        return false;
    }
    public function companyAproval(){
        return $this->belongsToMany(StaffToAprove::class);
    }

    //jobs
    public function job(){
        return $this->hasOne('App\Job', 'userID', 'id');
    }

    public function hasJob(){
        if($this->job()){
            return true;
        }
        return false;
    }
    //Shift Pattern
    public function ShiftPattern(){
        return $this->hasOne('App\ShiftPattern', 'userID', 'id');
    }
    public function hasShiftPattern(){
        if($this->ShiftPattern()){
            return true;
        }
        return false;
    }
    //Contact Details
    public function contactDetails(){
        return $this->hasOne('App\ContactDetails', 'userID', 'id');
    }
    public function companyDetails(){
        return $this->hasOne('App\ContactDetails', 'companyID', 'company');
    }
}
