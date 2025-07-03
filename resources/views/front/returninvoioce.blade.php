@extends('front.includes.container')
@section('content')
<style>
    address {
        overflow: auto;
    }
</style>
<div class="container invoicefull" id="invoice">
    <div class="row">
	<div class="toolbar hidden-print">
	<div class="col-xs-12">
	<a href="{{route('order')}}" class="backbtn">Back</a>
	<div class="text-right">
            <button id="printInvoice" onclick="window.print()" class="btn btn-info btnprint"><i class="fa fa-print"></i> Print</button>
            <button id="printInvoice" onclick="window.print()" class="btn btn-info btnprint"><i class="fa fa-print"></i> Download</button>
            {{-- <button class="btn btn-info btnpdf"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> --}}
     </div>
	</div>
        <hr>
    </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
    		<div class="invoice-title">
				<img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}" class="img-responsive logo-image d-print" alt="logo">
    			<h2>Invoice</h2><h3 class="pull-right">Return Order ID :SKR{{sprintf('%03d',$id->id)}}</h3>
				{{-- <h2 class="pull-right">GST : {{$StoreConfig->GSTIN}}</h2> --}}
    		</div>
    		<hr>
    		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
					<strong>Sold By:</strong>
					<address class="ptage">
						{!!$StoreConfig->store_address!!}<br>
						GSTIN : {{$StoreConfig->GSTIN}}
					</address>

				</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right mobleft">
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
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    				{{-- <address>
    					<strong>INVOICE:{{$Store->OrderIDPrefix }} - {{$order->id}}</strong><br>
    				</address> --}}
					@if($order->track_id && $order->d_s_n && $order->delivery_status == 'Shipped')
						<address>
							<strong>TRACK ORDER :<a href="{{$order->d_s_n}}" target="_blank">{{$order->track_id}}</a></strong><br>
						</address>
                    @endif
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right mobleft">
    				<address>
    					<strong>Return Date:</strong><br>
                        @php
                            $date = new DateTime($id->Return_Date);
                        @endphp
    					{{ date_format($date,'Y-M-d') }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">

    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Return summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>        							
                                    <td class="text-center"><strong>Images</strong></td>
        							<td class="text-center"><strong>Item</strong></td>
        							<td class="text-center"><strong>MRP</strong></td>
        							<th class="text-center">Discounted Price</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <th class="text-center">SGST</th>
                                    <th class="text-center">CGST</th>
                                    @else
                                    <th class="text-center">IGST</th>
                                    @endif
                                    <th class="text-center">Total</th>
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
                                            $total = round(($product->total/$product->quantity) + ($product->producttaaAmount/$product->quantity),2);
                                        }else{
                                            $Price = ($product->total/$product->quantity) - ($product->producttaaAmount/$product->quantity);
                                            $total =  round($product->total/$product->quantity,2);
                                        }
                                    }else{
                                    continue;
                                    }
                                @endphp
    							<tr>
    							    <td class="text-center"><img src="{{URL::asset('/assets/media/products/'.$product->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
									<td class="text-center">{{$item->Product}}</td>
									<td class="text-center">{{$product->mrp}}</td>
    								<td class="text-center">{{$Price}}</td>
    								 @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="text-center">{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                    <td class="text-center">{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                    @else
                                    <td class="text-center">{{round($product->producttaaAmount/$product->quantity,2)}}</td>
                                    @endif
									<td class="text-center">{{$item->Total}}</td>
    							</tr>
                               
                                @endforeach

    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								@if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    @else
                                    <td class="no-line"></td>
                                    @endif
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong> : {{ $total }}</td>
    							</tr>
    						</tbody>
    					</table>
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
</style>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
