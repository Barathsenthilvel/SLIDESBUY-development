<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group_name','attribute','filter','front','combined_price','sort_order'];
}
