@extends('front.includes.container')
@section('content')

<style>
/* Guest Wishlist Message Styling */
.guest-wishlist-message {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 1px solid #e9ecef;
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.guest-icon {
    color: #6c757d;
    animation: pulse 2s infinite;
}

.guest-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.guest-actions .btn {
    border-radius: 12px;
    font-weight: 600;
    padding: 12px 24px;
    transition: all 0.3s ease;
    min-width: 120px;
}

.guest-actions .btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.guest-actions .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
}

.guest-actions .btn-outline-primary {
    border: 2px solid #007bff;
    color: #007bff;
    background: transparent;
    transition: all 0.3s ease;
}

.guest-actions .btn-outline-primary:hover {
    background: #007bff;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
}

.empty-wishlist-message {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border: 1px solid #e9ecef;
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.empty-icon {
    color: #6c757d;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .guest-actions {
        flex-direction: column;
        align-items: center;
    }

    .guest-actions .btn {
        width: 100%;
        max-width: 250px;
    }

    .guest-wishlist-message,
    .empty-wishlist-message {
        padding: 30px 20px;
    }
}
</style>

<!-- ============================ Breadcrumb Start ================================== -->
<div class="breadcrumb-section">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h4 class="text-heading">My Wishlist</h2>
                </div>
                {{-- <nav class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </nav> --}}
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
                                {{ $downloadCounts[$product->id] ?? 0 }} Downloads
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
                                                            {{ number_format($star, 1) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary btn-sm" onclick="addToCart({{ $product->id }}, 1)">
                                                    <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            @guest
                                <div class="guest-wishlist-message mb-4">
                                    <div class="guest-icon mb-3">
                                        <i class="fas fa-user-lock fa-3x text-muted"></i>
                                    </div>
                                    <h4 class="text-heading mb-3">Welcome to Wishlist!</h4>
                                    <p class="text-body mb-4">To save your favorite products and create your wishlist, please login to your account.</p>
                                    <div class="guest-actions">
                                        <a href="{{ route('login.form') }}" class="btn btn-primary me-3">
                                            <i class="fas fa-sign-in-alt me-2"></i>Login
                                        </a>
                                        <a href="{{ route('front.loginBlade') }}" class="btn btn-primary me-3">
                                            <i class="fas fa-user-plus me-2"></i>Register
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="empty-wishlist-message">
                                    <div class="empty-icon mb-3">
                                        <i class="fas fa-heart fa-3x text-muted"></i>
                                    </div>
                                    <h3 class="text-heading mb-3">Your wishlist is empty</h3>
                                    <p class="text-body mb-4">Start browsing our amazing products and add them to your wishlist!</p>
                                    <a href="{{ route('front.index') }}" class="btn btn-primary">
                                        <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                                    </a>
                                </div>
                            @endguest
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
// Ensure jQuery is available
if (typeof jQuery !== 'undefined') {
    console.log('jQuery available in wishlist view');

    function addToCart(productId, quantity) {
        jQuery.ajax({
            method: "GET",
            url: "{{ route('user.add.card') }}",
            data: {
                quantity: quantity,
                id: productId
            },
            success: function(data) {
                // Update cart count
                jQuery('.cart-count').text(data.totalitem);
                jQuery('.dropdown-box').load("{{ route('user.render.card') }}");

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

    // Wishlist page: remove item without full page refresh
    jQuery(document).ready(function() {
        jQuery(document).on('click', '.product-item__wishlist', function(e) {
            e.preventDefault();
            const button = jQuery(this);
            const productId = button.data('product-id');
            if (!productId) return;

            jQuery.ajax({
                method: 'POST',
                url: "{{ route('wishlistremove') }}",
                data: {
                    id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.status === 'success') {
                        // Update wishlist count in header
                        jQuery('.wishlist-count').text(data.count);

                        if (window.toaster) {
                            window.toaster.success('Removed from wishlist');
                        }

                        // Refresh the page after successful removal
                        window.location.reload();
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
                        window.location.href = '{{ route('login.form') }}';
                    } else {
                        if (window.toaster) {
                            window.toaster.error('Failed to remove item from wishlist');
                        } else {
                            alert('Failed to remove item from wishlist');
                        }
                    }
                }
            });
        });
    });
} else {
    console.error('jQuery not available in wishlist view');
}
</script>
@endpush
