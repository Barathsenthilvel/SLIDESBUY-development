@extends('front.includes.container')
@section('content')


<!-- ========================= Pricing Plan Section Start ============================ -->
<section class="pricing padding-y-120 position-relative z-index-1">
    <img src="../assets/images/shapes/element1.png" alt="" class="element one">
    <img src="../assets/images/gradients/pricing-gradient-bg.png" alt="" class="bg--gradient">

    <div class="container container-two">
        <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
            <div class="section-heading__inner w-lg">
                <h3 class="section-heading__title">Our Best Pricing Plan</h3>
                <p class="section-heading__desc">Choose from flexible monthly, half-yearly, or yearly subscriptions. Get premium presentation templates at the best value.</p>
            </div>
            {{-- <div class="pricing-tabs">
                <ul class="nav tab-gradient nav-pills mb-0" id="pills-tab-pricing" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link pill active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="true">monthly</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link pill" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="false">yearly</button>
                    </li>
                </ul>
            </div> --}}
        </div>

        <div class="tab-content" id="pills-tab-pricingContent">
            <div class="tab-pane fade active show" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab" tabindex="0">
                <div class="row gy-4">

                    @foreach($plans as $plan)
                    {{-- @dd($plan); --}}
                    <div class="col-lg-4 col-sm-6">
                        <div class="pricing-item box-shadow-lg hover-bg-main">
                            <img src="../assets/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
                            <div class="pricing-item__top">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="pricing-item__icon me-3">
                                        <img src="../assets/images/icons/price-icon1.svg" alt="">
                                    </span>
                                    <div class="flex-grow-1 text-center">
                                        <h5 class="pricing-item__title mb-0">{{ $plan->name }} Plan</h5>
                                    </div>
                                    <span class="popular-badge d-none"></span>
                                </div>
                                <p class="pricing-item__desc text-center">{{ $plan->description }}</p>
                            </div>
                            <div class="pricing-item__content">
                                <h3 class="pricing-item__price mb-2">
                                    @if($plan->discount && $plan->discount > 0)
                                        @php
                                            $originalPrice = $plan->price;
                                            $discountedPrice = $plan->price;

                                            if($plan->discount_type === 'flat') {
                                                $discountedPrice = $plan->price - $plan->discount;
                                            } elseif($plan->discount_type === 'percentage') {
                                                $discountedPrice = $plan->price - ($plan->price * $plan->discount / 100);
                                            }

                                            // Ensure discounted price doesn't go below 0
                                            $discountedPrice = max(0, $discountedPrice);
                                        @endphp

                                        <div class="price-display">
                                            <div class="original-price-small">
                                                <span class="text-decoration-line-through text-muted">{{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ $originalPrice }}</span>
                                            </div>
                                            <div class="discounted-price-large">
                                                <span class="text-success fw-bold">{{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ number_format($discountedPrice, 2) }}</span>
                                                <span class="discount-badge-attractive">
                                                    @if($plan->discount_type === 'flat')
                                                        SAVE {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ $plan->discount }}
                                                    @elseif($plan->discount_type === 'percentage')
                                                        SAVE {{ $plan->discount }}%
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ $plan->price }}
                                    @endif
                                    <div class="inr-below text-center mt-1">
                                        @if($loop->iteration == 1)
                                            <span class="price-inr">₹442.93 INR</span>
                                        @elseif($loop->iteration == 2)
                                            <span class="price-inr">₹1,774.37 INR</span>
                                        @elseif($loop->iteration == 3)
                                            <span class="price-inr">₹2,662.00 INR</span>
                                        @endif
                                    </div>
                                    <span class="text font-14 text-body font-body fw-400">{{ $plan->validity }} /days</span>
                                </h3>

                                                               <a href="#"
                                    class="btn btn-main pill plan-details-btn"
                                    data-id="{{ $plan->id }}"
                                    data-price="{{ $plan->price }}"
                                    data-name="{{ $plan->name }}"
                                    data-discount="{{ $plan->discount ?? 0 }}"
                                    data-discount-type="{{ $plan->discount_type ?? '' }}"
                                    data-validity="{{ $plan->validity }}"
                                    data-download-limit="{{ $plan->download_limit ?? 0 }}"
                                    data-downloads="{{ $plan->download_limit == 0 ? 'Unlimited' : $plan->download_limit . ' downloads' }}"
                                    data-description="{{ $plan->description ?? 'Essential services to start your journey' }}"
                                    data-access-content="{{ $plan->access_content ?? 'Full access to all content' }}"
                                    data-content="{{ $plan->content ?? 'Premium content and features' }}">
                                    Get Started
                                    </a>

                            </div>
                            <div class="pricing-item__lists">
                                <ul class="text-list">
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span>Validity {{$plan->validity}} Days </li>
                                    <li class="text-list__item text-heading">
                                        <span class="icon"><i class="fas fa-check"></i></span>
                                        {{ $plan->download_limit == 0 ? 'Unlimited downloads' : $plan->download_limit . ' template downloads' }}
                                    </li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span>{{$plan->access_content}}</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span>{{$plan->content}}</li>
                                    {{-- @if($plan->discount && $plan->discount > 0)
                                        <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Discount:
                                            @if($plan->discount_type === 'flat')
                                                {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ $plan->discount }} OFF
                                            @elseif($plan->discount_type === 'percentage')
                                                {{ $plan->discount }}% OFF
                                            @endif
                                        </li>
                                    @endif --}}
                                    {{-- <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Process management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Workflow management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Team management</li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab" tabindex="0">
                <div class="text-center mt-5">
                    <p>Yearly plans coming soon.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ========================= Pricing Plan Section End ============================ -->

<style>
.plan-details-container {
    padding: 20px 0;
}

.plan-details-container h4 {
    color: #333;
    font-weight: 600;
}

.plan-details-container h3 {
    color: #007bff;
    font-weight: 700;
}

.price-container {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    background: #f8f9fa;
}

.plan-price-final {
    font-size: 2rem;
    font-weight: 700;
    color: #28a745 !important;
    margin-bottom: 5px;
}

.plan-price-original {
    font-size: 1.2rem;
    color: #6c757d !important;
}

.discount-badge {
    font-size: 0.8rem;
    font-weight: 600;
}

/* Pricing card discount styles */
.pricing-item__price .text-decoration-line-through {
    color: #6c757d !important;
    font-size: 0.9em;
}

.pricing-item__price .text-success {
    color: #28a745 !important;
    font-weight: bold;
}

.pricing-item__price .badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
}

/* Attractive discount pricing styles */
.price-display {
    text-align: center;
    position: relative;
}

.original-price-small {
    margin-bottom: 8px;
}

.original-price-small .text-decoration-line-through {
    font-size: 0.75em !important;
    color: #999 !important;
    opacity: 0.7;
    font-weight: 400;
}

.discounted-price-large {
    position: relative;
    display: inline-block;
}

.discounted-price-large .text-success {
    font-size: 1.4em !important;
    color: #28a745 !important;
    font-weight: 800 !important;
    text-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    animation: pulse-glow 2s infinite;
    display: inline-block;
}

.discount-badge-attractive {
    position: absolute;
    top: -12px;
    right: -20px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(238, 90, 36, 0.4);
    animation: bounce 2s infinite;
    transform: rotate(-5deg);
    white-space: nowrap;
    z-index: 10;
}

/* Animations for attractive pricing */
@keyframes pulse-glow {
    0%, 100% {
        text-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    }
    50% {
        text-shadow: 0 4px 8px rgba(40, 167, 69, 0.4);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: rotate(-5deg) translateY(0);
    }
    40% {
        transform: rotate(-5deg) translateY(-5px);
    }
    60% {
        transform: rotate(-5deg) translateY(-3px);
    }
}

/* Hover effects for more attraction */
.pricing-item:hover .discounted-price-large .text-success {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

.pricing-item:hover .discount-badge-attractive {
    animation: bounce 1s infinite;
    box-shadow: 0 6px 16px rgba(238, 90, 36, 0.5);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .discounted-price-large .text-success {
        font-size: 1.2em !important;
    }

    .discount-badge-attractive {
        font-size: 0.6rem;
        padding: 3px 8px;
        top: -10px;
        right: -15px;
    }
}

/* Ensure all pricing cards have the same height */
.pricing-item {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.pricing-item__content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.pricing-item__price {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 80px;
    align-items: center;
}

.pricing-item__price .d-flex {
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.pricing-item__price .text-decoration-line-through {
    color: #6c757d !important;
    font-size: 0.65em !important;
}

.pricing-item__price .text-success {
    color: #28a745 !important;
    font-weight: bold;
    font-size: 1.1em;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .pricing-item__price .d-flex {
        flex-direction: column;
        gap: 0.25rem !important;
    }

    .pricing-item__price .badge {
        font-size: 0.5rem;
        padding: 0.2rem 0.4rem;
    }
}

/* Toast Styles */
.custom-toast {
    animation: slideInRight 0.3s ease-out;
    font-weight: 500;
    font-size: 14px;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.custom-toast .spinner-border {
    width: 1rem;
    height: 1rem;
}

.plan-details-container .text-success {
    color: #28a745 !important;
}

.plan-features ul li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}

.plan-features ul li:last-child {
    border-bottom: none;
}

.modal-content {
    border-radius: 15px;
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

/* Enhanced Modal Styling */
.plan-modal .modal-content {
    overflow: hidden;
    position: relative;
    background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
    border: none;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.plan-modal .modal-header {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    position: relative;
    border-bottom: 1px solid #e9ecef;
    padding: 20px 24px;
}

.plan-modal .brand-badge {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.plan-modal .brand-badge img {
    width: 28px;
    height: 28px;
    object-fit: contain;
}

.plan-modal .modal-title {
    font-weight: 700;
    letter-spacing: 0.3px;
}

.plan-modal .modal-logo {
    max-height: 48px;
    object-fit: contain;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
}

.plan-modal .modal-body {
    position: relative;
    padding: 24px;
}

.plan-modal .modal-footer {
    border-top: 1px solid #e9ecef;
    background: #f8f9fa;
    padding: 20px 24px;
    border-radius: 0 0 15px 15px;
}

.plan-modal .btn {
    border-radius: 8px;
    font-weight: 600;
    padding: 10px 24px;
    transition: all 0.3s ease;
}

.plan-modal .btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

.plan-modal .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 123, 255, 0.4);
}

.plan-modal .btn-secondary {
    background: #6c757d;
    border: none;
    box-shadow: 0 2px 8px rgba(108, 117, 125, 0.2);
}

.plan-modal .btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-1px);
}

/* Login Required Modal Styling */
#loginRequiredModal .modal-content {
    border-radius: 20px;
    border: none;
    box-shadow: 0 25px 80px rgba(0,0,0,0.15);
    overflow: hidden;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

#loginRequiredModal .modal-header {
    /* background: linear-gradient(135deg, #007bff, #0056b3); */
    color: white;
    padding: 30px 24px 20px;
    border-bottom: none;
    position: relative;
}

#loginRequiredModal .modal-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

#loginRequiredModal .modal-title {
    color: white;
    font-weight: 700;
    font-size: 1.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    margin: 0;
}

#loginRequiredModal .modal-logo {
    filter: brightness(0) invert(1);
    margin-bottom: 15px;
}

