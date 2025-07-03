@extends('layout.admin') 

@section('content')  
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
                            <span class="opacity-70">{{$items->storeConfig->OrderIDPrefix}}{{sprintf('%03d',$order->id )}}</span>
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
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Image</th>
                                    <th class="pl-1 font-weight-bold text-muted text-uppercase">Description</th>
                                    <th class="pr-0 font-weight-bold text-muted text-uppercase">Price</th>
                                    <th class="pr-0 font-weight-bold text-muted text-uppercase">Discount Price</th>
                                    <th class="pr-0 font-weight-bold text-muted text-uppercase">Quantity</th>
                                    <th class="pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
        							<td class="pr-0 font-weight-bold text-muted text-uppercase"><strong>SGST</strong></td>
        							<td class="pr-0 font-weight-bold text-muted text-uppercase"><strong>CGST</strong></td>
        							@else
        							<td class="pr-0 font-weight-bold text-muted text-uppercase"><strong>IGST</strong></td>
        							@endif
                                    <!--<th class="pl-0 font-weight-bold text-muted text-uppercase">Tax Amount</th>-->
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase text-right">Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items->items as $item)
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="pl-0 pt-7 text-left"><img src="{{URL::asset('/assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
                                    <td class="pl-1 pt-7 text-left">{{ $item->product_title }} <br><small>({{($items->storeConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive'}}} of Tax {{($item->producttax->tax_type == 1)?$item->producttax->tax_rate.' %':'Rs/ '.$item->producttax->tax_rate}}) </small></td>
                                    <td class="pl-0 pt-7 text-left">{{(isset($item->VendorPrice))?$item->VendorPrice:'---'}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-0 pt-7 text-left">{{round((int)$item['total']/(int)$item->quantity,2)}}</td>
                                    @else
                                    <td class="pl-0 pt-7 text-left">{{round(((int)$item['total']- (float)$item['producttaaAmount'])/(int)$item->quantity,2)}}</td>
                                    @endif
                                    <td class="pl-0 pt-7 text-left">{{$item->quantity}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-0 pt-7 text-left">{{round((int)$item['total'],2)}}</td>
                                    @else
                                    <td class="pl-0 pt-7 text-left">{{round(((int)$item['total']- (float)$item['producttaaAmount']),2)}}</td>
                                    @endif
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="pl-1 pt-7 text-left">{{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    <td class="pl-1 pt-7 text-left">{{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @else
                                    <td class="pl-1 pt-7 text-left">{{round((float)$item['producttaaAmount'],2)}} ({{$item['producttax']->tax_rate}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @endif
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="pl-1 pt-7 text-left">{{(int)$item['total']+(float)$item['producttaaAmount']}}</td>
                                    @else
                                    <td class="text-danger pr-0 pt-7 text-right">{{(int)$item['total']}}</td>
                                    @endif
                                    
                                </tr>
                                @endforeach
                                <!--@if($items->storeConfig->include_tax == 'Exclusive')-->
                                <!--<tr class="font-weight-boldest font-size-lg">-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td></td>-->
                                <!--    <td class="text-right pt-7">(+) Tax</td>-->
                                <!--    <td class="text-danger pr-0 pt-7 text-right">{{$items->tax}}</td>-->
                                <!--</tr>-->
                                <!--@endif-->
                                @if($items->CouponClass)
                                <tr class="font-weight-boldest font-size-lg">
                                    <td></td>
                                    <td></td>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td></td>
                                    @endif
                                    <!--<td></td>-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right pt-7">(-) Coupon</td>
                                    <td class="text-danger pr-0 pt-7 text-right">{{$items->coupen}}</td>
                                </tr>
                                @endif
                                
                                <tr class="font-weight-boldest font-size-lg">
                                    <td></td>
                                    <td></td>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td></td>
                                    @endif
                                    <!--<td></td>-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right pt-7">(+) Delivery Charges</td>
                                    <td class="text-danger pr-0 pt-7 text-right">{{$items->deliverycharge}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
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
                        <div class="d-flex flex-column text-md-right">
                            <span class="font-size-lg font-weight-bolder mb-1">Total</span>
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{ $items->grandTotal }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
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
     
 @endpush   
