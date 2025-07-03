@extends('front.includes.container')
@section('content')
<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Wishlist</div>
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
					  <li><a href="">Wishlist</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
    <section class="wishlist-section">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wishfull">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cartitem-lits orderlist-wraper">
                     <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a class="active" href="https://www.tuljamart.com/tuljamart/myorders">Wishlist</a></li>
                        </ul>
                    </div>
                    <div class="row">
                    <div  id="wishlisttemplate" style="padding-top: 25px;">
                        @include('front.includes.wishlistTemplate')
                    </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper text-right">

                            <a class="transparent-btn"  href="{{route('front.getCategory')}}">continue shopping</a>
                            <a class="placeorder-btn" href="address.html">Place Order</a>
                        </div>

                    </div>
              </div>

              </div>
        </div>
        </div>
        </div>
      </section>
@endsection
@push('script')
<script>
    $('body').on('click','.wishlistremove',function(e){
        e.preventDefault();
        $.ajax({
                method:"GET",
                url:$(this).attr('href'),
                data:{id:$(this).data('id')},
                success:function(data){
                    $('#wishlisttemplate').load('{{route('wishlistTemplate')}}');
                },
                error:function(erroe){ }
            });
    });
            $('body').on('click','.btn-cartvl', function (t) {
            t.preventDefault();
            var qu = $(this).data('quantity');
            var id = $(this).data('id');
            $.ajax({
                method: "GET",
                url: "{{route('user.add.card')}}",
                data: {
                    quantity: qu,
                    id: id
                },
                success: function (data) {
                    $('.cart-count').text(data.totalitem);
                    $('.dropdown-box').load("{{route('user.render.card')}}");
                    toastr["success"]('Added to Cart');
                },
                error: function (erroe) {

                }
            });
        });
</script>
@endpush
