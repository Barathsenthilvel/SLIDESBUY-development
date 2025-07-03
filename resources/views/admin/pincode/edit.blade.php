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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Pincode</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-pincode') }}" class="text-muted">List of Pincodes</a>
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
                                                <h3 class="card-title">Edit Pincode</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-pincode-update',$data->id)}}" enctype="multipart/form-data" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Country<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <select class="form-control" id="countryName" name="countryName" >
                                                            <option value="">Select</option>
                                                            @foreach($country as $country)
                                                            <option value="{{$country->id}}" {{($data->country_id == $country->id)?"selected":""}}>{{$country->country_name}}</option>
                                                            @endforeach
                                                           
                                                        </select>
                                                        </div>
                                                    </div>
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">State<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <select class="form-control" id="stateName" name="stateName" >
                                                            <option value="">Select</option>
                                                            @foreach($data1 as $state)
                                                            <option value="{{$state->id}}" {{($data->state_id == $state->id)?"selected":""}}>{{$state->state_name}}</option>
                                                            @endforeach
                                                           
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">City<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <select class="form-control" id="cityName" name="cityName" >
                                                            <option value="">Select</option>
                                                            @foreach($city as $city)
                                                            <option value="{{$city->id}}" {{($data->city_id == $city->id)?"selected":""}}>{{$city->city_name}}</option>
                                                            @endforeach
                                                            
                                                           
                                                        </select>
                                                        </div>
                                                    </div>

                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Pincode<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{$data->pincode}}" id="pincode" name="pincode" />
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
   $("#countryName").change(function(){
        var countryName=$("#countryName").val();
        $.ajax({
            type:"POST",
            url:"{{route('getState')}}",
            data:{"_token": "{{ csrf_token() }}",id:countryName},
            success:function(data){
                $.each(data, function(index, element) {
                $("#stateName").html('<option value="'+element["id"]+'">'+element["state_name"]+'</option');

                 });
            }
        });
     });

   $("#stateName").change(function(){
        var stateName=$("#stateName").val();
        $.ajax({
            type:"POST",
            url:"{{route('getCity')}}",
            data:{"_token": "{{ csrf_token() }}",id:stateName},
            success:function(data){
                if(data==''){
                $("#cityName").html('');
                }else{
                $.each(data, function(index, element) {
                $("#cityName").html('<option value="'+element["id"]+'">'+element["city_name"]+'</option');

                 });
            }
            }
        });
     });
 </script>  
 @endpush