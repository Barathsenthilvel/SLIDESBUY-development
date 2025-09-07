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
                                <span class="breadcrumb-list__text">Subscription and Downloads</span>
                            </li>
                        </ul>
                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">Subscription and Downloads</h3>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== Page Header End ==================== -->

<!-- ==================== Subscription Content Start ==================== -->

<div class="disclaimer-content ">
    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="disclaimer-wrapper mt-5 mb-5">
                    {{-- <h4 class="disclaimer-title mb-3">Subscription and Downloads</h4> --}}
                    <p class="disclaimer-text mb-3">Slidesbuy operates on a subscription-based model. The number of templates you can download depends on your selected plan.</p>

                    <h5 class="mb-2">Subscription Plans</h5>
                    <ul class="terms-list mb-3">
                        <li>You must subscribe to one of the available plans to download templates.</li>
                        <li>Each plan specifies a download limit valid during the subscription period.</li>
                        <li>Access to content is available until the download limit is reached or the subscription period expires.</li>
                    </ul>

                    <h5 class="mb-2">Use of Content</h5>
                    <ul class="terms-list mb-0">
                        <li>Downloaded templates are licensed for personal or commercial use as specified in the licensing agreement provided with each template.</li>
                        <li>You may not resell, redistribute, or share templates without prior written consent from Slidesbuy.</li>
                        <li>You may customize templates for your own projects but may not claim copyright ownership over them.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
