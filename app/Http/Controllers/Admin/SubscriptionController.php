<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;
use App\Models\Subscription;


class SubscriptionController extends Controller
{
	public function index(){
		return view('admin.subscriptions.index');
	}

	public function datatables(Request $request)
	{
		// $subscriptions = Subscription::with('user', 'plan')->oderby('desc')->get();
        $subscriptions = Subscription::with('user', 'plan')->orderBy('created_at', 'desc')->get();

		// dd($subscriptions);
		return DataTables::of($subscriptions)
			->addColumn('DT_RowIndex', function () {
				static $i = 0;
				return ++$i;
			})
			->editColumn('user', function ($subscription) {
				// dd($subscription);
				return $subscription->user ? $subscription->user->name : 'N/A';
			})
			->addColumn('customer_email', function ($subscription) {
				return $subscription->user ? $subscription->user->email : 'N/A';
			})
			->editColumn('plan', function ($subscription) {
				return $subscription->plan ? $subscription->plan->name : 'N/A';
			})
			->editColumn('price', function ($subscription) {
				return $subscription->price ? $subscription->price : '₹ 100';
			})
			// Add computed final price using plan discount (flat or percentage) or subscription's stored discount_price
			->addColumn('final_price', function ($subscription) {
				$basePrice = $subscription->price ?? ($subscription->plan->price ?? 0);
				// If a discount price is stored on subscription, prefer it
				if (!empty($subscription->discount_price) && is_numeric($subscription->discount_price)) {
					$final = (float) $subscription->discount_price;
				} else {
					$discount = $subscription->plan->discount ?? 0;
					$discountType = $subscription->plan->discount_type ?? null; // 'flat' or 'percentage'
					$final = (float) $basePrice;
					if ($discount && is_numeric($discount)) {
						if ($discountType === 'flat') {
							$final = max(0, $basePrice - (float) $discount);
						} elseif ($discountType === 'percentage') {
							$final = max(0, $basePrice - ($basePrice * ((float) $discount) / 100));
						}
					}
				}
				return '$' . number_format($final, 2);
			})
			->addColumn('current_status', function ($subscription) {
				$now = Carbon::now();
				$expiredAt = $subscription->expired_at;

				if (!$expiredAt) {
					return '<span class="badge badge-warning">No Expiry Date</span>';
				}

				if ($now->gt($expiredAt)) {
					return '<span class="badge badge-danger">Expired</span>';
				} else {
					return '<span class="badge badge-success">Active</span>';
				}
			})
			->editColumn('subscribed_at', function ($subscription) {
				return $subscription->subscribed_at ? $subscription->subscribed_at->format('Y-m-d') : Carbon::today()->format('Y-m-d H:i:s');
			})
			->editColumn('expired_at', function ($subscription) {
				return $subscription->expired_at ? $subscription->expired_at->format('Y-m-d H:i:s') : Carbon::tomorrow()->format('Y-m-d H:i:s');
			})
			->rawColumns(['current_status'])
			->make(true);
	}

	public function subscriptionSetup()
	{
		return view('admin.subscriptions.setup');
	}

	public function storeSubscription(Request $request)
	{

	}
	public function create()
	{
		return view('admin.subscriptions.create');
	}
}
