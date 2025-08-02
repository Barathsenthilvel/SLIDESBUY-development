<?php

// app/Models/Download.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    protected $fillable = ['user_id', 'product_id', 'subscription_id'];
}
