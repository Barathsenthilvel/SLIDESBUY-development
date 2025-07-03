@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Contact Us</div>
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
					  <li><a href="#">Contact Us</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
    <section class="common-section">
    <div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 nopad showroom-inner">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<!--<div class="col-md-12 col-sm-12 col-xs-12 nopad address-single">-->
					<!--<div class="showroom-details">-->
					<!--	<div class="showroom-name">Start A Conversation</div>-->
					<!--	<div class="showroom-address">-->
					<!--		<div class="form-group"><span><a href="mailto:support@thesilkastic.com" target="_newtab"><i class="fa fa-envelope"></i>  support@thesilkastic.com</a></span></div>-->
					<!--		<div class="form-group"><a href="tel:+916374445725"><i class="fa fa-phone"></i>  +91 63744 45725</a></div>-->
					<!--	</div>-->
					<!--</div>-->
					<!--</div>-->
					<div class="col-md-12 col-sm-12 col-xs-12 nopad address-single">
					<div class="showroom-details">
						<div class="showroom-name">Corporate Office</div>
						<div class="showroom-address" style="display: flex;gap: 12px;">
						    <span><i class="fa fa-map-marker"></i></span>
							<span>{!!$StoreConfig->location_address!!}</span>
						</div>
						<div class="showroom-contact ">
						<div class="form-group"><i class="fa fa-phone"></i> +91 90944 42772</div>
						<!--<div class="form-group"><i class="fa fa-mobile"></i> +91 90944 42772 </div>-->
						<div class="form-group"><i class="fa fa-envelope"></i>tuljavani@gmail.com</div>
						</div>
					</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 nopad address-single">
					<div class="showroom-details">
						<div class="showroom-name">Registered Office</div>
						<div class="showroom-address" style="display: flex;gap: 12px;">
						    <span><i class="fa fa-map-marker"></i></span>
							<span>{!!$StoreConfig->store_address!!}</span>
						</div>
						<div class="showroom-contact ">
						<div class="form-group"><i class="fa fa-phone"></i> +91 90944 42772</div>
						<!--<div class="form-group"><i class="fa fa-mobile"></i> +91 90944 42772 </div>-->
						<div class="form-group"><i class="fa fa-envelope"></i>tuljavani@gmail.com</div>
						</div>
					</div>
					</div>
					<!--<div class="col-md-12 col-sm-12 col-xs-12 nopad address-single d-none">-->
    	<!--				<div class="showroom-details">-->
    	<!--					<div class="showroom-name">SOCIAL LINKS</div>-->

    	<!--						<div class="row pad-lft-15">-->
     <!--                              <div class="col-md-12 col-sm-12 col-xs-12 follow-us">-->
     <!--                                 <ul class="list-inline social-links">-->
     <!--                                    <li><a target="_blank" href="https://www.facebook.com/silkastic"><i class="fa fa-facebook"></i></a></li>-->
     <!--                                    <li><a target="_blank" href="#"><i class="fa fa-youtube"></i></a></li>-->
     <!--                                    <li><a target="_blank" href="https://www.instagram.com/silkastic/"><i class="fa fa-instagram"></i></a></li>-->
     <!--                                 </ul>-->
     <!--                              </div>-->
     <!--                           </div>-->

    	<!--					<div class="showroom-contact ">-->
    						<!--<div class="form-group"><i class="fa fa-phone"></i> +91 79044 14156</div>-->
    						<!--<div class="form-group"><i class="fa fa-mobile"></i> +91 79044 14156</div>-->
    	<!--					</div>-->
    	<!--				</div>-->
					<!--</div>-->
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 contactform-wraper">
					<div class="col-md-12 col-sm-12 col-xs-12  nopad showroom-name">
						<i class="fa fa-send"></i> &nbsp; Send Enquiry
					</div>
					<form  id="contactusforms"  action="{{route('front.contact')}}" method="post">
					    {{ csrf_field() }}
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="userName" placeholder="Name" required="">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<input type="text" class="form-control numericvalidate" id="mobile" name="mobile" placeholder="Mobile Number" required="">
						</div>
						<div class="form-group">
							<textarea class="form-control" id="message" placeholder="Message" name="comment" required=""></textarea>
						</div>
						<div class="form-group text-right">

							<button type="submit" name="button" onclick="" class="submit-btn"><span>Submit</span></button>
 						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
</section>
</div>
@endsection
