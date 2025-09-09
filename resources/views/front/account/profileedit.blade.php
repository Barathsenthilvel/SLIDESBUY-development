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

    .profile-grid .form-label { font-weight: 600; color: #334155; }
    .profile-grid .common-input { border: 1px solid #e2e8f0; }

    .logout-card { background: linear-gradient(180deg, #fff, #f8fafc); border: 1px solid #eef1f5; border-radius: 14px; padding: 16px; }

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


<div class="container container-two py-4 account-wrapper">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">Profile Update</h3>
    </div>
    <div class="row g-3">
        <div class="col-lg-3">
            <div class="list-group account-nav shadow-sm rounded-3 overflow-hidden">
                <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action">My Account</a>
                <a href="{{ route('account.downloads') }}" class="list-group-item list-group-item-action">My Downloads</a>
                <a href="{{ route('account.subscriptions') }}" class="list-group-item list-group-item-action">Subscriptions</a>
                <a href="{{ route('account.profile.edit') }}" class="list-group-item list-group-item-action active">Profile Update</a>
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
                            <div class="value">{{ $totalDownloaded ?? 0 }}</div>
                            <div class="label">Total Downloads</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="metric">
                            <div class="value">{{ $activeSubscriptions->count() ?? 0 }}</div>
                            <div class="label">Active Plans</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="metric">
                            <div class="value">{{ $subscriptions->count() ?? 0 }}</div>
                            <div class="label">Total Plans</div>
                        </div>
                    </div>
                </div>

                <!-- Profile Update Form -->
                <div id="profile" class="tab-pane">
                    <h5 class="mb-3">Profile Update</h5>
                    <form id="profile-update-form" action="{{ route('account.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control common-input" id="name" name="name" value="{{ $user->name ?? '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control common-input" id="email" name="email" value="{{ $user->email ?? '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control common-input" id="Phone" name="Phone" value="{{ $user->Phone ?? '' }}" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Password Update Form -->
                <div class="mt-4">
                    <h5 class="mb-3">Change Password</h5>
                    <form id="password-update-form" action="{{ route('password.change') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control common-input" id="current_password" name="current_password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control common-input" id="new_password" name="new_password" required minlength="8">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
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

    // Profile update form submission
    $('#profile-update-form').on('submit', function(e) {
        e.preventDefault();
        $('.text-danger').remove(); // remove previous errors

        // Show loading toaster
        const loadingToast = window.toaster.loading('Updating profile...');

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                window.toaster.hide(loadingToast);
                if (response.success) {
                    window.toaster.success(response.message || 'Profile updated successfully!');
                } else {
                    window.toaster.error(response.message || 'Failed to update profile.');
                }
            },
            error: function(xhr) {
                window.toaster.hide(loadingToast);
                if (xhr.status === 422) {
                    const res = xhr.responseJSON;
                    if (res.errors) {
                        $.each(res.errors, function(field, messages) {
                            const input = $('[name="' + field + '"]');
                            input.after('<small class="text-danger">' + messages[0] + '</small>');
                        });
                        window.toaster.error('Please fix the validation errors above.');
                    }
                } else {
                    window.toaster.error('Something went wrong!');
                }
            }
        });
    });

    // Password update form submission
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
                    if (res.errors) {
                        $.each(res.errors, function(field, messages) {
                            const input = $('[name="' + field + '"]');
                            input.after('<small class="text-danger">' + messages[0] + '</small>');
                        });
                        window.toaster.error('Please fix the validation errors above.');
                    }
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
});
</script>
@endsection
