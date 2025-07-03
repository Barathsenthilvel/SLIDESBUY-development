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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Tax</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-tax') }}" class="text-muted">List of Taxes</a>
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
                                                <h3 class="card-title">Edit Tax</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-tax-update',$data->id)}}" enctype="multipart/form-data" id="formEdit" onsubmit="CKEditor5.updateSourceElement();">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tax Name<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-9">
                                                            <input class="form-control" type="text" value="{{$data->tax_name}}" id="taxName" name="taxName" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tax Description</label>
                                                        
                                                        <div class="col-10">
                                                        <textarea name="taxDescription" id="ktckeditor">{{$data->tax_description}}</textarea>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tax Type<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-2">
                                                            <select class="form-control" id="taxType" name="taxType" >
                                                            <option value="1" {{($data->tax_type == 1)?"selected":""}}>Percentage</option>
                                                            <option value="2"{{($data->tax_type == 2)?"selected":""}}>Fixed Amount</option>
                                                           
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tax Rate<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-3">
                                                            <input class="form-control" type="number" value="{{ $data->tax_rate}}" id="taxRate" name="taxRate" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Billing Country<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-3">
                                                            <select class="form-control" id="countryName" name="countryName" >
                                                            <option value="">Select</option>
                                                            @foreach($country as $country)
                                                            <option value="{{$country->id}}" {{($country->id == $data->tax_country)?"selected":""}}>{{$country->country_name}}</option>
                                                            @endforeach
                                                           
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div id="template">
                                                        @if ($data->tax_country == '100')
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Billing State<span class="text-danger">*</span></label>
                                                            <div class="col-3">
                                                                <select class="form-control" id="stateName" name="stateName" >
                                                                <option value="">Select</option>
                                                                @foreach($state as $state)
                                                                <option value="{{$state->id}}" {{($state->id == $data->tax_states)?"selected":""}}>{{$state->state_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="form-group row">
                                                            <label class="col-2 col-form-label">Billing State<span class="text-danger">*</span></label>
                                                            <div class="col-3">
                                                                <input class="form-control" type="text" value="{{$data->tax_states}}" id="stateName" name="stateName" >
                                                            </select>
                                                            </div>
                                                        </div>
                                                        @endif
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
            url:"{{route('admin-tax-template')}}",
            data:{"_token": "{{ csrf_token() }}",id:countryName},
            success:function(data){
                $('#template').html(data);
            }
        });
    });
ClassicEditor.create( document.querySelector( '#ktckeditor' ) )
        .then( editor => { window.CKEditor5 = editor;} )
		.catch( error => { console.error( error ); });
     

</script>
 @endpush