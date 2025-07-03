@extends('front.includes.container')
@section('content')

<style>
@media screen and (max-width: 767px){
    .editaddr .Delete-link {
        top: 60px;
    }
    #canceladdress,
    .savebtn{
        padding: 13px 19px;
    }
    #addnewaddress {
        background : #e7b360;
    }
}
</style>

<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">My Addresses</div>
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
                        <li><a href="#">My Addresses</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="myorder-section commonaccount-section orderstyle">
    <!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Delete Address</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger deletebtnn" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 addrfull mobpad0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-leftinner" style="min-height: auto;">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a href="{{route('view.cart')}}">My Cart</a></li>
                            <li><a class="active" href="#">Delivery Address</a></li>
                            <li><a href="{{(Auth::user()?route('view.checkout'):route('front.loginBlade'))}}">Checkout</a></li>
                            <!--<li><a href="">Payment</a></li>-->
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-wraper">
                            <div class="row">
                                <div class="addresslist-container">
                                    <div id="userAddress">
                                        @include('front.includes.userAddress')
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mar-lft-0 contibtn">
                                        <a class="savebtn" style="margin: 6px;" id="addnewaddress"
                                            href="javascript:void(0);"><span>Add New Address</span></a>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single newcard-wraper addnewaddr-wraper"
                                    id="addnew-address" style="display: none;">
                                    <div class="medium-title">
                                        Add New address
                                    </div>
                                    <div class="col-lg-12 col-md-11 col-sm-12 col-xs-12 nopad">
                                        <form id="form12" class="profileform">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="type" class="form-control" placeholder="FIRST NAME" autocomplete="off"
                                                            value="" required name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="type" class="form-control" placeholder="Last Name" autocomplete="off"
                                                            value=""  name="last" id="last">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="EMAIL" autocomplete="off"
                                                            value="" required name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="type" class="form-control" placeholder="MOBILE NO." autocomplete="off"
                                                            value="" required name="phone" id="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select2" title="Country" required id="country_id" name="country_id">
                                                            <option>Select Country</option>
                                                            @foreach ($Country as $country)
                                                            <option value="{{$country->id}}" >{{$country->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select2" title="State" required id="state_id" name="state_id">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select2" title="City" required id="city_id" name="city_id">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <select class="form-control select2" title="Pincode" required id="pincode_id" name="pincode_id">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <textarea placeholder="ADDRESS" class="form-control" required name="address1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                                    <div class="form-group">
                                                        <a class="transparent-btn cancel-trigger" id="canceladdress"
                                                            href="javascript:void(0);">cancel</a>
                                                            <input type="submit" class="savebtn" value="Save and Deliver here">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper mobpricedet">
                <div class="profileright-inner" id="cart_summery">
                    @include('front.includes.cart_summery')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    $('#addnewaddress').click(function(){
		$("#addnew-address").slideDown();
		$(".addnew-address").hide();
		});

	$('#canceladdress').click(function(){
			$("#addnew-address").slideUp();
			$(".addnew-address").show();
		});

    $('#country_id').select2({
        placeholder:'Select Country',
        width : '335px',
    }).on('select2:close', function(){
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

    $('#state_id').select2({placeholder:'Select State',width : '335px'}).on('select2:close', function(){
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

    $('#city_id').select2({placeholder:'Select City',width : '335px',
        language: {
		    noResults: function(term) {
		        typed = event.target.value;
		        if (typed.length>1){
				$("span.select2-container").addClass ('select2-container--focus');
				continentVal = prompt("Sorry ! Not found any City do you want to add new continent"); 
				console.log(' === '+continentVal);				
    				if (continentVal != "" && continentVal){
    					console.log('Here we go '+event.target.value+ continentVal);
    					$.ajax({
                            url:"{{route('front-Pincode')}}",
                            method:"POST",
                            data:{city_name:continentVal,state:$('#state_id').val(),country:$('#country_id').val(),"_token": "{{ csrf_token() }}",},
                            success:function(data){
                                if(data.new){
                                    var newOption = new Option(continentVal,data.data.id, true, true);
                                    $('#city_id').append(newOption).trigger('change');
                                }
                            }
                        })
    				}
                    $("#city_id").select2("close");
			    }
		    }
        }
    }).on('select2:close', function(){
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

    $('#pincode_id').select2({placeholder:'Select Pincode',width : '335px',
        language: {
		    noResults: function(term) {
		        typed = event.target.value;
		        if (typed.length>1){
				$("span.select2-container").addClass ('select2-container--focus');
				continentVal = prompt("Sorry ! Not found any Pincode, Do you want to add new continent"); 
				console.log(' === '+continentVal);				
    				if (continentVal != "" && continentVal){
    					console.log('Here we go '+event.target.value+ continentVal);
    					$.ajax({
                            url:"{{route('front-selectPincode')}}",
                            method:"POST",
                            data:{pincode:continentVal,city:$("#city_id").val(),state:$('#state_id').val(),country:$('#country_id').val(),"_token": "{{ csrf_token() }}",},
                            success:function(data){
                                if(data.new){
                                    var newOption = new Option(continentVal,data.data.id, true, true);
                                    $('#pincode_id').append(newOption).trigger('change');
                                }
                            }
                        })
    				}
    				$("#pincode_id").select2("close");
			    }
		    }
        }
    }).on('select2:close', function(){
        var element = $(this);
        var new_pincode = $.trim(element.val());
        var city =$("#city_id").val();
        var country = $('#country_id').val();
        var state = $('#state_id').val();

        // if(new_pincode != '')
        // {
        // $.ajax({
        //     url:"{{route('front-selectPincode')}}",
        //     method:"POST",
        //     data:{pincode:new_pincode,city:city,state:state,country:country,"_token": "{{ csrf_token() }}",},
        //     success:function(data)
        //     {
        //         if(data.new)
        //         {
        //             element.append('<option value="'+data.data.id+'" selected>'+new_pincode+'</option>').val(data.data.id);
        //         }
        //     }
        // })
        // }
    });

    $('body').on('click', '.final', function (e) {
        e.preventDefault();
        if ($('body input[name="shipping"]:checked').val() != undefined) {
            var bool = ($('body input[name="fast"]:checked').val() != undefined) ? 'true' : 'false';
            var url = $(this).attr('href') + '?id=' + $('body input[name="shipping"]:checked').val() +
                '&fast=' + bool;
            window.location.href = url;
        } else {
            toastr["error"]('Add Address to Checkout');
        }
    });

    $('body').on('click', '.Delete-link', function (e) {
        e.preventDefault();
        $.get($(this).attr('href'), function (data) {
            $('#userAddress').load("{{route('user.render.address')}}", function () {
                $('body input[name="shipping"]:checked').trigger('click');

                if($('body input[name="shipping"]:checked').length == 0){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: '{{route('cart_summer')}}',
                        data: {
                            id: 0,
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            $('body #cart_summery').html(data);
                            toastr["success"]('Address Updated');
                        },
                        error: function (erroe) {

                        }
                    });
                }
            });
        });
    });

    $('body').on('click', 'input[name="shipping"]', function (e) {
        var value = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('cart_summer')}}',
            data: {
                id: value,
                '_token': "{{ csrf_token() }}"
            },
            success: function (data) {
                $('body #cart_summery').html(data);
                toastr["success"]('Address Updated');
            },
            error: function (erroe) {

            }
        });
        $("#addnew-address").slideUp();
		$(".addnew-address").show();
    });

    $('body').on('click', '#fast', function (e) {
        var value = $('body input[name="shipping"]:checked').val();
        if ($('body input[name="fast"]:checked').val() != undefined) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '{{route('cart_summer')}}',
                data: {
                    id: value,
                    '_token': "{{ csrf_token() }}",
                    fast: 'fast'
                },
                success: function (data) {
                    $('body #cart_summery').html(data);
                    toastr["success"]('Address Updated');
                },
                error: function (erroe) {

                }
            });
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '{{route('cart_summer')}}',
                data: {
                    id: value,
                    '_token': "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('body #cart_summery').html(data);
                    toastr["success"]('Address Updated');
                },
                error: function (erroe) {

                }
            });
        }
    });

    $('#form12').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: '{{route('user.add.address')}}',
            data: new FormData(e.target),
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#form12')[0].reset();
                    $('#userAddress').load("{{route('user.render.address')}}", function () {
                    $('body input[name="shipping"]:checked').trigger('click');
                });
                toastr["success"]('Address Added Successfully');
            },
            error: function (erroe) {

            }
        });
    });

    $('body').on('click','.editAddress',function(e){
        e.preventDefault();
        $('#editEmployeeModal .modal-content').load($(this).attr('href'));
        $('#editEmployeeModal').modal('toggle');
    });

    $('body .Delete-link').on('click',function(e){
      e.preventDefault();
      $.get($(this).attr('href'),function(data){
        $('#userAddress').load("{{route('user.render.address')}}", function () {
                $('body input[name="shipping"]:checked').trigger('click');
                toastr["success"]('Address Deleted');
            });
      });
  });

    $('#editEmployeeModal').submit('#model', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        const url = e.target.action;
        $.ajax({
            method: "POST",
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#userAddress').load("{{route('user.render.address')}}",function(){
                    $('#editEmployeeModal').modal('toggle');
                });
                toastr["success"]('Address Updated');
            },
            error: function (erroe) {

            }
        });
    });

    function showClosecoupon(){
        $('body #showcoupon').toggle();
        $('body #applaycoupon').toggle();
    }

    function removecoupon(e){
        e.preventDefault();
        $.ajax({
            method:"GET",
            url:'{{ route('user.remove.coupon') }}',
            success:function(data){
                if(!data.status){
                    toastr["success"](data.msg);
                }
                toastr["success"](data.msg);

                var value = $('body input[name="shipping"]:checked').val();
                if ($('body input[name="fast"]:checked').val() != undefined) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: '{{route('cart_summer')}}',
                        data: {
                            id: value,
                            '_token': "{{ csrf_token() }}",
                            fast: 'fast'
                        },
                        success: function (data) {
                            $('body #cart_summery').html(data);
                        },
                        error: function (erroe) {

                        }
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: '{{route('cart_summer')}}',
                        data: {
                            id: value,
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            $('body #cart_summery').html(data);
                        },
                        error: function (erroe) {

                        }
                    });
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    function applycoupon(e){
        e.preventDefault();
        const formData = new FormData(e.target);
        $.ajax({
            method:"POST",
            url:'{{ route('user.applycoupon') }}',
            data:formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(data){
                if(!data.status){
                    toastr["success"](data.msg);
                    return false;
                }
                toastr["success"](data.msg);

                var value = $('body input[name="shipping"]:checked').val();
                if ($('body input[name="fast"]:checked').val() != undefined) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: '{{route('cart_summer')}}',
                        data: {
                            id: value,
                            '_token': "{{ csrf_token() }}",
                            fast: 'fast'
                        },
                        success: function (data) {
                            $('body #cart_summery').html(data);
                        },
                        error: function (erroe) {

                        }
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: '{{route('cart_summer')}}',
                        data: {
                            id: value,
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            $('body #cart_summery').html(data);
                        },
                        error: function (erroe) {

                        }
                    });
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    	$(document).ready(function(){
    		$('body').on('click','#addnewcoupon',function(){

    		if ($("body #couponform").css('display') == 'none') {
    			$("body #couponform").slideDown();
    		}
    		else if($("body #couponform").css('display') == 'block') {
    			$("body #couponform").slideUp();
    		}
		});
    	});
</script>
@endpush
