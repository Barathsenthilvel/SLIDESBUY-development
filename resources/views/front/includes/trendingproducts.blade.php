<section class="selling-product padding-y-120 position-relative z-index-1 overflow-hidden">
    <img src="../assets/images/gradients/selling-gradient.png" alt="" class="bg--gradient">

    <img src="../assets/images/shapes/element2.png" alt="" class="element one">
    <img src="../assets/images/shapes/element1.png" alt="" class="element two">

    <img src="../assets/images/shapes/curve-pattern1.png" alt="" class="position-absolute start-0 top-0 z-index--1">
    <img src="../assets/images/shapes/curve-pattern2.png" alt="" class="position-absolute end-0 top-0 z-index--1">

    <div class="container container-two">
        <div class="section-heading style-left style-white flx-between max-w-unset gap-4">
            <div>
                <h3 class="section-heading__title"> Trending Products</h3>
                <p class="section-heading__desc font-18">
                    Handpicked trending items, updated regularly.
                </p>
            </div>
            <a href="{{ route('front.getCategory') }}" class="btn btn-main btn-lg pill fw-300">
                View All Items
            </a>
        </div>

        <div class="selling-product-slider">
            @foreach(($products ?? collect()) as $discountProduct)
                @php
                    $data = $discountProduct->getproductPrice();
                    $rev = $discountProduct->reviewtotal();
                    $star = $rev->reviewtotal / 20;
                @endphp

                <div class="product-item shadow-sm overlay-none">
                    <div class="product-item__thumb d-flex">
                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                            <img src="{{ URL::asset('/assets/media/products/' . $discountProduct->image1) }}" alt="{{ $discountProduct->product_title }}" class="cover-img" style="width:100%; height:220px; object-fit:cover; border-radius:8px;">
                        </a>
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
                                <span class="product-item__sales font-16 mb-2">{{ $discountProduct->sales ?? '1230' }} Downloads</span>
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
