<?php


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Downloads;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Carbon\Carbon;

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



  public function index(Request $request)
{
    $user = auth()->user();

    // Get the section from query parameter or default to 'profile'
    $section = $request->get('section', 'profile');

    // Validate section parameter
    $validSections = ['downloads', 'subscriptions', 'profile', 'logout'];
    if (!in_array($section, $validSections)) {
        $section = 'profile';
    }

    // Fetch all downloads for the user along with product and subscription plan
    $downloads = Downloads::with(['product', 'subscription.plan'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // NEW: Fetch ALL subscriptions directly from subscriptions table
    $subscriptions = Subscription::with('plan')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Group downloads by product to get count and details
    $downloadsGrouped = $downloads->groupBy('product_id')->map(function ($items) {
        return [
            'count' => $items->count(),
            'product' => $items->first()->product,
            'downloads' => $items,
        ];
    });

    // Get active subscriptions ordered by creation date (oldest first)
    $activeSubscriptions = $subscriptions->filter(function ($s) {
        return is_null($s->expired_at) || Carbon::parse($s->expired_at)->isFuture();
    })->sortBy('created_at');

    // Find the current active subscription to use (prioritize oldest)
    $currentActiveSubscription = null;
    $downloadLimit = 0;
    $totalDownloaded = 0;
    $isUnlimited = false;

    foreach ($activeSubscriptions as $subscription) {
        $plan = $subscription->plan;
        if (!$plan) continue;

        $subscriptionDownloadLimit = (int) $plan->download_limit;
        $subscriptionDownloadsUsed = $downloads->filter(function ($d) use ($subscription) {
            return optional($d->subscription)->id === $subscription->id;
        })->count();

        // If unlimited plan
        if ($subscriptionDownloadLimit === 0) {
            $currentActiveSubscription = $subscription;
            $downloadLimit = 0; // Unlimited
            $totalDownloaded = $subscriptionDownloadsUsed;
            $isUnlimited = true;
            break;
        }

        // If limited plan and downloads remaining
        if ($subscriptionDownloadsUsed < $subscriptionDownloadLimit) {
            $currentActiveSubscription = $subscription;
            $downloadLimit = $subscriptionDownloadLimit;
            $totalDownloaded = $subscriptionDownloadsUsed;
            break;
        }

        // If this plan is exhausted, continue to next plan
    }

    // Use current active subscription for the view
    $activeSubscription = $currentActiveSubscription;

    // Flags for view logic
    $isExpired = !$currentActiveSubscription && $subscriptions->isNotEmpty();

    // Compute remaining: unlimited shows as infinity in UI, expired shows 0
    if ($isExpired) {
        $remainingDownloads = 0;
    } elseif ($isUnlimited) {
        $remainingDownloads = null; // represent infinity in the view
    } else {
        $remainingDownloads = max(0, $downloadLimit - $totalDownloaded);
    }

    return view('front.account.profile', compact(
        'user',
        'downloads',
        'downloadsGrouped',
        'totalDownloaded',
        'downloadLimit',
        'remainingDownloads',
        'subscriptions',
        'isUnlimited',
        'isExpired',
        'currentActiveSubscription',
        'activeSubscription',
        'section'
    ));
}

// New method for downloads section
public function downloads()
{
    $user = auth()->user();

    // Fetch all downloads for the user along with product and subscription plan
    $downloads = Downloads::with(['product', 'subscription.plan'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Group downloads by product to get count and details
    $downloadsGrouped = $downloads->groupBy('product_id')->map(function ($items) {
        return [
            'count' => $items->count(),
            'product' => $items->first()->product,
            'downloads' => $items,
        ];
    });

    return view('front.account.downloads', compact('user', 'downloads', 'downloadsGrouped'));
}

// New method for subscriptions section
public function subscriptions()
{
    $user = auth()->user();

    // Fetch ALL subscriptions directly from subscriptions table
    $subscriptions = Subscription::with('plan')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('front.account.subscriptions', compact('user', 'subscriptions'));
}

// New method for profile section
public function profile()
{
    $user = auth()->user();

    // Fetch basic user data for profile editing
    $downloads = Downloads::with(['product', 'subscription.plan'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Get active subscriptions for metrics
    $subscriptions = Subscription::with('plan')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Calculate metrics
    $totalDownloaded = $downloads->count();
    $activeSubscriptions = $subscriptions->filter(function ($s) {
        return is_null($s->expired_at) || Carbon::parse($s->expired_at)->isFuture();
    });

    return view('front.account.profileedit', compact(
        'user',
        'downloads',
        'subscriptions',
        'totalDownloaded',
        'activeSubscriptions'
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

    // If free product, allow download without counting/checking
    if (($product->sell_type ?? 1) == 0) {
        if (!Storage::disk('public')->exists($product->document)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        return Storage::disk('public')->download($product->document);
    }

    // For paid products, ensure a historical download exists (or you can adapt to your policy)
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
