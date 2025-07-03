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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Attribute Map Group</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-mapgroup') }}" class="text-muted">List of Attribute Map Groups</a>
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
                                                <h3 class="card-title">Edit Attribute Map Group</h3>
                                               
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
                                            <form method="POST" action="{{route('admin-mapgroup-update',$data->id)}}" enctype="multipart/form-data" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Attribute Group Name<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <select class="form-control" id="groupName" name="groupName" >
                                                            <option value="">Select</option>
                                                            @foreach($groupName as $groupName)
                                                            <option value="{{$groupName->id}}" {{($data->group_name==$groupName->id)?'selected':''}}>{{$groupName->attribute_group_name}}</option>
                                                            @endforeach
                                                           
                                                        </select>
                                                        </div>
                                                    </div>
                                                   <div class="form-group row">
                                                       <label class="col-2 col-form-label"></label>
                                                        
                                                        <div class="col-11">
                                                          <div class="row mb-5">
                                                            <div class="col-4">
                                                                <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="checkAll" id="checkAll" value="1"><span></span>All Attribute</label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label>Filter</label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label>Front</label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label>Combined Price</label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label>Sorting</label>
                                                            </div>

                                                            </div>
                                                            @php
                                                            $attributes=explode(',',$data->attribute);
                                                            $filter=explode(',',$data->filter);
                                                            $front=explode(',',$data->front);
                                                            $combined_price=explode(',',$data->combined_price);
                                                            $sort_order=explode(',',$data->sort_order);
                                                            if(empty($sort_order)){
                                                                $combinedSort=[];
                                                                }
                                                                else{
                                                                $combinedSort=array_combine($attributes,$sort_order);
                                                            }
                                                            @endphp

                                                            @foreach($attribute as $key => $attribute)
                                                            @php
                                                            $attributeId=$attribute->id;
                                                            @endphp
                                                            <div class="row mb-5">
                                                            <div class="col-4">
                                                            <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="attributeName[]" class="checkBoxClass master master{{$attribute->id}}" data-value="{{$attribute->id}}" value="{{$attribute->id}}" {{(in_array($attribute->id,$attributes))?'checked':''}} ><span></span>{{$attribute->attribute_name}}</label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="attributeFilter[]" class="checkBoxClass child child{{$attribute->id}}"  data-value="{{$attribute->id}}" value="{{$attribute->id}}" {{(in_array($attribute->id,$filter))?'checked':''}}>
                                                                <span></span></label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="attributeFront[]" class="checkBoxClass child child{{$attribute->id}}"  data-value="{{$attribute->id}}" value="{{$attribute->id}}" {{(in_array($attribute->id,$front))?'checked':''}} >
                                                                <span></span></label>
                                                            </div>
                                                            <div class="col-2">
                                                            <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="attributePrice[]" class="checkBoxClass child child{{$attribute->id}}"  data-value="{{$attribute->id}}" value="{{$attribute->id}}" {{(in_array($attribute->id,$combined_price))?'checked':''}} >
                                                                <span></span></label>
                                                            </div>

                                                            <div class="col-2">
                <input type="text"  class="form-control textBox textBox{{$attributeId}}" name="attributeSort[]" id="attributeSort[]" value="{{(in_array($attributeId,$attributes))?((empty($combinedSort))?'':$combinedSort[$attributeId]):''}}" {{(in_array($attributeId,$attributes))?"":"readonly"}} >
                                                            </div>

                                                            </div>
                                                            @endforeach
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
   $(document).ready(function () {
    $("#checkAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                $(".textBox").prop("readonly",false);
                $(".textBox").val('0');
    });
    });


   $(".master").click(function(){
            var trigVal = $(this).data('value');
            //alert(trigVal);
            if($(this).prop("checked") == true){
                //alert("Checkbox is checked.");
                $(".child"+trigVal).prop("checked", "checked");
                $(".textBox"+trigVal).prop("readonly",false);
                
                $(".textBox"+trigVal).val('0');
            }
            else if($(this).prop("checked") == false){
                //alert("Checkbox is unchecked.");
                $(".child"+trigVal).prop("checked", "");
                $(".textBox"+trigVal).prop("readonly",true);
                $(".textBox"+trigVal).val('');
            }
        });
        $(".child").click(function(){
            var trigVal = $(this).data('value');
            var flag=0;
            $(".child"+trigVal).each(function(e){
                if($(this).prop("checked") == true)
                flag=1; 
            });
            if(flag==1){
                //alert("if");
                $(".master"+trigVal).prop("checked", "checked");
                $(".textBox"+trigVal).prop("readonly",false);
                $(".textBox"+trigVal).val('0');
            }
            else {
                //alert("else");
              $(".master"+trigVal).prop("checked", ""); 
                $(".textBox"+trigVal).prop("readonly",true);
                $(".textBox"+trigVal).val('');
            }
            
        });
        
 </script>  
 @endpush