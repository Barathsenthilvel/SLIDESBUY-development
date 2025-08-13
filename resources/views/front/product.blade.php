@extends('front.includes.container')
{{-- @section('title',  $product->metaname)
@section('meta_keywords',$product->metakeyword)
@section('meta_description', $product->metadescription) --}}
@section('content')


<style>
/* Attribute value styling */
.attribute-value {
    display: inline-block;
    padding: 2px 8px;
    background-color: #f8f9fa;
    border-radius: 4px;
    color: #666;
    font-size: 0.9em;
}

.tag-badge {
    display: inline-block;
    padding: 6px 14px;
    background: linear-gradient(135deg, #2193b0, #6dd5ed);
    border-radius: 20px;
    color: #fff;
    font-size: 0.9em;
    margin: 3px 6px;
    transition: all 0.3s ease;
    text-decoration: none;
    cursor: pointer;
    font-weight: 500;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.tag-badge:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.btn-mainsss::before, .btn-mainsss::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: inherit;
    background: var(--main-gradient);
    z-index: -1;
    transition: 0.2s linear;
}

.btn-mainsss {
    background-color: hsl(var(--main)) !important;
    border: transparent !important;
    z-index: 1;
}


/* image resposnive */
.ratio-container {
    position: relative;
    width: 100%;
    max-width: 856px;
    margin: auto;
    aspect-ratio: 856 / 550;
    border-radius: 12px;
    overflow: hidden;
}

.ratio-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
}

/* badge button for free & paid */

