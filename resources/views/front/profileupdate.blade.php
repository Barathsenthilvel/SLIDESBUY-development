@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Change Pin</div>
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
					  <li><a href="#">Change Pin</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
<section class="myorder-section commonaccount-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  chpinfull">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a href="{{route('order')}}">My Orders</a></li>
                            <li><a  href="{{route('front.account')}}">Addresses</a></li>
                            <li><a href="{{route('front.userprofile')}}">Account Settings</a></li>
                            <li><a class="active" href="{{route('profile')}}">Change Pin</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad ">
                        <div class="row mobmar0">
                            <div class="pinshow">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordertitle deskhide">
                                    <!--<h3><span>Change Pin</span></h3>-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <div><label>Email</label></div>
                                        <input type="text" class="form-control" readonly value="{{Auth::user()->email}}">
                                    </div>
                                    <form action="{{route('update.profile')}}" id="profile" >
                                        @csrf
                                        <div class="form-group">
                                            <div><label>New Password</label></div>
                                            <input type="password" class="form-control" placeholder=""
                                                name="new_password" id="new_password">
                                        </div>
                                        <div class="form-group">
                                            <div><label>Confirm Password</label></div>
                                            <input type="password" class="form-control" placeholder=""
                                                name="confirm_password" id="confirm_password">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="savebtn" name="submit" id="submit" value="save">
                                        </div>
                                    </form>
                                </div>
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
        $('#profile').submit(function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    const url = e.target.action;
    $.ajax({
        method:"POST",
        url:url,
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
            toastr["success"](data.msg);
        },
        error:function(erroe){

        }
    });
});
    </script>
@endpush
