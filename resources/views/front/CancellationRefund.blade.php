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
<div class="disclaimer-content ">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="disclaimer-wrapper mt-5 mb-5">
                    {{-- <h4 class="disclaimer-title mb-3">Cancellation and Refund Policy</h4> --}}

                    <h4 class="mb-2">Cancellation</h4>
                    <ul class="terms-list mb-3">
                        <li>Once purchased, subscriptions are non-cancellable.</li>
                        <li>You may choose not to renew your subscription after expiry.</li>
                    </ul>

                    <h4 class="mb-2">Refund</h4>
                    <ul class="terms-list mb-0">
                        <li>Refunds are not offered except as required by law.</li>
                        <li>If you face issues with downloads or payments, contact us at support@slidesbuy.com.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
