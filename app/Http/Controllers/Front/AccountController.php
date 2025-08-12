<?php


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Downloads;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function userDownloads()
    {
        $downloads = Downloads::with(['product', 'subscription']) // eager load relationships
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
            // dd($downloads);

        return view('front.account.profile', compact('downloads'));
    }



  public function index()
{
    $user = auth()->user();

    // Fetch all downloads for the user along with product and subscription plan
    $downloads = Downloads::with(['product', 'subscription.plan'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();
    $uniqueSubscriptions = $downloads->pluck('subscription')->unique('id')->values();

    // Group downloads by product to get count and details
    $downloadsGrouped = $downloads->groupBy('product_id')->map(function ($items) {
        return [
            'count' => $items->count(),
            'product' => $items->first()->product,
            'downloads' => $items,
        ];
    });

    // Assuming all downloads belong to the same active subscription
    $subscription = $downloads->first()->subscription ?? null;
    $downloadLimit = $subscription->plan->download_limit ?? 0;
    $totalDownloaded = $downloads->count();
    $remainingDownloads = max(0, $downloadLimit - $totalDownloaded);

    return view('front.account.profile', compact(
        'user',
        'downloads',
        'downloadsGrouped',
        'totalDownloaded',
        'downloadLimit',
        'remainingDownloads',
        'uniqueSubscriptions'
    ));
}



public function destroy(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/home'); // or wherever you want to redirect
}

public function update(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'Phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
    ]);

    $user = auth()->user();
    $user->name  = $request->name;
    $user->Phone = $request->Phone;
    $user->email = $request->email;
    $user->save();

    return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
}


public function changePassword (Request $request)
{
     $request->validate([
        'current_password' => 'required',
        'new_password' => 'required| min:8',
    ]);

    $user = Auth::user();

    // Check if the current password matches the stored hash
    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Current password is incorrect.',
        ], 422);
    }

    // Update password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return response()->json([
        'status' => true,

        'message' => 'Password updated successfully!',
    ]);
}


public function download($productId)
{
    $user = auth()->user();

    // Check if the product exists
    $product = Product::findOrFail($productId);

    // Check if user is allowed to download
    $hasDownloaded = Downloads::where('user_id', $user->id)
                              ->where('product_id', $productId)
                              ->exists();

    if (!$hasDownloaded) {
        return redirect()->back()->with('error', 'You are not allowed to download this file.');
    }

    // Check if the file exists in the storage/public disk
    if (!Storage::disk('public')->exists($product->document)) {
        return redirect()->back()->with('error', 'File not found.');
    }

    // Trigger download
    return Storage::disk('public')->download($product->document);
}




}
