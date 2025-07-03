<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Discount extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['title','type','number','expiry_date','product','show_home','status'];
}
