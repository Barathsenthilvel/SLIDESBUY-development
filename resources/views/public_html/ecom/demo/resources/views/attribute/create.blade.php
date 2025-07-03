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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Attribute</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-attribute') }}" class="text-muted">List of Attributes</a>
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
                                                <h3 class="card-title">Add Attribute</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-attribute-store')}}" enctype="multipart/form-data" id="formCreate">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Attribute Name<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="" id="attributeName" name="attributeName" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Attribute Type<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <select class="form-control" id="attributeType" name="attributeType" >
                                                            <option value="">Select</option>
                                                            @foreach($data as $data)
                                                            <option value="{{$data->id}}">{{$data->attribute_type}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div id="unitDesc" style="display: none;">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Data Type</label>
                                                        
                                                        <div class="col-10 col-form-label">
                                                              <select class="form-control" id="dataType" name="dataType" >
                                                            <option value="1">Text</option>
                                                            <option value="2">Number</option>
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div id="cloning">
                                                    <div class="form-group row" id="app">
                                                        <label class="col-2 col-form-label"></label>
                                                        
                                                        <div class="col-10">
                                                            <div class="row">

                                                            <div class="col-2">
                                                        <label>Values</label>
                                                            <input type="text"  class="form-control" name="attributeValue[]" id="attributeValue[]">
                                                            </div>

                                                            <div class="col-2">
                                                            <label>Units</label>
                                                            <input type="text"  class="form-control" name="attributeUnit[]" id="attributeUnit[]">
                                                            </div>

                                                            <div class="col-2">
                                                            <label>Icons</label>
                                                            <input type="text"  class="form-control" name="attributeIcons[]" id="attributeIcons[]">
                                                            </div>

                                                            <div class="col-2">
                                                            <label>Sorting</label>
                                                            <input type="text"  class="form-control" name="attributeSort[]" id="attributeSort[]">
                                                            </div>

                                                            <div class="col-2 mt-8 ">
                                                            <label></label>
                                                            <button class="btn btn-success" type="button" onclick="cloneDiv()">Add</button>
                                                            </div>

                                                            <div class="col-2 mt-8">
                                                            <label></label>
                                                            <button class="btn btn-success" id="removeButton" style="display:none;" type="button" onclick="cloneRemove(this)">Remove</button>
                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                     <div class="form-group row">
                                                        <label class="col-2 col-form-label">Units Display</label>
                                                        
                                                        <div class="col-10 col-form-label">
                                                               <div class="form-check pl-0 checkbox-inline">
                                                                <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="unitDisplay" value="1">
                                                                <span></span></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Icons Display</label>
                                                        
                                                        <div class="col-10">
                                                            <div class="form-check pl-0 checkbox-inline">
                                                                <label class="checkbox checkbox-outline">
                                                                <input type="checkbox" name="iconDisplay" value="1">
                                                                <span></span></label>
                                                            </div>
                                                        </div>
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
     $(document).ready(function(){
         $("#unitDesc").hide();
    });

     $("#attributeType").change(function(){
        var attributeType=$("#attributeType").val();
        if(attributeType == 3 || attributeType == 4 || attributeType == 5|| attributeType == 6){
            $("#unitDesc").show();
        }else{
         $("#unitDesc").hide();

        }
     });

     function cloneDiv(){
        var clone = document.getElementById('app').cloneNode(true); // "deep" clone
        var data = clone.querySelectorAll("input")
        data.forEach(function(data){ data.value="";});
        clone.querySelector("#removeButton").removeAttribute("style");
        document.getElementById("cloning").appendChild(clone);
        }

    function cloneRemove(button)
        {
            var parent = button.parentNode;
            var grand_father = parent.parentNode;
            var GEAST_grand_father = grand_father.parentNode;
            GEAST_grand_father.removeChild(grand_father);
        }    

</script>
 @endpush