@extends('layout.admin') 

@section('content')  
<style>
    span.text-right.pt-7 {
    font-size: 14px;
    font-weight: 600;
}
span.text-right.pt-7 {
    font-size: 14px;
    font-weight: 600;
}
span.text-danger.pr-0.pt-7.text-right {
    font-size: 14px;
    font-weight: 700;
}
.fa-star-o:before {
    content: "\f006";
}
.star-rated{
    padding: 5px;
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
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- begin::Card-->
    <div class="card card-custom overflow-hidden" id="section-to-print">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{ URL::asset('assets/media/bg/demo-7.jpg') }});">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 text-white font-weight-boldest mb-10">INVOICE</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5">
                                <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}" style="max-width: 180px"/>
                            </a>
                            <!--end::Logo-->
                            <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                <span>{!!$Store->location_address!!}GST : {!!$Store->GSTIN!!}</span>
                            </span>
                        </div>
                    </div>
                    <div class="border-bottom w-100 opacity-20"></div>
                    <div class="d-flex justify-content-between text-white pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r">INVOICE</span>
                            <span class="opacity-70">{{$items->storeConfig->OrderIDPrefix}}{{sprintf('%03d',$order->map_id )}}</span>
                            <span class="opacity-70">{{ date_format($order->created_at,'Y-M-d') }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">BILLING TO</span>
                            <span class="opacity-70">
                                @isset($user)
                                	{{$user->name}}<br>
            					Phone No : {{$user->Phone}}<br>
            					Email : {{$user->email}}<br>
            					@endisset
            					<strong>Order Status : </strong>{{$order->orderstatus[0]}}<br>
                                        </span>
                                        
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">SHIPPING ADDRESS</span>
                            <span class="opacity-70">
                                {{$order->first_name.' '.$order->last_name}}<br>
                                {{$order->apparment.' '.$order->street}}<br>{{$order->city.', '.$order->state.', '.$order->country}}<br>Pincode : {{$order->post_code}}<br>
                                Phone No : {{$order->phone}}<br>
                                Email : {{$order->email}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->
            <!-- begin: Invoice body-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-11">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted text-center text-uppercase">Image</th>
                                    <th class="pl-1 font-weight-bold text-muted text-center text-uppercase">Description</th>
                                    <th class="pr-0 font-weight-bold text-muted text-center text-uppercase">MRP</th>
                                    <th class="pr-0 font-weight-bold text-muted text-center text-uppercase">Discount Price</th>
                                    <th class="pr-0 font-weight-bold text-muted text-center text-uppercase">Quantity</th>
                                    <th class="pr-0 font-weight-bold text-muted text-center text-uppercase">Taxable Amount</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
        							<td class="pr-0 font-weight-bold text-muted text-center text-uppercase"><strong>SGST</strong></td>
        							<td class="pr-0 font-weight-bold text-muted text-center text-uppercase"><strong>CGST</strong></td>
        							@else
        							<td class="pr-0 font-weight-bold text-muted text-center text-uppercase"><strong>IGST</strong></td>
        							@endif
                                    <!--<th class="pl-0 font-weight-bold text-muted text-uppercase">Tax Amount</th>-->
                                    <th class="pl-0 font-weight-bold text-muted text-center text-uppercase text-right">Final</th>
                                    <th class="pl-0 font-weight-bold text-muted text-center text-uppercase text-right">Product Status</th>
                                    <th class="pl-0 font-weight-bold text-muted text-center text-uppercase text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($similarorder as $value)
                    	            @php
                    	                $items = unserialize(bzdecompress(utf8_decode($value->card)));
                    	            @endphp
                                @foreach ($items->singleorder as $item)
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="pl-0 pt-7 text-center"><img src="{{URL::asset('/assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
                                    <td class="pl-1 pt-7 text-center" style="width: 150px;">{{ $item->product_title }} <br><small>{{ ($item->vendor)?$item->vendorObject->name:'Admin' }}</small></td>
                                    <td class="pl-0 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}}{{(isset($item->mrp))?$item->mrp:'---'}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-0 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round(((float)$item['total']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}</td>
                                    @else
                                    <td class="pl-0 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round(((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}</td>
                                    @endif
                                    <td class="pl-0 pt-7 text-center">{{$item->quantity}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-0 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
                                    @else
                                    <td class="pl-0 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
                                    @endif
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="pl-1 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    <td class="pl-1 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @else
                                    <td class="pl-1 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount'],2)}} ({{$item['producttax']->tax_rate}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @endif
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-1 pt-7 text-center">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
                                    @else
                                    <td class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
                                    @endif
                                    <td class="text-danger pr-0 pt-7 text-right">
                                        <select class="form-control form-control-sm form-filter datatable-input orderstatus" style="width : 150px">
                                            <!--<option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'fail']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'fail']) }}' value='fail' {{ $value->delivery_status == 'fail'?'selected':'' }}>fail</option>-->
                                            <option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'Confirmed']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'Confirmed']) }}' value='Confirmed' {{ $value->delivery_status == 'Confirmed'?'selected':'' }}>Confirmed</option>
                                            <option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'placed']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'placed']) }}' value='placed' {{ $value->delivery_status == 'placed'?'selected':'' }}>placed</option>
                                            <option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'Shipped']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'Shipped']) }}' value='Shipped' {{ $value->delivery_status == 'Shipped'?'selected':'' }}>Shipped</option>
                                            <option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'Delivered']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'Delivered']) }}' value='Delivered' {{ $value->delivery_status == 'Delivered'?'selected':'' }}>Delivered</option>
                                            <option data-shipping='{{ route('admin-shipping-node',['id'=>$value->id,'model'=>'Canceled']) }}' data-link='{{ route('admin-order-status1',['id1'=>$value->id,'id2'=>'Canceled']) }}' value='Canceled' {{ $value->delivery_status == 'Canceled'?'selected':'' }}>Canceled</option>
                                        </select>
                                        @if($value->rating && false)
                                        <div class="star-rated">
                                                <i class=" {{($value->rating->rating >= 1)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 2)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 3)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 4)?'fa fa-star':'fa fa-star-o'}}"></i>
                                                <i class=" {{($value->rating->rating >= 5)?'fa fa-star':'fa fa-star-o'}}"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="pl-1 pt-7 text-center">
    								    <a href="#" onclick="$('#view{{ $value->id }}').modal('toggle');" ><i class="fa fa-info-circle"></i></a>
    								</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(auth()->user()->is_vendor == null )
                <div class="col-md-11"><hr/></div>
                <div class="col-md-11" style="margin-top: 25px;">
                    <div class="row">
                        <div class="col-md-9">
                        @if(false)
                            <div class="row">
                                <div class="col-md-12" style="padding: 10px;text-align: center;">
                                    <div class="panel-heading">
            	                        <h4 class="panel-title"><strong>Other items in this order</strong></h4>
            	                    </div>
        	                    </div>
                            </div>
                            @if(count($similarorder) > 0)
                                @foreach($similarorder as $value)
                    	            @php
                    	                $items = unserialize(bzdecompress(utf8_decode($value->card)));
                    	            @endphp
                                    @foreach ($items->singleorder as $key=>$item)
                                    <div class="row">
                                        <div class="col-md-2 d-flex flex-row mb-10 mb-md-0" style="justify-content: center;align-items: center;">
                                            <img src="{{URL::asset('/assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;">
                                        </div>
                                        <div class="col-md-2 d-flex flex-row mb-10 mb-md-0" style="justify-content: center;align-items: center;">{{$item->product_title}}</div>
                                        <div class="col-md-2 d-flex flex-column mb-10 mb-md-0" style="justify-content: center;align-items: center;">
                                            <div style="text-align: center;">Taxable Amount</div>
                                            <div style="text-align: center;font-weight: 700;">
                                                @if($items->storeConfig->include_tax == "Exclusive")
                    								{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['coupon_amount'],2)}}
                    							@else
                    								{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}
                    							@endif
                							</div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-row mb-10 mb-md-0" style="justify-content: center;font-weight: 700;align-items: center;">{{(float)$item->quantity}} Quantity</div>
                                        <div class="col-md-1 d-flex flex-column mb-10 mb-md-0" style="justify-content: center;align-items: center;"><div style="text-align: center;">Tax</div> <div style="text-align: center;font-weight: 700;">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount'],2)}}</div></div>
                                        <div class="col-md-2 d-flex flex-column mb-10 mb-md-0" style="justify-content: center;align-items: center;"><div style="text-align: center;">Final</div><div style="text-align: center;font-weight: 700;">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</div></div>
                                        <div class="col-md-1 d-flex flex-row mb-10 mb-md-0" style="justify-content: center;align-items: center;"><a href="{{route('admin-order-view',[$value->id])}}" style="font-size: 25px;"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                    </div>
                                    @endforeach
                                @endforeach
                            @endif
                        @endif
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12" style="padding: 10px;text-align: center;">
                                    <div class="panel-heading">
            	                        <h4 class="panel-title"><strong>Price Summary</strong></h4>
            	                    </div>
        	                    </div>
                            </div>
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7" style="font-weight: 700;">Total MRP</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->totalmrp}}</span>
                            </div>
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7">(-) Discount</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->discountmrp }}</span>
                            </div>
                            @if($items->specialdiscount > 0)
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7">(-) Special Discount</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->specialdiscount}}</span>
                            </div>
                            @endif
                            @if($items->CouponClass)
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7">(-) Discount</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->coupen }}</span>
                            </div>
                            @endif
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7" style="font-weight: 700;">Subtotal</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->totalPrice}}</span>
                            </div>
                            @if($StoreConfig->include_tax != 'Inclusive')
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7">(+) Tax</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->tax }}</span>
                            </div>
                            @endif
                            @if($items->deliverycharge != null )
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7">(+) Delivery Charges</span>
                                @if($items->deliverycharge == 0)
                                <span class="text-danger pr-0 pt-7 text-right">Free Delivery</span>
                                @else
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->deliverycharge}}</span>
                                @endif
                            </div>
                            @endif
                            <div class="d-flex flex-row mb-10 mb-md-0" style="justify-content: space-between;">
                                <span class="text-right pt-7" style="font-weight: 700;">Total</span>
                                <span class="text-danger pr-0 pt-7 text-right">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->grandTotal }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- end: Invoice body-->
            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                        <div class="d-flex flex-column mb-10 mb-md-0">
                            {{-- <div class="font-weight-bolder font-size-lg mb-3">BANK TRANSFER</div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Account Name:</span>
                                <span class="text-right">Barclays UK</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Account Number:</span>
                                <span class="text-right">1234567890934</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="mr-15 font-weight-bold">Track ID:</span>
                                <span class="text-right">{{ $order->track_id }}</span>
                            </div> --}}
                        </div>
                        <!--<div class="d-flex flex-column text-md-right">-->
                        <!--    <span class="font-size-lg font-weight-bolder mb-1">Total</span>-->
                        <!--    <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{ $items->grandTotal }}</span>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="Download('{{$items->storeConfig->store_name}}-{{$items->storeConfig->OrderIDPrefix}}{{sprintf('%03d',$order->map_id )}}')">Download Invoice</button>
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!-- end: Invoice-->
        </div>
    </div>
    <!-- end::Card-->
