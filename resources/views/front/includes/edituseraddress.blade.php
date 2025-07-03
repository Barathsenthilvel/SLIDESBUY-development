
<form id="model" action="{{route('user.update.address')}}">
    <input type="hidden" name="id" value="{{$Address->id}}">
    @csrf
    <div class="modal-header">						
        <h4 class="modal-title">Edit Address</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">					
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$Address->name}}" required>
        </div>
        <div class="form-group">
            <label>Last</label>
            <input type="text" class="form-control" name="last" value="{{$Address->last}}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{$Address->email}}" required>
        </div>
        <div class="form-group">
            <label>phone</label>
            <input type="text" class="form-control" name="phone" value="{{$Address->phone}}" required>
        </div>
        <div class="form-group">
            <select class="form-control select2" title="Country" id="country_id1" name="country_id">
                @foreach ($Country as $country)
                <option value="{{$country->id}}" {{($Address->country_id == $country->id)? "selected":""}}>
                    {{$country->country_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control select2" title="State" id="state_id1" name="state_id">
            @foreach ($State as $state)
                <option value="{{$state->id}}" {{($Address->state_id == $state->id)? "selected":""}}>{{$state->state_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control select2" title="City" id="city_id1" name="city_id">
            @foreach ($City as $city)
            <option value="{{$city->id}}" {{($Address->city_id == $city->id)? "selected":""}}>
                {{$city->city_name}}
            </option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control select2" title="Pincode" id="pincode_id1" name="pincode_id">
                @foreach ($Pincode as $pincode)
                <option value="{{$pincode->id}}" {{($Address->pincode_id == $pincode->id)? "selected":""}}>
                    {{$pincode->pincode}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required name="address1">{{$Address->address1}}</textarea>
        </div>				
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-info savebtnn" value="Save">
    </div>
</form>
<script>
    $('body #country_id1').select2({placeholder:'Select Country'}).on('select2:close', function(){
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
                        $("body #state_id1").html(option).trigger("change");
                        $("body #city_id1").html(null).trigger("change");
                        $("body #pincode_id1").html(null).trigger("change");
                    }else{
                        $("body #state_id1").html(null).trigger("change");
                        $("body #city_id1").html(null).trigger("change");
                        $("body #pincode_id1").html(null).trigger("change");

                    }
                }
            })
        }
    });

    $('body #state_id1').select2({placeholder:'Select State'}).on('select2:close', function(){
        var element = $(this);
        var new_state = $.trim(element.val());
        var country = $('#country_id1').val();
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
                element.append('<option value="'+data.data.id+' " selected>'+new_state+'</option>').val(data.data.id);
                $("body #city_id1").html(null).trigger("change");
                $("body #pincode_id1").html(null).trigger("change");
            }else{
                var option = '<option disabled selected>Select City</option>';
                data.data.forEach((e)=>{
                    option += '<option value='+e.id+'>'+e.city_name+'</option>';
                });
                $("body #city_id1").html(option).trigger("change");
                $("body #pincode_id1").html(null).trigger("change");
            }
            }
        })
        }
    });

    $('body #city_id1').select2({placeholder:'Select City',
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
                            data:{city_name:continentVal,state:$('#state_id1').val(),country:$('#country_id1').val(),"_token": "{{ csrf_token() }}",},
                            success:function(data){
                                if(data.new){
                                    let newOption = new Option(continentVal,data.data.id, true, true);
                                    $('body #city_id1').append(newOption).trigger('change');
                                }
                            }
                        })
    				}
    				$('body #city_id1').select2("close");
			    }
		    }
        }
    }).on('select2:close', function(){
        var element = $(this);
        var new_city = $.trim(element.val());
        var country = $('body #country_id1').val();
        var state = $('body #state_id1').val();
        
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
                $("body #pincode_id1").html(null).trigger("change");
            }else{
                var option = '<option disabled selected>Select Pincode</option>';
                data.data.forEach((e)=>{
                    option += '<option value='+e.id+'>'+e.pincode+'</option>';
                });
                $("body #pincode_id1").html(option).trigger("change");
            }
            }
        })
        }
    });

    $('body #pincode_id1').select2({placeholder:'Select Pincode',
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
                            data:{pincode:continentVal,city:$("#city_id1").val(),state:$('#state_id1').val(),country:$('#country_id1').val(),"_token": "{{ csrf_token() }}",},
                            success:function(data){
                                if(data.new){
                                    let newOption = new Option(continentVal,data.data.id, true, true);
                                    $('body #pincode_id1').append(newOption).trigger('change');
                                    
                                }
                            }
                        })
    				}
    				$('body #pincode_id1').select2("close");
			    }
		    }
        }
    }).on('select2:close', function(){
        var element = $(this);
        var new_pincode = $.trim(element.val());
        var city =$("body #city_id1").val();
        var country = $('body #country_id1').val();
        var state = $('body #state_id1').val();

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
</script>