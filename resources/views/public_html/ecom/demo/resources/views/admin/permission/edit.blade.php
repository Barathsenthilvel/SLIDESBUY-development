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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Permission</h5>
                                        <!--end::Page Title-->
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-permission') }}" class="text-muted">List of Permissions</a>
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
                                                <h3 class="card-title">Edit Permission</h3>
                                               
                                            </div>
                                            <!--begin::Form-->
                                            @if(count($errors) > 0 )
                            @foreach($errors->all() as $error)

                            <div class="alert alert-custom alert-danger fade show" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">{{$error}}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @if(session()->has('msg') != "")
                            <div class="alert alert-custom alert-success fade show" role="alert">
                                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                <div class="alert-text">{{session()->get('msg') }}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                            @endif
                                            <form method="POST" action="{{route('admin-permission-update',$data->id)}}">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Role</label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{ $data->role_name }}" id="roleName" name="roleName" readonly />
                                                        </div>
                                                    </div>
                                                    @foreach($menuAttributes as $menu)
                            <h3 class="card-title">{{$menu->menu_name}}</h3>

                          
                                <div class=" form-group row">
                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <div class="form-group col-lg-12">
                                                <label class="col-form-label">Page Name</label>
                                            </div>
                                             <div class="form-group col-lg-12" style="margin-bottom: 23%;">
                                                <label class="checkbox checkbox-outline"></label>
                                            </div>
                                            @foreach($menu->menuModule as $subMenusName)
                                            @if($subMenusName->sort_order > 0)
                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">{{$subMenusName->module_name}}</label>
                                            </div>

                                            @endif
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <div class="form-group col-lg-12">
                                                <label class="col-form-label">Add</label>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" class="checkBoxClass master" data-value="1" value="1"><span></span></label>
                                            </div>
                                            @foreach($menu->menuModule as $subMenusName)
                                            @if($subMenusName->sort_order > 0)

                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" name="attributes[]" {{in_array($subMenusName->module_path.'1',explode(',',$data->user_permission))?'checked':''}} class="checkBoxClass child" data-value="{{$subMenusName->module_path}}1" value="{{$subMenusName->module_path}}1"><span></span></label>
                                            </div>

                                            @endif
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <div class="form-group col-lg-12">
                                                <label class="col-form-label">Edit</label>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" class="checkBoxClass master" data-value="1" value="1"><span></span></label>
                                            </div>
                                  @foreach($menu->menuModule as $subMenusName)
                                            @if($subMenusName->sort_order > 0)

                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" name="attributes[]" {{in_array($subMenusName->module_path.'2',explode(',',$data->user_permission))?'checked':''}} class="checkBoxClass child" data-value="{{$subMenusName->module_path}}2" value="{{$subMenusName->module_path}}2"><span></span></label>
                                            </div>

                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <div class="form-group col-lg-12">
                                                <label class="col-form-label">Delete</label>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" class="checkBoxClass master" data-value="1" value="1"><span></span></label>
                                            </div>
                            @foreach($menu->menuModule as $subMenusName)
                                            @if($subMenusName->sort_order > 0)

                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" name="attributes[]" {{in_array($subMenusName->module_path.'3',explode(',',$data->user_permission))?'checked':''}} class="checkBoxClass child" data-value="{{$subMenusName->module_path}}3" value="{{$subMenusName->module_path}}3"><span></span></label>
                                            </div>

                                            @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group row">
                                            <div class="form-group col-lg-12">
                                                <label class="col-form-label">View</label>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" class="checkBoxClass master" data-value="1" value="1"><span></span></label>
                                            </div>
                            @foreach($menu->menuModule as $subMenusName)
                                            @if($subMenusName->sort_order > 0)

                                            <div class="form-group col-lg-12">
                                                <label class="checkbox checkbox-outline">
                            <input type="checkbox" name="attributes[]" {{in_array($subMenusName->module_path,explode(',',$data->user_permission))?'checked':''}} class="checkBoxClass child" data-value="{{$subMenusName->module_path}}" value="{{$subMenusName->module_path}}"><span></span></label>
                                            </div>

                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
          

                                        
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
        var master = $(this).data('value');
        if($(this).prop("checked") == true){
        $(this).parent().parent().parent().find('.checkBoxClass').prop('checked',true);
        }
        if($(this).prop("checked") == false){
        $(this).parent().parent().parent().find('.checkBoxClass').prop('checked',false);
        }
            
        });

        $(".child").click(function(){
        var child = $(this).data('value');
       
        if($(this).prop("checked") == false){
        $(this).parent().parent().parent().find('.master').prop('checked',false);
        }
            
        });
</script>
 @endpush