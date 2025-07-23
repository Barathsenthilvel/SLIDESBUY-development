<style>
    .product-card {
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px;
        transition: 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    .product-card:hover {
        box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }

    .product-img {
        width: 100%;
        max-height: 220px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .product-title {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 5px;
        min-height: 40px;
    }

    .star-rated i {
        color: #f5a623;
        margin-right: 2px;
    }

    .price-block {
        margin-top: 8px;
    }

    .actual-price {
        font-size: 1.1rem;
        color: #b12704;
        font-weight: bold;
    }

    .original-price {
        text-decoration: line-through;
        color: #888;
        margin-left: 8px;
    }

    .offer-percent {
        color: #007600;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .action-buttons a {
        display: inline-block;
        margin-right: 8px;
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 5px;
        border: 1px solid #ddd;
        background: #f8f9fa;
        text-align: center;
    }

    .action-buttons a:hover {
        background-color: #eee;
    }

    .wishlist-btn img {
        width: 20px;
    }
</style>

@php $array = []; @endphp
@if (Auth::check())
    @php $array = explode(',', Auth::user()->wishlist); @endphp
@endif

<div class="row g-3">
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

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="product-card">
            <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}">
                <img src="{{ URL::asset('/assets/media/products/' . $discountProduct->image1) }}" alt="{{ $discountProduct->product_title }}" class="product-img">
            </a>

            <div class="product-title">{{ $discountProduct->product_title }}</div>

            <div class="star-rated mb-2">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="{{ $star >= $i ? 'fa fa-star' : 'fa fa-star-o' }}"></i>
                @endfor
            </div>

            <div class="price-block">
                <span class="actual-price">{{ $StoreConfig->currencysymbol() ?? 'Rs.' }} {{ $data->price }}</span>
                <span class="original-price">{{ $StoreConfig->currencysymbol() ?? 'Rs.' }} {{ $discountProduct->mrp }}</span>

                <div class="offer-percent">
                    {{-- You save {{ $StoreConfig->currencysymbol() ?? 'Rs.' }} {{ $discountProduct->mrp - $data->price }} --}}
                </div>
            </div>

            <div class="action-buttons mt-3">
                <a href="#"
                   class="cart-btn {{ $discountProduct->soldout != 'off' ? 'p-e-none' : '' }} common-btn btn-cart2"
                   data-id="{{ $discountProduct->id }}"
                   data-q="{{ $discountProduct->minquantity }}">
                    {{ $discountProduct->soldout != 'off' ? 'Sold Out' : 'Add to Cart' }}
                </a>

                <a href="#"
                   class="wishlist-btn {{ in_array($discountProduct->id, $array) ? 'added' : '' }} common-btn btn-wishlist"
                   data-id="{{ $discountProduct->id }}"
                   data-container="body"
                   data-toggle="popover"
                   data-trigger="hover"
                   data-placement="top"
                   data-content="Wishlist">
                    <img src="{{ URL::asset('assets/front/images/icons/wishlist.png') }}" alt="wishlist">
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="col-12 text-center mt-4">
        <h2>No Product found</h2>
    </div>
@endforelse
</div>

<!-- Pagination -->
<div class="mt-4">
    {!! $products->links() !!}
</div>
