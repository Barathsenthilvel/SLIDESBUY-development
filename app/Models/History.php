<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Storeconfiguration;
class History extends Model
{
    use HasFactory;
    protected $table = 'historys';
    protected $fillable  =['tableid','message'];

}
