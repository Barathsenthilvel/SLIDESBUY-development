
    <div class="row mobmar0">
                                @forelse ( $order as $Order)
                                @php
                                    $updated_at3 = date('y:m:d',strtotime($Order->Deliverydate.'+3 days'));
                                    $cart = unserialize(bzdecompress(utf8_decode($Order->card)));
                                    
                                @endphp
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single ordercon">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordertitle deskhide">
                                    </div>
                                    <div class="row orderrow">
                                        <div
                                            class="col-lg-1 col-md-1 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Order Id</h4>
                                            <h5 class="orderval">{{$Store->OrderIDPrefix }}{{sprintf('%03d',$Order->id)}}</h5>
                                        </div>
                                        <!--<div-->
                                        <!--    class="col-lg-1 col-md-1 col-sm-12 col-xs-12 prdprice-detail prdorder-common">-->
                                            <!--<h4 class="ordertit">Order Id</h4>-->
                                            <!--<h5 class="orderval">{{$Store->OrderIDPrefix }}{{sprintf('%03d',$Order->id)}}</h5>-->
                                        <!--    @if(isset($cart->singleorder[0]))-->
                                        <!--    <img  class="img-responsive" alt="slider2" style="width: 50px;" src="{{URL::asset('/assets/media/products/'.$cart->singleorder[0]->image1)}}">-->
                                        <!--    @endif-->
                                        <!--</div>-->
                                        <div
                                            class="col-lg-2 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Order Date</h4>
                                            <h5 class="orderval">{{ date_format($Order->created_at,'Y-M-d') }}</h5>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Items</h4>
                                            <h5 class="orderval">{{count($cart->items)}} </h5>
                                        </div>
                                        <div
                                            class="col-lg-1 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Amount</h4>
                                            @php
                                                $total = $cart->singleorder[0]['total'] ??0;
                                                $producttaaAmount = $cart->singleorder[0]['producttaaAmount'] ?? 0;
                                            @endphp
                                            <h5 class="orderval">{{ $Order->grandTotal }}</h5>
                                        </div>
                                        <div
                                            class="col-lg-2 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Payment Status</h4>
                                            <h5 class="orderval">{{$Order->payment_status}}</h5>
                                        </div>
                                        <div
                                            class="col-lg-2 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <h4 class="ordertit">Order Status</h4>
                                            <h5 class="orderval">@foreach (get_object_vars($Order->orderstatus[3]) as $property => $value)
                                                                    {{ $property }} : {{ $value }}</br>
                                                                @endforeach</h5>
                                        </div>
                                        
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 prdprice-detail prdorder-common">
                                            <!--<h4 class="ordertit">View: <a href="{{route('vieworder',[$Order->id])}}"> Invoice</a></h4>-->
                                            <div class="dropdown show">
                                              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" style="font-size:18px;" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                              </a>
                                            
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('vieworder',[$Order->id])}}">Order Details</a>
                                                @if($Order->track_id && $Order->d_s_n)
                                                    <!--<h4 class="orderval">Track: <a href="{{$Order->d_s_n}}" target="_blank">{{$Order->track_id}}</a></h4>-->
                                                    <!--<a class="dropdown-item" href="{{$Order->d_s_n}}" target="_blank">Track Order</a>-->
                                                @endif
                                                @if (  $Order->delivery_status == 'Delivered')
                                                    <!--<a href="{{ route('front.return',$Order->id) }}">Return order</a>-->
                                                @endif
                                                @if($Order->orderstatus[2] == 0)
                                                <div>
                                                <form onsubmit="return Conformation(this,event);" action="{{route('view.CustomerCancelOrder',$Order->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="reason" class="reason" value="">
                                                    <input class="dropdown-item" type="submit" value="Cancel Order">
                                                </form>
                                                </div>
                                                @endif
                                                @if($Order->orderstatus[2] == 3 ||  $Order->orderstatus[2] == 2)
                                                    <a class="dropdown-item"  href="{{ route('repeartorder',[$Order->id]) }}">Reorder</a>
                                                @endif
                                              </div>
                                            </div>
                                            <!--@if($Order->track_id && $Order->d_s_n)-->
                                            <!--    <h4 class="orderval">Track: <a href="{{$Order->d_s_n}}" target="_blank">{{$Order->track_id}}</a></h4>-->
                                            <!--@endif-->
                                            <!--@if (  $Order->Deliverydate != null)-->
                                            <!--    <h4 class="orderval"><a href="{{ route('front.return',$Order->id) }}">Return order</a></h4>-->
                                            <!--@endif-->
                                            <!--@if($Order->delivery_status == 'Confirmed' || $Order->delivery_status == 'placed')-->
                                            <!--    <form onsubmit="return Conformation(this,event);" action="{{route('view.CustomerCancelOrder',$Order->id)}}" method="POST">-->
                                            <!--        @csrf-->
                                            <!--        <input type="hidden" name="reason" class="reason" value="">-->
                                            <!--        <input type="submit" value="Cancel Order">-->
                                            <!--    </form>-->
                                            <!--@endif-->
                                        </div>
                                    </div>
                                    @php
                                        $n = 1;
                                        if($Order->delivery_status == 'Confirmed'){$n = 2;}
                                        if($Order->delivery_status == 'Shipped'){$n = 3;}
                                        if($Order->delivery_status == 'Delivered'){$n = 4;}
                                    @endphp
                                    {{-- <article class="card mobhide">
                                        <div class="card-body">
                                            <div class="track " style="{{($Order->delivery_status == 'Canceled' || $Order->delivery_status == 'ReturnedByCustomer')?'display:none;':''}}">
                                                <div class="step active"> <span class="icon"><i class="fa fa-check"></i> </span> <span class="text">Order placed</span></div>
                                                <div class="step {{($n >= 2)?'active':''}}"> <span class="icon"> <i class="{{($n >= 2)?'fa fa-check':''}}"></i> </span> <span class="text">Order Confirmed</span></div>
                                                <div class="step {{($n >= 3)?'active':''}}"> <span class="icon"> <i class="{{($n >= 3)?'fa fa-check':''}}"></i> </span> <span class="text">Shipped</span> </div>
                                                <div class="step {{($n >= 4)?'active':''}}"> <span class="icon"> <i class="{{($n >= 4)?'fa fa-check':''}}"></i> </span> <span class="text">Delivered</span> </div>
                                            </div>
                                        </div>
                                    </article> --}}
                                </div>
                                @empty
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single ordercon" style="text-align: center;">
                                        <h3><span>No order found</span></h3>
                                </div>
                                @endforelse
                                <div style="text-align: center;">
                                        {!! $order->links() !!}
                                </div>
                            </div>