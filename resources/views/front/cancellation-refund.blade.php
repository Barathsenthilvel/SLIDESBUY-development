@extends('front.includes.container')
@section('content')

<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">Cancellation & Refund</div>
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
                        <li><a href="#">Cancellation & Refund</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cancellation-content padding-y-80">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="cancellation-wrapper">
                    <h4 class="cancellation-title mb-4">1. Cancellation Policy</h4>
                    <p class="cancellation-text mb-4">You may cancel your subscription or service at any time. Cancellation requests can be submitted through your account dashboard, by email, or by contacting our customer support team. All cancellations are processed within 24-48 hours.</p>
                    
                    <h4 class="cancellation-title mb-4">2. How to Cancel</h4>
                    <ul class="cancellation-list mb-4">
                        <li><strong>Account Dashboard:</strong> Log into your account and navigate to subscription settings</li>
                        <li><strong>Email Request:</strong> Send cancellation request to support@slidesbuy.com</li>
                        <li><strong>Phone Support:</strong> Call our customer support team during business hours</li>
                        <li><strong>Live Chat:</strong> Use our live chat feature for immediate assistance</li>
                    </ul>
                    
                    <h4 class="cancellation-title mb-4">3. Cancellation Timeline</h4>
                    <p class="cancellation-text mb-4">Cancellations take effect at the end of your current billing period. You will continue to have access to all services until the end of the period you've already paid for. No partial refunds are provided for unused portions of the billing period.</p>
                    
                    <h4 class="cancellation-title mb-4">4. Refund Eligibility</h4>
                    <p class="cancellation-text mb-4">Refunds are available under the following conditions:</p>
                    <ul class="cancellation-list mb-4">
                        <li><strong>30-Day Guarantee:</strong> New customers can request a full refund within 30 days</li>
                        <li><strong>Service Issues:</strong> Refunds for technical problems or service failures</li>
                        <li><strong>Billing Errors:</strong> Refunds for duplicate charges or billing mistakes</li>
                        <li><strong>Unauthorized Charges:</strong> Refunds for charges made without permission</li>
                    </ul>
                    
                    <h4 class="cancellation-title mb-4">5. Refund Process</h4>
                    <p class="cancellation-text mb-4">To request a refund, please follow these steps:</p>
                    <ol class="cancellation-list mb-4">
                        <li>Contact customer support with your refund request</li>
                        <li>Provide your account details and reason for refund</li>
                        <li>Our team will review your request within 3-5 business days</li>
                        <li>If approved, refunds are processed within 5-10 business days</li>
                        <li>You will receive confirmation via email once processed</li>
                    </ol>
                    
                    <h4 class="cancellation-title mb-4">6. Refund Methods</h4>
                    <p class="cancellation-text mb-4">Refunds are processed using the original payment method:</p>
                    <ul class="cancellation-list mb-4">
                        <li><strong>Credit/Debit Cards:</strong> 5-10 business days to appear on your statement</li>
                        <li><strong>PayPal:</strong> 3-5 business days to your PayPal account</li>
                        <li><strong>Bank Transfers:</strong> 7-14 business days depending on your bank</li>
                    </ul>
                    
                    <h4 class="cancellation-title mb-4">7. Non-Refundable Items</h4>
                    <p class="cancellation-text mb-4">The following items are non-refundable:</p>
                    <ul class="cancellation-list mb-4">
                        <li>Used or downloaded digital products</li>
                        <li>Custom or personalized services</li>
                        <li>Gift cards or promotional credits</li>
                        <li>Services used beyond the refund period</li>
                    </ul>
                    
                    <h4 class="cancellation-title mb-4">8. Account Deletion</h4>
                    <p class="cancellation-text mb-4">Upon cancellation, you may choose to delete your account. Account deletion is permanent and will remove all your data, including download history and saved preferences. Please ensure you have downloaded any purchased content before deleting your account.</p>
                    
                    <h4 class="cancellation-title mb-4">9. Reinstatement</h4>
                    <p class="cancellation-text mb-4">If you wish to reactivate your subscription after cancellation, you can do so at any time. You will be charged the current subscription rate, which may differ from your previous rate. All previous account data will be restored.</p>
                    
                    <h4 class="cancellation-title mb-4">10. Contact Information</h4>
                    <p class="cancellation-text mb-4">For cancellation requests, refund inquiries, or any questions about our policies, please contact us:</p>
                    <ul class="cancellation-list mb-4">
                        <li><strong>Email:</strong> support@slidesbuy.com</li>
                        <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                        <li><strong>Live Chat:</strong> Available on our website</li>
                        <li><strong>Business Hours:</strong> Monday-Friday, 9 AM - 6 PM EST</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
