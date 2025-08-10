@extends('front.includes.container')
@section('content')


<!-- ========================= Pricing Plan Section Start ============================ -->
<section class="pricing padding-y-120 position-relative z-index-1">
    <img src="assets/images/shapes/element1.png" alt="" class="element one">
    <img src="assets/images/gradients/pricing-gradient-bg.png" alt="" class="bg--gradient">

    <div class="container container-two">
        <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
            <div class="section-heading__inner w-lg">
                <h3 class="section-heading__title">Our Best Pricing Plan</h3>
                <p class="section-heading__desc">Every month we pick some best products for you. This month's best web themes & templates have arrived, chosen by our content specialists.</p>
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
                            <img src="assets/images/gradients/price-hover-bg.png" alt="" class="hover-bg">
                            <div class="pricing-item__top">
                                <div class="flx-between flex-nowrap">
                                    <span class="pricing-item__icon">
                                        <img src="assets/images/icons/price-icon1.svg" alt="">
                                    </span>
                                    <span class="popular-badge d-none"></span>
                                </div>
                                <h5 class="pricing-item__title mb-0 mt-2">{{ $plan->name }} Plan</h5>
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
                                                <span class="text-decoration-line-through text-muted">₹{{ $originalPrice }}</span>
                                            </div>
                                            <div class="discounted-price-large">
                                                <span class="text-success fw-bold">₹{{ number_format($discountedPrice, 2) }}</span>
                                                <span class="discount-badge-attractive">
                                                    @if($plan->discount_type === 'flat')
                                                        SAVE ₹{{ $plan->discount }}
                                                    @elseif($plan->discount_type === 'percentage')
                                                        SAVE {{ $plan->discount }}%
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        ₹{{ $plan->price }}
                                    @endif
                                    <span class="text font-14 text-body font-body fw-400">{{ $plan->validity }} /days</span>
                                </h3>
                                <p class="pricing-item__desc">Essential services to start your journey</p>
                                                               <a href="#"
                                    class="btn btn-outline-light btn-lg pill w-100 btn-primary plan-details-btn"
                                    data-id="{{ $plan->id }}"
                                    data-price="{{ $plan->price }}"
                                    data-name="{{ $plan->name }}"
                                    data-discount="{{ $plan->discount ?? 0 }}"
                                    data-discount-type="{{ $plan->discount_type ?? '' }}"
                                    data-validity="{{ $plan->validity }}"
                                    data-downloads="{{ $plan->download_limit ?? 'Unlimited' }}"
                                    data-description="{{ $plan->description ?? 'Essential services to start your journey' }}">
                                    Get Started
                                    </a>

                            </div>
                            <div class="pricing-item__lists">
                                <ul class="text-list">
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> No .of Downloads{{$plan->download_limit}} </li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span>All Content Acess Yes</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span>Validity {{$plan->validity}} </li>
                                    {{-- Discount details moved to modal only --}}
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
    padding: 22px 15px 15px; /* extra top space for badge overlap */
    background: #f8f9fa;
    position: relative;
    overflow: hidden;
    min-height: 76px;
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

/* reserve space so badge doesn’t cover last digits */
.plan-price-final { padding-right: 56px; display: inline-block; }

