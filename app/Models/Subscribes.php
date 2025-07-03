<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Storeconfiguration;
class Subscribes extends Model
{
    use HasFactory;
    protected $fillable  =['email'];
    protected $table = 'subscribes';

}
