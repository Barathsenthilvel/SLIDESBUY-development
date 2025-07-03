<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    protected $fillable = [

    	'menu_name',
    ];

    public function menuModule(){
    	return $this->hasMany('App\Models\Module')->where('status','1')->orderBy('sort_order','ASC');
    }
}
