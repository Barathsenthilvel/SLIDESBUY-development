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
            <div class="pricing-tabs">
                <ul class="nav tab-gradient nav-pills mb-0" id="pills-tab-pricing" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link pill active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="true">monthly</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link pill" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="false">yearly</button>
                    </li>
                </ul>
            </div>
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
                                    ${{ $plan->price }}
                                    <span class="text font-14 text-body font-body fw-400">{{ $plan->validity }} /days</span>
                                </h3>
                                <p class="pricing-item__desc">Essential services to start your journey</p>
                               <a href="#"
   class="btn btn-outline-light btn-lg pill w-100 btn-primary pay-btn"
   data-id="{{ $plan->id }}"
   data-price="{{ $plan->price }}"
   data-name="{{ $plan->name }}"
   data-discount="{{ $plan->discount ?? 0 }}"
   data-discount-type="{{ $plan->discount_type ?? '' }}">
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
jQuery(document).ready(function ($) {
    $('.pay-btn').on('click', function(e) {
        e.preventDefault();

        let button = $(this);
        let planId = button.data('id');
        let price = parseFloat(button.data('price'));
        let planName = button.data('name');
        let discount = parseFloat(button.data('discount')) || 0;
        let discountType = button.data('discount-type') || '';

        // Calculate discounted price using your function
        let discountedPrice = calculateDiscountedPrice(price, discountType, discount);

        // Convert to paise for Razorpay
        let amount = Math.round(discountedPrice * 100);

        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": amount,
            "currency": "INR",
            "name": "Your Company Name",
            "description": planName + " Plan",
            "handler": function (response){
                $.ajax({
                    url: "{{ route('razorpay.payment') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        razorpay_payment_id: response.razorpay_payment_id,
                        plan_id: planId
                    },
                    success: function(res) {
                        if(res.success){
                        if (res.plan_id) {
            console.log(res.plan_id + ' plan_id');
        } else {
            console.warn('plan_id not provided in response');
        }

                            alert(res.message);
                            window.location.href = res.redirect_url;
                        } else {
                            alert("Payment processed, but something went wrong.");
                        }
                    },
                    error: function() {
                        alert("Payment failed to process. Try again.");
                    }
                });
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    });
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
