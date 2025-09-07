@extends('front.includes.container')
@section('content')
{{-- @php
   dd($StoreConfig->currencysymbol())
@endphp --}}
@if (Auth::check())
	@php
		$array = \explode(',',Auth::user()->wishlist);
	@endphp
@else
    @php
        $array = [];
    @endphp
@endif

@if(count($frontBanner) > 0)
    @include('front.includes.banner')
@endif


@if(count($homeProduct)>0)
    @foreach($homeProduct as $discounts)
        @include('front.includes.product', ['downloadCounts' => $downloadCounts])
    @endforeach
@endif





<style>
   .trending-tags{
   border-radius: 50px;
    border: 1px solid hsl(var(--border-color));
    outline: 1px solid transparent;
    text-align: center;
    padding: 8px;
     transition: all 0.3s ease;
   }
     .login-btn {
        background: linear-gradient(90deg, #e648f3, #4d3eff);

        border: none;
    }

    .trending-tags:hover {
        background: linear-gradient(90deg, #9b21cf, #2d1fdd);
        color: #fff !important;
    }

    </style>

{{-- trending product slider --}}
@php
    // Debug: Check what data is available
    $trendingProducts = collect($trending ?? $trendingProduct ?? []);

    // Fallback: If no trending products, get some recent products
    if($trendingProducts->count() == 0) {
        $trendingProducts = \App\Models\Product::where('status', '1')
            ->where('soldout', '!=', 'on')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
    }
@endphp

@if($trendingProducts->count() > 0)
	@include('front.includes.trendingproducts', ['products' => $trendingProducts, 'downloadCounts' => $trendingDownloadCounts ?? $downloadCounts])
@else
	{{-- Show message when no trending products available --}}
	<div class="text-center py-5">
		<div class="alert alert-info" style="margin: 20px 0;">
			<h4 class="mb-2">No Trending Products Available</h4>
			<p class="text-muted mb-4">Currently there are no trending products to display.</p>
			<p class="text-muted">To show trending products, mark some products as "trending" in the admin panel.</p>
		</div>
	</div>
@endif


@if(count($Homecat)>0)
    @include('front.includes.category',['category'=>$Homecat])
@endif
@if(count($Homecat2)>0)
    @include('front.includes.category',['category'=>$Homecat2])
@endif
@if(count($Homecat3)>0)
    @include('front.includes.category',['category'=>$Homecat3])
@endif

@if(count($discount)>0)
    @foreach($discount as $discounts)
        @include('front.includes.discount', ['downloadCounts' => $downloadCounts])
    @endforeach
@endif


<!-- ======================= Testimonial Section Start ============================ -->
<section class="testimonial padding-y-120 position-relative section-bg overflow-hidden">

    <img src="assets/images/shapes/brush.png" alt="" class="element-brush">

    <div class="container container-two">
        <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
            <div class="section-heading__inner w-lg">
                <h3 class="section-heading__title">Clients Feedback</h3>
            </div>
            <a href="#" class="btn btn-main btn-lg pill">More Feedback</a>
        </div>
        <div class="testimonial-slider">
            <div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Fresh designs every time! The templates are professional, customizable, and make my presentations shine.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="../assets/images/thumbs/account.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Project Manager</h5>
            <!-- <span class="client-info__designation text-heading fw-500">Market Expert</span> -->
        </div>
    </div>
</div>
            <div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Super smooth download process and modern slides. Definitely worth the subscription!.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/account.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Startup Founder</h5>
            <!-- <span class="client-info__designation text-heading fw-500">Analytis</span> -->
        </div>
    </div>
</div>

<div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Great experience overall. The slides are polished and save me tons of time.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/account.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Corporate Trainer</h5>
            <!-- <span class="client-info__designation text-heading fw-500">Analytis</span> -->
        </div>
    </div>
</div>
            <div class="testimonial-item hover-bg-main">
            <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
            <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
            <div class="testimonial-item__rating mb-3">
                <ul class="star-rating">
                    <li class="star-rating__item"><i class="fas fa-star"></i></li>
                    <li class="star-rating__item"><i class="fas fa-star"></i></li>
                    <li class="star-rating__item"><i class="fas fa-star"></i></li>
                    <li class="star-rating__item"><i class="fas fa-star"></i></li>
                    <li class="star-rating__item"><i class="fas fa-star"></i></li>
                </ul>
            </div>
                 <p class="testimonial-item__desc">“Affordable and professional. Exactly what I needed for my client meetings.”</p>
        <div class="testimonial-item__quote">
            <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
            <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
        </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/account.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Consulting Agency Owner</h5>
            <!-- <span class="client-info__designation text-heading fw-500">Market Expert</span> -->
        </div>
    </div>
</div>
        </div>
    </div>
</section>
<!-- ======================= Testimonial Section End ============================ -->


<!-- ====================== Newsletter Section Start ===================== -->
<section class="newsletter position-relative z-index-1 overflow-hidden">
    <img src="../assets/images/gradients/newsletter-gradient-bg.png" alt="" class="bg--gradient">

    <img src="../assets/images/shapes/element1.png" alt="" class="element two">
    <img src="../assets/images/shapes/element2.png" alt="" class="element one">

    <img src="../assets/images/shapes/line-vector-one.png" alt="" class="line-vector one">
    <img src="../assets/images/shapes/line-vector-two.png" alt="" class="line-vector two">

    <img src="../assets/images/thumbs/newsletter-man.png" alt="" class="newsletter-man">

    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="newsletter-content">
                    <h3 class="newsletter-content__title text-white mb-2 text-center">Get update Newsletter</h3>
                    <p class="newsletter-content__desc pb-2 text-white text-center font-18 fw-300">Subscribe our newsletter to get the latest news</p>

                    <form action="{{ route('Subscribes') }}" method="POST" class="mt-4 newsletter-box position-relative" id="newsletterForm">
                        @csrf
                        <input type="email" name="email" class="form-control common-input common-input--lg pill text-white" placeholder="Enter Mail" required>
                        <button type="submit" class="btn btn-main btn-lg pill flx-align gap-1">Subscribe <span class="text d-sm-flex d-none">Now</span> </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====================== Newsletter Section End ===================== -->

@endsection
@push('script')
<script>
$(document).ready(function(){
    $('#newsletterForm').submit(function(e){
        e.preventDefault();

        var email = $(this).find('input[name="email"]').val();
        var form = $(this);
        var submitBtn = form.find('button[type="submit"]');

        // Show loading state
        submitBtn.prop('disabled', true).html('Subscribing...');

        $.ajax({
            url: "{{ route('Subscribes') }}",
            type: 'POST',
            data: {
                email: email,
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                if(response.msg){
                    console.log(response.msg +'asasasasas');
                    // Success message - show for 2 seconds then hide
                    form.html('<div class="alert alert-success text-center"><i class="fas fa-check-circle"></i> ' + response.msg + '</div>');

                    // Hide message after 2 seconds and reset form
                    setTimeout(function(){
                        form[0].reset();
                        form.html('<form action="{{ route("Subscribes") }}" method="POST" class="mt-4 newsletter-box position-relative" id="newsletterForm">@csrf<input type="email" name="email" class="form-control common-input common-input--lg pill text-white" placeholder="Enter Mail" required><button type="submit" class="btn btn-main btn-lg pill flx-align gap-1">Subscribe <span class="text d-sm-flex d-none">Now</span> </button></form>');
                    }, 2000);

                } else if(response.error){
                    // Error message
                    form.html('<div class="alert alert-danger text-center"><i class="fas fa-exclamation-circle"></i> ' + response.error + '</div>');
                    // Reset form after 3 seconds
                    setTimeout(function(){
                        location.reload();
                    }, 3000);
                }
            },
            error: function(xhr, status, error){
                // Handle AJAX errors
                form.html('<div class="alert alert-danger text-center"><i class="fas fa-exclamation-circle"></i> Something went wrong. Please try again.</div>');
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
        });
    });
});
</script>
@endpush
