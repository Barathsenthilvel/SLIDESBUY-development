@extends('front.includes.container')
@section('content')
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Include Toaster System -->
@include('front.includes.toaster')

<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="{{ asset('assets/images/gradients/breadcrumb-gradient-bg.png') }}" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content text-start">
                        <ul class="breadcrumb-list flx-align gap-2 mb-2 justify-content-start">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="{{ route('front.index') }}" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">My Account</span>
                            </li>
                        </ul>
                        <h3 class="breadcrumb-two-content__title mb-0 text-capitalize">My Account</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .account-wrapper { min-height: 60vh; }
    .account-card { border: 1px solid #eef1f5; border-radius: 14px; background: #fff; }
    .account-nav .list-group-item { border: 0; border-left: 3px solid transparent; border-radius: 0; padding: 12px 14px; color: #334155; font-weight: 600; }
    .account-nav .list-group-item:hover { background: #f8fafc; }
    .account-nav .list-group-item.active { background: #eef7ff; color: #0b63f6; border-left-color: #0b63f6; }

    .metric { border-radius: 12px; padding: 14px; background: #f8fafc; }
    .metric .value { font-size: 22px; font-weight: 700; }
    .metric .label { font-size: 13px; color: #64748b; }

    .table-modern { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
    .table-modern thead th { font-size: 12px; text-transform: uppercase; letter-spacing: .08em; color: #64748b; padding: 8px 12px; }
    .table-modern tbody tr { background: #fff; box-shadow: 0 6px 16px rgba(0,0,0,0.06); }
    .table-modern tbody td { padding: 14px 12px; vertical-align: middle; }
    .badge-soft { background: #eef7ff; color: #0b63f6; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
    .btn-outline { border: 1px solid #e2e8f0; background: #fff; color: #0f172a; }
    .btn-outline:hover { background: #0b63f6; border-color: #0b63f6; color: #fff; }

    /* Active navigation styling */
    .account-nav .list-group-item.active {
        background: #eef7ff !important;
        color: #0b63f6 !important;
        border-left-color: #0b63f6 !important;
        font-weight: 700 !important;
    }

    /* Hover effects for navigation */
    .account-nav .list-group-item:hover:not(.active) {
        background: #f8fafc !important;
        transform: translateX(5px);
        transition: all 0.3s ease;
    }
</style>

<div class="container container-two py-4 account-wrapper">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">My Subscriptions</h3>
    </div>
    <div class="row g-3">
        <div class="col-lg-3">
            <div class="list-group account-nav shadow-sm rounded-3 overflow-hidden">
                <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action">My Account</a>
                <a href="{{ route('account.downloads') }}" class="list-group-item list-group-item-action">My Downloads</a>
                <a href="{{ route('account.subscriptions') }}" class="list-group-item list-group-item-action active">Subscriptions</a>
                <a href="{{ route('account.profile.edit') }}" class="list-group-item list-group-item-action">Profile Update</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form-account').submit();">Log Out</a>
                <form id="logout-form-account" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="account-card p-3">
                <div class="table-responsive">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Transaction</th>
                                <th>Plan</th>
                                <th>Limit</th>
                                <th>Price</th>
                                <th>Purchased</th>
                                <th>Expires</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($subscriptions ?? collect()) as $key => $subscription)
                                @php
                                    $isExpired = $subscription->expired_at && \Carbon\Carbon::parse($subscription->expired_at)->isPast();
                                    $statusClass = $isExpired ? 'text-danger' : 'text-success';
                                    $statusText = $isExpired ? 'Expired' : 'Active';
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $subscription->razorpay_payment_id ?? 'N/A' }}</td>
                                    <td><span class="badge-soft">{{ optional($subscription->plan)->name ?? 'N/A' }}</span></td>
                                    <td>{{ optional($subscription->plan)->download_limit ?? '—' }}</td>
                                    <td>₹{{ $subscription->discount_price ?? $subscription->price ?? '0' }}</td>
                                    <td>{{ optional($subscription->created_at)->format('d M Y') }}</td>
                                    <td>{{ $subscription->expired_at ? \Carbon\Carbon::parse($subscription->expired_at)->format('d M Y') : 'N/A' }}</td>
                                    <td><span class="{{ $statusClass }}">{{ $statusText }}</span></td>
                                </tr>
                            @empty
                                <tr><td colspan="8" class="text-center text-muted py-4">No subscriptions found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle navigation clicks
    $('.account-nav .list-group-item').on('click', function(e) {
        // Don't prevent default for logout
        if ($(this).text().trim() === 'Log Out') {
            return;
        }

        // Allow normal navigation for other links
        return true;
    });
});
</script>
@endsection
