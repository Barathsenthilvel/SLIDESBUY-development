@extends('front.includes.container')
@section('content')
<!-- ==================== Page Header Start ==================== -->

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
                                <span class="breadcrumb-list__text">Cancellation & Refund Policy</span>
                            </li>
                        </ul>
                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Cancellation & Refund</h3>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== Page Header End ==================== -->

<!-- ==================== Cancellation Content Start ==================== -->
<section class="cancellation-content ">
    <div class="container container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-wrapper mt-5 mb-5">
                    <h3 class="content-title mb-4">Cancellation and Refund Policy</h3>

                    <div class="content-section mb-5">
                        <h4 class="section-title">1. Order Cancellation</h4>
                        <p>You may cancel your order under the following conditions:</p>
                        <ul class="feature-list">
                            <li><strong>Before Processing:</strong> Orders can be cancelled within 2 hours of placement if not yet processed</li>
                            <li><strong>During Processing:</strong> Cancellation may be possible but subject to approval</li>
                            <li><strong>After Processing:</strong> Orders cannot be cancelled once processing has begun</li>
                        </ul>
                        <p>To cancel an order, please contact our customer support team with your order number and reason for cancellation.</p>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">2. Refund Policy</h4>
                        <p>We offer refunds under the following circumstances:</p>
                        <div class="refund-table">
                            <div class="refund-row">
                                <div class="refund-condition">Digital Products (Slides/Templates)</div>
                                <div class="refund-status">No Refund</div>
                                <div class="refund-reason">Once downloaded, digital products cannot be refunded</div>
                            </div>
                            <div class="refund-row">
                                <div class="refund-condition">Subscription Services</div>
                                <div class="refund-status">Partial Refund</div>
                                <div class="refund-reason">Pro-rated refund for unused portion of subscription</div>
                            </div>
                            <div class="refund-row">
                                <div class="refund-condition">Technical Issues</div>
                                <div class="refund-status">Full Refund</div>
                                <div class="refund-reason">If we cannot provide the service due to technical problems</div>
                            </div>
                            <div class="refund-row">
                                <div class="refund-condition">Duplicate Charges</div>
                                <div class="refund-status">Full Refund</div>
                                <div class="refund-reason">Immediate refund for accidental duplicate charges</div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">3. Refund Process</h4>
                        <p>When a refund is approved, the process follows these steps:</p>
                        <ol class="process-list">
                            <li>Refund request is reviewed by our support team (1-2 business days)</li>
                            <li>Approved refunds are processed within 3-5 business days</li>
                            <li>Refund is credited back to the original payment method</li>
                            <li>You receive a confirmation email with refund details</li>
                        </ol>
                        <p><strong>Note:</strong> The time for the refund to appear in your account depends on your bank or payment provider (typically 5-10 business days).</p>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">4. Non-Refundable Items</h4>
                        <p>The following items are non-refundable:</p>
                        <ul class="non-refundable-list">
                            <li>Digital downloads (slides, templates, graphics)</li>
                            <li>Custom design services</li>
                            <li>Consultation fees</li>
                            <li>Processing fees and taxes</li>
                            <li>Gift cards and promotional credits</li>
                        </ul>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">5. How to Request a Refund</h4>
                        <p>To request a refund, please follow these steps:</p>
                        <ol class="process-list">
                            <li>Contact our customer support team via email or live chat</li>
                            <li>Provide your order number and reason for refund</li>
                            <li>Include any relevant screenshots or documentation</li>
                            <li>Wait for our response (typically within 24 hours)</li>
                        </ol>
                    </div>

                    <div class="content-section mb-5">
                        <h4 class="section-title">6. Exceptions</h4>
                        <p>We may make exceptions to our refund policy in special circumstances:</p>
                        <ul class="exception-list">
                            <li>Medical emergencies preventing use of the service</li>
                            <li>Death of the account holder</li>
                            <li>Extended technical issues on our platform</li>
                            <li>Legal requirements in your jurisdiction</li>
                        </ul>
                        <p>All exceptions are reviewed on a case-by-case basis by our management team.</p>
                    </div>

                    <div class="content-section">
                        <h4 class="section-title">7. Contact Information</h4>
                        <p>For cancellation and refund requests, please contact us:</p>
                        <ul class="contact-list">
                            <li><strong>Email:</strong> refunds@slidesbuy.com</li>
                            <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                            <li><strong>Live Chat:</strong> Available 24/7 on our website</li>
                            <li><strong>Response Time:</strong> Within 24 hours during business days</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Cancellation Content End ==================== -->

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

.feature-list, .process-list, .non-refundable-list, .exception-list, .contact-list {
    padding-left: 20px;
    margin-bottom: 15px;
}

.feature-list li, .process-list li, .non-refundable-list li, .exception-list li, .contact-list li {
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

.refund-table {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    margin: 20px 0;
}

.refund-row {
    display: grid;
    grid-template-columns: 1fr 1fr 2fr;
    border-bottom: 1px solid #e0e0e0;
}

.refund-row:last-child {
    border-bottom: none;
}

.refund-row:nth-child(odd) {
    background: #f8f9fa;
}

.refund-condition, .refund-status, .refund-reason {
    padding: 15px;
    font-size: 14px;
    line-height: 1.5;
}

.refund-condition {
    font-weight: 600;
    color: #333;
}

.refund-status {
    font-weight: 600;
    text-align: center;
}

.refund-status:contains("No Refund") {
    color: #dc3545;
}

.refund-status:contains("Partial Refund") {
    color: #ffc107;
}

.refund-status:contains("Full Refund") {
    color: #28a745;
}

.refund-reason {
    color: #666;
}

.contact-list li {
    background: #f8f9fa;
    padding: 10px 15px;
    border-radius: 5px;
    border-left: 4px solid #6a42f1;
}

.non-refundable-list li {
    color: #dc3545;
    font-weight: 500;
}

.exception-list li {
    color: #28a745;
    font-weight: 500;
}
</style>
@endsection
