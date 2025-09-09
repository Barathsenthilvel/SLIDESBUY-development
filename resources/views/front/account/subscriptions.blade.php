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

    /* Mobile responsive styles */
    @media (max-width: 768px) {
        .account-wrapper {
            padding: 15px 0;
        }

        .account-card {
            padding: 15px !important;
        }

        /* Stack navigation and content vertically on mobile */
        .row.g-3 {
            flex-direction: column;
        }

        .col-lg-3 {
            margin-bottom: 20px;
            width: 100% !important;
            flex: 0 0 100% !important;
            max-width: 100% !important;
        }

        /* Ensure navigation container is visible */
        .list-group.account-nav {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Make navigation horizontal on mobile */
        .account-nav {
            display: flex !important;
            flex-direction: row !important;
            overflow-x: auto;
            white-space: nowrap;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .account-nav .list-group-item {
            flex: 0 0 auto !important;
            min-width: 120px;
            text-align: center;
            border-left: none !important;
            border-bottom: 3px solid transparent;
            padding: 12px 8px !important;
            font-size: 13px;
            display: block !important;
            background: transparent !important;
            border-radius: 0 !important;
        }

        .account-nav .list-group-item.active {
            border-left: none !important;
            border-bottom-color: #0b63f6 !important;
            background: #eef7ff !important;
        }

        .account-nav .list-group-item:hover:not(.active) {
            background: #f8fafc !important;
            transform: none !important;
        }

        /* Mobile card layout for subscriptions */
        .table-modern {
            display: none;
        }

        .subscription-cards {
            display: block;
        }

        .subscription-card {
            background: #fff;
            border: 1px solid #eef1f5;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .subscription-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #f1f5f9;
        }

        .subscription-number {
            background: #eef7ff;
            color: #0b63f6;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .subscription-status {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .subscription-status.active {
            background: #dcfce7;
            color: #16a34a;
        }

        .subscription-status.expired {
            background: #fee2e2;
            color: #dc2626;
        }

        .subscription-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            font-size: 13px;
        }

        .subscription-detail {
            display: flex;
            flex-direction: column;
        }

        .subscription-detail-label {
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .subscription-detail-value {
            color: #0f172a;
            font-weight: 500;
        }

        .subscription-plan {
            background: #eef7ff;
            color: #0b63f6;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        /* Hide desktop table on mobile */
        .table-responsive {
            display: none;
        }

        /* Badge adjustments */
        .badge-soft {
            font-size: 11px;
            padding: 4px 8px;
        }

        /* Button adjustments */
        .btn-outline {
            font-size: 12px;
            padding: 6px 12px;
        }
    }

    /* Desktop - show table, hide cards */
    @media (min-width: 769px) {
        .table-modern {
            display: table !important;
        }

        .subscription-cards {
            display: none !important;
        }

        .table-responsive {
            display: block !important;
        }
    }

    /* Tablet responsive */
    @media (min-width: 769px) and (max-width: 991px) {
        .table-modern {
            font-size: 14px;
        }

        .table-modern thead th {
            padding: 10px 8px;
        }

        .table-modern tbody td {
            padding: 12px 8px;
        }
    }
</style>

<div class="container container-two py-4 account-wrapper">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">My Subscriptions</h3>
    </div>
    <div class="row g-3">
        <div class="col-12 col-lg-3">
            <div class="list-group account-nav shadow-sm rounded-3 overflow-hidden">
                <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action">My Account</a>
                <a href="{{ route('account.downloads') }}" class="list-group-item list-group-item-action">My Downloads</a>
                <a href="{{ route('account.subscriptions') }}" class="list-group-item list-group-item-action active">Subscriptions</a>
                <a href="{{ route('account.profile.edit') }}" class="list-group-item list-group-item-action">Profile Update</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form-account').submit();">Log Out</a>
                <form id="logout-form-account" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <div class="account-card p-3">
                <!-- Desktop Table View -->
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
                                    <td>${{ $subscription->discount_price ?? $subscription->price ?? '0' }}</td>
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

                <!-- Mobile Card View -->
                <div class="subscription-cards">
                    @forelse(($subscriptions ?? collect()) as $key => $subscription)
                        @php
                            $isExpired = $subscription->expired_at && \Carbon\Carbon::parse($subscription->expired_at)->isPast();
                            $statusClass = $isExpired ? 'expired' : 'active';
                            $statusText = $isExpired ? 'Expired' : 'Active';
                        @endphp
                        <div class="subscription-card">
                            <div class="subscription-card-header">
                                <span class="subscription-number">#{{ $key + 1 }}</span>
                                <span class="subscription-status {{ $statusClass }}">{{ $statusText }}</span>
                            </div>
                            <div class="subscription-details">
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Plan</span>
                                    <span class="subscription-plan">{{ optional($subscription->plan)->name ?? 'N/A' }}</span>
                                </div>
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Price</span>
                                    <span class="subscription-detail-value">${{ $subscription->discount_price ?? $subscription->price ?? '0' }}</span>
                                </div>
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Purchased</span>
                                    <span class="subscription-detail-value">{{ optional($subscription->created_at)->format('d M Y') }}</span>
                                </div>
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Expires</span>
                                    <span class="subscription-detail-value">{{ $subscription->expired_at ? \Carbon\Carbon::parse($subscription->expired_at)->format('d M Y') : 'N/A' }}</span>
                                </div>
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Limit</span>
                                    <span class="subscription-detail-value">{{ optional($subscription->plan)->download_limit ?? '—' }}</span>
                                </div>
                                <div class="subscription-detail">
                                    <span class="subscription-detail-label">Transaction</span>
                                    <span class="subscription-detail-value">{{ $subscription->razorpay_payment_id ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">
                            <p>No subscriptions found.</p>
                        </div>
                    @endforelse
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
