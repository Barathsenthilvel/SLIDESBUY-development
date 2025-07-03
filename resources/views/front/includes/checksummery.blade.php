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
                            <div class="row priceinfo-title" style="border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="font-weight: 400;">
                                    (-) Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->discountmrp}}</span></div>
                                </div>
                            </div>
                            @if(session()->get('cart')->specialdiscount > 0)
                            <div class="row priceinfo-title" style="border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="font-weight: 400;">
                                    (-) Special Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->specialdiscount}}</span></div>
                                </div>
                            </div>
                            @endif
                            @if($Cart->CouponClass)
        
        <div class="row priceinfo-title" style="border-bottom:unset">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-weight: 400;">
                (-) Coupon
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$Cart->coupen}}</span></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <a onclick="removecoupon(event)" href="#">Remove Coupon</a>
            </div>
        </div>
    @else
    
            <div class="row priceinfo-title" style="border-bottom:unset">
						<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
						<!--	<a class="addcoupon" id="addnewcoupon" href="javascript:void(0);"><span>Add Coupon</span></a>-->
					 <!--  </div>-->

						  <form action="{{ route('user.applycoupon') }}" id="couponform" method="POST" onsubmit="applycoupon(event);">

                    @csrf
						<div class="">
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p style="color: #560835;">Available Coupons :<a href="#" onclick="$('#view').modal('toggle');" class="view" data-toggle="modal"> Click Here</a></p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">

								<input type="type" class="form-control" placeholder="Coupon Code" value="" required name="code" id="coupon">
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
							    <button class="applybtn" type="submit">Apply</button>
								<!--<a href="javascript:void(0);" class="applybtn" id=""><span>Apply</span></a>-->
							</div>
							</div>
							</div>
						</form>
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
    
        <div class="row priceinfo-title" style="border-bottom:unset">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="font-weight: 400;">
                (+) Tax
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$Cart->tax}}</span></div>
            </div>
        </div>
   
    @endif
    
        <div class="row priceinfo-title" style="border-bottom:unset">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-weight: 400;">
                (+) Delivery Charges
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                <div class="cartitem-value" style="font-weight: 400;"><span>{{($Cart->deliverycharge > 0)?$Cart->deliverycharge:'Free Delivery'}}</span></div>
            </div>
        </div>
   
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="font-weight: 500;">
                    Total
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
                    <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$Cart->grandTotal}}</span></div>
                </div>
            </div>
       

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper" style="display:none">
        <a class="placeorder-btn btn-block final" href="{{route('view.payment')}}">Proceed to Checkout</a>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper">
        <form action="{{route('user.cash')}}" method="post" id="COD" style="display:none">
                                @csrf
                                <input type="submit" value="Cash On Delivery ₹ {{$Cart->grandTotal + $Cart->CODAmount}}"  class="placeorder-btn btn-block">
                            </form>
        <form action="{!!route('user.razorpayReturn')!!}" method="POST" id="upi">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZOR_KEY') }}"
                                        data-order_id="{{ $response->id }}"
                                        data-amount="{{$Cart->grandTotal*100}}"
                                        data-buttontext="Pay ₹ {{$Cart->grandTotal}}"
                                        data-name="{{$Address->name.' '.$Address->last}}"
                                        data-description="Payment with Tuljamart"
                                        data-image="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"
                                        data-prefill.name="{{$Address->name.' '.$Address->last}}"
                                        data-prefill.email="{{$Address->email}}"
                                        data-prefill.contact="{{$Address->phone}}">
                                </script>
                            </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper"></div>
</div>
