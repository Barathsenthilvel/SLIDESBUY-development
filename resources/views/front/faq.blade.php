@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">FAQ</div>
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
					  <li><a href="#">FAQ</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
    <section class="common-section">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 common-content privacy-content">
            <div class="form-group" style="text-align: center;">
                <h1>Update Soon</h1>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