.custom-badge.paid {
        background: linear-gradient(135deg, #1e3c72, #2a5298); /* Deep Blue */
        box-shadow: 0 0 6px rgba(30, 60, 114, 0.4);
    }

    .custom-badge.free {
        background: linear-gradient(135deg, #00b09b, #96c93d); /* Fresh green */
        box-shadow: 0 0 6px rgba(0, 176, 155, 0.4);
    }

    </style>
@php
    $price = $product->getproductPrice();
    $rev = $product->reviewtotal();
    $star = $rev->reviewtotal/20;
@endphp
@if (Auth::check())
@php
	$array = \explode(',',Auth::user()->wishlist);
@endphp
@else
@php
	$array = [];
@endphp
@endif
<style>
    .common-section {
        padding: 70px 0 0 0;
    }

</style>



{{-- @dd($product); --}}
{{-- @dd( $product->product_title ) --}}
<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">

    <div class="breadcrumb-two">
        <img src="{{ asset('assets/images/gradients/breadcrumb-gradient-bg.png') }}" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">

                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="all-product.html" class="breadcrumb-list__link text-body hover-text-main">Products</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">SaaS</span>
                            </li>
                        </ul>

                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">{{ $product->slug }}: {{ $product->product_title }}</h3>

                        <div class="breadcrumb-content flx-align gap-3">
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="text">By <a href="#" class="link text-main fw-600">Oviousdev</a> </span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="{{ asset('assets/images/icons/cart-icon.svg') }}" alt="" class="white-version">
                                    <img src="{{ asset('assets/images/icons/cart-white.svg') }}" alt="" class="dark-version w-20">
                                </span>
                                <span class="text">158 sales</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="{{ asset('assets/images/icons/check-icon.svg') }}" alt="" class="white-version">
                                    <img src="{{ asset('assets/images/icons/check-icon-white.svg') }}" alt="" class="dark-version">
                                </span>
                                <span class="text">Recently Updated</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="{{ asset('assets/images/icons/check-icon.svg') }}" alt="" class="white-version">
                                    <img src="{{ asset('assets/images/icons/check-icon-white.svg') }}" alt="" class="dark-version">
                                </span>
                                <span class="text">Well Documented</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-two">
        <div class="breadcrumb-tab flx-wrap align-items-start gap-lg-4 gap-2">
            <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-product-details-tab" data-bs-toggle="pill" data-bs-target="#pills-product-details" type="button" role="tab" aria-controls="pills-product-details" aria-selected="true">Product Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill" data-bs-target="#pills-rating" type="button" role="tab" aria-controls="pills-rating" aria-selected="false" tabindex="-1">
                    <span class="d-flex align-items-center gap-1">
                        <span class="star-rating">
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                        </span>
                        <span class="star-rating__text text-body"> 5.0</span>
                        <span class="star-rating__text text-body"> (180)</span>
                    </span>
                  </button>
                </li>

            </ul>
            <div class="social-share">
                <button type="button" class="social-share__button">
                    <img src="{{ asset('assets/images/icons/share-icon.svg') }}" alt="">
                </button>
                <div class="social-share__icons left">
                    <ul class="social-icon-list colorful-style">
                        <li class="social-icon-list__item">
                            <a href="https://www.facebook.com" class="social-icon-list__link text-body flex-center"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.twitter.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.google.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>
{{--  --}}

<div class="product-details mt-32 padding-b-120">
    <div class="container container-two">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-product-details" role="tabpanel" aria-labelledby="pills-product-details-tab" tabindex="0">
                        <!-- Product Details Content Start -->
           @if(file_exists(public_path('assets/media/products/' . $product->image1)))
    <div class="product-details">

        {{-- Main Image --}}
<div class="product-details__thumb ratio-container">
    <img id="mainImage"
         src="{{ asset('assets/media/products/' . $product->image1) }}"
         alt="Main Product"
         class="ratio-image">
</div>



        {{-- Buttons --}}
        <div class="product-details__buttons flx-align justify-content-center gap-3 ">
            <a href="{{ asset('assets/media/products/' . $product->image1) }}"
               id="livePreviewLink"
               class="btn btn-main d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center"
               target="_blank">
                Live Preview
                <img src="{{ asset('assets/images/icons/eye-outline.svg') }}" alt="Preview">
            </a>

            @php
                $images = [];
                for ($i = 1; $i <= 4; $i++) {
                    $imgField = 'image' . $i;
                    $filename = $product->$imgField;
                    $fullPath = public_path('assets/media/products/' . $filename);
                    if (!empty($filename) && file_exists($fullPath)) {
                        $images[] = asset('assets/media/products/' . $filename);
                    }
                }
            @endphp

            <a href="#"
               class="screenshot-btn btn btn-white pill px-sm-5"
               data-images='@json($images)'>
                Screenshot
            </a>

            @php
                $inWishlist = Auth::check() ? Auth::user()->wishlists()->where('product_id', $product->id)->exists() : false;
            @endphp
            <button type="button"
                    class="wishlist-btn btn-wishlist {{ $inWishlist ? 'active' : '' }}"
                    data-id="{{ $product->id }}"
                    title="{{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                <i class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart"></i>
            </button>
        </div>

        {{-- Thumbnails Row --}}
       <div class="d-flex gap-2 mt-3 overflow-auto" style="max-width: 100%; white-space: nowrap;">
    @for($i = 2; $i <= 4; $i++)
        @php
            $imgField = 'image' . $i;
            $filename = $product->$imgField;
            $fullPath = public_path('assets/media/products/' . $filename);
        @endphp

        @if(!empty($filename) && file_exists($fullPath))
            <div class="thumb-box border p-1 me-2 d-inline-block"
                 style="width: 150px; cursor: pointer;">  {{-- Increased from 80px to 150px --}}
                <img src="{{ asset('assets/media/products/' . $filename) }}"
                     class="img-fluid"
                     alt="Thumbnail"
                     style="width: 100%; height: auto;"> {{-- Make image fill container --}}
            </div>
        @endif
    @endfor
</div>


    </div>



@endif




                                    <!-- Product Details Content End -->
                                    </div>
                    <div class="tab-pane fade" id="pills-rating" role="tabpanel" aria-labelledby="pills-rating-tab" tabindex="0">
                        <div class="product-review-wrapper">
    <div class="product-review">
        <div class="product-review__top flx-between">
            <div class="product-review__rating flx-align">
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-body"> 5.0</span>
                </div>
                <span class="product-review__reason">For <span class="product-review__subject">Customer Support</span> </span>
            </div>
            <div class="product-review__date">
                by <a href="#" class="product-review__user text--base">John Doe </a> 2 month ago
            </div>
        </div>
        <div class="product-review__body">
            <p class="product-review__desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam itaque vitae ex possimus delectus? Voluptas expedita accusantium aperiam quo quod dolore dignissimos rerum praesentium deserunt libero recusandae quisquam est accusamus eos dolorum sit explicabo, sapiente pariatur voluptates veniam aut veritatis, magnam velit similique! Ex similique magni labore aperiam, eius quas molestiae accusantium porro eaque esse minus amet doloribus quo odit illo doloremque.</p>
        </div>
    </div>
    <div class="product-review">
        <div class="product-review__top flx-between">
            <div class="product-review__rating flx-align">
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-body"> 5.0</span>
                </div>
                <span class="product-review__reason">For <span class="product-review__subject">Customer Support</span> </span>
            </div>
            <div class="product-review__date">
                by <a href="#" class="product-review__user text--base">John Doe </a> 2 month ago
            </div>
        </div>
        <div class="product-review__body">
            <p class="product-review__desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam itaque vitae ex possimus delectus? Voluptas expedita accusantium aperiam quo quod dolore dignissimos rerum praesentium deserunt libero recusandae quisquam est accusamus eos dolorum sit explicabo, sapiente pariatur voluptates veniam aut veritatis, magnam velit similique! Ex similique magni labore aperiam, eius quas molestiae accusantium porro eaque esse minus amet doloribus quo odit illo doloremque.</p>
        </div>
    </div>
</div>
                    </div>
                    <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab" tabindex="0">

    <!-- Comment Start -->

    <!-- Comment End -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- ======================= Product Sidebar Start ========================= -->
<div class="product-sidebar section-bg">
    <div class="product-sidebar__top position-relative flx-between gap-1">
        <button type="button" class="btn-has-dropdown font-heading font-18">Regular License</button>
        <div class="license-dropdown">
            <div class="license-dropdown__item cursor-pointer mb-3 pb-3 border-bottom activeSelectItem">
                <h6 class="license-dropdown__title font-body mb-1 font-16">Regular License</h6>
                <p class="license-dropdown__desc font-13">Use, by you or one client, in a solitary finished result which end clients are not charged for. The complete cost incorporates the thing cost and a purchaser expense..</p>
            </div>
            <div class="license-dropdown__item cursor-pointer">
                <h6 class="license-dropdown__title font-body mb-1 font-16">Extended License</h6>
                <p class="license-dropdown__desc font-13">Use, by you or one client, in a solitary final result which end clients can be charged for. The all out cost incorporates the thing cost and a purchaser expense.</p>
            </div>
            <div class="mt-3 pt-2 border-top text-center ">
                <a href="#" class="link hover-text-decoration-underline font-14 text-main fw-500">View License Details</a>
            </div>
        </div>
        <h6 class="product-sidebar__title">  <span class="custom-badge {{ ($product->sell_type ?? 1) == 0 ? 'free' : 'paid' }}">{{ ($product->sell_type ?? 1) == 0 ? 'Free' : 'Paid' }}</span>
</h6>
    </div>

    <ul class="sidebar-list">
        <li class="sidebar-list__item flx-align gap-2 font-14 fw-300 mb-2">
            <span class="icon"><img src="{{ asset('assets/images/icons/check-cirlce.svg') }}" alt=""></span>
            <span class="text">Quality verified</span>
        </li>
        <li class="sidebar-list__item flx-align gap-2 font-14 fw-300 mb-2">
            <span class="icon"><img src="{{ asset('assets/images/icons/check-cirlce.svg') }}" alt=""></span>
            <span class="text">Use for a single project</span>
        </li>
        <li class="sidebar-list__item flx-align gap-2 font-14 fw-300">
            <span class="icon"><img src="{{ asset('assets/images/icons/check-cirlce.svg') }}" alt=""></span>
            <span class="text">Non-paying users only</span>
        </li>
    </ul>


    {{-- <button type="button" class="btn btn-main d-flex w-100 justify-content-center align-items-center gap-2 pill px-sm-5 mt-32">
        <img src="{{ asset('assets/images/icons/add-to-cart.svg') }}" alt="">
        Add To Cart
    </button> --}}
    {{-- <div class="d-flex justify-content-center align-items-center gap-2 mt-5">
    <button type="button" class="btn btn-primary w-50 w-sm-auto">
        <img src="{{ asset('assets/images/icons/add-to-cart.svg') }}" alt="Add to Cart" class="me-2">
        Add To Cart
    </button>
    <button type="button" class="btn btn-primary w-50 w-sm-auto">Buy Now</button>
    @auth
        <a href="{{ asset('storage/' . $product->document) }}" class="btn btn-primary w-50 w-sm-auto" download>
            <img src="{{ asset('assets/images/icons/download.svg') }}" alt="Download" class="me-2">
            Download
        </a>
    @endauth
</div> --}}

{{-- @if (Auth::check() && $downloadLimit > 0)
    <div class="alert alert-info text-center">
        <strong>Downloads:</strong>
        Used {{ $downloadsUsed }} / {{ $downloadLimit }} |
        Remaining: {{ $downloadsRemaining }}
    </div>
@endif --}}

@if ($activeSubscription)
    <div class="mb-3">
        <label class="fw-bold">Downloads Left</label>
        <div class="progress">
            @php
                $remaining = max($downloadLimit - $downloadsUsed, 0);
                $percentage = $downloadLimit > 0 ? ($remaining / $downloadLimit) * 100 : 0;
            @endphp
            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%;">
                {{ $remaining }} of {{ $downloadLimit }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger text-center mt-3">
        {{ session('error') }}
    </div>
@endif

{{-- @if ($activeSubscription && $totalDownloadLimit > 0)
    <div class="text-center mt-4">
        <p class="mb-0 fw-bold text-success">
            Downloads Left: {{ $totalDownloadLimit - $downloadCount }} / {{ $totalDownloadLimit }}
        </p>
    </div>
@endif --}}

<div class="d-flex justify-content-center align-items-center gap-2 mt-5">
    @if ($activeSubscription && $downloadLimitReached)
        <a href="{{ route('front.subscription') }}" class="btn btn-danger w-100 w-sm-auto mt-3">
            Renew Subscription
        </a>
    @elseif (($product->sell_type ?? 1) == 0)
        <a href="{{ route('product.download', $product->id) }}" class="btn btn-primary w-50 w-sm-auto mt-3">
            <img src="{{ asset('assets/images/icons/download.svg') }}" alt="Download" class="me-2">
            Download Free
        </a>
    @elseif ($activeSubscription && $canDownload)
        <a href="{{ route('product.download', $product->id) }}" class="btn btn-primary w-50 w-sm-auto mt-3">
            <img src="{{ asset('assets/images/icons/download.svg') }}" alt="Download" class="me-2">
            Download
        </a>
    @else
        <a href="{{ route('front.subscription') }}" class="btn btn-primary w-100 w-sm-auto mt-3">
            Buy Now
        </a>
    @endif
</div>





    <!-- Author Details Start  http://127.0.0.1:8000/subscription/success/9-->

    <!-- Author Details End -->

    <!-- Meta Attribute List Start -->
    <ul class="meta-attribute">
        <li class="meta-attribute__item">
            <span class="name">Accessible</span>
            <span class="details">
                @if($product->is_free)
                    <span class="badge bg-success">Free</span>
                @else
                    <span class="badge bg-primary">Paid</span>
                @endif
            </span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Published By</span>
            <span class="details">Slidesbuy</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Published On</span>
            <span class="details">{{ $product->created_at->format('M d, Y') }}</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Last Update</span>
            <span class="details">{{ $product->updated_at->format('M d, Y') }}</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Code</span>
            <span class="details">{{ $product->product_sku }}</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Categories</span>
            <span class="details">
                @php
                    $categories = $product->getcategort();
                @endphp
                @if($categories->count() > 0)
                    @foreach($categories as $key => $category)
                        <a href="{{ url('category/' . $category->Category_url) }}"
                           class="hover-text-decoration-underline">
                            {{ $category->category_name }}{{ !$loop->last ? ',' : '' }}
                        </a>
                    @endforeach
                @else
                    <span class="text-muted">No categories assigned</span>
                @endif
            </span>
        </li>
                @php
            $attributes = $product->Methodattribute();
            $tags = [];
            $otherAttributes = [];

            foreach($attributes as $attribute) {
                // Debug output
                echo "<!-- Attribute: " . json_encode($attribute) . " -->\n";

                // Check for both 'Tags' and 'tag' case-insensitively
                if(strtolower($attribute[0]) == 'tags' || strtolower($attribute[0]) == 'tag') {
                    $tagValues = $attribute[1];
                    echo "<!-- Found Tags: " . $tagValues . " -->\n";
                    $tags = array_filter(explode(',', $tagValues));
                } else {
                    $otherAttributes[] = $attribute;
                }
            }
        @endphp

        @if(count($otherAttributes) > 0)
            @foreach($otherAttributes as $attribute)
            <li class="meta-attribute__item">
                <span class="name">{{ $attribute[0] }}</span>
                <span class="details">
                    <span class="attribute-value">{{ $attribute[1] }}</span>
                </span>
            </li>
            @endforeach
        @endif

        <!-- Debug: Number of tags found: {{ count($tags) }} -->
        <li class="meta-attribute__item">
            <span class="name">Tags</span>
            <span class="details">
                @if(count($tags) > 0)
                    @foreach($tags as $tag)
                        <span class="tag-badge">{{ trim($tag) }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No tags assigned</span>
                @endif
            </span>
        </li>


        <li class="meta-attribute__item">
            <span class="name">Copatible with</span>
            <span class="details">
                <a href="#" class="hover-text-decoration-underline">Contact Form 7,</a>
                <a href="#" class="hover-text-decoration-underline"> Calendar,</a>
                <a href="#" class="hover-text-decoration-underline"> Elementor,</a>
                <a href="#" class="hover-text-decoration-underline"> Elementor Pro,</a>
                <a href="#" class="hover-text-decoration-underline"> WooCommerce 8.x.x</a>
            </span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">File size</span>
            <span class="details">85 MB</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Framework</span>
            <span class="details">Underscores</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Software Version</span>
            <span class="details">
                <a href="#" class="hover-text-decoration-underline">WordPress 6.3.x,</a>
                <a href="#" class="hover-text-decoration-underline">WordPress 6.2.x,</a>
                <a href="#" class="hover-text-decoration-underline">WordPress 6.1.x,</a>
                <a href="#" class="hover-text-decoration-underline">WordPress 6.0.x,</a>
                <a href="#" class="hover-text-decoration-underline">WordPress 5.9.x,</a>
            </span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Marketplace Files
                Included</span>
            <span class="details">
                <a href="#" class="hover-text-decoration-underline">PHP Files,</a>
                <a href="#" class="hover-text-decoration-underline">CSS Files,</a>
                <a href="#" class="hover-text-decoration-underline">SCSS Files,</a>
                <a href="#" class="hover-text-decoration-underline">JS Files,</a>
            </span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Layout</span>
            <span class="details">Responsive</span>
        </li>
        <li class="meta-attribute__item">
            <span class="name">Tags</span>
            <span class="details">
                <a href="#" class="hover-text-decoration-underline">theme,</a>
                <a href="#" class="hover-text-decoration-underline">web design,</a>
                <a href="#" class="hover-text-decoration-underline">minimal design,</a>
                <a href="#" class="hover-text-decoration-underline">trendy,</a>
                <a href="#" class="hover-text-decoration-underline">responsive,</a>
                <a href="#" class="hover-text-decoration-underline">wordpress,</a>
                <a href="#" class="hover-text-decoration-underline">saas,</a>
                <a href="#" class="hover-text-decoration-underline">dashboard,</a>
            </span>
        </li>
    </ul>
    <!-- Meta Attribute List End -->
</div>
<!-- ======================= Product Sidebar End ========================= -->
            </div>
        </div>
    </div>
</div>











<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script>
jQuery(document).ready(function ($) {

    // live privew & screenshot
    $('.thumb-box').on('click', function () {
        const $thumbBox = $(this);
        const $thumbImg = $thumbBox.find('img');
        const $mainImage = $('#mainImage');
        const $livePreviewLink = $('#livePreviewLink');

        const currentMainSrc = $mainImage.attr('src');
        const newSrc = $thumbImg.attr('src');

        // Swap main image and clicked thumbnail
        $mainImage.attr('src', newSrc).show();
        $thumbImg.attr('src', currentMainSrc);

        // Update Live Preview link href
        $livePreviewLink.attr('href', newSrc).css('display', 'inline-flex');
    });

    // Wishlist handled globally in container.blade.php






});
</script>

@endsection
{{--

// $('body .countClick').click(function(e){
// e.preventDefault();
//     var userid={{(Auth::check())?Auth::id():0}};
//     var prodid={{$product->id}};
//     $.ajax({
//     method:"post",
//     url:'{{url('likes')}}',
//     data: {
//         "_token": "{{ csrf_token() }}",
//         userid: userid,
//         prodid:prodid
//         },
//     success:function(data){
//         console.log(data.data);
//         $('#likeCounts').text(data.data);

//             },
//     error:function(error){

//     }
// });
// });

    // $('body #star_rating i').click(function(e){
	// 	var star = $(this).data('star');
	// 	$('#rating').val(star);
	// 	$('body #star_rating i').each((i,e) =>{
	// 		if(e.dataset.star <= star){
	// 			e.classList.add("fa-star");
	// 			e.classList.remove("fa-star-o");
	// 		}else{
	// 			e.classList.remove("fa-star");
	// 			e.classList.add("fa-star-o");
	// 		}
	// 	})
    // });
// $('body #reviewSubmit').submit(function(e){
// e.preventDefault();
// const formData = new FormData(e.target);
// formData.set('rating', $("#rating").val());
// $.ajax({
//     method:"POST",
//     url:$(this).prop('action'),
//     data:formData,
//     cache: false,
//     processData: false,
//     contentType: false,
//     success:function(data){
//         $('#tab3').load('{{route('load.review',['id'=>$product->id])}}');
//     },
//     error:function(erroe){

//     }
// });

 --}}
