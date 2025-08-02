<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

   protected $fillable = [
    'plan_id',
    'razorpay_payment_id',
    'price',
    'discount_price',
    'validity',
    'valid_until',
    'expired_at',
    'payment_status',
    'payment_method',
    'transaction_id',
    'user_id',
    'started_at',
    'is_active'
];
    public $timestamps = true;

public function user()
{
    return $this->belongsTo('App\Models\User', 'user_id'); // foreign key on Subscription table
}

public function plan() {
    return $this->belongsTo(Plan::class, 'plan_id');
}

}
