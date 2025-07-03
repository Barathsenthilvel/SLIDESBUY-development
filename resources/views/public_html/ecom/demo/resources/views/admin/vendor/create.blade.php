@extends('layout.admin') 

@section('content')  
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <!--begin::Page Heading-->
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <!--begin::Page Title-->
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Vendor</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-vendor') }}" class="text-muted">List of Vendor</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--end::Page Heading-->
                                </div>
                                <!--end::Info-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--begin::Card-->
                                        <div class="card card-custom gutter-b example example-compact">
                                            <div class="card-header">
                                                <h3 class="card-title">Add Vendor</h3>
                                            </div>
                                            <!--begin::Form-->
                                            <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
                                                <div></div>
                                                <button type="button" class="close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
                                                <div></div>
                                                <button type="button" class="close" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form method="POST" action="{{route('admin-vendor-store')}}" id="formCreate" onsubmit="CKEditor1.updateSourceElement();">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Type
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control" id="type" name="type" required onchange="typechange(this.value)">
                                                            <option value="Company">Company</option>
                                                            <option value="Individual">Individual</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Name
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="name" name="name" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Product ID prefix
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                            <input class="form-control" type="text" value="" maxlength="5" id="manufacturerID" name="manufacturerID" required/>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Billing Country
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control form-control-solid form-control-lg" id="billingCountry" name="billingCountry" required>
                                                           <option value="">select Country</option>
                                                            @foreach($country as $countries)
                                                            <option value="{{$countries->id}}">{{$countries->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Billing State
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control  form-control-solid form-control-lg" id="billingState" name="billingState" required>
                                                           <option >select State</option>
                                                           
                                                        </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Billing City
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control form-control-solid  form-control-lg" id="billingCity" name="billingCity" required>
                                                           <option >select City</option>
                                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Billing Pincode
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control  form-control-solid form-control-lg" id="pincode" name="pincode" required>
                                                           <option >select Pincode</option>
                                                            
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Address
                                                        <span class="text-danger"></span></label>
                                                        <div class="col-10">
                                                           <textarea name="address" id="ktckeditor1"></textarea>
                                                           <div class="fv-plugins-message-container"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="require">
                                                        <label class="col-2 col-form-label" >GST NO
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="gstNo" name="gstNo" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="require">
                                                        <label class="col-2 col-form-label" >Vendor %
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-2">
                                                            <input class="form-control" type="text" value="" id="vendorperscent" name="vendorperscent" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Email ID
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="email" value="" id="email" name="email"  placeholder="example@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email address"  required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Contact
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value=""  pattern="[0-9]+" title="Number Only Accept" id="contact" name="contact" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Username
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="username" name="username" required/>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row d-none">
                                                        <label class="col-2 col-form-label">Password
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="password" value="" id="password" name="password" pattern="[0-9a-zA-Z]{6,}" title="Must be more than 6 Character" required/>
                                                        </div>
                                                    </div> --}}
                                                    <input class="form-control" type="hidden" value="123456" id="password" name="password"/>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Role
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                        <select class="form-control" id="role_id" name="role_id" required>
                                                           <option value="">select Role</option>
                                                           @foreach ($Role as $C )
                                                            <option value="{{ $C->id }}">{{$C->role_name}}</option>
                                                           @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Card-->
                                                        
                                    </div>
                                  
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>

                    <!--end::Content-->
                    <!--begin::Footer-->

 @endsection                     

 @push('script')
<script>
    ClassicEditor.create( document.querySelector( '#ktckeditor1' ) )
        .then( editor => { window.CKEditor1 = editor;} )
		.catch( error => { console.error( error ); });
    function typechange(value){
        if(value === 'Company'){
            $('#require').show();
            $('#gstNo').prop('required',true);
        }else{
            $('#require').hide();
            $('#gstNo').removeAttr('required');
        }
    }
    function loadstste(data){
        if(data != "" && data != null){
            $.get('{{ route('admin-vendor-getTemplate') }}',{id:data}, function(data, status){
                $("#template").html(data);
            });
        }else{
            $("#template").html("");
        }  
    }
$('#billingCountry').select2({placeholder:'Select Country'}).on('select2:close', function(){
    var element = $(this);
    var new_country = $.trim(element.val());

    if(new_country != '')
    {
      $.ajax({
        url:"{{route('admin-getstate-user')}}",
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
                        $("#billingState").html(option).trigger("change");
                        $("#billingCity").html(null).trigger("change");
                        $("#pincode").html(null).trigger("change");
                    }else{
                        $("#billingState").html(null).trigger("change");
                        $("#billingCity").html(null).trigger("change");
                        $("#pincode").html(null).trigger("change");

                    }
        }
      })
    }

  });
  
     $('#billingState').select2({tags:true,placeholder:'Select State'}).on('select2:close', function(){
    var element = $(this);
    var new_state = $.trim(element.val());
    var country = $('#billingCountry').val();

    if(new_state != '')
    {
      $.ajax({
        url:"{{route('admin-getCities-user')}}",
        method:"POST",
        data:{state_name:new_state,country:country,"_token": "{{ csrf_token() }}",},
        success:function(data)
        {
            if(data.new)
            {
                element.html('<option value="'+data.data.id+'" selected>'+new_state+'</option>').val(data.data.id);
                $("#billingCity").html(null).trigger("change");
                $("#pincode").html(null).trigger("change");
            }else{
                var option = '<option disabled selected>Select City</option>';
                data.data.forEach((e)=>{
                    option += '<option value='+e.id+'>'+e.city_name+'</option>';
                });
                $("#billingCity").html(option).trigger("change");
                $("#pincode").html(null).trigger("change");
            }
        }
      })
    }

  });
  
  $('#billingCity').select2({tags:true,placeholder:'Select City'}).on('select2:close', function(){
    var element = $(this);
    var new_city = $.trim(element.val());
    var country = $('#billingCountry').val();
    var state = $('#billingState').val();

    if(new_city != '')
    {
      $.ajax({
        url:"{{route('admin-getPincodes-user')}}",
        method:"POST",
        data:{city_name:new_city,state:state,country:country,"_token": "{{ csrf_token() }}",},
        success:function(data)
        {
                if(data.new)
                {
                    element.html('<option value="'+data.data.id+'" selected>'+new_city+'</option>').val(data.data.id);
                    $("#pincode").html(null).trigger("change");
                }else{
                    var option = '<option disabled selected>Select Pincode</option>';
                    data.data.forEach((e)=>{
                        option += '<option value='+e.id+'>'+e.pincode+'</option>';
                    });
                    $("#pincode").html(option).trigger("change");
                }
        }
      })
    }

  });

$('#pincode').select2({tags:true,placeholder:'Select Pincode'}).on('select2:close', function(){
    var element = $(this);
    var new_pincode = $.trim(element.val());
    var city = $('#billingCity').val();
   var country = $('#billingCountry').val();
    var state = $('#billingState').val();

    if(new_pincode != '')
    {
      $.ajax({
        url:"{{route('admin-addPincodes-user')}}",
        method:"POST",
        data:{pincode:new_pincode,city:city,state:state,country:country,"_token": "{{ csrf_token() }}",},
        success:function(data)
        {
            
                if(data.new)
                {
                    element.html('<option value="'+data.data.id+'" selected>'+new_pincode+'</option>').val(data.data.id);
                }
        }
      })
    }

  });
</script>
 @endpush