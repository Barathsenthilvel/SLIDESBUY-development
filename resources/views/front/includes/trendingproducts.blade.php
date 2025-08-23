{{-- Scripts are loaded in the main layout, no need to load them again --}}

<section class="selling-product padding-y-120 position-relative z-index-1 overflow-hidden">
    <img src="../assets/images/gradients/selling-gradient.png" alt="" class="bg--gradient">

    <img src="../assets/images/shapes/element2.png" alt="" class="element one">
    <img src="../assets/images/shapes/element1.png" alt="" class="element two">

    <img src="../assets/images/shapes/curve-pattern1.png" alt="" class="position-absolute start-0 top-0 z-index--1">
    <img src="../assets/images/shapes/curve-pattern2.png" alt="" class="position-absolute end-0 top-0 z-index--1">

    <div class="container container-two">
        <div class="section-heading style-left style-white flx-between max-w-unset gap-4">
            <div>
                <h3 class="section-heading__title"> Trending Slides</h3>
                <p class="section-heading__desc font-18">
                    Handpicked trending items, updated regularly.
                </p>
            </div>
            <a href="{{ route('front.getCategory') }}" class="btn btn-main btn-lg pill fw-300">
                View All Items
            </a>
        </div>

        <div class="selling-product-slider resource-slider">
            @foreach($products as $discountProduct)
                @php
                    $data = $discountProduct->getproductPrice();
                    $rev = $discountProduct->reviewtotal();
                    $star = $rev->reviewtotal / 20;
                @endphp

                <div class="product-item shadow-sm overlay-none">
                    <div class="product-item__thumb d-flex">
                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                            <img src="{{ URL::asset('/assets/media/products/' . $discountProduct->image1) }}" alt="{{ $discountProduct->product_title }}" class="cover-img" style="width:100%; height:220px; object-fit:cover; border-radius:8px 8px 0 0;">
                        </a>
                        @php
                            $inWishlist = false;
                            if (Auth::check()) {
                                $inWishlist = Auth::user()->wishlists()->where('product_id', $discountProduct->id)->exists();
                            }
                        @endphp
                        <button type="button"
                                class="product-item__wishlist wishlist-btn btn-wishlist {{ $inWishlist ? 'active in-wishlist' : '' }}"
                                data-product-id="{{ $discountProduct->id }}"
                                data-auth="{{ Auth::check() ? 'true' : 'false' }}"
                                data-user-id="{{ Auth::id() ?? '' }}"
                                data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}"
                                data-debug="{{ json_encode(['auth' => Auth::check(), 'inWishlist' => $inWishlist, 'userId' => Auth::id(), 'productId' => $discountProduct->id]) }}"
                                title="{{ Auth::check() ? ($inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist') : 'Login to add to Wishlist' }}">
                            <i class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart"></i>
                        </button>
                    </div>
                    <div class="product-item__content">
                        <h6 class="product-item__title">
                            <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link">{{ $discountProduct->product_title }}</a>
                        </h6>
                        <div class="product-item__info flx-between gap-2">
                            <span class="product-item__author">
                                by
                                <a href="profile.html" class="link hover-text-decoration-underline"> Slidesbuy</a>
                            </span>
                            <div class="flx-align gap-2">
                                @php $isFree = (($discountProduct->sell_type ?? 1) == 0); @endphp
                                <span class="badge {{ $isFree ? 'bg-success' : 'bg-primary' }}">{{ $isFree ? 'Free' : 'Paid' }}</span>
                            </div>
                        </div>
                        <div class="product-item__bottom flx-between gap-2">
                            <div>
                                <span class="product-item__sales font-16 mb-2">
                                    {{ $downloadCounts[$discountProduct->id] ?? 0 }} Downloads
                                </span>
                                <ul class="star-rating gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="star-rating__item font-16">
                                            <i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="flx-align gap-2">
                                <a href="{{ Auth::check() ? route('product.item', ['slug' => $discountProduct->slug]) : route('front.loginBlade') }}" class="btn btn-outline-light download-icon btn-icon btn-icon--sm pill">
                                    <span class="icon">
                                        <img src="../assets/images/icons/download.svg" alt="" class="white-version">
                                        <img src="../assets/images/icons/download-white.svg" alt="" class="dark-version">
                                    </span>
                                </a>
                                <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="btn btn-outline-light pill">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    // Initialize the trending products slider safely
    const resourceSlider = $('.resource-slider');

    if(resourceSlider.length > 0 && typeof $.fn.slick !== 'undefined') {
        try {
            // Check if slider is already initialized
            if(resourceSlider.hasClass('slick-initialized')) {
                console.log('Resource slider already initialized');
                return;
            }

            resourceSlider.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                speed: 900,
                dots: true,
                pauseOnHover: true,
                arrows: true,
                draggable: true,
                infinite: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });

            console.log('Resource slider initialized successfully');
        } catch (error) {
            console.log('Error initializing trending products slider:', error);
        }
    } else {
        // Log why slider wasn't initialized
        if(resourceSlider.length === 0) {
            console.log('Resource slider element not found on this page');
        }
        if(typeof $.fn.slick === 'undefined') {
            console.log('Slick slider library not loaded');
        }
    }
});
</script>

