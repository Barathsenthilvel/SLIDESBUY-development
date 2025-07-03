@if (count($Product)>0)
@foreach ($Product as $product)
@php
    $rev = $product->reviewtotal();
    $star = $rev->reviewtotal/20;
@endphp
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single">
    <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-4 orderimg-wraper">
            <a href="{{route('product.item',[$product->slug])}}"><img
                    src="{{URL::asset('assets/media/products/'.$product->image1)}}" class="img-responsive" style="width: 70px;"
                    alt="slider2"></a>
        </div>
        <div class="mobprqty">
            <div class="col-lg-4 col-md-8 col-sm-8 prdorder-detail prdorder-common">
                <div class="productname">{{$product->product_title}}<br><small>SKU : {{$StoreConfig->productIdprefix}}-{{$product->product_sku}}</small></div>
                <div class="star-rated">
                    <i class=" {{($star >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                    <i class=" {{($star >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                    <i class=" {{($star >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                    <i class=" {{($star >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                    <i class=" {{($star >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-8 col-sm-8 single-price prdorder-common">
                <div class="cartitem-caption">Price</div>
                <div class="cartitem-value">
                    <span><i class="fa fa-inr"></i>{{ ($product->getproductPrice()->isoffer)?$product->getproductPrice()->price:$product->getproductPrice()->price }}</span>
                    <span class="original-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $product->mrp }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group text-right mobcenter">
                <a href="{{route('wishlistremove')}}" data-id="{{$product->id}}"
                    class="transparent-btn wishlistremove"><span>Remove</span></a>
                @if($product->soldout == 'off')
                <a class="savebtn btn-cartvl" data-id={{$product->id}} data-quantity={{$product->minquantity}}
                    href="javascript:void(0);">Move to Cart</a>
                @else
                <a class="savebtn" href="javascript:void(0);">Out of Stock</a>
                @endif
            </div>
        </div>

    </div>
</div>
@endforeach
@else
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single">
    <h2 >Wishlist is empty</h2>
</div>
@endif
