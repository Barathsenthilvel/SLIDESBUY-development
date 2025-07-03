@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Shipping Policy</div>
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
					  <li><a href="#">Shipping Policy</a></li>
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
			<div class="col-md-12 col-sm-12 col-xs-12 nopad section-title primary-blue">Shipping Terms</div>
			Thank you for visiting and shopping with Tuja Bhavani. Following are the terms and conditions that constitute our Shipping Policy.
			<div class="col-md-12 col-sm-12 col-xs-12 nopad content-para">
				<div class="form-group">
				<h3>Shipping Policy</h3>

				<p>
					It is possible that WE or our courier partners have a holiday between the day you placed your order and the date of delivery, which is normally 3-10 business days. In this case, we add a day to the estimated date. We and some of our courier partners do not work on Sundays and this is factored into the delivery dates.
				</p>
				<p>
					<li>Serviceable Locations: Chennai & Across India</l>
					<li>Free Shipping : Shipping will be free within Chennai limit</l>
					<li>Shipping for Non-Chennai locations : When you enter the pincode of the delivery address, shipping cost will be computed automatically and will be visible for you before you place the order</l>
					<li>Cash on Delivery : This facility is not available as of now</l>.

				</p>
				<p></p>
				</div>
				<div class="form-group">
				<h3>Shipment Processing Time</h3>
				<p>
				All orders are processed within 2 business days. Orders are not shipped or delivered on weekends or holidays.
				</p>
				<p>
				If we are experiencing a high volume of orders, shipments may be delayed by a few days. Please allow additional days in transit for delivery.
				</p>
				<p>
				Delivery delays can occasionally occur. If there will be a significant delay in shipment of your order, we will contact you via email or telephone.
				</p>
				<p>
				Sometimes, packages may be returned to us as they’re undeliverable. A package may be undeliverable if.
				</p>
				<p>
					<li>The address given is incorrect. Always check your address before placing an order.</l>
					<li>Nobody is available to accept the delivery after multiple attempts.</l>
				</p>
				  </div>
				  <p></p>

				<div class="form-group">
				<h3>Shipment to P.O. boxes or APO/FPO addresses</h3>
				<p>Tulja Bhavani ships to addresses within the Indian addresses only.</p>
				</div>
				 <p></p>

				<div class="form-group">
				<h3>Shipment confirmation & Order Tracking</h3>
				<p>You will receive a shipment confirmation email once you have ordered. You can find the tracking number on our site.
				</p>
				</div>
				  <p></p>

				<div class="form-group">
				<h3>Customs, Duties and Taxes</h3>
				 <p>Tulja Bhavani is not responsible for any customs and taxes applied to your order. All fees imposed during or after shipping are the responsibility of the customer (tariffs, taxes, etc.).</p>
				</div>
				 <p></p>

				<div class="form-group">
				<h3>Damages</h3>
				 <P>Tulja Bhavani will not be liable for any products damaged or lost during shipping. If you received your order damaged, please contact the shipment carrier to file a claim. Please save all packaging materials and damaged goods before filing a claim.</P>
				</div>
				<p></p>

				<div class="form-group">
				<h3>International Shipping Policy</h3>
				<p>International orders are requested to contact in our email id.</p>
				</div>
				<p></p>

				<div class="form-group">
				<h3>Returns Policy</h3>
				 <p>Return & Refund Policy provides detailed information about options and procedures for returning your order.</p>
				</div>


		</div>
		</div>
		</div>
	</div></section>
@endsection
