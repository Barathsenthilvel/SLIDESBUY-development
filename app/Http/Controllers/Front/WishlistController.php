<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    // Show wishlist page (optional)
    public function index()
    {
        $userId = Auth::id();

        $wishlistProducts = \App\Models\Product::join('wishlists', 'products.id', '=', 'wishlists.product_id')
            ->where('wishlists.user_id', $userId)
            ->where('products.status', 1)
            ->get();

        // Calculate download counts for wishlist products
        $productIds = $wishlistProducts->pluck('id');
        $downloadStats = \App\Models\Downloads::whereIn('product_id', $productIds)
            ->selectRaw('product_id, SUM(download_count) as total_downloads')
            ->groupBy('product_id')
            ->get()
            ->keyBy('product_id');

        // Build download counts map
        $downloadCounts = [];
        foreach ($downloadStats as $stat) {
            $downloadCounts[$stat->product_id] = (int) ($stat->total_downloads ?? 0);
        }

        return view('front.wishlist.list', compact('wishlistProducts', 'downloadCounts'));
    }

    // Add product to wishlist
    public function add(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Check if already in wishlist
        $exists = DB::table('wishlists')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if (!$exists) {
            DB::table('wishlists')->insert([
                'user_id' => $userId,
                'product_id' => $productId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response()->json(['status' => 'added']);
    }

    // Remove product from wishlist
    public function remove(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');

        DB::table('wishlists')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        return response()->json(['status' => 'removed']);
    }
}
