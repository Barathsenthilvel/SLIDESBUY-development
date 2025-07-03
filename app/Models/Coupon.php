<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Coupon extends Authenticatable
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = ['title','code','user','userid','type','value','count','OrderValue','expirydate','status'];
   
}
