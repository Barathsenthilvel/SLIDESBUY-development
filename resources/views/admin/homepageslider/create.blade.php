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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Home Page Productsr</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-homeslider') }}" class="text-muted">List of Home Page Products</a>
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
                                                <h3 class="card-title">Add Home Page Products</h3>
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
                                            
                                            <form method="POST" action="{{route('admin-homeslider-store')}}" onsubmit="return validation()" id="formCreate">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Title 
                                                        <span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <input class="form-control" type="text" value="" id="title" name="title" required/>
                                                        </div>
                                                    </div>    
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Type
                                                         <span class="text-danger">*</span></label>
                                                         <div class="col-10">
                                                            <div class="radio-inline">
                                                                <label class="radio radio-success">
                                                                    <input type="radio" name="type" checked="checked" value='1' onclick="show(this)"/>
                                                                    <span></span>
                                                                    Single Category
                                                                </label>
                                                                <label class="radio radio-success">
                                                                    <input type="radio" name="type" value='0' onclick="show(this)"/>
                                                                    <span></span>
                                                                    All Category
                                                                </label>
                                                            </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-group row" id="category">
                                                        <label class="col-2 col-form-label">Parent Category<span class="text-danger">*</span></label>
                                                        <div class="col-4">
                                                            <select class="form-control" id="parentcategory" name="parentcategory" onchange="loadoptionAll(this.value)">
                                                                <option value="">select Category</option>
                                                                @foreach($data as $data)
                                                                <option value="{{$data->id}}">{{$data->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>            
                                                    <div class="form-group row">
                                                         <label class="col-2 col-form-label">Product
                                                         <span class="text-danger">*</span></label>
                                                            <select id="choices-multiple-remove-button" name="product[]" multiple required placeholder="Select Product">
                                                                <option value="">Select Product</option>
                                                            </select>                                                         
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
    var array2 = [];

    $('#choices-multiple-remove-button').select2({
        allowClear: true,
        dropdownAutoWidth:true,
        width:'75%',
    });
    function show(data){
        if(data.value == 1){
            $('#category').show();
            $('#table').html("");
            $("#choices-multiple-remove-button").html("");
        }else{
            $('#category').hide();
            loadoptionAll("All");
            $('#table').html("");
        }
    }
    function loadoptionAll(data){
        if(data != "" && data != null){
            var option = "";
            $.get('{{ route('admin-homeslider-product') }}',{data:data}, function(data, status){
                data.forEach(element => { option += "<option value="+element.id+">"+element.product_title+"</option>" });
                $("#choices-multiple-remove-button").html(option);
            });
        }else{
            $("#choices-multiple-remove-button").html("");
        }   
    }

    function validation(){
        var array = $.map($("input[name='sort[]']"),function(e){ return $(e).val();});
        return array.length === new Set(array).size;
    }

    $("#choices-multiple-remove-button").on('change',function(){
        $.post('{{route('admin-homeslider-load')}}',{"_token": "{{ csrf_token() }}",data:$(this).val()},function(data,status){
            $('#table').html(data);
            array2.forEach((v,k)=>{ $('input[data-id='+k+']').val(v)});
        });
    });
    function arraypush(data){
        array2[data.dataset.id] = data.value;
    }
    </script>
 @endpush