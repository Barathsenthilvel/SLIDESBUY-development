<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'price',
        'subscribed_at',
        'expired_at',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user','id');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan', 'plan', 'id');
    }
    
}
