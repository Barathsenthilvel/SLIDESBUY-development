@extends('front.includes.container') 
@section('content')
<style>
    address {
        overflow: auto;
    }
</style>
                            @foreach($similarorder as $Orderlog)
                                <div id="view{{ $Orderlog->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="panel-body table-responsive" style="max-height: 450px;">
                                                <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($Orderlog->orderlog as $key => $item)
                                                        
                                                        <tr>
                                                            <td>{{ $item->Productname->product_title ?? '' }}</td>
                                                            <td>{{$item->commands}}</td>
                                                            <td>{{$item->created_at}}</td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                            <td colspan="2"><div style="text-align: center;">NO Status found</div></td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div id="loadreview" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="panel-body table-responsive" style="max-height: 450px;">
                                                <div class="rating-form" >
                                                    <label for="rating" class="text-dark">Your rating * </label>
                                                    <div class="star-rated" id="star_rating">
                                                        <i data-star=1 class="fa fa-star "></i>
                                                        <i data-star=2 class="fa fa-star "></i>
                                                        <i data-star=3 class="fa fa-star "></i>
                                                        <i data-star=4 class="fa fa-star"></i>
                                                        <i data-star=5 class="fa fa-star"></i>
                                                    </div>
                                            
                                                    <!--<select name="rating" id="rating" required="" style="display: none;">-->
                                                    <!--    <option value="">Rate…</option>-->
                                                    <!--    <option value="5">Perfect</option>-->
                                                    <!--    <option value="4">Good</option>-->
                                                    <!--    <option value="3">Average</option>-->
                                                    <!--    <option value="2">Not that bad</option>-->
                                                    <!--    <option value="1">Very poor</option>-->
                                                    <!--</select>-->
                                                </div>
                                                <form action="" method="post" id="reviewSubmit">
                                                    @csrf
                                                    <textarea id="reply-message" name="command" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required=""></textarea>
                                                    <input type="hidden" name="rating" id="rating" value="5">
                                                    <input type="hidden" name="product_id" id="product_id" value="">
                                                    <button type="submit" class="review-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
