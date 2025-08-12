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

        $wishlistProducts = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.user_id', $userId)
            ->select('products.*')
            ->get();

        return view('front.wishlist.list', compact('wishlistProducts'));
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
