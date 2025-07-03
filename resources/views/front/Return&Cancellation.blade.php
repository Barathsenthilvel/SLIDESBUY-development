@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Returns, Cancellation & Refund Terms</div>
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
					  <li><a href="#">Returns, Cancellation & Refund Terms</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>


    <section class="contentpage-section common-section">
		<div class="container">
		<div class="row">
		<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 nopad">
			<div class="col-md-12 col-sm-12 col-xs-12 nopad section-title primary-blue">Returns, Cancellation & Refund Terms</div>

				<p>	Thanks for shopping at Tulja Bhavani. If you are not entirely satisfied with your purchase, we’re here to help.</p>

			<div class="col-md-12 col-sm-12 col-xs-12 nopad content-para">
				<div class="form-group">
				<h3>Returns</h3>

				<p>
					No Returns.
				</p>
				<p></p>
				<p></p>
				</div>
				<div class="form-group">
				<h3>Cancellation & Refunds</h3>
				
				<p>Product and Order cancellation can do before Order confirms.</p>

                <p>Full amount will be refunded within 5 to 7 business days if entire order cancelled</p>

                </p>Except delivery charges rest of the amount will be refunded within 5 to 7 if product order cancelled</p>
				<p></p>
				</div>

				

				<div class="form-group">
				<h3>Contact Us</h3>
				<p>If you have any questions on how to return your item to us, contact us. <a href=""></a></p>

				</div>

		</div>
		</div>
		</div>
	</div></section>
@endsection
