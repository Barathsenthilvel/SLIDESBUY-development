@extends('front.includes.container')
@section('content')
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Include Toaster System -->
@include('front.includes.toaster')

<style>
    /* Make all table text black */
    .table-custom tbody tr {
        color: #000;
    }

    /* Grey background for even rows */
    .table-custom tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
        </style>
<div class="container">
    <h4>My Account</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item" data-target="#downloads">My Downloads</a>
                <a href="#" class="list-group-item" data-target="#subscriptions">Subscriptions (1)</a>
                <a href="#" class="list-group-item active" data-target="#profile">Profile Update</a>
                <a href="#" class="list-group-item" data-toggle="modal" data-target="#logoutModal">Log Out</a>

            </div>
        </div>

        <div class="col-md-9">
            <div id="tab-content">
                <div id="downloads" class="tab-pane" style="display: none;">
                    <!-- Downloads content -->
                      {{-- start --}}

                    <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>File ID / Title</th>
                                    <th>Plan</th>
                                    <th>Downloaded On</th>
                                    <th>Downloads Left</th>
                                    <th>Download</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($downloads->groupBy('product_id') as $productId => $groupedDownloads)
                                    @php
                                        $firstDownload = $groupedDownloads->first();
                                        $product = $firstDownload->product;
                                        $plan = $firstDownload->subscription->plan;
                                        $downloadCount = $groupedDownloads->count();
                                        $downloadLimit = $plan->download_limit ?? 0;
                                        $downloadsLeft = max($downloadLimit - $downloadCount, 0);
                                    @endphp

                                    @foreach($groupedDownloads as $download)
                                        <tr>
                                            <td>{{ $product->title ?? 'File #' . $productId }}</td>
                                            <td>{{ $plan->name ?? 'N/A' }}</td>
                                            <td>{{ $download->created_at->format('d M Y h:i A') }}</td>
                                            <td>{{ $downloadsLeft }}</td>
                                            <td><a href="{{ route('download.file', $productId) }}">⬇</a></td>
                                            <td>
                                                @if($product->rating)
                                                    ⭐ {{ $product->rating }} / 5
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.review.create', $productId) }}">Write a Review</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>


                    {{-- End --}}
                   {{--  --}}
                </div>

                <div id="subscriptions" class="tab-pane" style="display: none;">
                    <!-- Subscriptions content -->
                    {{-- <p>My Subscriptions content here</p> --}}
                    {{--  --}}
                     <div class="container bg-grey" >
                         <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transaction ID</th>
                                    <th>Plan</th>
                                    <th>Download Limit</th>
                                    <th>Price</th>
                                    <th>Purchased On</th>
                                    <th>Expired On</th>
                                </tr>
                            </thead>
                                        <tbody>
                                         @foreach($uniqueSubscriptions as $key => $subscription)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $subscription->transaction_id ?? 'N/A' }}</td>
                                            <td>{{ $subscription->plan->name ?? 'N/A' }}</td>
                                            <td>{{ $subscription->plan->download_limit ?? 'N/A' }}</td>
                                            <td>₹{{ $subscription->plan->price ?? '0' }}</td>
                                            <td>{{ optional($subscription->created_at)->format('d M Y') }}</td>
                                            <td>{{ $subscription->expired_at ? \Carbon\Carbon::parse($subscription->expired_at)->format('d M Y') : 'N/A' }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                        </table>
                    </div>
                    {{--  --}}
                </div>

                <div id="profile" class="tab-pane" style="display: block;">
                        <h5>Profile Update</h5>

                        <!-- Inner Tabs Menu -->
                        <ul class="nav nav-tabs mb-3" id="profileTabs">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" data-target="#personal-info">Personal Info</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-target="#change-password">Change Password</a>
                            </li>
                        </ul>

                        <!-- Inner Tabs Content -->
                        <div class="tab-content">
                            <div id="personal-info" class="inner-tab-pane" style="display: block;">

                                <form id="update-profile-form" action="{{ route('account.update') }}" method="POST" autocomplete="off">
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
                                <p>Change Password form or content goes here.</p>

                                                <form id="password-update-form" action="{{ route('password.change') }}" method="POST">
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

                {{--  --}}



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

$('.list-group-item').on('click', function (e) {
    e.preventDefault();

    // Remove 'active' class from all list items
    $('.list-group-item').removeClass('active');

    // Add 'active' to the clicked item
    $(this).addClass('active');

    // Hide all tab content
    $('.tab-pane').hide();

    // Show the corresponding tab
    var target = $(this).data('target');
    $(target).show();
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


    });
</script>
