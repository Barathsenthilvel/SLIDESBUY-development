<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    protected $table = 'roles';
    protected $fillable = ['role_name'];

    public function userRole(){
    	return $this->hasMany('App\Models\Admin','role_id')->where('status','1');
    }

    public function vendorRole(){
    	return $this->hasMany('App\Models\Vendor','role','id')->where('status','1');
    }

    
}
