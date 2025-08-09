@extends('front.includes.container')
@section('content')

<style>
.wishlist-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 60px 0;
}

.wishlist-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px 0;
    text-align: center;
    margin-bottom: 40px;
}

.wishlist-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.wishlist-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 10px 0 0 0;
}

.wishlist-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.wishlist-item {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.wishlist-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.wishlist-item-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.wishlist-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.wishlist-item:hover .wishlist-item-image img {
    transform: scale(1.05);
}

.wishlist-item-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.wishlist-item-content {
    padding: 25px;
}

.wishlist-item-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.4;
}

.wishlist-item-sku {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.wishlist-item-price {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}

.wishlist-item-current-price {
    font-size: 1.4rem;
    font-weight: 700;
    color: #667eea;
}

.wishlist-item-original-price {
    font-size: 1rem;
    color: #999;
    text-decoration: line-through;
}

.wishlist-item-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.wishlist-remove-btn {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    flex: 1;
    min-width: 120px;
}

.wishlist-remove-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
}

.wishlist-add-to-cart-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    flex: 1;
    min-width: 120px;
}

.wishlist-add-to-cart-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.wishlist-add-to-cart-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.wishlist-empty {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.wishlist-empty-icon {
    font-size: 4rem;
    color: #ddd;
    margin-bottom: 20px;
}

.wishlist-empty h2 {
    color: #333;
    font-size: 1.8rem;
    margin-bottom: 15px;
}

.wishlist-empty p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.wishlist-continue-shopping {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-decoration: none;
    padding: 15px 30px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
}

.wishlist-continue-shopping:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

.wishlist-loading {
    text-align: center;
    padding: 40px;
    color: #666;
}

.wishlist-loading-spinner {
    border: 3px solid #f3f3f3;
    border-top: 3px solid #667eea;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 768px) {
    .wishlist-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .wishlist-header h1 {
        font-size: 2rem;
    }
    
    .wishlist-item-actions {
        flex-direction: column;
    }
    
    .wishlist-remove-btn,
    .wishlist-add-to-cart-btn {
        flex: none;
        width: 100%;
    }
}
</style>

<section class="wishlist-section">
    <div class="wishlist-header">
        <div class="container">
            <h1>🖤 My Wishlist</h1>
            <p>Your saved favorites and dream products</p>
        </div>
    </div>
    
    <div class="wishlist-container">
        <div id="wishlist-content">
            @if(count($Product) > 0)
                <div class="wishlist-grid">
                    @foreach($Product as $product)
                        @php
                            $rev = $product->reviewtotal();
                            $star = $rev->reviewtotal/20;
                            $currentPrice = $product->getproductPrice()->isoffer ? $product->getproductPrice()->price : $product->getproductPrice()->price;
                        @endphp
                        <div class="wishlist-item" data-product-id="{{ $product->id }}">
                            <div class="wishlist-item-image">
                                <img src="{{ asset('assets/media/products/' . $product->image1) }}" alt="{{ $product->product_title }}">
                                <div class="wishlist-item-badge">
                                    @if($product->soldout == 'off')
                                        In Stock
                                    @else
                                        Out of Stock
                                    @endif
                                </div>
                            </div>
                            
                            <div class="wishlist-item-content">
                                <h3 class="wishlist-item-title">
                                    <a href="{{ route('product.item', [$product->slug]) }}" style="color: inherit; text-decoration: none;">
                                        {{ $product->product_title }}
                                    </a>
                                </h3>
                                <div class="wishlist-item-sku">
                                    SKU: {{ $StoreConfig->productIdprefix ?? 'SKU' }}-{{ $product->product_sku }}
                                </div>
                                
                                <div class="wishlist-item-price">
                                    <span class="wishlist-item-current-price">
                                        ₹{{ number_format($currentPrice, 2) }}
                                    </span>
                                    @if($product->mrp > $currentPrice)
                                        <span class="wishlist-item-original-price">
                                            ₹{{ number_format($product->mrp, 2) }}
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="wishlist-item-actions">
                                    <button class="wishlist-remove-btn" onclick="removeFromWishlist({{ $product->id }})">
                                        <i class="fas fa-trash-alt"></i> Remove
                                    </button>
                                    @if($product->soldout == 'off')
                                        <button class="wishlist-add-to-cart-btn" onclick="addToCart({{ $product->id }}, {{ $product->minquantity }})">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    @else
                                        <button class="wishlist-add-to-cart-btn" disabled>
                                            <i class="fas fa-times"></i> Out of Stock
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="wishlist-empty">
                    <div class="wishlist-empty-icon">💔</div>
                    <h2>Your wishlist is empty</h2>
                    <p>Start browsing our amazing products and add them to your wishlist!</p>
                    <a href="{{ route('front.index') }}" class="wishlist-continue-shopping">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

@push('script')
<script>
function removeFromWishlist(productId) {
    if (confirm('Are you sure you want to remove this item from your wishlist?')) {
        $.ajax({
            method: "GET",
            url: "{{ route('wishlistremove') }}",
            data: { id: productId },
            success: function(data) {
                // Remove the item from the DOM
                $(`.wishlist-item[data-product-id="${productId}"]`).fadeOut(300, function() {
                    $(this).remove();
                    
                    // Update wishlist count in header
                    $('.wishlist-count').text(data);
                    
                    // Check if wishlist is empty
                    if ($('.wishlist-item').length === 0) {
                        $('#wishlist-content').html(`
                            <div class="wishlist-empty">
                                <div class="wishlist-empty-icon">💔</div>
                                <h2>Your wishlist is empty</h2>
                                <p>Start browsing our amazing products and add them to your wishlist!</p>
                                <a href="{{ route('front.index') }}" class="wishlist-continue-shopping">
                                    <i class="fas fa-shopping-bag"></i> Continue Shopping
                                </a>
                            </div>
                        `);
                    }
                });
                
                // Show success message
                if (window.toaster) {
                    window.toaster.success('Item removed from wishlist');
                } else {
                    alert('Item removed from wishlist');
                }
            },
            error: function() {
                alert('Failed to remove item from wishlist');
            }
        });
    }
}

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
</script>
@endpush
