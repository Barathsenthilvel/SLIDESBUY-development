
@extends('front.includes.container')
@section('content')
<style>
    .is-invalid {
    border: 1px solid red;
}

    </style>
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
            <h4 class="account-content__title mb-48 text-capitalize">Login</h4>

            {{-- section -- rgb(0 145 247) colorcode}}
{{-- <form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div class="col-12">
        <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
        <div class="position-relative">
            <input type="email" name="email" class="common-input common-input--bg common-input--withIcon" placeholder="you@example.com" required>
            <span class="input-icon"><img src="{{ asset('assets/images/icons/envelope-icon.svg') }}" alt=""></span>
        </div>
    </div>

    <div class="col-12">
        <label class="form-label mb-2 font-18 font-heading fw-600">Password</label>
        <div class="position-relative">
            <input type="password" name="password" class="common-input common-input--bg common-input--withIcon" placeholder="6+ characters, 1 Capital letter" required>
            <span class="input-icon"><img src="{{ asset('assets/images/icons/lock-icon.svg') }}" alt=""></span>
        </div>
    </div>

<div class="col-12 d-flex justify-content-between align-items-center mt-2">
    <a href="{{ route('password.request') }}" class="text-decoration-underline text-main fw-500">Forgot Password?</a>
</div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </div>
</form> --}}

<form  id="loginForm">
<div id="loginError" style="color:red;"></div>

    @csrf
    <div class="row gy-4">
        

        <div class="col-12">
            <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
            <div class="position-relative">
                <input type="email" name="email" class="common-input common-input--bg common-input--withIcon" placeholder="you@example.com" required>
                <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
                <div class="error-msg email-error mt-1 text-danger"></div>
            </div>
        </div>

        <div class="col-12">
            <label class="form-label mb-2 font-18 font-heading fw-600">Password</label>
            <div class="position-relative">
                <input type="password" name="password" class="common-input common-input--bg common-input--withIcon" placeholder="6+ characters, 1 Capital letter" required>
                <span class="input-icon"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
                        <div class="error-msg password-error mt-1 text-danger"></div>

            </div>
        </div>

        <div class="col-12 d-flex justify-content-between align-items-center mt-2">
            <a href="{{ route('password.request') }}" class="text-decoration-underline text-main fw-500">Forgot Password?</a>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-main btn-lg w-100 pill">Login</button>
        </div>




       
        
        </div>
    </div>
</form>

        </div>
    </div>
</section>

@endsection
<!-- Load jQuery first -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Then your script -->
<script>

    jQuery(document).ready(function ($) {
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            // Clear previous errors
            $('.email-error').text('');
            $('.password-error').text('');
            $('input').removeClass('is-invalid');

            let formData = $(this).serialize();

            $.ajax({
               url: "{{ route('login.submit') }}",// Update if your login route is different
                method: 'POST',
                data: formData,
                success: function (res) {
                    if (res.success) {
                        window.location.href = '/home';
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // Laravel validation errors
                        let errors = xhr.responseJSON.errors;
                        if (errors.email) {
                            $('input[name="email"]').addClass('is-invalid');
                            $('.email-error').text(errors.email[0]);
                        }
                        if (errors.password) {
                            $('input[name="password"]').addClass('is-invalid');
                            $('.password-error').text(errors.password[0]);
                        }
                    } else if (xhr.status === 401) {
                        let response = xhr.responseJSON;
                        if (response.field === 'email') {
                            $('input[name="email"]').addClass('is-invalid');
                            $('.email-error').text(response.message);
                        } else if (response.field === 'password') {
                            $('input[name="password"]').addClass('is-invalid');
                            $('.password-error').text(response.message);
                        }
                    } else {
                        alert('An unknown error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>


