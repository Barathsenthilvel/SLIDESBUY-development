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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Banner</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-banner') }}" class="text-muted">List of Banners</a>
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
                                                <h3 class="card-title">Add Banner</h3>
                                               
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

                                            <form method="POST" action="{{route('admin-banner-store')}}" enctype="multipart/form-data" id="formCreate">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" id="id" value="0">

                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Banner Name<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="bannerName" name="bannerName" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Position<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-4">
                                                            <select class="form-control" id="position" name="position" >
                                                            <option value="">Select</option>
                                                            <option value="1">Main Banner</option>
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="app">
                                                        <label class="col-2 col-form-label">Banner Image<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <label for="bannerImage">
                                                                <img  style="width:640px;border:2px dashed #222;height: 295px" id="image1">
                                                            </label>
                                                            <input type="file" style="display: none" accept="image/*" onchange="loadFile(event)" id="bannerImage" name="bannerImage" > 
                                                            <span class="form-text text-muted">Image width and height:1920*650</span>
                                                        </div>
                                                    </div>


                                                     <div class="form-group row">
                                                        <label class="col-2 col-form-label">Mobile Image<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <label for="mobileImage">
                                                               <img  style="width:640px;border:2px dashed #222;height: 295px" id="image2">
                                                           </label>
                                                           <input type="file" style="display: none"onchange="loadFile1(event)" accept="image/*" id="mobileImage" name="mobileImage">
                                                           <span class="form-text text-muted">Image width and height:600*370</span>
                                                       </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Banner Title</label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="bannerTitle" name="bannerTitle" />
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Banner Link</label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="bannerLink" name="bannerLink" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Sorting Order</label>
                                                        
                                                        <div class="col-4">
                                                            <input class="form-control" type="number" value="" id="sortOrder" name="sortOrder" />
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
  function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function(e){
        
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                  
        var height = image.naturalHeight;
    var width = image.naturalWidth;
    if ((height == 650) && (width == 1920)) {
        return true;
      }else{
      alert("Kindly check image width and height");
      $('#image1').attr('src','');
      $('#bannerImage').val();
      return false;
      
    } 
                };
      var output = document.getElementById('image1');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  
  
  function loadFile1(event) {
    var reader = new FileReader();
    reader.onload = function(e){
        
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                  
        var height = image.naturalHeight;
    var width = image.naturalWidth;
    if ((height == 370) && (width == 600)) {
        return true;
        }else{
      alert("Kindly check image width and height");
      $('#image2').attr('src','');
      $('#mobileImage').val();
      return false;
    } 
                };
      var output = document.getElementById('image2');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
    
    </script>
 @endpush