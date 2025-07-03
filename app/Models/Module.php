<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['id'];

    public function getMenu(){
    	return $this->belongsTo('App\Models\AdminMenu','admin_menu_id')->where('status','1');
    }
}
