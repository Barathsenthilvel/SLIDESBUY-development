
@extends('front.includes.container')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/css/intlTelInput.min.css">
<style>
.iti__country-list {
        width: 240px !important;
    }
.iti {
    width: 100% !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/intlTelInput.min.js"></script>

<!--==================== Preloader Start ====================-->
 <div class="loader-mask">
  <div class="loader">
      <div></div>
      <div></div>
  </div>
</div>
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="overlay"></div>
<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- ==================== Scroll to Top End Here ==================== -->

<!-- ==================== Mobile Menu Start Here ==================== -->


<!-- ================================== Account Page Start =========================== -->
<section class="account d-flex">
    <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
        <img src="assets/images/shapes/pattern-curve-seven.png" alt="" class="position-absolute end-0 top-0 z-index--1 h-100">
        <div class="account-thumb">
            <img src="../assets/images/thumbs/banner-img.png" alt="">
            <div class="statistics animation bg-main text-center">
                <h5 class="statistics__amount text-white">50k</h5>
                <span class="statistics__text text-white font-14">Customers</span>
            </div>
        </div>
    </div>
    <div class="account__right padding-t-120 flx-align">


        <div class="account-content">
            <a href="index.html" class="logo mb-64">
                {{-- <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
                <img src="assets/images/logo/slidesbuy.png" alt="" class="dark-version"> --}}
                <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="white-version">
                <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt="" class="dark-version">
            </a>
            <h4 class="account-content__title mb-48 text-capitalize">Create A Free Account</h4>
<!-- register form start -->
 <form id="registerForm" action="{{ route('user.register') }}" method="POST">

    @csrf
    <div class="row gy-4">
        <div class="col-12">
            <label for="name" class="form-label mb-2 font-18 font-heading fw-600">Full Name</label>
            <div class="position-relative">
                <input type="text" name="name" class="common-input common-input--bg common-input--withIcon" placeholder="Your full name" >
                <span class="input-icon"><img src="assets/images/icons/user-icon.svg" alt=""></span>
            </div>
               <div class="error-message" id="name-error"></div>
        </div>

        <div class="col-12">
            <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
            <div class="position-relative">
                <input type="email" name="email" class="common-input common-input--bg common-input--withIcon" placeholder="you@example.com" >
                <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
            </div>
             <div class="error-message" id="email-error"></div>
        </div>

        <div class="col-12">
            <label class="form-label mb-2 font-18 font-heading fw-600">Password</label>
            <div class="position-relative">
                <input type="password" name="password" class="common-input common-input--bg common-input--withIcon" placeholder="Password" autocomplete="new-password">
                <span class="input-icon"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
            </div>
            <div class="error-message" id="password-error"></div>
        </div>

        <div class="col-12">
            <label class="form-label mb-2 font-18 font-heading fw-600">Confirm Password</label>
            <div class="position-relative">
                <input type="password" name="password_confirmation" class="common-input common-input--bg common-input--withIcon" placeholder="Confirm password" autocomplete="new-password">
                <span class="input-icon"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
            </div>
            <div class="error-message" id="password_confirmation-error"></div>
        </div>

        <div class="col-12">
            <div class="common-check my-2">
                <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                <label class="form-check-label mb-0 fw-400 font-16 text-body" for="agree">I agree to the terms & conditions</label>
            </div>
            <div class="error-message" id="agree-error"></div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-main btn-lg w-100 pill" id="submitBtn">Create An Account</button>
        </div>

        <div class="col-sm-12 mb-0">
            <div class="have-account">
                <p class="text font-14">Already a member? <a class="link text-main text-decoration-underline fw-500" href="{{ route('login.form') }}">Login</a>
</p>
            </div>
        </div>
    </div>
</form>
<!-- register form -->
        </div>
    </div>
</section>
<!-- ================================== Account Page End =========================== -->

@endsection

<!-- Load jQuery first -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Include Toaster System -->
@include('front.includes.toaster')

<style>
.error-message {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: none;
}

.error-message.show {
    display: block;
}

.input-error {
    border-color: #dc3545 !important;
}

.input-success {
    border-color: #28a745 !important;
}
</style>

<script>
jQuery(document).ready(function ($) {
    // Clear all error messages
    function clearErrors() {
        $('.error-message').removeClass('show').text('');
        $('.common-input').removeClass('input-error input-success');
    }

    // Show error message for a specific field
    function showError(fieldName, message) {
        $(`#${fieldName}-error`).text(message).addClass('show');
        $(`input[name="${fieldName}"]`).addClass('input-error').removeClass('input-success');
    }

    // Show success state for a field
    function showSuccess(fieldName) {
        $(`#${fieldName}-error`).removeClass('show').text('');
        $(`input[name="${fieldName}"]`).addClass('input-success').removeClass('input-error');
    }

    // Client-side validation
    function validateForm() {
        clearErrors();
        let isValid = true;

        let name = $('input[name="name"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();
        let agree = $('#agree').is(':checked');

        // Name validation
        if (name === '') {
            showError('name', 'Full name is required.');
            isValid = false;
        } else {
            showSuccess('name');
        }

        // Email validation
        if (email === '') {
            showError('email', 'Email is required.');
            isValid = false;
        } else if (!validateEmail(email)) {
            showError('email', 'Enter a valid email.');
            isValid = false;
        } else {
            showSuccess('email');
        }

        // Password validation
        if (password.length < 6) {
            showError('password', 'Password must be at least 6 characters.');
            isValid = false;
        } else {
            showSuccess('password');
        }

        // Confirm password validation
        if (confirmPassword !== password) {
            showError('password_confirmation', 'Passwords do not match.');
            isValid = false;
        } else if (confirmPassword !== '') {
            showSuccess('password_confirmation');
        }

        // Terms & conditions checkbox
        if (!agree) {
            showError('agree', 'You must agree to terms.');
            isValid = false;
        } else {
            showSuccess('agree');
        }

        return isValid;
    }

    // Email regex helper
    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Handle form submission
    $('#registerForm').on('submit', function(e) {
            e.preventDefault();

        if (!validateForm()) {
            return false;
        }

        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.text();

        // Show loading state
        submitBtn.prop('disabled', true).text('Creating Account...');

        // Show loading toaster
                        if (window.toaster) {
            window.toaster.loading('Creating your account and sending OTP...');
        }

        // Prepare form data
        const formData = new FormData(this);

        // Make AJAX request
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Hide loading toaster
                if (window.toaster) {
                    window.toaster.hide();
                }

                if (response.success) {
                    // Show success message
                    if (window.toaster) {
                        window.toaster.success(response.message || 'Account created successfully! OTP sent to your email.');
                    }

                    // Redirect to OTP form after a short delay
                    setTimeout(function() {
                        window.location.href = '/otp-form';
                    }, 2000);
                } else {
                    // Show error message
                    if (window.toaster) {
                        window.toaster.error(response.message || 'Something went wrong. Please try again.');
                    }

                    // Reset button
                    submitBtn.prop('disabled', false).text(originalText);
                }
            },
            error: function(xhr) {
                // Hide loading toaster
                if (window.toaster) {
                    window.toaster.hide();
                }

                // Reset button
                submitBtn.prop('disabled', false).text(originalText);

                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    clearErrors();

                    $.each(errors, function(field, messages) {
                        showError(field, messages[0]);
                    });

                    if (window.toaster) {
                        window.toaster.error('Please fix the validation errors.');
                    }
                } else if (xhr.status === 500) {
                    // Server error
                    if (window.toaster) {
                        window.toaster.error('Server error. Please try again later.');
                    }
                } else {
                    // Other errors
                    const response = xhr.responseJSON;
                    if (response && response.message) {
                        if (window.toaster) {
                            window.toaster.error(response.message);
                        }
                    } else {
                        if (window.toaster) {
                            window.toaster.error('Something went wrong. Please try again.');
                        }
                    }
                }
            }
    });
    });

    // Real-time validation on input change
    $('input[name="name"], input[name="email"], input[name="password"], input[name="password_confirmation"]').on('input', function() {
        const fieldName = $(this).attr('name');
        const value = $(this).val().trim();

        // Clear error when user starts typing
        if (value !== '') {
            $(`#${fieldName}-error`).removeClass('show').text('');
            $(this).removeClass('input-error');
        }
    });

    // Real-time validation for checkbox
    $('#agree').on('change', function() {
        if ($(this).is(':checked')) {
            $('#agree-error').removeClass('show').text('');
        }
    });
});
</script>





