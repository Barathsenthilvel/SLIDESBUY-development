<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    // If your table name is not "downloads" (all lowercase), define it explicitly:
    protected $table = 'downloads';

    // Mass assignable fields
    protected $fillable = ['user_id', 'product_id', 'subscription_id', 'download_count'];

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

    // Method to update download count for a product
    public static function updateProductDownloadCount($productId)
    {
        $totalDownloads = self::where('product_id', $productId)->sum('download_count');
        $uniqueUsers = self::where('product_id', $productId)->distinct('user_id')->count('user_id');

        return [
            'total_downloads' => $totalDownloads,
            'unique_users' => $uniqueUsers
        ];
    }
}
