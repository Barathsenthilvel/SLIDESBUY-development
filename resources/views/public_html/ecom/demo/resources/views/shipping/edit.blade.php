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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Shipping</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-shipping') }}" class="text-muted">List of Shipping</a>
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
                                                <h3 class="card-title">Add Shipping</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-shipping-update',[$data->id])}}" enctype="multipart/form-data" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Title<span class="text-danger">*</span></label>
                                                        <div class="col-6">
                                                            <input class="form-control" type="text" value="{{$data->title}}" id="title" name="title" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Price<span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                            <input class="form-control" type="number" value="{{$data->price}}" id="price" name="price" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">COD Amount<span class="text-danger">*</span></label>
                                                        <div class="col-3">
                                                            <input class="form-control" type="number" value="{{$data->CODAmount}}" id="CODAmount" name="CODAmount" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Weight<span class="text-danger">*</span></label>
                                                        <div class="col-2">
                                                            <input class="form-control" type="number" value="{{$data->weight[0]}}" id="weight[]" name="weight[]" placeholder="KG" required/>
                                                        </div>
                                                        <label class="col-form-label">To</label>
                                                        <div class="col-2">
                                                            <input class="form-control" type="number" value="{{$data->weight[1]}}" id="weight[]" name="weight[]" placeholder="KG" required/>
                                                        </div>
                                                        <div col="col-2"><label class="col-form-label"><span class="text-danger">*</span>Eg:500g = .5KG</label></div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Fast delivery<span class="text-danger">*</span></label>
                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                            <input data-switch="true" type="checkbox"  data-on-color="success" data-off-color="danger" value="1" id="type" name="type" {{ ($data->type == '1') ? 'checked' : '' }}/>
                                                        </div>
                                                    </div>

                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Country<span class="text-danger">*</span></label>
                                                        <div class="col-8">
                                                            <select class="form-control" id="country_id" name="country_id[]" multiple required>
                                                            <option value="">Select</option>
                                                            @foreach($Country as $country)
                                                            <option value="{{$country->id}}" {{ in_array($country->id,$data->country_id) ? 'selected' : '' }}>{{$country->country_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>

                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">State Name<span class="text-danger">*</span></label>
                                                        <div class="col-8">
                                                            <select class="form-control" type="text" value="" id="state_id" name="state_id[]" multiple required>
                                                                @foreach ( $state as $state)
                                                                <option value="{{$state->id}}" {{ in_array($state->id,$data->state_id) ? 'selected' : '' }}>{{$state->state_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">City Name<span class="text-danger">*</span></label>
                                                        <div class="col-8">
                                                            <select class="form-control" type="text" value="" id="city_id" name="city_id[]" multiple>
                                                                @foreach ( $city as $city)
                                                                <option value="{{$city->id}}" {{ in_array($city->id,$data->city_id) ? 'selected' : '' }}>{{$city->city_name}}</option>
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
    var KTBootstrapSwitch = function() {
        var demos = function() {
            $('[data-switch=true]').bootstrapSwitch();
        };
        return {
            init: function() {  demos();  }
        };
    }();
    jQuery(document).ready(function() {
        KTBootstrapSwitch.init();
    });

    $('#country_id').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });
    $('#state_id').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });
    $('#city_id').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'resolve',
    });
    $('#country_id').change(function(){
        $.get('{{ route('admin-shipping-getstate') }}',{country_id:$(this).val()}, function(data, status){
            var option="";
            data.forEach(element => { option += "<option value="+element.id+">"+element.state_name+"</option>" });
            $("#state_id").html(option);
        });
    });
    $('#state_id').change(function(){
        $.get('{{ route('admin-shipping-getcity') }}',{state_id:$(this).val()}, function(data, status){
            var option="";
            data.forEach(element => { option += "<option value="+element.id+">"+element.city_name+"</option>" });
            $("#city_id").html(option);
        });
    });

</script>
 @endpush