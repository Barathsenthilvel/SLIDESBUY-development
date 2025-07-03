@if(isset($edit))
<form action="{{route('admin-update.cus.add',[$address->id])}}" id="model" method="POST">
    {{ csrf_field() }}

<div class="form-group">
                                                                <label>Address Line 1</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="Address Line 1" value="{{$address->address1}}" readonly/>
                                                            </div>
                                                            <!--end::Input-->
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Address Line 2</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="address2" placeholder="Address Line 2" value="{{$address->address2}}" readonly/>
                                                            </div>
                                                            <!--end::Input-->
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <!--begin::Select-->
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <input type="hidden" name="address_id" value="{{$address->id}}" id="address_id">
                                                                        <select name="country" class="form-control  form-control-solid form-control-lg country">
                                                                            <option value="" >Select</option>
                                                                            @foreach($country as $countries)
                                                                            <option value="{{$countries->id}}" {{($address->country_id==$countries->id)?"selected":""}} >{{$countries->country_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Select-->
                                                             </div>
                                                         </div>
                                                             <div class="row">
                                                                    <div class="col-xl-12">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>State</label>
                                                                        <select name="state_id" class="form-control states form-control-solid form-control-lg">
                                                                            <option value="" >Select</option>
                                                                            @foreach($state as $states)
                                                                            <option value="{{$states->id}}" {{($address->state_id==$states->id)?"selected":""}} >{{$states->state_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                </div>
                                                                
                                                             <div class="row">
                                                                <div class="col-xl-12">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>City</label>

                                                                            <select name="city_id" class="form-control form-control-solid city form-control-lg" >
                                                                            <option value="" >Select</option>
                                                                            @foreach($city as $cities)
                                                                            <option value="{{$cities->id}}" {{($address->city_id==$cities->id)?"selected":""}} >{{$cities->city_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                             <div class="row">
                                                                <div class="col-xl-12">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Postcode</label>
                                                                        
                                                                        <select name="pincode_id" class="form-control pincode form-control-solid form-control-lg">
                                                                            <option value="" >Select</option>
                                                                            @foreach($pincode as $pincodes)
                                                                            <option value="{{$pincodes->id}}" {{($address->pincode_id==$pincodes->id)?"selected":""}} >{{$pincodes->pincode}}</option>
                                                                            @endforeach
                                                                        </select>                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>
                                                           </div>     
                                                            
                                                            
                                                            <div class="form-group">
                                                            <label class="checkbox">
                                                            <input type="checkbox" name="defaultAddress" {{($address->default_address==1 ? 'checked' : '')}} value="1">
                                                            <span></span>Set as Default Address</label>
                                                            </div>
                                                            @if($address->address_type==1)
                                                            <div class="form-group">
                                                            <label class="checkbox">
                                                            <input type="checkbox" name="shipAddress" {{($address->ship_as==1 ? 'checked' : '')}} value="1">
                                                            <span></span>Also Shipping Address</label>
                                                            </div>
                                                            @endif


    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
    </div>
</div>
</form>





<script>
   $('.country').select2({placeholder:'Select Country'}).on('select2:close', function(){
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
            $(".states").val(option).trigger("change");
            $(".city").val(null).trigger("change");
            $(".pincode").val(null).trigger("change");
          }else{
            $(".states").val(null).trigger("change");
            $(".city").val(null).trigger("change");
            $(".pincode").val(null).trigger("change");

          }
        }
      })
    }

  });
   $('.states').select2({placeholder:'Select State',tags:true}).on('select2:close', function(){
    var element = $(this);
    var new_state = $.trim(element.val());
    var country = $('.country').val();
    debugger
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
            element.append('<option value="'+data['1']+'" selected>'+new_state+'</option>').val(data['1']);
            $(".city").val(null).trigger("change");
            $(".pincode").val(null).trigger("change");
          }else if(data[0] == 0){
              var option = '<option disabled selected>Select City</option>';
                data.data.forEach((e)=>{
                    option += '<option value='+e.id+'>'+e.city_name+'</option>';
                });
            $(".city").val(option).trigger("change");
            $(".pincode").val(null).trigger("change");

          }
        }
      })
    }

  });
   $('.city').select2({placeholder:'Select City',tags:true}).on('select2:close', function(){
    var element = $(this);
    var new_city = $.trim(element.val());
    var country = $('.country').val();
    var state = $('.states').val();

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
            element.append('<option value="'+data['1']+'" selected>'+new_city+'</option>').val(data['1']);
           $(".pincode").val(null).trigger("change");
          }else if(data[0] == 0){
              var option = '<option disabled selected>Select Pincode</option>';
                    data.data.forEach((e)=>{
                        option += '<option value='+e.id+'>'+e.pincode+'</option>';
                    });
            $(".pincode").val(option).trigger("change");

          }
        }
      })
    }

  });

   $('.pincode').select2({placeholder:'Select Pincode',tags:true}).on('select2:close', function(){
    var element = $(this);
    var new_pincode = $.trim(element.val());
    var city = $('.city').val();
    var country = $('.country').val();
    var state = $('.states').val();

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

@else
<!--begin::Wizard Step 2-->
                                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                            <div class="row">
                                                            @foreach($data->addresses as $addresses)
 <div class="col-lg-6 draggable-zone">
                                                              <!--begin::Card-->
  <div class="card card-custom gutter-b draggable">
   <div class="card-header">
    <div class="card-title">
     <h3 class="card-label">{{($addresses->address_type==1)?"Billing Address":"Shipping Address"}}</h3>
    </div>
    <div class="card-toolbar">
     <a href="{{ route('admin-edit.cus.add',$addresses->id) }}" class="btn btn-icon btn-hover-light-primary draggable-handle">
     <i class="flaticon2-pen text-primary "></i>
     </a>
     <a href="#" class="btn btn-icon btn-hover-light-primary draggable-handle">
     <i class="flaticon-delete-1 text-danger "></i>
     </a>
    </div>
   </div>
   <div class="card-body">
    <p>{{$addresses->address1}}</p>
    <p>{{$addresses->address2}}</p>
    <p>@foreach($city as $cities)
         {{($addresses->city_id==$cities->id)?$cities->city_name:""}}
    @endforeach</p>
    <p>@foreach($pincode as $pincodes)
         {{($addresses->pincode_id==$pincodes->id)?$pincodes->pincode:""}}
    @endforeach</p>
    <p>@foreach($state as $states)
         {{($addresses->state_id==$states->id)?$states->state_name:""}}
    @endforeach</p>
    <p>@foreach($country as $countries)
         {{($addresses->country_id==$countries->id)?$countries->country_name:""}}
    @endforeach</p>
   </div>
  </div>
  <!--end::Card-->
                                                        </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                        <!--end::Wizard Step 2-->
@endif
