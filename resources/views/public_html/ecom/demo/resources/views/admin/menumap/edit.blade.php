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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Menu Map</h5>
                                        <!--end::Page Title-->
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-menu-module') }}" class="text-muted">List of Menu Map</a>
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
                                                <h3 class="card-title">Edit Menu Map</h3>
                                               
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
                                            <form method="POST" action="{{route('admin-menu-module-update',$data->id)}}" id="formEdit">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Menu Name</label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{ $data->menu_name }}" id="menuName" name="menuName" readonly />
                                                        </div>
                                                    </div>

                          
                                <div class=" form-group row">

                                    
                                                            @foreach($data1 as $key => $module)
                                                            @php
                                                            $moduleId=$module->id;
                                                            @endphp
                                                            <div class="row col-12">
                                                            <div class="col-6">
                                                            <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="moduleName[]" class="checkBoxClass master master{{$module->id}}" data-value="{{$module->id}}" value="{{$module->id}}" {{(($module->admin_menu_id==$data->id && $module->sort_order >0))?'checked':''}}><span></span>{{$module->module_name}}</label>
                                                            </div>

                                                            <div class="col-3 mb-5">
                <input type="text"  class="form-control textBox textBox{{$moduleId}}" name="moduleSort[]" id="moduleSort[]" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="{{(($module->admin_menu_id==$data->id && $module->sort_order >0))?$module->sort_order:''}}" {{(($module->admin_menu_id==$data->id))?'':'readonly'}} >
                                                            </div>

                                                            </div>
                                                            @endforeach
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