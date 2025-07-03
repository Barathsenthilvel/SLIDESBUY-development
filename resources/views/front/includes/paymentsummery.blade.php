<div class="priceinfo-title" style="border-bottom:unset">
								Cart Totals
						</div>
						<div class="row priceinfo-title">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    Total MRP
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{session()->get('cart')->totalmrp}}</span></div>
                                </div>
                            </div>
						<div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                                    (-) Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->discountmrp }}</span></div>
                                </div>
                            </div>
                            @if(session()->get('cart')->specialdiscount > 0)
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                                    (-) Special Discount
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{session()->get('cart')->specialdiscount}}</span></div>
                                </div>
                            </div>
                            @endif
                            @if($Cart->CouponClass)
                                    <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            (-) Coupon
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                            <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$Cart->coupen}}</span></div>
                                        </div>
                                    </div>
                                @endif
						<div class="row priceinfo-title">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								Subtotal 
								<!--<br><small>({{ ($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive' }} of tax)</small>-->
                                        
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
								<div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{($StoreConfig->include_tax == 'Exclusive')?session()->get('cart')->totalPrice:session()->get('cart')->totalPrice - session()->get('cart')->tax}}</span></div>
                                <!--{{session()->get('cart')->tax}}-->
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
								<div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i> {{$Cart->tax}}</span></div>
							</div>
							
						</div>
                        @endif

						        
                                
                                <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                   @if($Cart->deliverycharge != null )
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-weight: 400;border-bottom:unset">
                                        (+) Delivery Charges
                        
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                        <div class="cartitem-value" style="font-weight: 400;"><span>{{($Cart->deliverycharge > 0)?$Cart->deliverycharge:'Free Delivery'}}</span></div>
                                    </div>
                                    @else
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="font-weight: 400;"> Out Of Service </div>
                                    @endif
                                </div>
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
								Total
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
								<div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$Cart->grandTotal}}</span></div>
							</div>
						</div>
						
						
						 <!--<div class="totalamt-payable">-->
       <!--                     <div class="amountsplit-single">-->
       <!--                         <div class="row">-->
       <!--                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
       <!--                                 @if($Address->country_id == 100)-->
       <!--                                 <input type="radio" name="payment" id="CODradio" value="COD" @if($Cart->deliveryextra) checked @endif  onclick='paymenttype(event);'>-->
       <!--                                 <label for="CODradio">Cash On Delivery</label>-->
       <!--                                 @else-->
       <!--                                 <input type="radio" id="CODradio">-->
       <!--                                 <label for="CODradio">Cash On Delivery</label>-->
       <!--                                 <div class="over"></div>-->
       <!--                                 @endif-->
       <!--                             </div>-->
       <!--                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
       <!--                                 <input type="radio" name="payment" id="upiradio" value="upi" @if(!$Cart->deliveryextra) checked @endif onclick='paymenttype(event);'>-->
       <!--                                 <label for="upiradio">Visa / Debit card</label>-->
       <!--                             </div>-->
       <!--                         </div>-->
       <!--                     </div>-->
       <!--                 </div>-->