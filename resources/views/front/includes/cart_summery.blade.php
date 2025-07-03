<div class="priceinfo-wraper">
    <div class="priceinfo-title" style="border-bottom:unset">
        Cart Totals
    </div>
    <div class="amountsplit-single">
        <div class="row priceinfo-title">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    Total MRP
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{session()->get('cart')->totalmrp}}</span></div>
                                </div>
                            </div>
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    (-) Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->discountmrp}}</span></div>
                                </div>
                            </div>
                            @if(session()->get('cart')->specialdiscount > 0)
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    (-) Special Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->specialdiscount}}</span></div>
                                </div>
                            </div>
                            @endif
        <div class="row priceinfo-title">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                Subtotal
                <!--<br><small>({{ ($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive' }} of tax)</small>-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{($StoreConfig->include_tax == 'Exclusive')?session()->get('cart')->totalPrice:session()->get('cart')->totalPrice - session()->get('cart')->tax}}</span></div>
                <!--{{session()->get('cart')->tax}}-->
            </div>
        </div>
    </div>
    <!--<div class="totalamt-payable">-->
    <!--<div class="amountsplit-single">-->
    <!--    <div class="row">-->
    <!--        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">-->
    <!--            Total-->
    <!--        </div>-->
    <!--        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">-->
    <!--            <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{($StoreConfig->include_tax != 'Exclusive')?session()->get('cart')->totalPrice:session()->get('cart')->totalPrice + session()->get('cart')->tax}}</span></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--</div>-->
    @if($StoreConfig->include_tax != 'Inclusive')
    
        <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                (+) Tax
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$Cart->tax}}</span></div>
            </div>
        </div>
    
    @endif
    <div class="">
    
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-weight: 400;border-bottom:unset">
                (+) Delivery Charges
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                <div class="cartitem-value" style="font-weight: 400;"><span>{{($Cart->deliverycharge > 0)?$Cart->deliverycharge:'Free Delivery'}}</span></div>
            </div>
        </div>
    
    @if($errors->any())
    <div class="amountsplit-single">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{$errors->first()}}
            </div>
        </div>
    </div>
    @endif
    <div class="amountsplit-single">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if($deliveryCharge->fastdelivery != null)
                <input type="checkbox" name="fast" id="fast" @if($Cart->deliverytype == 1)checked @endif>
                <label for="fast">Fast Delivery <small>({{($deliveryCharge->fastdelivery != null)? $deliveryCharge->fastdelivery->price:0}})</small></label>
                @else
                <label for="fast"><small>No Express Delivery</small></label>
                @endif
            </div>
        </div>
    </div>
    </div>
    <div class="totalamt-payable">
        <div class="amountsplit-single">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    Total
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                    <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$Cart->grandTotal}}</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper">
        <a class="placeorder-btn btn-block final" href="{{route('view.checkout')}}">Proceed to Checkout</a>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper">
        
    </div>
</div>