#loginRequiredModal .modal-body {
    padding: 40px 30px;
    background: white;
}

.login-required-content {
    max-width: 400px;
    margin: 0 auto;
}

.login-icon {
    color: #007bff;
    animation: pulse 2s infinite;
}

.login-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.login-actions .btn {
    border-radius: 12px;
    font-weight: 600;
    padding: 12px 24px;
    transition: all 0.3s ease;
    min-width: 120px;
}

.login-actions .btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.login-actions .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
}

.login-actions .btn-outline-primary {
    border: 2px solid #007bff;
    color: #007bff;
    background: transparent;
    transition: all 0.3s ease;
}

.login-actions .btn-outline-primary:hover {
    background: #007bff;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
}

/* Responsive adjustments */
@media (max-width: 576px) {
    #loginRequiredModal .modal-body {
        padding: 30px 20px;
    }

    .login-actions {
        flex-direction: column;
        align-items: center;
    }

    .login-actions .btn {
        width: 100%;
        max-width: 250px;
    }
}

/* Enhanced line-by-line plan details layout */
.plan-details-list {
    display: flex;
    flex-direction: column;
    gap: 0;
    background: #fafbfc;
    border-radius: 12px;
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #e9ecef;
}

.detail-item {
    display: flex;
    align-items: center;
    padding: 16px 0;
    border-bottom: 1px solid #e9ecef;
    position: relative;
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item:first-child {
    padding-top: 0;
}

.detail-label {
    font-weight: 600;
    color: #495057;
    min-width: 140px;
    flex-shrink: 0;
    font-size: 0.95rem;
    position: relative;
}

.detail-label::after {
    content: '';
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 4px;
    background: #007bff;
    border-radius: 50%;
}

.detail-value {
    flex: 1;
    color: #212529;
    font-weight: 500;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.detail-value .plan-price-final {
    font-size: 1.5rem;
    font-weight: 700;
    color: #28a745 !important;
    text-shadow: 0 1px 2px rgba(40, 167, 69, 0.2);
}

.detail-value .plan-price-original {
    font-size: 1.1rem;
    color: #6c757d !important;
    text-decoration: line-through;
    opacity: 0.7;
}

.detail-value .discount-badge-attractive {
    display: inline-block;
    margin-left: 8px;
    font-size: 0.7rem;
    padding: 3px 8px;
    border-radius: 10px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-weight: 600;
    white-space: nowrap;
    box-shadow: 0 2px 4px rgba(238, 90, 36, 0.3);
    transform: translateY(-1px);
}

/* Remove hero section; use cleaner, line-by-line layout */

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
}

@keyframes fadeUp {
    from { transform: translateY(8px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.modal-header {
    border-bottom: 1px solid #e9ecef;
    background: #f8f9fa;
    border-radius: 15px 15px 0 0;
}

.modal-footer {
    border-top: 1px solid #e9ecef;
    background: #f8f9fa;
    border-radius: 0 0 15px 15px;
}

/* Modal close button styling */
.btn-close {
    position: absolute !important;
    top: 15px !important;
    right: 15px !important;
    z-index: 1050 !important;
    cursor: pointer !important;
    background: transparent !important;
    border: none !important;
    font-size: 24px !important;
    line-height: 1 !important;
    padding: 0 !important;
    width: 30px !important;
    height: 30px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #666 !important;
    transition: all 0.3s ease !important;
}

.btn-close:hover {
    color: #333 !important;
    transform: scale(1.1) !important;
}

.btn-close:focus {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(0,123,255,0.25) !important;
}

/* Ensure modal header has proper positioning */
.modal-header {
    position: relative !important;
}

/* Modal logo styling */
.modal-logo {
    max-height: 60px !important;
    margin: 0 auto !important;
}

/* Button consistency across subscription page */
.btn-primary,
.btn-secondary,
.btn-success,
.btn-info,
.btn-warning,
.btn-danger,
.btn-outline-primary,
.btn-outline-secondary,
.btn-outline-success,
.btn-outline-info,
.btn-outline-warning,
.btn-outline-danger {
    background-color: hsl(253, 88%, 58%) !important;
    border-color: hsl(253, 88%, 58%) !important;
    color: white !important;
    transition: all 0.3s ease !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
}

.btn-primary:hover,
.btn-secondary:hover,
.btn-success:hover,
.btn-info:hover,
.btn-warning:hover,
.btn-danger:hover,
.btn-outline-primary:hover,
.btn-outline-secondary:hover,
.btn-outline-success:hover,
.btn-outline-info:hover,
.btn-outline-warning:hover,
.btn-outline-danger:hover {
    background-color: hsl(253, 88%, 48%) !important;
    border-color: hsl(253, 88%, 48%) !important;
    color: white !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(253, 88%, 58%, 0.3) !important;
}

/* Plan details button specific styling */
/* .plan-details-btn {
    background-color: hsl(253, 88%, 58%) !important;
    border-color: hsl(253, 88%, 58%) !important;
    color: white !important;
    transition: all 0.3s ease !important;
} */

/* .plan-details-btn:hover {
    background-color: hsl(253, 88%, 48%) !important;
    border-color: hsl(253, 88%, 48%) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(253, 88%, 58%, 0.3) !important;
} */
</style>

<!-- Plan Details Modal -->
<div class="modal fade plan-modal" id="planDetailsModal" tabindex="-1" aria-labelledby="planDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header align-items-center justify-content-center">
                <img src="../assets/images/logo/newslides.png" alt="Slidesbuy Logo" class="modal-logo">
                <button type="button" class="btn-close" onclick="closeModal('planDetailsModal')" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="plan-details-container">
                    <div class="plan-details-list">
                        <div class="detail-item">
                            <span class="detail-label">Plan Price:</span>
                            <span class="detail-value">
                                <span class="plan-price-original text-decoration-line-through text-muted" style="display: none;"></span>
                                <span class="plan-price-final text-success"></span>
                                <span class="discount-badge-attractive" style="display: none;"></span>
                            </span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Plan Description:</span>
                            <span class="detail-value plan-description"></span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Access Content:</span>
                            <span class="detail-value plan-access-content"></span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Plan Content:</span>
                            <span class="detail-value plan-content"></span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Downloads:</span>
                            <span class="detail-value plan-downloads"></span>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Validity:</span>
                            <span class="detail-value plan-validity"></span>
                        </div>

                        <div class="detail-item plan-discount-item" style="display: none;">
                            <span class="detail-label">Discount:</span>
                            <span class="detail-value plan-discount"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-main pill" onclick="closeModal('planDetailsModal')">Cancel</button>
                <button type="button" class="btn btn-main pill pay-now-btn">Pay Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Login Required Modal -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center border-0" style="
            background-color: hsl(var(--main)) !important;
            background: var(--main-gradient);
        ">
                <div class="w-100 text-center">
                    <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="Slidesbuy Logo" class="modal-logo mb-3" style="max-height: 60px;">
                    <h5 class="modal-title w-100">Hello User!</h5>
                </div>
                <button type="button" class="btn-close" onclick="closeModal('loginRequiredModal')" aria-label="Close" style="color: white !important; font-size: 24px;">×</button>
            </div>
            <div class="modal-body text-center">
                <div class="login-required-content">
                    <div class="login-icon mb-4">
                        <i class="fas fa-user-lock fa-3x" style="
                        color: hsl(var(--main)) !important;
                    "></i>
                    </div>
                    <h4 class="mb-3">Please Login to Proceed</h4>
                    <p class="text-muted mb-4">You need to be logged in to view plan details and make purchases.</p>

                    <div class="login-actions">
                        <a href="{{ route('login.form') }}" class="btn btn-main pill me-3 me-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('front.loginBlade') }}" class="btn btn-main pill me-3 me-3">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--
<div class="container">
    <h2 class="mb-4">Choose Your Subscription Plan</h2>

    <div class="row">
        @foreach($plans as $plan)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">{{ $plan->name }}</div>
                    <div class="card-body">
                        <p>Price: ₹{{ $plan->price }}</p>
                        @if($plan->discount)
                            <p>Discount:
                                @if($plan->discount_type === 'percentage')
                                    {{ $plan->discount }}% off
                                @else
                                    ₹{{ $plan->discount }} off
                                @endif
                            </p>
                        @endif
                        <p>Download Limit: {{ $plan->download_limit ?? 'Unlimited' }}</p>
                        <p>Validity: {{ $plan->validity }} days</p>

                        <button
                            class="btn btn-primary pay-btn"
                            data-id="{{ $plan->id }}"
                            data-price="{{ $plan->price }}"
                            data-name="{{ $plan->name }}"
                            data-discount="{{ $plan->discount ?? 0 }}"
                            data-discount-type="{{ $plan->discount_type ?? '' }}"
                        >Subscribe</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    //   const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};



jQuery(document).ready(function ($) {
    // Global variables to store plan data
    let currentPlanData = {};

    // Debug modal functionality
    console.log('Subscription page loaded, initializing modals...');

    // Test modal functionality
    if (typeof $.fn.modal === 'undefined') {
        console.error('Bootstrap modal plugin not loaded!');
    } else {
        console.log('Bootstrap modal plugin loaded successfully');
    }

    // Handle "Get Started" button click
    $('.plan-details-btn').on('click', function(e) {
        e.preventDefault();

        var isAuthenticated = @json(Auth::check());

        if (!isAuthenticated) {
            console.log('User not authenticated, showing login modal');
            $('#loginRequiredModal').modal('show');
            return false;
        }

        // Get plan data from button
        let button = $(this);
        currentPlanData = {
            id: button.data('id'),
            price: parseFloat(button.data('price')),
            name: button.data('name'),
            discount: parseFloat(button.data('discount')) || 0,
            discountType: button.data('discount-type') || '',
            validity: button.data('validity'),
            downloadLimit: parseInt(button.data('download-limit')) || 0,
            downloads: button.data('downloads'),
            description: button.data('description'),
            accessContent: button.data('access-content'),
            content: button.data('content')
        };

        // Populate modal with plan details
        populatePlanDetails(currentPlanData);

        // Show modal
        $('#planDetailsModal').modal('show');
    });

    // Handle login required modal events
    $('#loginRequiredModal').on('shown.bs.modal', function () {
        // Auto-focus on login button for better accessibility
        $('.login-actions .btn-primary').focus();
    });

    // Handle modal close events
    $('#loginRequiredModal').on('hidden.bs.modal', function () {
        // Reset any form states if needed
        console.log('Login required modal closed');
    });

    // Close modal function
    window.closeLoginModal = function() {
        $('#loginRequiredModal').modal('hide');
    };

    // Close modal when clicking outside
    $('#loginRequiredModal').on('click', function(e) {
        if (e.target === this) {
            $(this).modal('hide');
        }
    });

    // Explicit close button handlers for Bootstrap 4 compatibility
    $(document).on('click', '[data-dismiss="modal"]', function() {
        var modalId = $(this).closest('.modal').attr('id');
        $('#' + modalId).modal('hide');
    });

    // Alternative close button handler
    $(document).on('click', '.btn-close', function() {
        var modalId = $(this).closest('.modal').attr('id');
        $('#' + modalId).modal('hide');
    });

    // Test function for modal closing
    window.testCloseModal = function() {
        console.log('testCloseModal function called');
        var modal = $('#planDetailsModal');
        console.log('Modal element:', modal);
        console.log('Modal is visible:', modal.is(':visible'));
        console.log('Modal has modal class:', modal.hasClass('modal'));
        console.log('Bootstrap modal function available:', typeof modal.modal === 'function');

        if (typeof modal.modal === 'function') {
            console.log('Attempting to close modal...');
            modal.modal('hide');
        } else {
            console.error('Bootstrap modal function not available');
            // Fallback: hide the modal manually
            modal.hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    };

    // Reliable modal close function
    window.closeModal = function(modalId) {
        console.log('closeModal called for:', modalId);
        var modal = $('#' + modalId);

        if (modal.length === 0) {
            console.error('Modal not found:', modalId);
            return;
        }

        // Try Bootstrap modal first
        if (typeof modal.modal === 'function') {
            console.log('Using Bootstrap modal close');
            modal.modal('hide');
        } else {
            console.log('Bootstrap modal not available, using manual close');
            // Manual close
            modal.hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    };

    // Handle "Pay Now" button click
    $('.pay-now-btn').on('click', function() {
        // Close modal
        $('#planDetailsModal').modal('hide');

        // Process payment
        processPayment(currentPlanData);
    });

        // Function to populate plan details in modal
    function populatePlanDetails(planData) {
        // Hide plan name per requirement; keep internal data if needed
        $('.plan-name').text('');
        $('.plan-name-hero').text('');

        // Populate all plan details
        $('.plan-description').text(planData.description || 'No description available');
        $('.plan-access-content').text(planData.accessContent || 'Full access to all content');
        $('.plan-content').text(planData.content || 'Premium content and features');

        // Set downloads text
        if (planData.downloadLimit == 0) {
            $('.plan-downloads').text('Unlimited downloads');
        } else {
            $('.plan-downloads').text(planData.downloadLimit + ' downloads');
        }

        $('.plan-validity').text(planData.validity + ' days');

        // Get current currency symbol
        var currencySymbol = '₹'; // Default fallback
        @if($currentCurrency)
            currencySymbol = '{{ $currentCurrency->currency_symbol }}';
        @endif

        // Show/hide discount section
        if (planData.discount > 0) {
            $('.plan-discount-item').show();
            if (planData.discountType === 'flat') {
                $('.plan-discount').text(currencySymbol + planData.discount + ' OFF');
            } else if (planData.discountType === 'percentage') {
                $('.plan-discount').text(planData.discount + '% OFF');
            }
        } else {
            $('.plan-discount-item').hide();
        }

        // Calculate discounted price
        let discountedPrice = calculateDiscountedPrice(planData.price, planData.discountType, planData.discount);

        // Display final price (discounted or original)
        $('.plan-price-final').text(currencySymbol + discountedPrice.toFixed(2));

        // Show original price and discount if applicable
        if (planData.discount > 0) {
            $('.original-price-small').show();
            $('.plan-price-original').text(currencySymbol + planData.price.toFixed(2));
            $('.discount-badge-attractive').show();

            // Show discount badge
            if (planData.discountType === 'flat') {
                $('.discount-badge-attractive').text('SAVE ' + currencySymbol + planData.discount);
            } else if (planData.discountType === 'percentage') {
                $('.discount-badge-attractive').text('SAVE ' + planData.discount + '%');
            }
        } else {
            $('.original-price-small').hide();
            $('.discount-badge-attractive').hide();
        }
    }

        // Function to process payment
    function processPayment(planData) {
        let discountedPrice = calculateDiscountedPrice(planData.price, planData.discountType, planData.discount);
        let amount = Math.round(discountedPrice * 100);

        // Show loading toast
        showToast('Processing payment...', 'info', true);

        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": amount,
            "currency": "INR",
            "name": "Your Company Name",
            "description": planData.name + " Plan",
            "handler": function (response){
                // Show processing toast
                showToast('Payment successful! Processing your subscription...', 'info', true);

                $.ajax({
                    url: "{{ route('razorpay.payment') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        razorpay_payment_id: response.razorpay_payment_id,
                        plan_id: planData.id
                    },
                    success: function(res) {
                        if(res.success){
                            if (res.plan_id) {
                                console.log(res.plan_id + ' plan_id');
                            } else {
                                console.warn('plan_id not provided in response');
                            }

                            // Show success toast
                            showToast('Payment successful! Subscription activated.', 'success', false);

                            // Redirect after a short delay to show the success message
                            setTimeout(function() {
                                window.location.href = res.redirect_url;
                            }, 2000);
                        } else {
                            showToast("Payment processed, but something went wrong.", 'error', false);
                        }
                    },
                    error: function() {
                        showToast("Payment failed to process. Try again.", 'error', false);
                    }
                });
            },
            "modal": {
                "ondismiss": function() {
                    showToast("Payment cancelled.", 'warning', false);
                }
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    }

    // Function to show toast notifications
    function showToast(message, type, loading = false) {
        // Remove existing toasts
        $('.custom-toast').remove();

        // Create toast element
        let toastClass = 'custom-toast';
        let icon = '';

        switch(type) {
            case 'success':
                toastClass += ' bg-success text-white';
                icon = '<i class="fas fa-check-circle me-2"></i>';
                break;
            case 'error':
                toastClass += ' bg-danger text-white';
                icon = '<i class="fas fa-exclamation-circle me-2"></i>';
                break;
            case 'warning':
                toastClass += ' bg-warning text-dark';
                icon = '<i class="fas fa-exclamation-triangle me-2"></i>';
                break;
            case 'info':
                toastClass += ' bg-info text-white';
                icon = '<i class="fas fa-info-circle me-2"></i>';
                break;
        }

        let loadingSpinner = loading ? '<div class="spinner-border spinner-border-sm me-2" role="status"></div>' : '';

        let toast = `
            <div class="${toastClass} position-fixed" style="top: 20px; right: 20px; z-index: 9999; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); min-width: 300px;">
                ${loadingSpinner}${icon}${message}
            </div>
        `;

        $('body').append(toast);

        // Auto remove after 5 seconds (except for loading toasts)
        if (!loading) {
            setTimeout(function() {
                $('.custom-toast').fadeOut(300, function() {
                    $(this).remove();
                });
            }, 5000);
        }
    }
});

// Your discount calculation function
function calculateDiscountedPrice(price, discountType, discount) {
    if (!discount || discount <= 0) return price;

    let discountedPrice = price;

    if (discountType === 'flat') {
        discountedPrice = price - discount;
    } else if (discountType === 'percentage') {
        discountedPrice = price - (price * discount / 100);
    }

    // Avoid negative price
    if (discountedPrice < 0) discountedPrice = 0;

    return Math.round(discountedPrice * 100) / 100; // Round to 2 decimal places
}

// ==================== UNIVERSAL TOASTER SYSTEM ====================
// This toaster system can be used across all authentication forms

class ToasterSystem {
    constructor() {
        this.init();
    }

    init() {
        // Create toaster container if it doesn't exist
        if (!document.getElementById('toaster-container')) {
            const toasterContainer = document.createElement('div');
            toasterContainer.id = 'toaster-container';
            toasterContainer.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
                width: 100%;
            `;
            document.body.appendChild(toasterContainer);
        }
    }

    show(message, type = 'info', duration = 5000, loading = false) {
        const toasterContainer = document.getElementById('toaster-container');

        // Remove existing toasts
        const existingToasts = toasterContainer.querySelectorAll('.toast-item');
        existingToasts.forEach(toast => {
            if (toast.dataset.type !== 'loading') {
                toast.remove();
            }
        });

        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast-item toast-${type}`;
        toast.style.cssText = `
            background: ${this.getBackgroundColor(type)};
            color: ${this.getTextColor(type)};
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInRight 0.3s ease-out;
            position: relative;
            overflow: hidden;
        `;

        // Add icon
        const icon = document.createElement('span');
        icon.innerHTML = this.getIcon(type, loading);
        icon.style.cssText = `
            font-size: 18px;
            flex-shrink: 0;
        `;

        // Add message
        const messageElement = document.createElement('span');
        messageElement.textContent = message;
        messageElement.style.cssText = `
            flex: 1;
        `;

        // Add close button
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '×';
        closeBtn.style.cssText = `
            background: none;
            border: none;
            color: inherit;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            margin-left: 8px;
            opacity: 0.7;
            transition: opacity 0.2s;
        `;
        closeBtn.onmouseover = () => closeBtn.style.opacity = '1';
        closeBtn.onmouseout = () => closeBtn.style.opacity = '0.7';
        closeBtn.onclick = () => this.hide(toast);

        // Add progress bar for loading
        if (loading) {
            const progressBar = document.createElement('div');
            progressBar.style.cssText = `
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background: rgba(255,255,255,0.3);
                width: 100%;
                animation: progress 2s linear infinite;
            `;
            toast.appendChild(progressBar);
        }

        // Assemble toast
        toast.appendChild(icon);
        toast.appendChild(messageElement);
        if (!loading) {
            toast.appendChild(closeBtn);
        }

        // Add to container
        toasterContainer.appendChild(toast);

        // Auto remove after duration (except for loading toasts)
        if (!loading && duration > 0) {
            setTimeout(() => {
                this.hide(toast);
            }, duration);
        }

        return toast;
    }

    hide(toast) {
        if (toast && toast.parentNode) {
            toast.style.animation = 'slideOutRight 0.3s ease-out';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
    }

    loading(message = 'Loading...') {
        return this.show(message, 'loading', 0, true);
    }

    success(message, duration = 5000) {
        return this.show(message, 'success', duration);
    }

    error(message, duration = 5000) {
        return this.show(message, 'error', duration);
    }

    warning(message, duration = 5000) {
        return this.show(message, 'warning', duration);
    }

    info(message, duration = 5000) {
        return this.show(message, 'info', duration);
    }

    getBackgroundColor(type) {
        const colors = {
            success: '#28a745',
            error: '#dc3545',
            warning: '#ffc107',
            info: '#17a2b8',
            loading: '#6c757d'
        };
        return colors[type] || colors.info;
    }

    getTextColor(type) {
        return type === 'warning' ? '#212529' : '#ffffff';
    }

    getIcon(type, loading = false) {
        if (loading) {
            return '<div class="spinner-border spinner-border-sm" role="status"></div>';
        }

        const icons = {
            success: '<i class="fas fa-check-circle"></i>',
            error: '<i class="fas fa-exclamation-circle"></i>',
            warning: '<i class="fas fa-exclamation-triangle"></i>',
            info: '<i class="fas fa-info-circle"></i>'
        };
        return icons[type] || icons.info;
    }
}

// Initialize toaster system
window.toaster = new ToasterSystem();

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    @keyframes progress {
        0% { width: 0%; }
        100% { width: 100%; }
    }

    .toast-item {
        transition: all 0.3s ease;
    }

    .toast-item:hover {
        transform: translateX(-5px);
    }
`;
document.head.appendChild(style);
</script>


@endsection
