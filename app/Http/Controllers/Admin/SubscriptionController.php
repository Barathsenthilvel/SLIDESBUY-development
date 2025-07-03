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
        $subscriptions = Subscription::with('user', 'plan')->get();

        // dd($subscriptions);
        return DataTables::of($subscriptions)
            ->addColumn('DT_RowIndex', function () {
                static $i = 0;
                return ++$i;
            })
            ->editColumn('user', function ($subscription) {
                dd($subscription);
                return $subscription->user ? $subscription->user->name : 'N/A';
            })
            ->editColumn('plan', function ($subscription) {
                return $subscription->plan ? $subscription->plan->name : 'N/A';
            })
            ->editColumn('price', function ($subscription) {
                return $subscription->price ? $subscription->price : '₹ 100';
            })
            ->editColumn('subscribed_at', function ($subscription) {
                return $subscription->subscribed_at ? $subscription->subscribed_at->format('Y-m-d') : Carbon::today()->format('Y-m-d H:i:s');
            })
            ->editColumn('expired_at', function ($subscription) {
                return $subscription->expired_at ? $subscription->expired_at->format('Y-m-d H:i:s') : Carbon::tomorrow()->format('Y-m-d H:i:s');
            })
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
