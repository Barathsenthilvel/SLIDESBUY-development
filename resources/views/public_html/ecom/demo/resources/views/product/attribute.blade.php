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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Product</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route($list) }}" class="text-muted">List of Products</a>
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
                                                <h3 class="card-title">Add Product</h3>
                                               
                                            </div>
                                            
                                            
                                            <form method="get" action="{{ route($list2) }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group">
                                                        <label>Product Type to Upload</label>
                                                        <div class="radio-inline">
                                                            <label class="radio">
                                                            <input type="radio" name="radios2" value="0" required>
                                                            <span></span>Default Product</label>
                                                            @foreach($attributeGroup as $attribute)
                                                            <label class="radio">
                                                            <input type="radio" name="radios2" value="{{$attribute->id}}">
                                                            <span></span>{{$attribute->attribute_group_name}}</label>
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

 @endpush