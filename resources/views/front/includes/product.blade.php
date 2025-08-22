




<section class="arrival-product padding-y-120 section-bg position-relative z-index-1">
    <img src="../assets/images/gradients/product-gradient.png" alt="" class="bg--gradient white-version">

    <img src="../assets/images/shapes/element2.png" alt="" class="element one">

    <div class="container container-two">
        <div class="section-heading">
            <h3 class="section-heading__title">New Arrival Slides</h3>
        </div>

        <ul class="nav common-tab justify-content-center nav-pills mb-48" id="pills-tab" role="tablist">
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All Item</button>
            </li> --}}
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                @php $products = collect($discounts['product'] ?? [])->take(8); @endphp
                @if($products->isEmpty())
                <div class="text-center py-5">
                    <h4 class="mb-2">No slides found</h4>
                    {{-- <p class="text-muted mb-4">Please check back later or explore all categories.</p>
                    <a href="{{ route('front.getCategory') }}" class="btn btn-main btn-lg pill fw-300">Browse All Slides</a> --}}
                </div>
                @else
                <div class="row gy-4">
                    @foreach($products as $discountProduct)
                        @php
                            $data = $discountProduct->getproductPrice();
                            $rev = $discountProduct->reviewtotal();
                            $star = $rev->reviewtotal / 20;
                            // Check if product is already in user's wishlist
                            $inWishlist = false;
                            if (Auth::check()) {
                                $inWishlist = Auth::user()->wishlists()->where('product_id', $discountProduct->id)->exists();
                            }
                        @endphp
                        <div class="col-6 col-md-3">
                            <div class="product-item ">
                                <div class="product-item__thumb d-flex">
                                    <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                                        <img src="{{ URL::asset('/assets/media/products/' . $discountProduct->image1) }}" alt="{{ $discountProduct->product_title }}" class="cover-img">
                                    </a>
                                    {{-- Fixed wishlist button with proper functionality --}}
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
                                            @php $isFree = (($discountProduct->sell_type ?? 1) == 1); @endphp
                                            <span class="badge {{ $isFree ? 'bg-primary' : 'bg-success' }}">{{ $isFree ? 'Paid' : 'Free' }}</span>
                                        </div>
                                    </div>
                                    <div class="product-item__bottom flx-between gap-2">
                                        <div>
                                            <span class="product-item__sales font-14 mb-2">
                                                {{ $downloadCounts[$discountProduct->id] ?? 0 }} Downloads
                                            </span>
                                            <ul class="star-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li class="star-rating__item font-11"><i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="btn btn-outline-light btn-sm pill">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                                @endif

                <!-- View All Items Button - Only show when products exist -->
                @if($products->count() > 0)
                <div class="text-center mt-64">
                    <a href="{{ route('front.getCategory') }}" class="btn btn-main btn-lg pill fw-300">
                        View All Items
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ======================= Arrival Products End ========================= -->

