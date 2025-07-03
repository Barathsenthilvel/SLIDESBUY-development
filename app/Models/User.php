<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Pincode;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name',
        'last_name',
        'dob',
        'gender',
        'email',
        'Phone',
        'password',
        'customer_type',
        'city',
        'state',
        'country',
        'pincode',
        'address',
        'wishlist',
        'street'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address','user_id','id')->where('status',1);
    }
    
    public function getContry(){
        $Country = Country::where('id',$this->country)->first();
        
        if(!empty($Country)){
            return $Country->country_name;
        }else{
            return '';
        }
    }
    public function getState(){
        $State =  State::where('id',$this->state)->first();
        if(!empty($State)){
            return $State ->state_name;
        }else{
            return '';
        }
    }
    public function getcity(){
        $City =  City::where('id',$this->city)->first();
        if(!empty($City)){
            return $City ->city_name;
        }else{
            return '';
        }
    }
    public function getpincode(){
        $Pincode =  Pincode::where('id',$this->pincode)->first();
        if(!empty($Pincode)){
            return $Pincode ->pincode;
        }else{
            return '';
        }
    }
}
