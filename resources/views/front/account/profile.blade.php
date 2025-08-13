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

    .table-modern { width: 100%; border-collapse: separate; border-spacing: 0 10px; }
    .table-modern thead th { font-size: 12px; text-transform: uppercase; letter-spacing: .08em; color: #64748b; padding: 8px 12px; }
    .table-modern tbody tr { background: #fff; box-shadow: 0 6px 16px rgba(0,0,0,0.06); }
    .table-modern tbody td { padding: 14px 12px; vertical-align: middle; }
    .badge-soft { background: #eef7ff; color: #0b63f6; padding: 6px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
    .btn-icon-only { width: 40px; height: 40px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; }
    .btn-outline { border: 1px solid #e2e8f0; background: #fff; color: #0f172a; }
    .btn-outline:hover { background: #0b63f6; border-color: #0b63f6; color: #fff; }

    .profile-grid .form-label { font-weight: 600; color: #334155; }
    .profile-grid .common-input { border: 1px solid #e2e8f0; }

    .logout-card { background: linear-gradient(180deg, #fff, #f8fafc); border: 1px solid #eef1f5; border-radius: 14px; padding: 16px; }
        </style>
@php
    $subscriptionCount = isset($subscriptions) ? $subscriptions->count() : 0;
@endphp
<div class="container container-two py-4 account-wrapper">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">My Account</h3>
    </div>
    <div class="row g-3">
        <div class="col-lg-3">
            <div class="list-group account-nav shadow-sm rounded-3 overflow-hidden">
                <a href="#downloads" class="list-group-item list-group-item-action" data-target="#downloads">My Downloads</a>
                <a href="#subscriptions" class="list-group-item list-group-item-action" data-target="#subscriptions">Subscriptions ({{ $subscriptionCount }})</a>
                <a href="#profile" class="list-group-item list-group-item-action active" data-target="#profile">Profile Update</a>
                <a href="#logout" class="list-group-item list-group-item-action" data-target="#logout">Log Out</a>
            </div>
        </div>

        <div class="col-lg-9">
            <div id="tab-content" class="account-card p-3">
                <!-- Top metrics -->
                <div class="row g-3 mb-2">
                    <div class="col-sm-4"><div class="metric"><div class="value">{{ $totalDownloaded ?? ($downloads->count() ?? 0) }}</div><div class="label">Total Downloads</div></div></div>
                    <div class="col-sm-4"><div class="metric"><div class="value">{{ $downloadLimit ?? 0 }}</div><div class="label">Plan Download Limit</div></div></div>
                    <div class="col-sm-4"><div class="metric"><div class="value">{{ $remainingDownloads ?? 0 }}</div><div class="label">Downloads Left</div></div></div>
                </div>
                <div id="downloads" class="tab-pane" style="display: none;">
                    <div class="table-responsive">
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Plan</th>
                                    <th>Downloaded</th>
                                    <th>Left</th>
                                    <th>Download</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(($downloads->groupBy('product_id') ?? collect()) as $productId => $groupedDownloads)
                                    @php
                                        $first = $groupedDownloads->first();
                                        $product = $first->product;
                                        $plan = optional($first->subscription)->plan;
                                        $downloadCount = $groupedDownloads->count();
                                        $limit = optional($plan)->download_limit ?? 0;
                                        $left = max($limit - $downloadCount, 0);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="fw-600">{{ $product->product_title ?? ('File #' . $productId) }}</span>
                                                @if($product && $product->is_free)
                                                    <span class="badge-soft">Free</span>
                                                @endif
                                            </div>
                                            <div class="text-muted small">{{ optional($groupedDownloads->first())->created_at->format('d M Y') }}</div>
                                        </td>
                                        <td><span class="badge-soft">{{ $plan->name ?? 'N/A' }}</span></td>
                                        <td>{{ $downloadCount }}</td>
                                        <td>{{ $left }}</td>
                                        <td>
                                            <a href="{{ route('download.file', $productId) }}" class="btn btn-outline btn-icon-only" title="Download">
                                                <i class="las la-download"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if(optional($product)->rating)
                                                    ⭐ {{ $product->rating }} / 5
                                                @else
                                                —
                                                @endif
                                            </td>
                                            <td>
                                            <a href="{{ route('product.review.create', $productId) }}" class="btn btn-outline btn-sm pill">Review</a>
                                            </td>
                                        </tr>
                                @empty
                                    <tr><td colspan="7" class="text-center text-muted py-4">No downloads yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="subscriptions" class="tab-pane" style="display: none;">
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
                                </tr>
                            </thead>
                                                                    <tbody>
                                @forelse(($subscriptions ?? collect()) as $key => $subscription)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subscription->razorpay_payment_id ?? 'N/A' }}</td>
                                        <td><span class="badge-soft">{{ optional($subscription->plan)->name ?? 'N/A' }}</span></td>
                                        <td>{{ optional($subscription->plan)->download_limit ?? '—' }}</td>
                                        <td>₹{{ $subscription->discount_price ?? $subscription->price ?? '0' }}</td>
                                        <td>{{ optional($subscription->created_at)->format('d M Y') }}</td>
                                        <td>{{ $subscription->expired_at ? \Carbon\Carbon::parse($subscription->expired_at)->format('d M Y') : 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" class="text-center text-muted py-4">No subscriptions found.</td></tr>
                                @endforelse
                            </tbody
                        </table>
                    </div>
                </div>

                <div id="profile" class="tab-pane" style="display: block;">
                        <h5 class="mb-3">Profile Update</h5>

                        <!-- Inner Tabs Menu -->
                        <ul class="nav nav-tabs mb-3" id="profileTabs">
                            <li class="nav-item">
                                <a href="#personal-info" class="nav-link active" data-target="#personal-info">Personal Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#change-password" class="nav-link" data-target="#change-password">Change Password</a>
                            </li>
                        </ul>

                        <!-- Inner Tabs Content -->
                        <div class="tab-content">
                            <div id="personal-info" class="inner-tab-pane" style="display: block;">

                                <form id="update-profile-form" action="{{ route('account.update') }}" method="POST" autocomplete="off" class="profile-grid">
                                        @csrf
                                        @method('POST')
                                        <div class="row gy-4">
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="fName" class="form-label mb-2 font-18 font-heading fw-600">First Name</label>
                                                <input type="text" class="common-input border" name="name" id="fName" value="{{ old('name', $user->name) }}" placeholder="First Name">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="phonee" class="form-label mb-2 font-18 font-heading fw-600">Phone Number</label>
                                                <input type="tel" class="common-input border" id="phonee" name="Phone" value="{{ old('Phone', $user->Phone) }}" placeholder="Phone Number">
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <label for="emailAdddd" class="form-label mb-2 font-18 font-heading fw-600">Email Address</label>
                                                <input type="email" class="common-input border" name="email" id="emailAdddd" value="{{ old('email', $user->email) }}" placeholder="Email Address">
                                            </div>
                                            <div class="col-sm-12 text-end">
                                                <button class="btn btn-main btn-lg pill mt-4">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>

                            <div id="change-password" class="inner-tab-pane" style="display: none;">
                                <form id="password-update-form" action="{{ route('password.change') }}" method="POST" class="profile-grid">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="new-password" class="form-label mb-2 font-18 font-heading fw-600">New Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="common-input common-input--withIcon common-input--withLeftIcon" name="new_password" id="new-password" placeholder="************">
                                            <span class="input-icon input-icon--left"><img src="assets/images/icons/lock-two.svg" alt=""></span>
                                            <span class="input-icon password-show-hide fas fa-eye toggle-password-two la-eye-slash" id="#new-password"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <label for="current-password" class="form-label mb-2 font-18 font-heading fw-600">Current Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="common-input common-input--withIcon common-input--withLeftIcon" name="current_password" id="current-password" placeholder="************">
                                            <span class="input-icon input-icon--left"><img src="assets/images/icons/lock-two.svg" alt=""></span>
                                            <span class="input-icon password-show-hide fas fa-eye toggle-password-two la-eye-slash" id="#current-password"></span>
                                        </div>
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="col-sm-12 text-end">
                                        <button class="btn btn-main btn-lg pill mt-4">Update Password</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                </div>

                <!-- Logout tab -->
                <div id="logout" class="tab-pane" style="display: none;">
                    <div class="logout-card d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1">Ready to leave?</h6>
                            <div class="text-muted">You can always log back in to access your downloads and subscriptions.</div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-danger pill" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


{{--  --}}

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">Yes, Logout</button>
      </div>
    </div>
  </div>
</div>



@endsection
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    jQuery(document).ready(function ($) {

        // Toastr global settings (optional)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        $('#update-profile-form').on('submit', function(e) {
            e.preventDefault();
            $('.text-danger').remove();

            // Show loading toaster
            const loadingToast = window.toaster.loading('Updating profile...');

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    window.toaster.hide(loadingToast);
                    window.toaster.success(response.message || 'Profile updated successfully!');
                },
                error: function(xhr) {
                    window.toaster.hide(loadingToast);
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            let input = $('[name=' + field + ']');
                            input.after('<small class="text-danger">' + messages[0] + '</small>');
                        });
                        window.toaster.error('Please fix the validation errors above.');
                    } else {
                        window.toaster.error('Something went wrong!');
                    }
                }
            });
        });

$('#password-update-form').on('submit', function(e) {
    e.preventDefault();
    $('.text-danger').remove(); // remove previous errors

    // Show loading toaster
    const loadingToast = window.toaster.loading('Updating password...');

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
            window.toaster.hide(loadingToast);
            if (response.status) {
                window.toaster.success(response.message || 'Password updated successfully!');
                $('#password-update-form')[0].reset();
            } else {
                window.toaster.error(response.message || 'Failed to update password.');
            }
        },
        error: function(xhr) {
            window.toaster.hide(loadingToast);
            if (xhr.status === 422) {
                const res = xhr.responseJSON;

                // Show validation errors (like "required", "min:8", etc.)
                if (res.errors) {
                    $.each(res.errors, function(field, messages) {
                        const input = $('[name="' + field + '"]');
                        input.after('<small class="text-danger">' + messages[0] + '</small>');
                    });
                    window.toaster.error('Please fix the validation errors above.');
                }

                // Show custom error (like incorrect password)
                if (res.status === false && res.message) {
                    const input = $('[name="current_password"]');
                    input.after('<small class="text-danger">' + res.message + '</small>');
                    window.toaster.error(res.message);
                }
            } else {
                window.toaster.error('Something went wrong. Please try again.');
            }
        }
    });
});

function switchTo(target){
    // Remove 'active' class from all list items
    $('.account-nav .list-group-item').removeClass('active');
    // Add 'active' to the matching nav item
    $('.account-nav .list-group-item').each(function(){
        if($(this).attr('href') === target){ $(this).addClass('active'); }
    });
    // Hide all tab content
    $('.tab-pane').hide();
    // Show the corresponding tab
    $(target).show();
}

$('.account-nav .list-group-item').on('click', function (e) {
    e.preventDefault();
    var target = $(this).data('target') || $(this).attr('href');
    if (typeof target === 'string' && target.startsWith('#')) {
        history.replaceState(null, '', target);
        switchTo(target);
    }
});

$('#profileTabs .nav-link').on('click', function (e) {
    e.preventDefault();

    // Remove active class from all links
    $('#profileTabs .nav-link').removeClass('active');

    // Add active class to clicked link
    $(this).addClass('active');

    // Hide all inner-tab-panes
    $('.inner-tab-pane').hide();

    // Show the targeted inner tab
    var target = $(this).data('target');
    $(target).show();
});

// Load tab based on hash
const initialHash = window.location.hash || '#profile';
switchTo(initialHash);


    });
</script>
