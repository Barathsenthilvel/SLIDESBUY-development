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
                                    ₹{{ $plan->price }}
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
                                    data-downloads="{{ $plan->downloads ?? 'Unlimited' }}"
                                    data-description="{{ $plan->description ?? 'Essential services to start your journey' }}">
                                    Get Started
                                    </a>

                            </div>
                            <div class="pricing-item__lists">
                                <ul class="text-list">
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Up to 30 members</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Collaboration</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Project management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Case management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Process management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Workflow management</li>
                                    <li class="text-list__item text-heading"><span class="icon"><i class="fas fa-check"></i></span> Team management</li>
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

                            <h6 class="text-muted mb-2">Downloads</h6>
                            <p class="plan-downloads mb-3"></p>
                        </div>
                                                <div class="col-md-6">
                            <h6 class="text-muted mb-2">Plan Price</h6>
                            <div class="price-container mb-3">
                                <h3 class="plan-price-final text-primary mb-1"></h3>
                                <div class="original-price-container" style="display: none;">
                                    <span class="plan-price-original text-muted text-decoration-line-through"></span>
                                    <span class="discount-badge bg-success text-white px-2 py-1 rounded ms-2"></span>
                                </div>
                            </div>

                            <h6 class="text-muted mb-2">Validity</h6>
                            <p class="plan-validity mb-3"></p>
                        </div>
                    </div>

                    <div class="plan-features mt-4">
                        <h6 class="text-muted mb-2">Plan Features</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Up to 30 members</li>
                            <li><i class="fas fa-check text-success me-2"></i>Collaboration</li>
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
        $('.plan-name').text(planData.name + ' Plan');
        $('.plan-description').text(planData.description);
        $('.plan-downloads').text(planData.downloads + ' downloads');
        $('.plan-validity').text(planData.validity + ' days');

        // Calculate discounted price
        let discountedPrice = calculateDiscountedPrice(planData.price, planData.discountType, planData.discount);

        // Display final price (discounted or original)
        $('.plan-price-final').text('₹' + discountedPrice);

        // Show original price and discount if applicable
        if (planData.discount > 0) {
            $('.original-price-container').show();
            $('.plan-price-original').text('₹' + planData.price);

            // Show discount badge
            if (planData.discountType === 'flat') {
                $('.discount-badge').text('₹' + planData.discount + ' OFF');
            } else if (planData.discountType === 'percentage') {
                $('.discount-badge').text(planData.discount + '% OFF');
            }
        } else {
            $('.original-price-container').hide();
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

    let flatDiscountPrice = price;
    let percentageDiscountPrice = price;

    if (discountType === 'flat') {
        flatDiscountPrice = price - discount;
    } else if (discountType === 'percentage') {
        percentageDiscountPrice = price - (price * discount / 100);
    }

    // Pick the lesser of the two discount types (better deal for user)
    let discountedPrice = Math.min(flatDiscountPrice, percentageDiscountPrice);

    // Avoid negative price
    if (discountedPrice < 0) discountedPrice = 0;

    return discountedPrice;
}
</script>


@endsection
