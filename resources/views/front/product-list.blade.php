@php  $array = []; @endphp
@if (Auth::check())
    @php
        $array = \explode(',',Auth::user()->wishlist);
    @endphp
@endif
<div class="prolistview">
@forelse($products as $discountProduct)
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
    <div class="prd-inner">
        <div class="prd-img" role="listbox">
            <a href="{{route('product.item',['slug'=>$discountProduct->slug])}}">
                <img src="{{URL::asset('/assets/media/products/'.$discountProduct->image1)}}"
                class="img-responsive center-block prdimg" title="California Almonds" alt="California Almonds" /></a>
        </div>
        <div class="prdbtn-wraper">
            <ul class="list-inline">
                <li> <a href="" data-id="{{$discountProduct->id}}" data-q="{{$discountProduct->minquantity}}"
                        class="cart-btn common-btn btn-cart2 {{($discountProduct->soldout != 'off')?'p-e-none':''}}">{{($discountProduct->soldout != 'off')?'soldout':'Add to Cart'}}</a></li>
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
                @if(false)
                <span class="offer-percent">
                    (@if(!empty($data->discount)){{$data->discount->number}}{{($data->discount->type == '%')?'%':'Rs'}} OFF @endif
                     @if(!empty($data->CustomerGroup) && $data->CustomerGroup->amount != 0) @if(!empty($data->discount)) & @endif {{$data->CustomerGroup->amount}}{{($data->CustomerGroup->type == 1)?'%':'Rs'}} OFF  @endif )
                </span>
                @endif
                @if(true)
                <span class="offer-percent">
                    You save {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $discountProduct->mrp - $data->price }}
                </span>
                @endif
                
            </div>
        </div>
    </div>
</div>
@empty
<h2 style="
    text-align: center;
    /* margin: 96px; */
    margin-top: 40px;
">No Product found</h2>
@endforelse
</div>
{!! $products->links() !!}
