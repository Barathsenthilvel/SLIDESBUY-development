<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    // If your table name is not "downloads" (all lowercase), define it explicitly:
    protected $table = 'downloads';

    // Mass assignable fields
    protected $fillable = ['user_id', 'product_id', 'subscription_id'];

    // Product relationship
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Subscription relationship
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
