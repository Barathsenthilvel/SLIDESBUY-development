<?php
namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Banner;
use App\Models\Homeslider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Homecat;
use App\Models\Attribute;
use App\Http\Controllers\Admin\HomecatController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\HomesliderController;
use Illuminate\Support\Collection;
use App\Models\MailTemplate;
use App\Mail\ContactMails;
use App\Models\Storeconfiguration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Subscribes;
use Validator;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;

class SubscriptionController extends Controller
{
    public function showPlans()
    {
        // Fetch all plans from DB
        $plans = Plan::all();

        // dd($plans);
        // Pass to Blade view
        return view('front.subscription', compact('plans'));
    }

    public function subscribe(Request $request, $planId)
    {

        dd($planId);
        $plan = Plan::findOrFail($planId);
        $user = auth()->user();

        $start = now();
        $end = $plan->validity ? now()->addDays($plan->validity) : null;

        $user->update([
            'plan_id' => $plan->id,
            'subscription_start' => $start,
            'subscription_end' => $end,
            'downloaded_count' => 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'You subscribed to the ' . $plan->name . ' plan.');
    }




public function success($id)
{
    // dd($id);
    $subscription = Subscription::with('plan')->findOrFail($id);
    // dd($subscription);
    $plan = $subscription->plan;
// dd( $plan);
    // Calculate discount amount
    $discountAmount = $subscription->price - $subscription->discount_price;

    $orderDetails = [
        'order_no' => 'SUB-' . str_pad($subscription->id, 6, '0', STR_PAD_LEFT),
        'order_status' => $subscription->payment_status,
        'payment_method' => $subscription->payment_method,
        'date' => $subscription->created_at->format('Y-m-d'),
        'subtotal' => $subscription->price,
        'discount_amount' => $discountAmount,
        'discount_price' => $subscription->discount_price,
        'total' => $subscription->discount_price,
    ];

    // dd(  $orderDetails);

    $productsPurchased = [
        [
            'name' => $plan->name,
            'price' => $subscription->price,
            'discount_price' => $subscription->discount_price,
            'discount_amount' => $discountAmount
        ],
    ];
    // dd($productsPurchased);

    return view('front.subscription.success', compact('orderDetails', 'productsPurchased'));
}





}
