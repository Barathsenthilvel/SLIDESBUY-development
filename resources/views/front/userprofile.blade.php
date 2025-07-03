@extends('front.includes.container')
@section('content')
<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">My Account</div>
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
                        <li><a href="#">My Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="myorder-section commonaccount-section">
    <div class="container">

        <div class="row">
            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper">
                <div class="profileright-inner">
                      <div class="profileinfo-wraper">
                          <div class="profileimg-wraper">
                                   <img src="images/balaji-ba.jpg" class="img-responsive center-block" alt="csk">
                          </div>
                          <div class="profilename-container">
                              <div class="profilename">
                                       Balaji Sha
                              </div>
                              <div class="location">
                                       Chennai
                              </div>
                          </div>
                          <div class="text-center">
                              <a class="loginbtn" href="">logout</a>
                          </div>
                      </div>
                </div>
            </div>-->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 myaccfull">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a href="{{route('order')}}">My Orders</a></li>
                            <li><a  href="{{route('front.account')}}">Addresses</a></li>
                            <li><a class="active" href="#">Account Settings</a></li>
                            <li><a href="{{route('profile')}}">Change Pin</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 changepwd-wraper nopad">

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profileform-wraper myaccsec">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ordertitle deskhide">
                                    <!--<h3><span>My Account</span></h3>-->
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form id="updateform" action="{{route('front.userprofileupdate')}}" method="post" class="displayform profileform">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>FIRST NAME</label></div>
                                                    <input type="text" class="form-control" placeholder=""
                                                        value="{{Auth::user()->name}}" name="name" id="fname" required disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Last Name</label></div>
                                                    <input type="text" class="form-control" placeholder="" required value="{{Auth::user()->last_name}}"
                                                        name="last_name" id="lname" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Email</label></div>
                                                    <input type="email" class="form-control" placeholder="" required
                                                        value="{{Auth::user()->email}}" name="email" id="email" disabled readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Mobile No</label></div>
                                                    <input type="text" class="form-control" placeholder="" required
                                                        value="{{Auth::user()->Phone}}" name="Phone" id="mobno" disabled readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Date of birth</label></div>
                                                    <input type="text" class="form-control" placeholder="" required
                                                        value="{{Auth::user()->dob}}" name="dob" id="dob" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Gender</label></div>
                                                    <select name="gender" class="form-control select2" required disabled>
                                                        <option>Select</option>
                                                        <option value="Male" {{ (Auth::user()->gender == 'Male')?'selected':'' }}>Male</option>
                                                        <option value="Female" {{ (Auth::user()->gender == 'Female')?'selected':'' }}>Female</option>
                                                        <option value="Others" {{ (Auth::user()->gender == 'Others')?'selected':'' }}>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Country</label></div>
                                                    <select name="country" id="country_id" class="form-control" required disabled>
                                                        <option value="">Select Country</option>
                                                        @foreach ($Country as $country)
                                                        <option value="{{$country->id}}" {{(Auth::user()->country == $country->id)?'selected':''}}>{{$country->country_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>State</label></div>
                                                        <select name="state" id="state_id" class="form-control" required disabled>
                                                            <option>Select State</option>
                                                            @foreach ($State as $State)
                                                            <option value="{{$State->id}}" {{(Auth::user()->state == $State->id)?'selected':''}}>{{$State->state_name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>City</label></div>
                                                        <select name="city" id="city_id" class="form-control" required disabled>
                                                            <option>Select City</option>
                                                            @foreach ($City as $City)
                                                            <option value="{{$City->id}}" {{(Auth::user()->city == $City->id)?'selected':''}}>{{$City->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Zip code</label></div>
                                                        <select name="pincode" id="pincode_id" class="form-control" required disabled>
                                                            <option>Select Pincode</option>
                                                            @foreach ($Pincode as $Pincode)
                                                            <option value="{{$Pincode->id}}" {{(Auth::user()->pincode == $Pincode->id)?'selected':''}}>{{$Pincode->pincode}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>Street</label></div>
                                                    <input type="text" class="form-control" placeholder="" required
                                                        value="{{Auth::user()->street}}" name="street" id="street" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div><label>address</label></div>
                                                    <textarea class="form-control" name="address" required
                                                        disabled>{{Auth::user()->address}}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <a href="javascript:void(0);" class="transparent-btn editbtn"
                                                id="editbtn"><span>Edit Profile</span></a>
                                            <input type="submit" class="savebtn" name="submit" id="submit"
                                                value="save changes">
                                            <a class="transparent-btn cancel-trigger" id="cancelbtn"
                                                href="javascript:void(0);">cancel</a>
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

	 /*sticky footer*/
	 var searchvar=0;
	 $("#searchbtm").click(function(e){
	 if ($('.btmsearch').css('display') == 'none'){
	  $(".btmsearch").fadeIn();
	  $('.btmsearch').css('display','block');
	  searchvar=1;
	  return false;
	  }
	 else if ($('.btmsearch').css('display') == 'block') {
	  $(".btmsearch").fadeOut();
	 $('.btmsearch').css('display','none');
	  return false;
	  }
	 });
	 var width = $(window).width();
	var lastScrollTop = 0;
	$(window).scroll(function(event) {;
	var width = $(window).width();
	if (width <= 767) {
	function footer()
	{
			var st = $(this).scrollTop();
			 if (st > lastScrollTop){
			 $(".footer-nav").slideDown();
			 }
			 else {
			 $(".footer-nav").hide();
			 }
			 lastScrollTop = st;
	}
	footer();
	}
	});
	/*sticky footer ends*/
	 });
     $(document).ready(function(){

     $('#country_id').select2({placeholder:'Select Country'}).on('select2:close', function(){
        var element = $(this);
        var new_country = $.trim(element.val());
        if(new_country != '')
        {
            $.ajax({
                url:"{{route('front-getstate')}}",
                method:"POST",
                data:{country_name:new_country,"_token": "{{ csrf_token() }}",},
                success:function(data)
                {
                    console.log(data);
                    if(data.length != null)
                    {
                        var option = '<option disabled selected>Select State</option>';
                        data.forEach((e)=>{
                            option += '<option value='+e.id+'>'+e.state_name+'</option>';
                        });
                        $("#state_id").html(option).trigger("change");
                        $("#city_id").html(null).trigger("change");
                        $("#pincode_id").html(null).trigger("change");
                    }else{
                        $("#state_id").html(null).trigger("change");
                        $("#city_id").html(null).trigger("change");
                        $("#pincode_id").html(null).trigger("change");

                    }
                }
            })
        }
    });

    $('#state_id').select2({tags:true,placeholder:'Select State'}).on('select2:close', function(){
        var element = $(this);
        var new_state = $.trim(element.val());
        var country = $('#country_id').val();
        if(new_state != '')
        {
        $.ajax({
            url:"{{route('front-getcity')}}",
            method:"POST",
            data:{state_name:new_state,country:country,"_token": "{{ csrf_token() }}",},
            success:function(data)
            {
            if(data.new)
            {
                element.append('<option value="'+data.data.id+'" selected>'+new_state+'</option>').val(data.data.id);
                $("#city_id").html(null).trigger("change");
                $("#pincode_id").html(null).trigger("change");
            }else{
                var option = '<option disabled selected>Select City</option>';
                data.data.forEach((e)=>{
                    option += '<option value='+e.id+'>'+e.city_name+'</option>';
                });
                $("#city_id").html(option).trigger("change");
                $("#pincode_id").html(null).trigger("change");
            }
            }
        })
        }
    });

    $('#city_id').select2({tags:true,placeholder:'Select City'}).on('select2:close', function(){
        var element = $(this);
        var new_city = $.trim(element.val());
        var country = $('#country_id').val();
        var state = $('#state_id').val();
        if(new_city != '')
            {
            $.ajax({
                url:"{{route('front-Pincode')}}",
                method:"POST",
                data:{city_name:new_city,state:state,country:country,"_token": "{{ csrf_token() }}",},
                success:function(data)
                {
                if(data.new)
                {
                    element.append('<option value="'+data.data.id+'" selected>'+new_city+'</option>').val(data.data.id);
                    $("#pincode_id").html(null).trigger("change");
                }else{
                    var option = '<option disabled selected>Select Pincode</option>';
                    data.data.forEach((e)=>{
                        option += '<option value='+e.id+'>'+e.pincode+'</option>';
                    });
                    $("#pincode_id").html(option).trigger("change");
                }
                }
            })
            }
    });

    $('#pincode_id').select2({tags:true,placeholder:'Select Pincode'}).on('select2:close', function(){
        var element = $(this);
        var new_pincode = $.trim(element.val());
        var city =$("#city_id").val();
        var country = $('#country_id').val();
        var state = $('#state_id').val();

        if(new_pincode != '')
        {
        $.ajax({
            url:"{{route('front-selectPincode')}}",
            method:"POST",
            data:{pincode:new_pincode,city:city,state:state,country:country,"_token": "{{ csrf_token() }}",},
            success:function(data)
            {
                if(data.new)
                {
                    element.append('<option value="'+data.data.id+'" selected>'+new_pincode+'</option>').val(data.data.id);
                }
            }
        })
        }
    });

});
</script>
@endpush
