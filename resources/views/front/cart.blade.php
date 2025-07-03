@extends('front.includes.container')
@section('content')
<style>
    .removeitem-wraper{
        background-color: rgb(101 33 32);
    }
    .product-remove{
        color: white
    }
</style>
<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">My Cart</div>
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
                        <li><a href="#">My Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="myorder-section commonaccount-section orderstyle">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 profile-leftwraper cartfull mobpad0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner" style="min-height: auto;">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a class="active" href="{{route('view.cart')}}">My Cart</a></li>
                            <li><a href="{{(Auth::user()?route('view.deliveryaddress'):route('front.loginBlade'))}}">Delivery Address</a></li>
                            <li><a href="{{(Auth::user()?route('view.checkout'):route('front.loginBlade'))}}">Checkout</a></li>
                            <!--<li><a href="">Payment</a></li>-->
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad cartmob">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cartitem-lits orderlist-wraper">
                            <div class="row" id="Shippingcard">
                                @include('front.includes.shippingcart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper mobpricedet" id="Cart_summery">
                @include('front.includes.cart_summery0')
            </div>
        </div>
    </div>

</section>
@endsection
@push('script')
<script>
    $(document).ready(function(){
       $(".select2").select2({
       /*placeholder: "Category",*/
       minimumResultsForSearch: -1
       });
       $("#editbtn").click(function(){
       //alert();
       $(".profileform").removeClass("displayform");
       $(".profileform .form-control , .profileform .input-fields ").removeAttr("disabled");
   });
   $("#cancelbtn").click(function(){
       //alert();
       $(".profileform").addClass("displayform");
       $(".profileform .form-control , .profileform .input-fields ").attr("disabled");

   });
});


   </script>
<script>
    $('body').on('click', '.quantity-up', async function (t) {
        t.preventDefault();
            var spinner = $(this).parent(),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max'),
            id = input.attr('pid'),
            step = parseFloat(input.attr('step'));
            var oldValue = parseFloat(input.val());
               if (oldValue >= parseInt(max)) {
                   var newVal = oldValue;
               } else {
                   var newVal = oldValue + step;
                    $.ajax({
                        method: "GET",
                        url: "{{route('user.add.card')}}",
                        data: {
                            quantity: newVal,
                            id: id
                        },
                        success: function (data) {
                            calculatedate(data);
                            $('.dropdown-box').load("{{route('user.render.card')}}");
                            $('#Shippingcard').load("{{route('user.rendershippig.cart')}}");
                        },
                        error: function (erroe) {

                        }
                    });
               }
               spinner.find("input").val(newVal);
               spinner.find("input").trigger("change");
    });
    $('body').on('click', '.quantity-down', async function (t) {
        t.preventDefault();
            var spinner = $(this).parent(),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max'),
            id = input.attr('pid'),
            step = parseFloat(input.attr('step'));
            var oldValue = parseFloat(input.val());
               if (oldValue <= parseFloat(min)) {
                   var newVal = oldValue;
               } else {
                   var newVal = oldValue - step;
               }
               spinner.find("input").val(newVal);
               spinner.find("input").trigger("change");
        $.ajax({
            method: "GET",
            url: "{{route('user.reducecard.card')}}",
            data: {
                quantity: newVal,
                id: id
            },
            success: function (data) {
                calculatedate(data);
                $('.dropdown-box').load("{{route('user.render.card')}}");
                $('#Shippingcard').load("{{route('user.rendershippig.cart')}}");
            },
            error: function (erroe) {

            }
        });
    });
    $('body').on('click', '.product-remove', function (t) {
        t.preventDefault();
        var url = "{{route('user.remove.card')}}/" + $(this).data('id');
        $.ajax({
            method: "GET",
            url: url,
            success: function (data) {
                calculatedate(data);
                $('.dropdown-box').load("{{route('user.render.card')}}");
                $('#Shippingcard').load("{{route('user.rendershippig.cart')}}");
                toastr["success"]('Removed from Cart');
            },
            error: function (erroe) {

            }
        });
    });

    function calculatedate(data) {
        if (data.totalPrice == 0) {
            var url = "{{route('front.getCategory')}}";
            window.location.href = url;
        }
       $('#Cart_summery').load('{{route('cart_summer0')}}');
    }

</script>
@endpush
