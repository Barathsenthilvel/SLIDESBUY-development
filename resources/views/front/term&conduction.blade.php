@extends('front.includes.container')
@section('content')


<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">
    <div class="breadcrumb-two">
        <img src="../assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">
                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="{{ route('front.index') }}" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">Terms & Conditions</span>
                            </li>
                        </ul>

                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Terms & Conditions</h3>
                        {{-- <p class="breadcrumb-two-content__desc font-16 text-body">Learn how we protect and handle your personal information</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="terms-content padding-y-80">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="terms-wrapper mt-5 mb-5">
                    {{-- <h4 class="terms-title mb-1">Terms and Conditions for Slidesbuy</h4> --}}
                    <p class="text-muted mb-4">Last Updated: September 07, 2025</p>
                    <p class="terms-text mb-4">Welcome to Slidesbuy ("we," "us," or "our"), accessible at slidesbuy.com. By accessing or using our website and services, you ("User" or "you") agree to be bound by these Terms and Conditions ("Terms"). If you do not agree with these Terms, please do not use our services.</p>

                    <h4 class="terms-title mb-3">1. General</h4>
                    <p class="terms-text mb-3">Slidesbuy provides an online platform where users can browse and download presentation templates. To access our services, users must create an account and subscribe to one of our available plans. These Terms govern your use of our website, services, and content.</p>

                    <h5 class="mb-2">1.1 Eligibility</h5>
                    <ul class="terms-list mb-3">
                        <li>Be at least 18 years old, or have the consent of a legal guardian.</li>
                        <li>Provide accurate and complete information during account creation.</li>
                        <li>Agree to comply with these Terms and all applicable laws.</li>
                    </ul>

                    <h5 class="mb-2">1.2 Account Creation</h5>
                    <ul class="terms-list mb-0">
                        <li>Sign up with a valid email address, mobile number, and password.</li>
                        <li>Verify your email address via a one-time password (OTP).</li>
                        <li>Maintain the confidentiality of your credentials. You are responsible for all activities carried out under your account.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
