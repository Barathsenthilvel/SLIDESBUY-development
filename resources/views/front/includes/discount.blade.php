<section class="trend-section common-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center text-uppercase section-title middle-liner">
                <span>{{$discounts['discount']->title}}</span>
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
                                                    class="cart-btn common-btn {{($discountProduct->soldout != 'off')?'':'btn-cart2'}} "  @if($discountProduct->soldout != 'off') style="pointer-events: none" @endif >{{($discountProduct->soldout != 'off')?'soldout':'Add to Cart'}}</a></li>
                                            <li>
                                                <button type="button" 
                                                        class="wishlist-btn btn-wishlist {{(in_array($discountProduct->id,$array)?'active':'')}}"
                                                        data-id="{{$discountProduct->id}}"
                                                        data-container="body"
                                                        data-toggle="popover"
                                                        data-trigger="hover"
                                                        data-placement="top"
                                                        data-content="Wishlist">
                                                    <i class="{{(in_array($discountProduct->id,$array)?'fas':'far')}} fa-heart"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                                                            <div class="prdname-wraper">
                                            <div class="prdname">{{$discountProduct->product_title}}</div>
                                            <div class="download-count" style="font-size: 12px; color: #666; margin-bottom: 5px;">
                                                {{ $downloadCounts[$discountProduct->id] ?? 0 }} Downloads
                                            </div>
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
        @if(!isset($discounts['hideviewall']))
        <div class="row" style="text-align: center;margin-top:10px;">
            <a class="readmore-btn" href="{{ route('front.getCategory') }}" target="">
                <span class="readmore-inner">
                    <span>View All</span>
                </span>
            </a>
        </div>
        @endif
    </div>
</section>
