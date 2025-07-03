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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Category</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-category') }}" class="text-muted">List of Category</a>
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
                                                <h3 class="card-title">Add Category</h3>
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
                                            <form method="POST" action="{{route('admin-category-store')}}" enctype="multipart/form-data" id="formCreate">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" id="id" value="0">
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Category Name
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{old('category_name')}}" id="category_name" name="category_name" required/>
                                                        </div>
                                                    </div>    
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Parent Category
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                         <select class="form-control" id="parent_category_id" name="parent_category_id" >
                                                            <option value="0">Parent Category</option>
                                                            @foreach($category as $category)
                                                            <option value="{{$category->id}}" {{(old('parent_category_id')==$category->id)?'selected':''}}>{{$category->category_name}}</option>

                                                            @foreach($category->subs as $subCategory)
                                                            <option value="{{$subCategory->id}}" {{(old('parent_category_id')==$subCategory->id)?'selected':''}}>--{{$subCategory->category_name}}</option>
                                                            @endforeach

                                                            @endforeach
                                                         </select>
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Category URL
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('Category_url')}}" id="Category_url" name="Category_url" required/>
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">HSN Code
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('hns_code')}}" id="hns_code" name="hns_code" />
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Description
                                                         <span class="text-danger"></span></label>
                                                         <div class="col-10">
                                                            <textarea name="short_description" id="kt-ckeditor-4">{{old('short_description')}}</textarea>
                                                            <div class="fv-plugins-message-container"></div>
                                                         </div>
                                                     </div>   
                                     <div class="form-group row">
                                         <label class="col-2 col-form-label">Category Style1
                                         <span class="text-danger">*</span></label>
                                         <div class="col-3">
                                             <label for="style_1">
                                                <img style="width:255px;border:2px dashed #222;height: 255px;" src="" id="image1">
                                                </label>
                                            <input style="display: none" type="file"  accept="image/*" onchange="loadFile(event)" id="style_1" name="style_1" >
                                            
                                        <span class="text-danger">Width:220px and Height:185px</span>
                                        </div>
                                     </div>         
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Category Banner
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-3">
                                                            <label for="category_banner">
                                                               <img style="width:255px;border:2px dashed #222;height: 255px;" >
                                                               <input type="hidden" name="category_banner" value="">
                                                            </label>
                                                           <input style="display: none" type="file" class="upload_image"  accept="image/*"  id="category_banner">
                                                           <span class="text-danger">Width:600px and Height:370px</span>
                                                       </div>
                                                     </div> 
                                     
                                     <div class="form-group row">
                                         <label class="col-2 col-form-label">Category Style3
                                         <span class="text-danger">*</span></label>
                                         <div class="col-3">
                                             <label for="style_3">
                                                <img style="width:255px;border:2px dashed #222;height: 255px;" src="" id="image3">
                                                </label>
                                            <input style="display: none" type="file"  accept="image/*" onchange="loadFile1(event)"  id="style_3" name="style_3" >
                                            
                                        <span class="text-danger">Width:600px and Height:600px</span>
                                        </div>
                                     </div>           
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Category Mobile Image
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-3">
                                                            <label for="mobile_image">
                                                               <img  style="width:255px;border:2px dashed #222;height: 255px;">
                                                               <input type="hidden" name="mobile_image" value="">
                                                              
                                                            </label>
                                                           <input type="file" style="display: none" class="upload_image" accept="image/*" value="" id="mobile_image">
                                                       </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Meta Title
                                                         </label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('meta_title')}}" id="meta_title" name="meta_title" />
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Meta Description
                                                         </label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('meta_description')}}" id="meta_description" name="meta_description" />
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Meta Keywords
                                                         </label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('meta_keywords')}}" id="meta_keywords" name="meta_keywords" />
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Sorting Order
                                                         </label>
                                                         <div class="col-10">
                                                             <input class="form-control" type="text" value="{{old('sort_order')}}" id="sort_order" name="sort_order" />
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Featured Category
                                                         </label>
                                                         <div class="col-10">
                                                            <label class="checkbox checkbox-success">
                                                                <input type="checkbox" name="featured_category" value=1 {{ (old('featured_category')==1) ? ' checked' : '' }}/>
                                                                <span></span>
                                                            </label>
                                                         </div>
                                                     </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Featured Collection
                                                         </label>
                                                         <div class="col-10">
                                                            <label class="checkbox checkbox-success">
                                                                <input type="checkbox" name="featured_collection" value=1 {{ (old('featured_collection')==1) ? ' checked' : '' }}/>
                                                                <span></span>
                                                            </label>
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
        $('#category_name').blur(function(){
            var str = $('#category_name').val();
            var str1 = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            $('#Category_url').val(str1);
        });
    </script>
    <script>
        var objectB = new Object();
        var objectA = new Object();
        $(document).ready(function(){
            $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:600,
              height:370,
              type:'square' //circle
            },
            boundary:{
              width:700,
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
                    url:"{{ route('admin-category-cropimage') }}",
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
        <script>
  function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function(e){
        
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                  
        var height = image.naturalHeight;
    var width = image.naturalWidth;
    if ((height == 185) && (width == 220)) {
        return true;
    }else{
      alert("Kindly check image width and height");
      $('#image1').attr('src','');
      $('#style_1').val();
      return false;
    }  
                };
      var output = document.getElementById('image1');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  function loadFile1(event) {
    var reader = new FileReader();
    reader.onload = function(e){
        
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                  
        var height = image.naturalHeight;
    var width = image.naturalWidth;

    if ((height == 600) && (width == 600)) {
        return true;
        else{
      alert("Kindly check image width and height");
      $('#image3').attr('src','');
      $('#style_3').val();
      return false;
    }  
                };
      var output = document.getElementById('image3');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
 @endpush