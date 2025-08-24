@extends('front.includes.container')
@section('content')
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Include Toaster System -->
@include('front.includes.toaster')

<style>
    .account-wrapper { min-height: 60vh; }
    .account-card { border: 1px solid #eef1f5; border-radius: 14px; background: #fff; }
    .account-nav .list-group-item { border: 0; border-left: 3px solid transparent; border-radius: 0; padding: 12px 14px; color: #334155; font-weight: 600; }
    .account-nav .list-group-item:hover { background: #f8fafc; }
    .account-nav .list-group-item.active { background: #eef7ff; color: #0b63f6; border-left-color: #0b63f6; }

    .metric { border-radius: 12px; padding: 14px; background: #f8fafc; }
    .metric .value { font-size: 22px; font-weight: 700; }
    .metric .label { font-size: 13px; color: #64748b; }

    .quick-action-card {
        border: 1px solid #eef1f5;
        border-radius: 14px;
        background: #fff;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .quick-action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: #0b63f6;
    }
    .quick-action-card .icon { font-size: 2.5rem; color: #0b63f6; margin-bottom: 15px; }
    .quick-action-card .title { font-weight: 600; color: #334155; margin-bottom: 10px; }
    .quick-action-card .description { color: #64748b; font-size: 14px; }

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
        <h3 class="mb-0">My Account</h3>
    </div>
    <div class="row g-3">
        <div class="col-lg-3">
            <div class="list-group account-nav shadow-sm rounded-3 overflow-hidden">
                <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action active">My Account</a>
                <a href="{{ route('account.downloads') }}" class="list-group-item list-group-item-action">My Downloads</a>
                <a href="{{ route('account.subscriptions') }}" class="list-group-item list-group-item-action">Subscriptions</a>
                <a href="{{ route('account.profile.edit') }}" class="list-group-item list-group-item-action">Profile Update</a>
                <a href="#" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form-account').submit();">Log Out</a>
                <form id="logout-form-account" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="account-card p-3">
                <!-- Top metrics -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="metric">
                            <div class="value">{{ $totalDownloaded ?? ($downloads->count() ?? 0) }}</div>
                            <div class="label">Total Downloads</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="metric">
                            <div class="value">
                                @if(!empty($isUnlimited) && $isUnlimited && empty($isExpired))
                                    <i class="las la-infinity"></i>
                                @else
                                    {{ $downloadLimit ?? 0 }}
                                @endif
                            </div>
                            <div class="label">Plan Download Limit</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="metric">
                            <div class="value">
                                @if(!empty($isExpired) && $isExpired)
                                    0
                                @elseif(!empty($isUnlimited) && $isUnlimited)
                                    <i class="las la-infinity"></i>
                                @else
                                    {{ $remainingDownloads ?? 0 }}
                                @endif
                            </div>
                            <div class="label">
                                Downloads Left
                                @if(!empty($isExpired) && $isExpired)
                                    <span class="text-danger small d-block">Please renew the plan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <h5 class="mb-3">Quick Actions</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ route('account.downloads') }}" class="text-decoration-none">
                            <div class="quick-action-card">
                                <div class="icon">
                                    <i class="las la-download"></i>
                                </div>
                                <div class="title">My Downloads</div>
                                <div class="description">View and manage your downloaded products</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('account.subscriptions') }}" class="text-decoration-none">
                            <div class="quick-action-card">
                                <div class="icon">
                                    <i class="las la-credit-card"></i>
                                </div>
                                <div class="title">Subscriptions</div>
                                <div class="description">Manage your subscription plans</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('account.profile.edit') }}" class="text-decoration-none">
                            <div class="quick-action-card">
                                <div class="icon">
                                    <i class="las la-user-edit"></i>
                                </div>
                                <div class="title">Profile Update</div>
                                <div class="description">Update your personal information</div>
                            </div>
                        </a>
                    </div>
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