<div class="container invoicefull" id="invoice" style="margin-top: 139px;">
    <div class="row">
	<div class="toolbar hidden-print">
	<div class="col-xs-12" style="display: flex;justify-content: space-between;">
	<a href="{{route('order')}}" style="background-color: #e7b360;border-color: #e7b360;" class="btn btn-info btnprint">Back</a>
	<div class="text-right">
            <button id="printInvoice" onclick="window.print()" class="btn btn-info btnprint"><i class="fa fa-print"></i> Print</button>
            <button id="printInvoice" onclick="Download('{{$Store->store_name }}-{{$Store->OrderIDPrefix }}{{sprintf('%03d',$order->id)}}')" class="btn btn-info btnprint"><i class="fa fa-print"></i> Download</button>
            {{-- <button class="btn btn-info btnpdf"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> --}}
     </div>
	</div>
        <hr>
    </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
    		<div class="invoice-title">
				<img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}" class="img-responsive logo-image d-print" alt="logo">
    			<h2>Order Details</h2><h3 class="pull-right">Order ID : {{$Store->OrderIDPrefix }}{{sprintf('%03d',$order->id)}}</h3>
				{{-- <h2 class="pull-right">GST : {{$StoreConfig->GSTIN}}</h2> --}}
    		</div>
    		<hr>
    		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
					<strong>Sold By:</strong>
					<address class="ptage">
						{!!$StoreConfig->store_address!!}<br>
						GSTIN : {{$StoreConfig->GSTIN}}
					</address>
					<address>
                        <strong>Payment Status : </strong>{{$order->payment_status}}<br>
                        <strong>Order Status : </strong>{{$order->orderstatus[0]}}<br>
                        @if($order->track_id && $order->d_s_n && false)
                        <strong>Track Order: </strong><a href="{{$order->d_s_n}}" target="_blank">{{ $order->track_id }}</a><br>
                        @endif
                        <!--<strong style="display: flex;">Order Log&nbsp; :&nbsp;<a href="#" onclick="$('#view').modal('toggle');" class="view" data-toggle="modal"><p>&nbsp;Click here</p></a></strong>-->
                    </address>

				</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right mobleft">
    				<address>
    				<strong>Billed To :</strong><br>
					{{Auth::user()->name}}<br>
					{!! $order->getbillingaddress() !!}<br>
					Phone No : {{Auth::user()->Phone}}<br>
					Email : {{Auth::user()->email}}<br>
    				</address>
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{$order->first_name.' '.$order->last_name}}<br>
                    {{$order->apparment.' '.$order->street}}<br>{{$order->city.', '.$order->state.', '.$order->country}}<br>Pincode : {{$order->post_code}}<br>
                    Phone No : {{$order->phone}}<br>
                    Email : {{$order->email}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				{{-- <address>
    					<strong>INVOICE:{{$Store->OrderIDPrefix }} - {{$order->id}}</strong><br>
    				</address> --}}
					<!--@if($order->track_id && $order->d_s_n && $order->delivery_status == 'Shipped')-->
					<!--	<address>-->
					<!--		<strong>TRACK ORDER :<a href="{{$order->d_s_n}}" target="_blank">{{$order->track_id}}</a></strong><br>-->
					<!--	</address>-->
     <!--               @endif-->
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right mobleft">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date_format($order->created_at,'Y-M-d') }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
		
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order Summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
									<td><strong>Image</strong></td>
        							<td class="text-center"><strong>Item</strong></td>
        							<td class="text-center"><strong>MRP</strong></td>
        							<td class="text-center"><strong>Discounted Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Taxable Amount</strong></td>
        							@if($order->country == 'India' && $order->state == 'Tamil Nadu')
        							<td class="text-center"><strong>SGST</strong></td>
        							<td class="text-center"><strong>CGST</strong></td>
        							@else
        							<td class="text-center"><strong>IGST</strong></td>
        							@endif
        							<td class="text-center"><strong>Final</strong></td>
        							<td class="text-center"><strong>Product Status</strong></td>
        							<td></td>
                                </tr>
    						</thead>
    						<tbody>
                            @foreach($similarorder as $value)
                	            @php
                	                $items = unserialize(bzdecompress(utf8_decode($value->card)));
                	            @endphp
                                @foreach ($items->singleorder as $item)
						        @php
						            $price = $item->getproductPrice();
						        @endphp
    							<tr>
									<td><img src="{{URL::asset('/assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
    								<td class="text-center">{{ $item->product_title }}<br><small>SKU: {{$Store->productIdprefix." ".$item->product_sku }}</small></td>
    								<td class="text-center">{{(isset($item->VendorPrice))?$item->mrp:'---'}}</td>
    								
    								@if($items->storeConfig->include_tax == "Exclusive")
    								<td class="text-center">{{round(((float)$item['total']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}
    								<span data-toggle="tooltip" data-placement="top" title="Discount {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $item->saveings['save_amount'] }}
    								@if($item->discount), Special Discount {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ $price->offer }} @endif 
    								@if($items->CouponClass), Coupon Discount {{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{ round((float)$item['coupon_amount']/$item->quantity,2) }} @endif"> <i class="fa fa-info-circle"></i></span>
    								</td>
    								@else
    								<td class="text-center">{{round(((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}</td>
    								@endif
									<td class="text-center">{{(float)$item->quantity}}</td>
									@if($items->storeConfig->include_tax == "Exclusive")
    								<td class="text-center">{{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
    								@else
    								<td class="text-center">{{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
    								@endif
									@if($order->country == 'India' && $order->state == 'Tamil Nadu')
    								<td class="text-center">{{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
    								<td class="text-center">{{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
    								@else
    								<td class="text-center">{{round((float)$item['producttaaAmount'],2)}} ({{$item['producttax']->tax_rate}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
    								@endif
									@if($items->storeConfig->include_tax == "Exclusive")
    								<td class="text-center">{{round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
    								@else
    									<td class="text-center">{{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
    								@endif
    								<td class="text-center">
    								    @if($value->delivery_status == 'Confirmed' || $value->delivery_status == 'placed')
                                            <div>
                                                <form onsubmit="return Conformation(this,event);" action="{{route('view.CustomerCancelOrderSingle',$value->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="reason" class="reason" value="">
                                                    <input class="dropdown-item" type="submit" value="Cancel Order">
                                                </form>
                                                {{ $value->delivery_status }}
                                            </div>
                                            @elseif($value->delivery_status == 'Shipped')
                                            {{ $value->delivery_status }}
                                            @if($value->track_id && $value->d_s_n)
                                                <p class="orderval">Track : <a href="{{$value->d_s_n}}" target="_blank">{{$value->track_id}}</a></p>
                                                <P class="orderval">Shipped Date : {{  $value->shipped_date}}</P>
                                            @endif
                                        @else
                                            {{ $value->delivery_status }}
                                        @endif
                                        @if($value->delivery_status == 'Delivered')
                                            @if($value->rating == null)
                                            <div>
                                                <input data-url="{{ route('product.review.order',[$value->id]) }}" onclick="loadreview(event)" data-product_id="{{ $item->id }}" data-order='{{ $value->id }}' type="button" value="Review">
                                            </div>
                                            @else
                                            <div class="star-rated">
                                                <i class=" {{($value->rating->rating >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                                            </div>
                                            @endif
                                        @endif
    								</td>
    								<td>
    								    <a href="#" onclick="$('#view{{ $value->id }}').modal('toggle');" ><i class="fa fa-info-circle"></i></a>
    								</td>
    							</tr>
                                @endforeach
                                @endforeach
    					    	
    					        @if($items->CouponClass && false)
    					    	<tr>
    							    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								@if($order->country == 'India' && $order->state == 'Tamil Nadu')
									<td class="no-line"></td>
									@endif
									<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<!--<td class="no-line"></td>-->
    								<td class="no-line text-center"><strong>(-) Coupon</strong></td>
    								<td class="no-line text-right">{{$items->coupen}}</td>
    							</tr>
    							@endif
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile-leftwraper cartfull mobpad0" style="padding: 0;">
                @if(count($similarorder) > 0 && false)
                
                <div class="panel panel-default">
                    <div class="panel-heading">
        	            <h3 class="panel-title"><strong>Other items in this order</strong></h3>
        	        </div>
        	        <div class="panel-body">
        	            @foreach($similarorder as $value)
        	            @php
        	                $items = unserialize(bzdecompress(utf8_decode($value->card)));
        	            @endphp
                            @foreach ($items->singleorder as $key=>$item)
                                <div class="row mobmar0">
                                    <div class="col-lg-2 col-md-2 col-sm-2 prdorder-common prdmobname">
                                        <a href="{{route('product.item',['slug'=>$item->slug])}}"><img class="img-responsive" alt="slider2" style="width: 50px;" src="{{asset('assets/media/products/'.$item->image1)}}" ></a>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-10 prdorder-common prdmobname">
                                            <a href="{{route('product.item',['slug'=>$item->slug])}}"><div class="productname">{{$item->product_title}}</div></a>
                                            <!--<div class="productcode">({{($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive'}} of Tax {{($item->getproductPrice()->tax->tax_type == 1)?$item->getproductPrice()->tax->tax_rate.' %':'Rs/ '.$item->getproductPrice()->tax->tax_rate}})</div>-->
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 single-price prdorder-common">
                                            <div class="cartitem-caption">Taxable Amount</div>
                                            <div class="cartitem-value">
                                                @if($items->storeConfig->include_tax == "Exclusive")
                								    <!--<td class="text-center">{{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>-->
                								    <span class="actual-price"><i class="fa fa-inr"></i> {{round((float)$item['total']-(float)$item['coupon_amount'],2)}} </span><br/>
                								@else
                								    <span class="actual-price"><i class="fa fa-inr"></i>{{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</span><br/>
                								    <!--<td class="text-center">{{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>-->
                								@endif
                								<samll style="font-size: 10px;">{{(float)$item->quantity}} Quantity</samll>
                                            </div>
                                        </div>
                                    <div class="col-lg-1 col-md-1 col-sm-2 quantity-wraper prdorder-common">
                                        <div class="cartitem-caption">Tax</div>
                                        <div class="cartitem-value">
                                            {{round((float)$item['producttaaAmount'],2)}}
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-md-2 col-sm-4 col-xs-12 singletotal-price prdorder-common carttot">
                                        <div class="cartitem-caption">Final</div>
                                        <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 singletotal-price prdorder-common carttot">
                                        <a href="{{route('vieworder',[$value->id])}}" style="font-size: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                        </div>
        	        </div>
                @endif
                </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper mobpricedet" id="summartprint" style="padding-right: 0;">
                <div class="panel panel-default">
                    <div class="panel-heading">
        	            <h3 class="panel-title"><strong>Price Summary</strong></h3>
        	        </div>
        	        <div class="">
        	            <div class="profileright-inner" style="min-height : unset">
                            <div class="priceinfo-wraper">
                                <div class="row priceinfo-title">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Total MRP</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$items->totalmrp}}</span></div>
                                </div>
                            </div>
            				<div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">(-) Discount</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$items->discountmrp }}</span></div>
                                </div>
                            </div>
                            @if($items->specialdiscount > 0)
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">(-) Special Discount</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$items->specialdiscount}}</span></div>
                                </div>
                            </div>
                            @endif
                            @if($items->CouponClass)
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">(-) Coupon</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    <div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i>{{$items->coupen}}</span></div>
                                </div>
                            </div>
                            @endif
                            
            			    <div class="row priceinfo-title">
            				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Subtotal 
            						<!--<br><small>({{ ($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive' }} of tax)</small>-->
            					</div>
            					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
            						<div class="cartitem-value"><span><i class="fa fa-inr"></i>{{($StoreConfig->include_tax == 'Exclusive')?$items->totalPrice:$items->totalPrice - $items->tax}}</span></div>
                                        <!--{{$items->tax}}-->
            					</div>
            				</div>
                            @if($StoreConfig->include_tax != 'Inclusive')
            				<div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
            					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">(+) Tax</div>
            					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
            						<div class="cartitem-value" style="font-weight: 400;"><span><i class="fa fa-inr"></i> {{$items->tax}}</span></div>
            					</div>
            				</div>
                            @endif
            				
                            <div class="row priceinfo-title" style="font-weight: 400;border-bottom:unset">
                                @if($items->deliverycharge != null )
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">(+) Delivery Charges</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    @if($items->deliverycharge == 0)
                                        <div class="cartitem-value" style="font-weight: 400;"><span>Free Delivery</span></div>
                                    @else
                                        <div class="cartitem-value" style="font-weight: 400;"><span>{{$items->deliverycharge}}</span></div>
                                    @endif
                                </div>
                                @endif
                            </div>
            				<div class="row">
            				    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">Total</div>
            					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-right">
            				        <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$items->grandTotal}}</span></div>
            					</div>
            				</div>
                            </div>
                        </div>   
        	        </div>
        	   </div>
            </div>
            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        body * {
    	visibility: hidden;
  	}
	.invoicefull, .invoicefull * {
		visibility: visible;
	}
	a[href]:after {
    content: none !important;
  }
  .d-print{
	display: block !important;
}
}
.d-print{
	display: none;
}
.ptage p{
	margin-bottom: 0px !important;
}
#invoice{
     break-inside: avoid;
}
</style>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
     function Download(FileNAme){
         const Element = document.getElementById('invoice');
         const element = Element.cloneNode(true);
         var opt = {
          filename:     `${FileNAme}.pdf`,
          jsPDF:        { format: 'a4', orientation: 'p' }
        //   pagebreak: { mode: 'avoid-all', before: '#page2el' }
        };
        
        // New Promise-based usage:
        // html2pdf().set(opt).from(element).save();
        element.style.width = '700px';
        element.querySelector('[id=summartprint]').style.width = '320px';
        html2pdf(element, opt);
     }
@if(isset($deleted))
toastr["success"]('Order Updated');
@endif
function loadreview(event){
    document.getElementById('product_id').value = event.target.dataset.product_id
    reviewSubmit.action = event.target.dataset.url
    $('#loadreview').modal('toggle');
}
function Conformation(is,event){
    event.preventDefault();
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "reason");

    bootbox.prompt({title:"Confirmation to cancel order !", inputType:'textarea',message:'Cancel Reason  *',callback : function(result){
        if(result != null && result != ""){
                input.setAttribute("value", result);
            is.appendChild(input);
            is.submit();
            }
        }
    });
}
$('body #star_rating i').click(function(e){
		var star = $(this).data('star');
		$('#rating').val(star);
		$('body #star_rating i').each((i,e) =>{
			if(e.dataset.star <= star){
				e.classList.add("fa-star");
				e.classList.remove("fa-star-o");
			}else{
				e.classList.remove("fa-star");
				e.classList.add("fa-star-o");
			}
		})
    });
$('[data-toggle="tooltip"]').tooltip()
	var opt = {
  margin:       1,
  filename:     'myfile.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
};
    function generatePDF() {
        const invoice = document.getElementById('invoice');
        html2pdf().set(opt).from(invoice).save();
    }
</script>
@endpush