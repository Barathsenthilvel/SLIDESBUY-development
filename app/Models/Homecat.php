<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Homecat extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['title','category','styles','status'];
}