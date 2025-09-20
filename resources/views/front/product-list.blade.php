{{--

<style>
    .custom-badge {
        padding: 6px 14px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
        color: #fff;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
        letter-spacing: 0.3px;
    }

    .custom-badge.paid {
        background: linear-gradient(135deg, #0066cc, #3399ff); /* Blue gradient for Paid */
    }

    .custom-badge.discount {
        background: linear-gradient(135deg, #00bcd4, #4dd0e1); /* Teal gradient for Discounted */
        color: #002b40;
    } --}}

    <style>
        /* Ensure product titles are left-aligned on mobile and small screens */
        @media (max-width: 768px) {
            .product-item__title {
                text-align: left !important;
            }
            .product-item__title a {
                text-align: left !important;
            }
        }
        </style>

    <style>
    .custom-badge {
        padding: 6px 14px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
        color: #fff;
        letter-spacing: 0.3px;
        /* text-transform: uppercase; */
    }

    .custom-badge.paid {
        background: linear-gradient(135deg, #1e3c72, #2a5298); /* Deep Blue */
        box-shadow: 0 0 6px rgba(30, 60, 114, 0.4);
    }

    .custom-badge.free {
        background: linear-gradient(135deg, #00b09b, #96c93d); /* Fresh green */
        box-shadow: 0 0 6px rgba(0, 176, 155, 0.4);
    }

    /* Grid View Styles (Default) */
    .list-grid-wrapper .product-item {
        height: auto;
        flex-direction: column;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    /* List View Styles */
    .list-view .list-grid-wrapper > div {
        width: 100%;
    }

    .list-view .list-grid-wrapper .product-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        margin-bottom: 15px;
    }

    /* .list-view .list-grid-wrapper .product-item__thumb {
        flex-shrink: 0;
        width: 200px;
        height: 120px;
    }

    .list-view .list-grid-wrapper .product-item__thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    } */

    .list-view .list-grid-wrapper .product-item__content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .list-view .list-grid-wrapper .product-item__title {
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .list-view .list-grid-wrapper .product-item__info {
        margin-bottom: 10px;
    }

    .list-view .list-grid-wrapper .product-item__bottom {
        margin-top: auto;
    }

    .list-grid-wrapper .product-item:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }

    /* .list-grid-wrapper .product-item__thumb {
        width: 100%;
        height: auto;
        position: relative;
        margin: 0;
        padding: 15px;
        background: #f8f9fa;
    }

    .list-grid-wrapper .product-item__thumb img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    } */

    .list-grid-wrapper .product-item__content {
        width: 100%;
        padding: 15px;
        background: #fff;
    }

    .list-grid-wrapper .product-item__wishlist {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
        z-index: 2;
    }

    .list-grid-wrapper .product-item__wishlist:hover {
        background: #fff;
        transform: scale(1.1);
    }

    .list-grid-wrapper .product-item__wishlist i {
        font-size: 16px;
        color: #666;
    }

    .list-grid-wrapper .product-item__wishlist.active i {
        color: #e74c3c;
    }

    .list-grid-wrapper .product-item__title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
        line-height: 1.3;
    }

    .list-grid-wrapper .product-item__author {
        font-size: 0.85rem;
        color: #6c757d;
    }

    .list-grid-wrapper .product-item__price {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .list-grid-wrapper .product-item__prevPrice {
        font-size: 0.85rem;
        color: #6c757d;
    }

    .list-grid-wrapper .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .list-grid-wrapper .badge.bg-success {
        background-color: #28a745 !important;
        color: white;
    }

    .list-grid-wrapper .badge.bg-primary {
        background-color: #007bff !important;
        color: white;
    }

    .list-grid-wrapper .product-item__sales {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .list-grid-wrapper .star-rating {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 2px;
    }

    .list-grid-wrapper .star-rating__item {
        font-size: 0.7rem;
        color: #ffc107;
    }

    .list-grid-wrapper .star-rating__text {
        font-size: 0.8rem;
        color: #6c757d;
    }





    /* Responsive adjustments */
    /* @media (max-width: 768px) {
        .list-grid-wrapper .product-item {
            flex-direction: column;
            text-align: center;
        }

        .list-grid-wrapper .product-item__thumb {
            padding: 10px;
        }

        .list-grid-wrapper .product-item__thumb img {
            height: 160px;
        }

        .list-grid-wrapper .product-item__content {
            text-align: center;
            padding: 12px;
        }

        .list-grid-wrapper .product-item__wishlist {
            top: 15px;
            right: 15px;
            width: 32px;
            height: 32px;
        }

        .list-grid-wrapper .product-item__wishlist i {
            font-size: 14px;
        }
    } */
</style>


{{--
@php $array = []; @endphp
@if (Auth::check())
    @php $array = explode(',', Auth::user()->wishlist); @endphp
@endif

<div class="row g-3">
    <div class="col-lg-12">
                <!-- Filter Tab -->
                <div class="filter-tab gap-3 flx-between">
                    <button type="button" class="filter-tab__button btn btn-outline-light pill d-flex align-items-center">
                        <span class="icon icon-left">
                            <img src="assets/images/icons/filter.svg" alt="">
                        </span>
                        <span class="font-18 fw-500">Filters</span>
                    </button>

                    <ul class="nav common-tab nav-pills mb-0 gap-lg-2 gap-1 ms-lg-auto" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill" data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product" aria-selected="true">All Item</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestMatch-tab" data-bs-toggle="pill" data-bs-target="#pills-bestMatch" type="button" role="tab" aria-controls="pills-bestMatch" aria-selected="false" tabindex="-1">Best Match</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestRating-tab" data-bs-toggle="pill" data-bs-target="#pills-bestRating" type="button" role="tab" aria-controls="pills-bestRating" aria-selected="false" tabindex="-1">Best Rating</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false" tabindex="-1">Site Template</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestOffers-tab" data-bs-toggle="pill" data-bs-target="#pills-bestOffers" type="button" role="tab" aria-controls="pills-bestOffers" aria-selected="false" tabindex="-1">Best Offers</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-bestSelling-tab" data-bs-toggle="pill" data-bs-target="#pills-bestSelling" type="button" role="tab" aria-controls="pills-bestSelling" aria-selected="false" tabindex="-1">Best Selling</button>
                        </li>
                    </ul>
                </div>
                <!-- Filter Form -->
                <form action="#" class="filter-form pb-4">
                    <div class="row gy-3">
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="tag" class="form-label font-16">Tag</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five common-input--withLeftIcon" id="tag" placeholder="Search By Tag...">
                                <span class="input-icon input-icon--left"><img src="assets/images/icons/search-two.svg" alt=""></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="flx-between gap-1">
                                <label for="Price" class="form-label font-16">Price</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative">
                                <input type="text" class="common-input border-gray-five" id="Price" placeholder="$7 - $29">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="flx-between gap-1">
                                <label for="time" class="form-label font-16">Time Frame</label>
                                <button type="reset" class="text-body font-14">Clear</button>
                            </div>
                            <div class="position-relative select-has-icon">
                                <select id="time" class="common-input border-gray-five">
                                    <option value="1">Now</option>
                                    <option value="2">Yesterday</option>
                                    <option value="3">1 Month Ago</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
@forelse($products as $discountProduct)
    @php
        $data = $discountProduct->getproductPrice();
        $isoffer = $data->isoffer;
        $offer = $data->offer;
        $price = $data->price;
        $discount = $data->discount;
        $rev = $discountProduct->reviewtotal();
        $star = $rev->reviewtotal / 20;
    @endphp

<div class="col-xl-4 col-sm-6">
    <div class="product-item section-bg">
        <div class="product-item__thumb d-flex">
            <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                <img src="{{ $discountProduct->image1 ? URL::asset('/assets/media/products/' . $discountProduct->image1) : URL::asset('assets/images/thumbs/product-img1.png') }}"
                     alt="{{ $discountProduct->product_title ?? 'Product Image' }}"
                     class="cover-img">
            </a>
            <button type="button"
                    class="product-item__wishlist wishlist-btn btn-wishlist {{ in_array($discountProduct->id, $wishlistProductIds) ? 'active in-wishlist' : '' }}"
                    data-product-id="{{ $discountProduct->id }}"
                    data-auth="{{ Auth::check() ? 'true' : 'false' }}"
                    data-user-id="{{ Auth::id() ?? '' }}"
                    data-in-wishlist="{{ in_array($discountProduct->id, $wishlistProductIds) ? 'true' : 'false' }}"
                    data-debug="{{ json_encode(['auth' => Auth::check(), 'inWishlist' => in_array($discountProduct->id, $wishlistProductIds), 'userId' => Auth::id(), 'productId' => $discountProduct->id]) }}"
                    title="{{ Auth::check() ? 'Wishlist' : 'Login to add to Wishlist' }}">
                <i class="{{ in_array($discountProduct->id, $wishlistProductIds) ? 'fas' : 'far' }} fa-heart"></i>
            </button>
        </div>

        <div class="product-item__content">
            <h6 class="product-item__title">
                <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link">
                    {{ $discountProduct->product_title ?? 'SaaS dashboard digital products Title here' }}
                </a>
            </h6>

            <div class="product-item__info flx-between gap-2">
                <span class="product-item__author">
                    by
                    <a href="profile.html" class="link hover-text-decoration-underline">
                        {{ $discountProduct->vendor->name ?? 'themepix' }}
                    </a>
                </span>
                <div class="flx-align gap-2">
                    <h6 class="product-item__price mb-0">
                        ${{ $discountProduct->discount_price ?? '120' }}
                    </h6>
                    @if (!empty($discountProduct->price))
                        <span class="product-item__prevPrice text-decoration-line-through">
                            ${{ $discountProduct->price }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="product-item__bottom flx-between gap-2">
                <div>
                    <span class="product-item__sales font-14 mb-2">
                        {{ $discountProduct->sales ?? '1200' }} Sales
                    </span>
                    <div class="d-flex align-items-center gap-1">
                        <ul class="star-rating">
                            @php $star = $discountProduct->average_rating ?? 5; @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <li class="star-rating__item font-11">
                                    <i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                                </li>
                            @endfor
                        </ul>
                        <span class="star-rating__text text-heading fw-500 font-14">
                            ({{ $discountProduct->review_count ?? '16' }})
                        </span>
                    </div>
                </div>

                <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}"
                   class="btn btn-outline-light btn-sm pill">
                    View
                </a>
            </div>
        </div>
    </div>
</div>


@empty
    <div class="col-12 text-center mt-4">
        <h2>No Product found</h2>
    </div>
@endforelse

<!-- Pagination -->
<div class="mt-4">
    {!! $products->links() !!}
</div>

 --}}

@php
$wishlistProductIds = [];
if (Auth::check()) {
    $wishlistProductIds = Auth::user()->wishlists()->pluck('product_id')->toArray();
}
@endphp





    <!-- Product Content Area -->
    <div class="col-12">
        {{-- @if(request('search') || request('q'))
            <!-- Search Results Header -->
            <div class="search-results-header mb-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="mb-1">Search Results</h3>
                        <p class="text-muted mb-0">Found {{ $products->total() }} results for "<strong>{{ request('search') ?: request('q') }}</strong>"</p>
                    </div>
                    <a href="{{ route('front.getCategory') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-times me-1"></i> Clear Search
                    </a>
                </div>
            </div>
        @endif --}}

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab" tabindex="0">
                <div class="row gy-4 list-grid-wrapper">
    @forelse($products as $discountProduct)
        @php
            $data = $discountProduct->getproductPrice();
            $isoffer = $data->isoffer;
            $offer = $data->offer;
            $price = $data->price;
            $discount = $data->discount;
            $rev = $discountProduct->reviewtotal();
            $star = $rev->reviewtotal / 20;
        @endphp

        <div class="col-xl-4 col-sm-6">
            <div class="product-item section-bg">
                <div class="product-item__thumb d-flex">
                    <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                        <img src="{{ $discountProduct->image1 ? URL::asset('/assets/media/products/' . $discountProduct->image1) : URL::asset('assets/images/thumbs/product-img1.png') }}"
                             alt="{{ $discountProduct->product_title ?? 'Product Image' }}"
                             class="cover-img">
                    </a>
                                <button type="button"
                    class="product-item__wishlist wishlist-btn btn-wishlist {{ in_array($discountProduct->id, $wishlistProductIds) ? 'active in-wishlist' : '' }}"
                    data-product-id="{{ $discountProduct->id }}"
                    data-auth="{{ Auth::check() ? 'true' : 'false' }}"
                    data-user-id="{{ Auth::id() ?? '' }}"
                    data-in-wishlist="{{ in_array($discountProduct->id, $wishlistProductIds) ? 'true' : 'false' }}"
                    data-debug="{{ json_encode(['auth' => Auth::check(), 'inWishlist' => in_array($discountProduct->id, $wishlistProductIds), 'userId' => Auth::id(), 'productId' => $discountProduct->id]) }}"
                    title="{{ Auth::check() ? 'Wishlist' : 'Login to add to Wishlist' }}">
                <i class="{{ in_array($discountProduct->id, $wishlistProductIds) ? 'fas' : 'far' }} fa-heart"></i>
            </button>
                </div>
                <div class="product-item__content">
                    <h6 class="product-item__title text-left">
                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link">
                            {{ $discountProduct->product_title ?? 'SaaS dashboard digital products Title here' }}
                        </a>
                    </h6>
                    <div class="product-item__info flx-between gap-2">
                        <span class="product-item__author">
                            by
                            <a href="profile.html" class="link hover-text-decoration-underline">
                                                {{ $discountProduct->vendor->name ?? 'Slidesbuy' }}
                            </a>
                        </span>
                        <div class="flx-align gap-2">
                            @php $isFree = (($discountProduct->sell_type ?? 1) == 0); @endphp
                            <span class="badge {{ $isFree ? 'bg-success' : 'bg-primary' }}">{{ $isFree ? 'Free' : 'Paid' }}</span>
                        </div>
                    </div>


                    <div class="product-item__bottom flx-between gap-2">
                        <div>
                            {{-- @dd($discountProduct->downloads_count); --}}
                            <span class="product-item__sales font-14 mb-2">
                                {{ $downloadCounts[$discountProduct->id] ?? 0 }} Downloads
                            </span>
                            <div class="d-flex align-items-center gap-1">
                                <ul class="star-rating">
                                    @php $star = $discountProduct->average_rating ?? 5; @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="star-rating__item font-11">
                                            <i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                                        </li>
                                    @endfor
                                </ul>
                                <span class="star-rating__text text-heading fw-500 font-14">
                                    ({{ $discountProduct->review_count ?? '16' }})
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}"
                           class="btn btn-outline-light btn-sm pill">
                                            View
                        </a>
                    </div>
                </div>
            </div>
        </div>


    @empty
        <div class="col-12 text-center mt-4">
            <h2>No Slides found</h2>
        </div>
    @endforelse
                </div>

                    <!-- Pagination Start -->
    @if ($products->hasPages())
                        <nav aria-label="Page navigation example" class="mt-4">
                            <ul class="pagination common-pagination justify-content-center">
            {!! $products->links() !!}
                            </ul>
                        </nav>
                    @endif
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
        </div>
</div>


<script>
$(document).ready(function() {
    // Filter form toggle
    $('.filter-tab__button').on('click', function() {
        $('.filter-form').slideToggle();
        $(this).toggleClass('active');
    });

    // Clear filter buttons
    $('.filter-form button[type="reset"]').on('click', function() {
        $(this).closest('.col-sm-4, .col-xs-6').find('input, select').val('');
    });

    // Initialize AJAX filtering if parent page has the functions
    if (typeof initializeAjaxFiltering === 'function') {
        initializeAjaxFiltering();
    }

    // Handle filter changes for AJAX updates
    $('input[type="checkbox"], input[type="radio"]').on('change', function() {
        if (typeof applyFilters === 'function') {
            applyFilters();
        }
    });
});
</script>


