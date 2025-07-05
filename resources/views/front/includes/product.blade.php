{{-- <section class="trend-section common-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center text-uppercase section-title middle-liner">
                <span>{{$discounts['Homeslider']->title}}</span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopad prdslider-wraper commontab-wraper">
                <div class="product-slider">
                    @foreach($discounts['product'] as $key => $discountProduct)
                    @php
                        $data = $discountProduct->getproductPrice();
                        $isoffer = $data->isoffer;
                        $offer = $data->offer;
                        $price = $data->price;
                        $discount = $data->discount;
                        $rev = $discountProduct->reviewtotal();
                        $star = $rev->reviewtotal/20;
                    @endphp
                        <div class="prd-single">
                            <a href="{{route('product.item',['slug'=>$discountProduct->slug])}}"
                                class="prdsingle-inner">
                                <div class="prd-inner">
                                    <div class="prd-img">
                                        <img src="{{URL::asset('/assets/media/products/'.$discountProduct->image1)}}"
                                            class="img-responsive center-block prdimg"
                                            title="{{$discountProduct->image1}}"
                                            alt="{{$discountProduct->image1}}" />
                                    </div>
                                    <div class="prdbtn-wraper">
                                        <ul class="list-inline">
                                            <li> <a href="#" data-id="{{$discountProduct->id}}" data-q="{{$discountProduct->minquantity}}"
                                                    class="cart-btn common-btn {{($discountProduct->soldout != 'off')?'':'btn-cart2'}}" @if($discountProduct->soldout != 'off') style="pointer-events: none" @endif>{{($discountProduct->soldout != 'off')?'soldout':'Add to Cart'}}</a></li>
                                            <li>
                                                <a href="#" data-container="body" data-trigger="hover"
                                                    data-toggle="popover" data-placement="top" data-content="Wishlist" data-id="{{$discountProduct->id}}"
                                                    data-original-title="" title="" class="wishlist-btn common-btn btn-wishlist {{(in_array($discountProduct->id,$array)?'added':'')}}">
                                                    <img class="img-responsive center-block"
                                                        src="{{URL::asset('assets/front/images/icons/wishlist.png')}}">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prdname-wraper">
                                        <div class="prdname">{{$discountProduct->product_title}}</div>
                                        <div class="star-rated">
                                                <i class=" {{($star >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($star >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                                        </div>
                                        <div class="prdprice-wraper">
                                            <span class="actual-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $data->price }}</span>
                                            <span class="original-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $discountProduct->mrp }}</span>
                                            <span class="offer-percent">You save {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ ($discountProduct->mrp - $data->price) }}</span>
                                            <!--@if(!empty($data->discount) || !empty($data->CustomerGroup) && $data->CustomerGroup->amount != 0)-->
                                            @if(false)
                                            <span class="offer-percent">
                                                (@if(!empty($data->discount)){{$data->discount->number}}{{($data->discount->type == '%')?'%':'Rs'}} OFF @endif
                                                 @if(!empty($data->CustomerGroup) && $data->CustomerGroup->amount != 0) @if(!empty($data->discount)) & @endif {{$data->CustomerGroup->amount}}{{($data->CustomerGroup->type == 1)?'%':'Rs'}} OFF  @endif )
                                            </span>
                                            @endif

                                            <!--@endif-->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center;margin-top:10px;">
            <a class="readmore-btn" href="{{ route('front.getCategory') }}" target="">
                <span class="readmore-inner">
                    <span>View All</span>
                </span>
            </a>
        </div>
    </div>
</section> --}}





<section class="selling-product padding-y-120 position-relative z-index-1 overflow-hidden">
    <img src="assets/images/gradients/selling-gradient.png" alt="" class="bg--gradient">

    <img src="assets/images/shapes/element2.png" alt="" class="element one">
    <img src="assets/images/shapes/element1.png" alt="" class="element two">

    <img src="assets/images/shapes/curve-pattern1.png" alt="" class="position-absolute start-0 top-0 z-index--1">
    <img src="assets/images/shapes/curve-pattern2.png" alt="" class="position-absolute end-0 top-0 z-index--1">

    <div class="container container-two">
        <div class="section-heading style-left style-white flx-between max-w-unset gap-4">
            <div>
                <h3 class="section-heading__title"> Our Products</h3>
                <p class="section-heading__desc font-18">
                    Every month we pick some best products for you. This month's best web themes &amp; templates have arrived, chosen by our content specialists.
                </p>
            </div>
            <a href="{{ route('front.getCategory') }}" class="btn btn-main btn-lg pill fw-300">
                View All Items
            </a>
        </div>

        <div class="selling-product-slider">
            @foreach($discounts['product'] as $discountProduct)
                @php
                    $data = $discountProduct->getproductPrice();
                    $rev = $discountProduct->reviewtotal();
                    $star = $rev->reviewtotal / 20;
                @endphp

                <div class="product-item shadow-sm overlay-none">
                    <div class="product-item__thumb d-flex max-h-unset">
                        <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link w-100">
                            <img src="{{ URL::asset('/assets/media/products/' . $discountProduct->image1) }}" alt="{{ $discountProduct->product_title }}" class="cover-img">
                        </a>
                    </div>
                    <div class="product-item__content">
                        <h6 class="product-item__title">
                            <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="link">{{ $discountProduct->product_title }}</a>
                        </h6>
                        <div class="product-item__info flx-between gap-2">
                            <span class="product-item__author">
                                by
                                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
                            </span>
                            <div class="flx-align gap-2">
                                <h6 class="product-item__price mb-0">{{ ($StoreConfig->currencysymbol()) ? $StoreConfig->currencysymbol() : 'Rs.' }} {{ $data->price }}</h6>
                                <span class="product-item__prevPrice text-decoration-line-through">{{ ($StoreConfig->currencysymbol()) ? $StoreConfig->currencysymbol() : 'Rs.' }} {{ $discountProduct->mrp }}</span>
                            </div>
                        </div>
                        <div class="product-item__bottom flx-between gap-2">
                            <div>
                                <span class="product-item__sales font-16 mb-2">{{ $discountProduct->sales ?? '1230' }} Sales</span>
                                <ul class="star-rating gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="star-rating__item font-16">
                                            <i class="{{ $star >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="flx-align gap-2">
                                <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="btn btn-outline-light download-icon btn-icon btn-icon--sm pill">
                                    <span class="icon">
                                        <img src="assets/images/icons/download.svg" alt="" class="white-version">
                                        <img src="assets/images/icons/download-white.svg" alt="" class="dark-version">
                                    </span>
                                </a>
                                <a href="{{ route('product.item', ['slug' => $discountProduct->slug]) }}" class="btn btn-outline-light pill">Live Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ======================= Selling Products End ========================= -->

<!-- ======================= Selling Products End ========================= -->
