
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
    <img src="assets/images/thumbs/account-img.png" alt="" class="account__img">
    <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
        <img src="assets/images/shapes/pattern-curve-seven.png" alt="" class="position-absolute end-0 top-0 z-index--1 h-100">
        <div class="account-thumb">
            <img src="assets/images/thumbs/banner-img.png" alt="">
            <div class="statistics animation bg-main text-center">
                <h5 class="statistics__amount text-white">50k</h5>
                <span class="statistics__text text-white font-14">Customers</span>
            </div>
        </div>
    </div>
    <div class="account__right padding-t-120 flx-align">

        <div class="dark-light-mode">
             <!-- Light Dark Mode -->
 <div class="theme-switch-wrapper position-relative">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" class="d-none" id="checkbox">
        <span class="slider text-black header-right__button white-version">
            <img src="assets/images/icons/sun.svg" alt="">
        </span>
        <span class="slider text-black header-right__button dark-version">
            <img src="assets/images/icons/moon.svg" alt="">
        </span>
    </label>
</div>
        </div>

        <div class="account-content">
            <a href="index.html" class="logo mb-64">
                <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
                <img src="assets/images/logo/slidesbuy.png" alt="" class="dark-version">
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
               @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-12">
            <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
            <div class="position-relative">
                <input type="email" name="email" class="common-input common-input--bg common-input--withIcon" placeholder="you@example.com" >
                <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
            </div>
             @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
        </div>

        <div class="col-12">
            <label class="form-label mb-2 font-18 font-heading fw-600">Password</label>
            <div class="position-relative">
                <input type="password" name="password" class="common-input common-input--bg common-input--withIcon" placeholder="6+ characters, 1 Capital letter" >
                <span class="input-icon"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
            </div>
        </div>

        <div class="col-12">
            <label class="form-label mb-2 font-18 font-heading fw-600">Confirm Password</label>
            <div class="position-relative">
                <input type="password" name="password_confirmation" class="common-input common-input--bg common-input--withIcon" placeholder="Confirm password" >
                <span class="input-icon"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
            </div>
        </div>

        <div class="col-12">
            <div class="common-check my-2">
                <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
                <label class="form-check-label mb-0 fw-400 font-16 text-body" for="agree">I agree to the terms & conditions</label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-main btn-lg w-100 pill">Create An Account</button>
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

<!-- Then jQuery Validation -->
{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script> --}}


<script>
    // debugger
jQuery(document).ready(function ($) {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form submission

        let isValid = true;
        let name = $('input[name="name"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();
        let agree = $('#agree').is(':checked');

        // Clear previous errors
        $('.text-danger').remove();

        // Name validation
        if (name === '') {
            $('input[name="name"]').after('<small class="text-danger">Full name is required.</small>');
            isValid = false;
        }

        // Email validation
        if (email === '') {
            $('input[name="email"]').after('<small class="text-danger">Email is required.</small>');
            isValid = false;
        } else if (!validateEmail(email)) {
            $('input[name="email"]').after('<small class="text-danger">Enter a valid email.</small>');
            isValid = false;
        }

        // Password validation
        if (password.length < 6) {
            $('input[name="password"]').after('<small class="text-danger">Password must be at least 6 characters.</small>');
            isValid = false;
        }

        // Confirm password validation
        if (confirmPassword !== password) {
            $('input[name="password_confirmation"]').after('<small class="text-danger">Passwords do not match.</small>');
            isValid = false;
        }

        // Terms & conditions checkbox
        if (!agree) {
            $('#agree').closest('.common-check').append('<small class="text-danger">You must agree to terms.</small>');
            isValid = false;
        }

        // If all validations pass, submit the form
        if (isValid) {
            this.submit(); // or use AJAX if needed
        }
    });

    // Email regex helper
    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
</script>




  