.discount-badge-attractive {
    position: absolute;
    top: -6px; /* sit on top of the last digits */
    right: 0;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(238, 90, 36, 0.4);
    animation: bounce 2s infinite;
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
        top: -4px;
        right: 0;
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

@media (max-width: 420px) {
  .discounted-price-large .text-success { font-size: 1.2em !important; }
  .discount-badge-attractive { font-size: 0.6rem; padding: 3px 8px; top: 6px; right: 6px; }
}
.plan-price-final { line-height: 1.1; }
.discount-badge-attractive { max-width: calc(100% - 16px); text-overflow: ellipsis; overflow: hidden; }
</style>

<!-- Plan Details Modal -->
<div class="modal fade" id="planDetailsModal" tabindex="-1" aria-labelledby="planDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="planDetailsModalLabel">Plan Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="plan-details-container">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Plan Name</h6>
                            <h4 class="plan-name mb-3"></h4>

                            <h6 class="text-muted mb-2">Description</h6>
                            <p class="plan-description mb-3"></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Plan Price</h6>
                            <div class="price-container mb-3">
                                <div class="price-display">
                                    <div class="original-price-small" style="display: none;">
                                        <span class="plan-price-original text-decoration-line-through text-muted"></span>
                                    </div>
                                    <div class="discounted-price-large">
                                        <h3 class="plan-price-final text-success mb-0"></h3>
                                        <span class="discount-badge-attractive" style="display: none;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="plan-features mt-4">
                        <h6 class="text-muted mb-2">Plan Features</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>No. of Downloads: <span class="fw-600" id="pd-count">{{ $plan->download_limit ?? 'Unlimited' }}</span></li>
                            <li><i class="fas fa-check text-success me-2"></i>All Content Access: <span class="fw-600" id="pd-access"></span></li>
                            <li><i class="fas fa-check text-success me-2"></i>Validity: <span class="fw-600" id="pd-validity"></span></li>
                            <li><i class="fas fa-check text-success me-2"></i>Project management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Case management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Process management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Workflow management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Team management</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary pay-now-btn">Pay Now</button>
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

    // Handle "Get Started" button click
    $('.plan-details-btn').on('click', function(e) {
        e.preventDefault();

        var isAuthenticated = @json(Auth::check());

        if (!isAuthenticated) {
            alert("Please login to continue with the payment.");
            window.location.href = "{{ route('front.loginBlade') }}";
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
            downloads: button.data('downloads'),
            description: button.data('description')
        };

        // Debug: Log the data being extracted
        console.log('Button data:', {
            id: button.data('id'),
            downloads: button.data('downloads'),
            validity: button.data('validity')
        });
        console.log('Current plan data:', currentPlanData);

        // Populate modal with plan details
        populatePlanDetails(currentPlanData);

        // Show modal
        $('#planDetailsModal').modal('show');
    });

    // Handle "Pay Now" button click
    $('.pay-now-btn').on('click', function() {
        // Close modal
        $('#planDetailsModal').modal('hide');

        // Process payment
        processPayment(currentPlanData);
    });

        // Function to populate plan details in modal
    function populatePlanDetails(planData) {
        console.log('Plan Data:', planData); // Debug: Log the plan data
        
        $('.plan-name').text(planData.name + ' Plan');
        $('.plan-description').text(planData.description);
        
        // Debug: Check if element exists and log the value
        console.log('Downloads value:', planData.downloads);
        console.log('pd-count element exists:', $('#pd-count').length > 0);
        
        $('#pd-count').text(planData.downloads);
        $('#pd-access').text('Yes');
        $('#pd-validity').text(planData.validity + ' days');

        // Calculate discounted price
        let discountedPrice = calculateDiscountedPrice(planData.price, planData.discountType, planData.discount);

        // Display final price (discounted or original)
        $('.plan-price-final').text('₹' + discountedPrice.toFixed(2));

        // Show original price and discount if applicable
        if (planData.discount > 0) {
            $('.original-price-small').show();
            $('.plan-price-original').text('₹' + planData.price.toFixed(2));
            $('.discount-badge-attractive').show();

            // Show discount badge
            if (planData.discountType === 'flat') {
                $('.discount-badge-attractive').text('SAVE ₹' + planData.discount);
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

// Custom toast notification function
function showCustomToast(message, type = 'info') {
    // Remove existing toasts
    $('.custom-toast').remove();
    
    const toastClass = type === 'success' ? 'bg-success' : type === 'error' ? 'bg-danger' : 'bg-info';
    
    const toast = $(`
        <div class="custom-toast position-fixed top-0 end-0 p-3" style="z-index: 9999;">
            <div class="toast align-items-center ${toastClass} text-white border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    `);
    
    $('body').append(toast);
    
    // Auto-remove after 3 seconds
    setTimeout(function() {
        toast.remove();
    }, 3000);
}