</div>
<style>
    @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    left: 0;
    top: 0;
  }
}
</style>
 @endsection   
 @push('script')       
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
     function Download(FileNAme){
         const element = document.getElementById('section-to-print')
         var opt = {
          filename:     `${FileNAme}.pdf`
        //   pagebreak: { mode: 'avoid-all', before: '#page2el' }
        };
        
        // New Promise-based usage:
        // html2pdf().set(opt).from(element).save();
        html2pdf(element, opt);
     }
     
     
     
     
     
     
     
     $(".orderstatus").select2({
        width: 'resolve' // need to override the changed default
    });
         $(document).on('change','.orderstatus',function () {

        var data = $(this).val();
        var link = $(this).find(':selected').attr('data-link');
        if(data == "Shipped" || data == 'Returned'){
            $("#exampleModal .modal-body").load($(this).find(':selected').attr('data-shipping'));
            $('#exampleModal').modal('show');
        }
        if(data == 0)
        {
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-success").addClass("drop-danger");
        }
        else{
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-danger").addClass("drop-success");
        }
        $.get(link);
        $.notify("Status Updated Successfully.","success");
      });

$('body').submit('#model',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    const url = e.target.action;
    $.ajax({
        method:"POST",
        url:url,
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            if(data.msg){
            $('#exampleModal').modal('hide');
            $.notify(data.msg,"success");
            }
        },
        error:function(erroe){
            console.log(erroe);
            window.scrollTo({top:0,behavior:'smooth'});
            alert("Something is wrong");
        }
    });
});
     </script>
 @endpush   
