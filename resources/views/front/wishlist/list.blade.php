@extends('front.includes.container')

@section('content')
<div class="container">
    <h2 class="mb-4">My Wishlist</h2>

    @if($wishlistProducts->count() > 0)
        <div class="row">
            @foreach($wishlistProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }}{{ number_format($product->price, 2) }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ Auth::check() ? route('product.item', ['slug' => $product->slug]) : route('front.loginBlade') }}" class="btn btn-outline-light download-icon btn-icon btn-icon--sm pill">
                                    <span class="icon">
                                        <img src="../assets/images/icons/download.svg" alt="" class="white-version">
                                        <img src="../assets/images/icons/download-white.svg" alt="" class="dark-version">
                                    </span>
                                </a>
                                <a href="{{ route('product.item', ['slug' => $product->slug]) }}" class="btn btn-outline-light pill">View</a>
                                <button class="btn btn-danger btn-sm wishlist-btn active"
                                        data-id="{{ $product->id }}">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Your wishlist is empty.</p>
    @endif
</div>
@endsection

<script>
$(document).on('click', '.wishlist-btn', function () {
    const button = $(this);
    const productId = button.data('id');

    $.ajax({
        url: '{{ route("wishlist.remove") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: productId
        },
        success: function (response) {
            if (response.status === 'removed') {
                button.closest('.col-md-4').fadeOut();
            }
        },
        error: function () {
            alert('Failed to remove item.');
        }
    });
});
</script>
