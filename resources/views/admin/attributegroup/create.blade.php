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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Attribute Group</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-attributegroup') }}" class="text-muted">List of Attribute Groups</a>
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
                                                <h3 class="card-title">Add Attribute Group</h3>
                                               
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
                                            
                                            <form method="POST" action="{{route('admin-attributegroup-store')}}" enctype="multipart/form-data" id="formCreate" onsubmit="CKEditor5.updateSourceElement();">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Attribute Group Name<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="attributeGroupName" name="attributeGroupName" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Description</label>
                                                        
                                                        <div class="col-10">
                                                            <textarea name="descriptionGroup" id="kt-ckeditor" ></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Sorting Order</label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="attributeGroupSort" name="attributeGroupSort" required>
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
ClassicEditor.create( document.querySelector( '#kt-ckeditor' ) )
        .then( editor => { window.CKEditor5 = editor;} )
		.catch( error => { console.error( error ); });
</script>
 @endpush