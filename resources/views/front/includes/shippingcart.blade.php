@if (session()->has('cart'))
    @if(count(session()->get('cart')->items) <= 0)
        <script>
            window.location.href = "{{URL::to('/')}}"
        </script>
    @endif
@else
    <script>
        window.location.href = "{{URL::to('/')}}"
    </script>
@endif
@foreach (session()->get('cart')->items as $key=>$item)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single mobpad0">
    <div class="row mobmar0">
        <div class="col-lg-2 col-md-2 col-sm-2 orderimg-wraper">
            <a href="{{route('product.item',['slug'=>$item->slug])}}"><img src="{{asset('assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2"></a>
        </div>
        <div class="mobprqty">
            <div class="col-lg-4 col-md-4 col-sm-10 prdorder-detail prdorder-common prdmobname">
                <a href="{{route('product.item',['slug'=>$item->slug])}}"><div class="productname">{{$item->product_title}}</div></a>
                <div class="productcode">({{($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive'}} of Tax {{($item->getproductPrice()->tax->tax_type == 1)?$item->getproductPrice()->tax->tax_rate.' %':'Rs/ '.$item->getproductPrice()->tax->tax_rate}})</div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 single-price prdorder-common">
                <div class="cartitem-caption">Price</div>
                <div class="cartitem-value">
                    <span class="actual-price"><i class="fa fa-inr"></i> {{$item->getproductPrice()->price}}</span><br/>
                    <span class="original-price">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $item->mrp }}</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 quantity-wraper prdorder-common">
                <div class="cartitem-caption">Quantity</div>
                <div class="quantity">
                    <div class="quantity-button quantity-down">
                        -
                    </div><input id="prices1" pid="{{$item->id}}" max='{{$item->Maxquantity}}' min="{{$item->minquantity}}" onblur="checkminqty()" onchange=""
                        onkeypress="return validateQty(event);" onmousemove="" step="{{$item->minquantity}}"
                        type="number" value="{{(int)$item->quantity}}" readonly>
                    <div class="quantity-button quantity-up">
                        +
                    </div>
                </div>
            </div>
        </div>
        <div
            class="col-lg-2 col-md-2 col-sm-4 col-xs-12 singletotal-price prdorder-common carttot">
            <div class="cartitem-caption">Total</div>
            <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$item->total}}</span>
            </div>
        </div>
        <div class="removeitem-wraper mobremove">
            <a href="" data-id="{{$item->id}}" class="product-remove"><span class="fa fa-trash deskhide"></span></a>
        </div>
    </div>
</div>
@endforeach
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper text-right contibtn">
    <a class="transparent-btn mobhide" href="{{route('front.getCategory')}}">continue shopping</a>
    <a class="placeorder-btn" href="{{(Auth::check())?route('view.deliveryaddress'):route('front.loginBlade')}}">Place Order</a>
</div>
@foreach (session()->get('cart')->SoldoutItems as $key=>$item)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single mobpad0">
    <div class="row mobmar0">
        <div class="col-lg-2 col-md-2 col-sm-2 orderimg-wraper">
            <a href="#"><img src="{{asset('assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2"></a>
        </div>
        <div class="mobprqty">
            <div class="col-lg-4 col-md-4 col-sm-10 prdorder-detail prdorder-common prdmobname">
                <a href="#"><div class="productname">{{$item->product_title}}</div></a>
                <div class="productcode">({{($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive'}} of Tax {{($item->getproductPrice()->tax->tax_type == 1)?$item->getproductPrice()->tax->tax_rate.' %':'Rs/ '.$item->getproductPrice()->tax->tax_rate}})</div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 single-price prdorder-common">
                <div class="cartitem-caption">Price</div>
                <div class="cartitem-value"><span><i class="fa fa-inr"></i> {{($item->getproductPrice()->isoffer)?$item->getproductPrice()->offer:$item->getproductPrice()->price}}</span>
            </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 quantity-wraper prdorder-common">
                <div class="cartitem-caption">Quantity</div>
                <div class="quantity">
                    {{-- <div class="quantity-button quantity-down">
                        -
                    </div> --}}
                    <input id="prices1" pid="{{$item->id}}" max='{{$item->Maxquantity}}' min="{{$item->minquantity}}" onblur="checkminqty()" onchange=""
                        onkeypress="return validateQty(event);" onmousemove="" step="{{$item->minquantity}}"
                        type="number" value="{{(int)$item->quantity}}">
                    {{-- <div class="quantity-button quantity-up">
                        +
                    </div> --}}
                </div>
            </div>
        </div>
        <div
            class="col-lg-2 col-md-2 col-sm-4 col-xs-12 singletotal-price prdorder-common carttot">
            <div class="cartitem-caption"></div>
            <div class="cartitem-value"><span>Sold Out</span>
            </div>
        </div>
        {{-- <div class="removeitem-wraper mobremove">
            <a href="" data-id="{{$item->id}}" class="product-remove"><span class="fa fa-trash deskhide"></span><span
                    class="remove-item mobhide"> × </span></a>
        </div> --}}
    </div>
    <div class="row mobmar0"></div>
</div>
@endforeach
