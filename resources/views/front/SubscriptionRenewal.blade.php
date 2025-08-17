@extends('front.includes.container')
@section('content')
<!-- ==================== Page Header Start ==================== -->
<section class="page-header padding-y-120">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header__content">
                    <h2 class="page-header__title">Subscription and Renewal</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}" class="breadcrumb-link">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Subscription and Renewal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Page Header End ==================== -->

<!-- ==================== Subscription Content Start ==================== -->
<section class="subscription-content padding-y-120">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-wrapper">
                    <h3 class="content-title mb-4">Subscription and Renewal Policy</h3>
                    
                    <div class="content-section mb-5">
                        <h4 class="section-title">1. Subscription Plans</h4>
                        <p>We offer various subscription plans to meet your needs:</p>
                        <ul class="feature-list">
                            <li><strong>Basic Plan:</strong> Access to limited slides and templates</li>
                            <li><strong>Premium Plan:</strong> Full access to all slides and premium templates</li>
                            <li><strong>Enterprise Plan:</strong> Custom solutions for large organizations</li>
                        </ul>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">2. Automatic Renewal</h4>
                        <p>Your subscription will automatically renew at the end of each billing period unless you cancel it before the renewal date. You will be charged the same amount for the renewal period.</p>
                        <p>We will send you a reminder email 7 days before your subscription renews to give you time to make any changes or cancel if needed.</p>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">3. Renewal Process</h4>
                        <p>The renewal process is automatic and seamless:</p>
                        <ol class="process-list">
                            <li>Your subscription automatically renews on the same day each month/year</li>
                            <li>Payment is processed using your saved payment method</li>
                            <li>You receive a confirmation email with renewal details</li>
                            <li>Your access continues uninterrupted</li>
                        </ol>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">4. Payment Methods</h4>
                        <p>We accept the following payment methods for subscription renewals:</p>
                        <ul class="payment-list">
                            <li>Credit/Debit Cards (Visa, MasterCard, American Express)</li>
                            <li>Digital Wallets (PayPal, Apple Pay, Google Pay)</li>
                            <li>Bank Transfers (for annual plans)</li>
                        </ul>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">5. Price Changes</h4>
                        <p>We reserve the right to change subscription prices. If we increase the price of your subscription plan, we will notify you at least 30 days in advance. You will have the option to cancel your subscription before the price change takes effect.</p>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">6. Cancellation</h4>
                        <p>You can cancel your subscription at any time through your account settings or by contacting our customer support. Cancellation will take effect at the end of your current billing period, and you will continue to have access until then.</p>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">7. Refunds</h4>
                        <p>Subscription fees are non-refundable except in cases where we are unable to provide the service due to technical issues on our end. Please refer to our refund policy for more details.</p>
                    </div>

                    <div class="content-section">
                        <h4 class="section-title">8. Contact Information</h4>
                        <p>If you have any questions about your subscription or renewal, please contact us:</p>
                        <ul class="contact-list">
                            <li><strong>Email:</strong> support@slidesbuy.com</li>
                            <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                            <li><strong>Live Chat:</strong> Available 24/7 on our website</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Subscription Content End ==================== -->

<style>
.content-wrapper {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.content-title {
    color: #333;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 30px;
    border-bottom: 3px solid #6a42f1;
    padding-bottom: 15px;
}

.section-title {
    color: #6a42f1;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.content-section {
    margin-bottom: 30px;
}

.content-section p {
    color: #666;
    line-height: 1.8;
    margin-bottom: 15px;
}

.feature-list, .process-list, .payment-list, .contact-list {
    padding-left: 20px;
    margin-bottom: 15px;
}

.feature-list li, .process-list li, .payment-list li, .contact-list li {
    color: #666;
    line-height: 1.8;
    margin-bottom: 8px;
}

.process-list {
    counter-reset: step-counter;
}

.process-list li {
    counter-increment: step-counter;
    position: relative;
    padding-left: 30px;
}

.process-list li::before {
    content: counter(step-counter);
    position: absolute;
    left: 0;
    top: 0;
    background: #6a42f1;
    color: white;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
}

.contact-list li {
    background: #f8f9fa;
    padding: 10px 15px;
    border-radius: 5px;
    border-left: 4px solid #6a42f1;
}
</style>
@endsection
