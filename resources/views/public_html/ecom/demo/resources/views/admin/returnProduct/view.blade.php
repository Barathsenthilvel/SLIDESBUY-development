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
                            <span class="opacity-70">SKR{{ $id->id }}</span>
                            @php
                            $date = new DateTime($id->Return_Date);
                            @endphp
                            <span class="opacity-70">{{ date_format($date,'Y-M-d') }}</span>
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
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Item</th>
                                    <td class="pl-0 font-weight-bold text-muted text-uppercase"><strong>Price</strong></td>
        							<th class="pl-0 font-weight-bold text-muted text-uppercase">Discounted Price</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">SGST</th>
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">CGST</th>
                                    @else
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">IGST</th>
                                    @endif
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($ReturnProductItem as $item)
                                @php
                                    $product = unserialize(bzdecompress(utf8_decode($item->productobj)));
                                    if($item->Return_Status == 'Return Accepted'){
                                                                                if($Store->include_tax == 'Exclusive'){
                                            $Price = $product->total/$product->quantity;
                                            $total += round(($product->total/$product->quantity) + ($product->producttaaAmount/$product->quantity),2);
                                        }else{
                                            $Price = ($product->total/$product->quantity) - ($product->producttaaAmount/$product->quantity);
                                            $total +=  round($product->total/$product->quantity,2);
                                        }
                                    }else{
                                        continue;
                                    }
                                @endphp
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="pl-0 pt-7 text-left"><img src="{{URL::asset('/assets/media/products/'.$product->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
                                    <td class="pl-0 pt-7 text-left">{{$item->Product}}</td>
                                    <td class="pl-0 pt-7 text-left">{{$product->VendorPrice}}</td>
    								<td class="pl-0 pt-7 text-left">{{$Price}}</td>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="pl-0 pt-7 text-left">{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                    <td class="pl-0 pt-7 text-left">{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                    @else
                                    <td class="pl-0 pt-7 text-left">{{round($product->producttaaAmount/$product->quantity,2)}}</td>
                                    @endif
                                    <td class="pl-0 pt-7 text-left">{{$item->Total}}</td>
                                </tr>
                                @endforeach
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="pl-0 pt-7 text-left"></td>
                                    <td class="pl-0 pt-7 text-left"></td>
                                    <td class="pl-0 pt-7 text-left"></td>
                                    <td class="pl-0 pt-7 text-left"></td>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="pl-0 pt-7 text-left"></td>
                                    <td class="pl-0 pt-7 text-left"></td>
                                    @else
                                    <td class="pl-0 pt-7 text-left"></td>
                                    @endif
                                    <td class="pl-0 pt-7 text-left">Others {{((float)($id->others)) }}</td>
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
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{ $total + ((float)($id->others)) }}</span>
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
