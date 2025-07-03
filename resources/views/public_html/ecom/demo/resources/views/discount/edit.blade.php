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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Discounts</h5>
                                        <!--end::Page Title-->
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-discount') }}" class="text-muted">List of Discount</a>
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
                                                <h3 class="card-title">Edit Discount</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-discount-update',$data->id)}}" onsubmit="return validation();" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Title 
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-4">
                                                             <input class="form-control" type="text" value="{{$data->title }}" id="title" name="title" required/>
                                                         </div>
                                                     </div>          
                                                     <div class="form-group row">
                                                         <label class="col-2 col-form-label">Flat or %
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-3">
                                                            <select class="form-control" id="flar" name="type" required placeholder="Select Product">
                                                                <option value="%" {{($data->type == "%")?'selected':''}}>%</option>
                                                                <option value="RS" {{($data->type == "RS")?'selected':''}}>Flat</option>
                                                            </select>
                                                         </div>                                                   
                                                     </div> 
                                                     <div class="form-group row">
                                                         <label class="col-2 col-form-label">Amount 
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-4">
                                                             <input class="form-control" type="text" value="{{ $data->number}}" id="number" name="number" required/>
                                                         </div>
                                                     </div> 
                                                     <div class="form-group row">
                                                         <label class="col-2 col-form-label">Expiry Date
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-2">
                                                             <input class="form-control" type="date" value="{{ $data->expiry_date}}" id="expiry_date" name="expiry_date" required/>
                                                         </div>
                                                     </div> 
                                                     <div class="form-group row">
                                                          <label class="col-2 col-form-label">Product
                                                          <span class="text-danger">*</span></label>
                                                          <div class="col-10">
                                                             <select id="choices-multiple-remove-button" name="product[]" multiple required placeholder="Select Product">
                                                                 @foreach($product as $datas)
                                                                 <option value="{{$datas->id}}" {{ (array_key_exists($datas->id,$product2))?'selected':'' }}>{{$datas->product_title}}</option>
                                                                 @endforeach
                                                             </select>
                                                          </div>                                                   
                                                      </div>  
                                                      <div class="form-group row">
                                                         <label class="col-2 col-form-label">Show in Home</label>
                                                         <div class="col-lg-4 col-md-4 col-sm-4">
                                                         
                                                             <input data-switch="true" type="checkbox" {{ ($data->show_home == 'on') ? 'checked' : '' }} value="on" name="show_home" data-on-color="success" data-off-color="danger"  />
                                                         </div>
                                                     </div>          
                                                     <div class="form-group row">                                                         
                                                         <div class="col-12" id="table">
 
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
    // Class definition

  var KTBootstrapSwitch = function() {

// Private functions
var demos = function() {
// minimum setup
$('[data-switch=true]').bootstrapSwitch();
};

return {
// public functions
init: function() {
    demos();
},
};
}();

jQuery(document).ready(function() {
   KTBootstrapSwitch.init();
});
   var array2 = [];

   $('#choices-multiple-remove-button').select2({
       allowClear: true,
       dropdownAutoWidth:true,
       width:'75%',
   });
   $("#flar").on('change',function(){
       $("#choices-multiple-remove-button").trigger("change");
   });
   $("input[name=number]").on('change',function(){
       $("#choices-multiple-remove-button").trigger("change");
   });

   $("#choices-multiple-remove-button").on('change',function(){
       $.post('{{route('admin-discount-load')}}',{"_token": "{{ csrf_token() }}",data:$(this).val(),type:$('#flar').val(),number:$('#number').val()},function(data,status){
           $('#table').html(data);
       });
   });

   $("#choices-multiple-remove-button").trigger("change");
   </script>
 @endpush