<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_name ','attribute_type','data_type','attribute_values','attribute_units','attribute_icons','attribute_sort','units_display','icons_display'];
}
