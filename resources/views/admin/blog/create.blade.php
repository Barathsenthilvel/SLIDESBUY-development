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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Blog</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-blog') }}" class="text-muted">List of Blog</a>
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
                                                <h3 class="card-title">Add Blog</h3>
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
                                            <form method="POST" action="{{route('admin-blog-store')}}" enctype="multipart/form-data" id="formCreate">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" id="id" value="0">
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Blog Url
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{old('blog_url')}}" id="blog_url" name="blog_url" required/>
                                                        </div>
                                                    </div>    
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Blog Type
                                                         <span class="text-danger">*</span></label>
                                                         <div class="radio-inline">
															<label class="radio">
															<input type="radio" name="blog_type" id="image_type" value="0" required>
															<span></span>Image</label>
															<label class="radio">
															<input type="radio" name="blog_type"  id="video_type" value="1" required>
															<span></span>Video</label>
														</div>
                                                     </div>  
                                                     
                                                     <div class="form-group row" id="image_ids">
                                <label class="col-2 col-form-label">Blog image<span class="text-danger">*</span> </label>
                                <div class="col-3">
                                    <label for="blog_image"  ><img style="width:250px;border:2px dashed #222;height: 310px">
                                    <input type="hidden" name="blog_image" value=""></label>
                                    <input type="file" class="upload_image" id="blog_image" style="width:250px;border:2px dashed #222;height: 310px;display: none"  accept="image/*">
                                    <span class="form-text text-muted">Image width and height:250*310</span>
                                </div>
                            </div>
                                                                               
                                                    <div class="form-group row"  id="video_ids">
                                                         <label class="col-2 col-form-label">Blog Video Url
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('blog_video')}}" id="blog_video" name="blog_video"  />
                                                         </div>
                                                     </div>   
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Description
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                            <textarea name="blog_content" id="kt-ckeditor-4" >{{old('blog_content')}}</textarea>
                                                            <div class="fv-plugins-message-container"></div>
                                                         </div>
                                                     </div>
                                                     
                                                     <div class="form-group row">
                                <label class="col-2 col-form-label">Home Flag</label>

                                
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input data-switch="true" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" name="home_flag" value="1" {{ (old('home_flag') == '1') ? 'checked' : '' }} />
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
        $(document).ready(function() {
            
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
    $("#image_ids").hide();
    $("#video_ids").hide();
    $("input[name$='blog_type']").click(function() {
        var test = $(this).val();
        if(test == 0){
    $("#image_ids").show();
    $("#video_ids").hide();
    $("#blog_image").prop('required',true);
    $("#blog_video").prop('required',false);
            
        }else{
            
    $("#image_ids").hide();
    $("#video_ids").show();
    $("#blog_image").prop('required',false);
    $("#blog_video").prop('required',true);
        }
    });
});
    </script>
    <script>
        var objectB = new Object();
        var objectA = new Object();
        $(document).ready(function(){
            $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:255,
              height:255,
              type:'square' //circle
            },
            boundary:{
              width:400,
              height:400
            }
          });
        
          $('.upload_image').on('change', function(){
            objectB = this.parentElement;
            objectA = this;
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
          });
        
          $('.crop_image').click(function(event){
              var id= $("#id").val();
              var table_colum = objectA.id;
            $image_crop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:"{{ route('admin-blog-cropimage') }}",
                    type: "POST",
                    data:{id:id,table_colum:table_colum,"image": response,"_token": "{{ csrf_token() }}"},
                    success:function(data){  
                        $('#uploadimageModal').modal('hide');
                        objectB.children[0].children[1].value = data['Name'];
                    }
                });
                objectB.children[0].children[0].src = response;
                $('#uploadimageModal').modal('hide');
            })
          });
        });  
        </script>
 @endpush