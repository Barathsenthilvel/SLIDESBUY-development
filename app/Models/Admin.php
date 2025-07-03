<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'webadmin';
    
    protected $fillable = ['admin_name','admin_email','password','role_id','Username'];
    protected $appends = ['role_name'];
    
    public function role()
    {
    	return $this->belongsTo('App\Models\Role','role_id')->where('status',1);
    }
    
    public function getRoleNameAttribute()
    {
    	return $this->belongsTo('App\Models\Role','role_id')->where('status',1)->first();
    }

    public function sectionCheck($value){
        $sections = explode(",", $this->role->user_permission);
        
        if (in_array($value, $sections)){
               return true;
        }else{
            return false;
        }
    }

    public function IsSuper(){
        if ($this->id == 1) {
           return true;
        }
        return false;
    }
    public function getRole(){
        $role = Role::where('id',$this->role_id)->first();
        return $role;
    }
}
