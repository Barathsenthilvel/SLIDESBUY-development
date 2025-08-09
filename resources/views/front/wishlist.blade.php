@extends('front.includes.container')
@section('content')

<!-- ============================ Breadcrumb Start ================================== -->
<div class="breadcrumb-section">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2 class="text-heading">My Wishlist</h2>
                </div>
                <nav class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Breadcrumb End ================================== -->

<!-- ============================ Wishlist Section Start ================================== -->
<section class="wishlist-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
        <div id="wishlist-content">
                    @if(count($wishlistProducts) > 0)
                        <div class="row g-4">
                            @foreach($wishlistProducts as $product)
                        @php
                            $rev = $product->reviewtotal();
                            $star = $rev->reviewtotal/20;
                            $currentPrice = $product->getproductPrice()->isoffer ? $product->getproductPrice()->price : $product->getproductPrice()->price;
                        @endphp
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-item section-bg h-100">
                                        <div class="product-item__thumb d-flex">
                                            <a href="{{ route('product.item', ['slug' => $product->slug]) }}" class="link w-100">
                                                <img src="{{ $product->image1 ? URL::asset('/assets/media/products/' . $product->image1) : URL::asset('assets/images/thumbs/product-img1.png') }}"
                                                     alt="{{ $product->product_title ?? 'Product Image' }}"
                                                     class="cover-img">
                                            </a>
                                            <button type="button"
                                                class="product-item__wishlist wishlist-btn btn-wishlist active in-wishlist"
                                                data-product-id="{{ $product->id }}"
                                                data-container="body"
                                                data-toggle="popover"
                                                data-trigger="hover"
                                                data-placement="top"
                                                data-content="Remove from Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        </div>

                                        <div class="product-item__content">
                                            <h6 class="product-item__title">
                                                <a href="{{ route('product.item', ['slug' => $product->slug]) }}" class="link">
                                                    {{ Str::limit($product->product_title ?? 'Product Title', 50) }}
                                                </a>
                                            </h6>

                                            <div class="product-item__info flx-between gap-2">
                                                <span class="product-item__author">
                                                    by
                                                    <a href="profile.html" class="link hover-text-decoration-underline">
                                                        {{ $product->vendor->name ?? 'Slidesbuy' }}
                                                    </a>
                                                </span>
                                                <div class="flx-align gap-2">
                                                   <h6 class="product-item__price mb-0">
                                                   <span class="custom-badge {{ $product->discount_price ? 'Free' : 'paid' }}">
        {{ $product->discount_price ? 'Free' : 'paid' }}
    </span>
                                                </h6>

                                                    @if (!empty($product->price))
                                                        <span class="product-item__prevPrice text-decoration-line-through">
                                                            ${{ $product->price }}
                                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                                            <div class="product-item__bottom flx-between gap-2">
                                                <div>
                                                    <span class="product-item__sales font-14 mb-2">
                                                        {{ $product->sales ?? '1200' }} Sales
                                    </span>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <ul class="star-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li class="star-rating__item font-11">
                                                                    <i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                        <span class="star-rating__text text-heading fw-500 font-14">
                                                            ({{ $product->review_count ?? '16' }})
                                        </span>
                                                    </div>
                                </div>
                                
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('product.item', ['slug' => $product->slug]) }}"
                                                       class="btn btn-outline-light btn-sm pill">
                                                        View
                                                    </a>
                                    @if($product->soldout == 'off')
                                                        <button class="btn btn-primary btn-sm pill" onclick="addToCart({{ $product->id }}, {{ $product->minquantity }})">
                                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    @else
                                                        <button class="btn btn-secondary btn-sm pill" disabled>
                                                            <i class="fas fa-times"></i>
                                        </button>
                                    @endif
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                        <div class="text-center py-5">
                            <div class="empty-wishlist">
                                <i class="fas fa-heart-broken fa-4x text-muted mb-4"></i>
                                <h3 class="text-heading mb-3">Your wishlist is empty</h3>
                                <p class="text-body mb-4">Start browsing our amazing products and add them to your wishlist!</p>
                                <a href="{{ route('front.index') }}" class="btn btn-primary">
                                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Wishlist Section End ================================== -->

@endsection

@push('script')
<script>
function addToCart(productId, quantity) {
    $.ajax({
        method: "GET",
        url: "{{ route('user.add.card') }}",
        data: {
            quantity: quantity,
            id: productId
        },
        success: function(data) {
            // Update cart count
            $('.cart-count').text(data.totalitem);
            $('.dropdown-box').load("{{ route('user.render.card') }}");
            
            // Show success message
            if (window.toaster) {
                window.toaster.success('Added to Cart');
            } else {
                alert('Added to Cart');
            }
        },
        error: function() {
            if (window.toaster) {
                window.toaster.error('Failed to add to cart');
            } else {
                alert('Failed to add to cart');
            }
        }
    });
}

// Override the wishlist click handler for wishlist page
$(document).ready(function() {
    $('.product-item__wishlist').off('click').on('click', function() {
        const productId = $(this).data('product-id');
        if (productId) {
            // Remove from wishlist (since we're on wishlist page)
            removeFromWishlist(productId);
        }
    });
});

function removeFromWishlist(productId) {
    $.ajax({
        method: "POST",
        url: "{{ route('wishlistremove') }}",
        data: { 
            id: productId,
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            if (data.status === 'success') {
                // Update wishlist count in header
                $('.wishlist-count').text(data.count);
                
                // Refresh page to show updated wishlist
                setTimeout(function() {
                    window.location.reload();
                }, 500);
            } else {
                if (window.toaster) {
                    window.toaster.error(data.message || 'Failed to remove item');
                } else {
                    alert(data.message || 'Failed to remove item');
                }
            }
        },
        error: function(xhr) {
            if (xhr.status === 401) {
                // Redirect to login
                window.location.href = '{{ route("login.form") }}';
            } else {
                if (window.toaster) {
                    window.toaster.error('Failed to remove item from wishlist');
                } else {
                    alert('Failed to remove item from wishlist');
                }
            }
        }
    });
}
</script>
@endpush
