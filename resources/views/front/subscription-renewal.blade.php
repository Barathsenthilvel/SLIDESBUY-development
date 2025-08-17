@extends('front.includes.container')
@section('content')

<!-- ==================== Page Header Start ==================== -->
<section class="page-header padding-y-120">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header__content">
                    <h2 class="page-header__title">Subscription & Renewal</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}" class="breadcrumb-link">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Subscription & Renewal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Page Header End ==================== -->

{{-- <section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">Subscription & Renewal</div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="#">Subscription & Renewal</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<div class="subscription-content padding-y-80">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="subscription-wrapper">
                    <h4 class="subscription-title mb-4">1. Subscription Plans</h4>
                    <p class="subscription-text mb-4">Slidesbuy offers various subscription plans to meet your needs. Our subscription plans include access to premium templates, exclusive content, and priority support. All subscription plans are billed on a recurring basis.</p>
                    
                    <h4 class="subscription-title mb-4">2. Subscription Types</h4>
                    <ul class="subscription-list mb-4">
                        <li><strong>Monthly Plan:</strong> Billed monthly with automatic renewal</li>
                        <li><strong>Annual Plan:</strong> Billed annually with automatic renewal</li>
                        <li><strong>Premium Plan:</strong> Includes additional features and priority support</li>
                        <li><strong>Enterprise Plan:</strong> Custom solutions for business needs</li>
                    </ul>
                    
                    <h4 class="subscription-title mb-4">3. Automatic Renewal</h4>
                    <p class="subscription-text mb-4">All subscriptions automatically renew at the end of each billing period unless cancelled before the renewal date. You will be charged the subscription fee for the upcoming period on the day of renewal.</p>
                    
                    <h4 class="subscription-title mb-4">4. Billing and Payment</h4>
                    <p class="subscription-text mb-4">Subscription fees are charged in advance on a monthly or annual basis. We accept major credit cards, PayPal, and other payment methods. All payments are processed securely through our payment partners.</p>
                    
                    <h4 class="subscription-title mb-4">5. Price Changes</h4>
                    <p class="subscription-text mb-4">We reserve the right to modify subscription prices at any time. Price changes will be communicated to subscribers at least 30 days in advance. Price changes will take effect at the next billing cycle.</p>
                    
                    <h4 class="subscription-title mb-4">6. Subscription Management</h4>
                    <p class="subscription-text mb-4">You can manage your subscription through your account dashboard. This includes updating payment methods, changing subscription plans, and viewing billing history. All changes take effect at the next billing cycle.</p>
                    
                    <h4 class="subscription-title mb-4">7. Cancellation Policy</h4>
                    <p class="subscription-text mb-4">You may cancel your subscription at any time through your account dashboard or by contacting customer support. Cancellation will take effect at the end of the current billing period. No refunds are provided for partial periods.</p>
                    
                    <h4 class="subscription-title mb-4">8. Refund Policy</h4>
                    <p class="subscription-text mb-4">We offer a 30-day money-back guarantee for new subscriptions. If you're not satisfied with your subscription within the first 30 days, you may request a full refund. Refund requests must be submitted through customer support.</p>
                    
                    <h4 class="subscription-title mb-4">9. Account Access</h4>
                    <p class="subscription-text mb-4">Subscription access is granted to the account holder only. Sharing account credentials or allowing multiple users to access a single subscription is prohibited and may result in account termination.</p>
                    
                    <h4 class="subscription-title mb-4">10. Service Availability</h4>
                    <p class="subscription-text mb-4">While we strive to maintain 99.9% uptime, we do not guarantee uninterrupted access to our services. We may perform maintenance or updates that temporarily affect service availability.</p>
                    
                    <h4 class="subscription-title mb-4">11. Contact Information</h4>
                    <p class="subscription-text mb-4">For questions about subscriptions, billing, or account management, please contact our customer support team at support@slidesbuy.com or through our support portal.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
