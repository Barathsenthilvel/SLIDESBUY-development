@extends('front.includes.container')
@section('content')


<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">Payment</div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="#">Payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="myorder-section commonaccount-section orderstyle">
    <div class="container">
		<div class="row">
            <div class="col-md-12">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('error') !!}
            </div>
        </div>
      <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile-leftwraper checkfull mobpad0">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
		  <div class="profile-navbar mobhide">
				<ul class="list-inline">
					<li><a href="{{route('view.cart')}}">My Cart</a></li>
					<li><a href="{{route('view.deliveryaddress')}}">Delivery Address</a></li>
					<li><a href="{{(Auth::user()?route('view.checkout'):route('front.loginBlade'))}}">Checkout</a></li>
					<li><a class="active" href="{{ route('view.payment') }}">Payment</a></li>
				</ul>
		</div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cartitem-lits ordersummary-list orderlist-wraper">

                 <div class="row mobrow0">

					<div class="col-lg-12 mx-auto mobpad0">
					<div class="card mobrow0">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3 navmob" style="display: flex;justify-content: space-between;">
                    @if($Address->country_id == 100 && false)
						<label class="container1" for="CODradio">Cash On Delivery + {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }} {{ $Cart->CODAmount}}
						  <input type="radio" name="radio" id="CODradio" value="COD" onchange='paymenttype(event);'>
						  <span class="checkmark"></span>
						</label>
						@endif
						<label class="container1" for="Netbanking">Net Banking
						  <input type="radio" name="radio" id="Netbanking" value="upi" onchange='paymenttype(event);'>
						  <span class="checkmark"></span>
						</label>
						<label class="container1" for="upiradio">Visa / Debit card
						  <input type="radio" name="radio" id="upiradio" value="upi" onchange='paymenttype(event);'>
						  <span class="checkmark"></span>
						</label>
						</ul>
                    </div>
                    <!-- End -->
                    <!-- Credit card form content -->
			</div>
			</div>
		   </div>
		</div>

          </div>
          </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper mobpricedet">
              <div class="profileright-inner">
					<div class="priceinfo-wraper">
                        <div id='checksummery'>
                            @include('front.includes.paymentsummery')
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper">

                            <form action="{{route('user.cash')}}" method="post" id="COD">
                                @csrf
                                <input type="submit" value="Cash On Delivery {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }} {{$Cart->grandTotal + $Cart->CODAmount}}"  class="placeorder-btn btn-block">
                            </form>

                            <form action="{!!route('user.razorpayReturn')!!}" method="POST" id="upi">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZOR_KEY') }}"
                                        data-amount="{{$Cart->grandTotal*100}}"
                                        data-currency="{{ $currentCurrency ? $currentCurrency->currency_title : 'INR' }}"
                                        data-buttontext="Pay {{ $currentCurrency ? $currentCurrency->currency_symbol : '₹' }} {{$Cart->grandTotal}}"
                                        data-name="{{$Address->name.' '.$Address->last}}"
                                        data-description="Payment with Tuljamart"
                                        data-image="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"
                                        data-prefill.name="{{$Address->name.' '.$Address->last}}"
                                        data-prefill.email="{{$Address->email}}"
                                        data-prefill.contact="{{$Address->phone}}">
                                </script>
                            </form>

                       </div>
					</div>
			  </div>
          </div>

    </div>
    </div>
    </div>
  </section>
  <style>
    .product.product-cart .btn-close{
        display: none;
    }
    .cartmobtitle {
        z-index: 12;
    }
    .razorpay-payment-button {
            background-color: #e7b360;
            border-radius: 4px;
            padding: 14px 30px;
            text-align: center;
            border: 0;
            box-shadow: none;
            color: #ffffff;
            font-weight: 500;
            font-size: 15px;
            text-transform: uppercase;
            transition: all 0.5s ease;
            display: inline-block;
            width: 100%;
        }
        .razorpay-payment-button:hover {
            background-color: #652120;
         }

    @media screen and (max-width: 767px){

        .navmob{
            display: flex;
            flex-direction: column;
            align-content: flex-start;
        }
        .card{
            align-items: center;
        }
    }
</style>
@endsection
@push('script')
<script>

$('body').on('click','.btn-checkout', function (t) {
    t.preventDefault();
    $.ajax({
        method: "GET",
        url: "{{route('user.checkCart')}}",
        success: function (data) {
            if(data.length >0){
                data.forEach(e =>{
                    toastr["error"](e);
                });
            }else{
                var url = "{{route('view.order')}}";
                window.location.href = url;
            }
          console.log(data);
        },
        error: function (erroe) {
        }
    });
});

function paymenttype(t) {
    t.preventDefault();
    var type = t.target.value;

    $.ajax({
        method: "GET",
        data: {'type':type},
        url: "{{route('user.deliveryextraxharge')}}",
        success: function (data) {
            if(data.status){
               $("#checksummery").load('{{ route('user.paymentsummery') }}');
               if(type == "upi"){
                   $('#COD').hide();
                   $('#upi').show();
               }else{
                   $('#COD').show();
                   $('#upi').hide();
               }
            //   $('#COD , #upi').toggle();
                console.log(data);
            }
        },
        error: function (erroe) {
        }
    });
}


function calculatedate(data){
    $(".summary-subtotal-price").text(data.totalPrice);
    $('.summary-total-price').text(data.grandTotal);

}
document.getElementById("upiradio").checked = true;
</script>
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
@endpush
