<?php
namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Plan;
use App\Models\Subscription;
use Session;

class RazorpayPaymentController extends Controller
{
    public function show($planId)
    {
       $plan = Plan::findOrFail($planId);
        return view('front.newpayment', compact('plan'));
    }

// public function payment(Request $request)
// {
//     // dd('sdsdsd');
//     $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

//     $payment = $api->payment->fetch($request->razorpay_payment_id);
//     // dd( $payment);
//     $plan = Plan::findOrFail($request->plan_id);
//     // dd($plan);
//     $user = auth()->user();

//     // Calculate discounted price
//     $discountedPrice = $plan->price;
//     if ($plan->discount_type === 'percentage') {
//         $discountedPrice -= ($plan->price * $plan->discount) / 100;
//     } elseif ($plan->discount_type === 'flat') {
//         $discountedPrice -= $plan->discount;
//     }

//     // Create subscription
//     $subscription = new Subscription();
//     $subscription->user_id = $user->id;
//     $subscription->plan_id = $plan->id;
//     $subscription->razorpay_payment_id = $request->razorpay_payment_id;
//     $subscription->price = $plan->price;
//     $subscription->discount_price = $discountedPrice;
//     $subscription->validity = $plan->validity;

//     $subscription->payment_status = $payment->status ?? 'created';
//     $subscription->payment_method = $payment->method ?? null;
//     $subscription->transaction_id = $payment->id ?? null;
//     $subscription->started_at = now();
//     $subscription->expired_at = now()->addDays($plan->validity);
//     $subscription->is_active = true;

//     $subscription->save();

//     // Redirect to success page with subscription ID
//     return response()->json([
//         'success' => true,
//         'message' => 'Payment successful! Subscription activated.',
//         'redirect_url' => route('subscription.success', ['id' => $subscription->id]),
//     ]);
// }

public function payment(Request $request)
{
    // Initialize Razorpay API
    $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    // Fetch the payment from Razorpay
    $payment = $api->payment->fetch($request->razorpay_payment_id);

    // If payment is authorized, capture it
    if ($payment->status === 'authorized') {
        $payment = $payment->capture(['amount' => $payment->amount]);
    }

    // Find the selected plan
    $plan = Plan::findOrFail($request->plan_id);
    $user = auth()->user();

    // Calculate the discounted price
    $discountedPrice = $plan->price;
    if ($plan->discount_type === 'percentage') {
        $discountedPrice -= ($plan->price * $plan->discount) / 100;
    } elseif ($plan->discount_type === 'flat') {
        $discountedPrice -= $plan->discount;
    }

    // Map Razorpay status to your app's status
    $appPaymentStatus = match ($payment->status) {
        'captured' => 'success',
        'authorized' => 'pending', // should not reach here unless capture fails
        'failed' => 'failed',
        default => 'pending',
    };

    // Create the subscription record
    $subscription = new Subscription();
    $subscription->user_id = $user->id;
    $subscription->plan_id = $plan->id;
    $subscription->razorpay_payment_id = $payment->id;
    $subscription->price = $plan->price;
    $subscription->discount_price = $discountedPrice;
    $subscription->validity = $plan->validity;
    $subscription->payment_status = $appPaymentStatus;
    $subscription->payment_method = $payment->method ?? null;
    $subscription->transaction_id = $payment->id;
    $subscription->started_at = now();
    $subscription->expired_at = now()->addDays($plan->validity);
    $subscription->is_active = true;
    $subscription->save();

    // Send success response to front end
    return response()->json([
        'success' => true,
        'message' => 'Payment successful! Subscription activated.',
        'plan_id' => $plan->id,
        'redirect_url' => route('subscription.success', ['id' => $subscription->id]),
    ]);
}





// public function payment(Request $request)
// {

//     // dd($request->all());
//     $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

//     $payment = $api->payment->fetch($request->razorpay_payment_id);
//     $plan = Plan::findOrFail($request->plan_id);
//     $user = auth()->user();

//     // Calculate discounted price
//     $discountedPrice = $plan->price;
//     if ($plan->discount_type === 'percentage') {
//         $discountedPrice -= ($plan->price * $plan->discount) / 100;
//     } elseif ($plan->discount_type === 'flat') {
//         $discountedPrice -= $plan->discount;
//     }

//     $subscription = new Subscription();
//     $subscription->user_id = $user->id;
//     $subscription->plan_id = $plan->id;
//     $subscription->razorpay_payment_id = $request->razorpay_payment_id;
//     $subscription->price = $plan->price;
//     $subscription->discount_price = $discountedPrice;
//     $subscription->validity = $plan->validity;
//     $subscription->created_at = now();
//     $subscription->updated_at = now();
//     $subscription->expired_at = now()->addDays($plan->validity);
//     $subscription->save();

//     return response()->json([
//         'success' => true,
//         'message' => 'Payment successful! Subscription activated.',
//         'redirect_url' => route('subscription.show', $plan->id),
//     ]);
// }

    // public function payment(Request $request)
    // {
    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    //     $payment = $api->payment->fetch($request->razorpay_payment_id);

    //     if ($payment['status'] == 'authorized') {
    //         $payment->capture(['amount' => $payment['amount']]);

    //         // Store subscription logic
    //         auth()->user()->subscriptions()->create([
    //             'plan_id' => $request->plan_id,
    //             'payment_id' => $payment['id'],
    //             'amount' => $payment['amount'] / 100,
    //         ]);

    //         return redirect('/dashboard')->with('success', 'Subscription successful!');
    //     }

    //     return redirect('/')->with('error', 'Payment failed.');
    // }
}
