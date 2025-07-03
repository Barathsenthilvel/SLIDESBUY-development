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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Currency</h5>
                                        <!--end::Page Title-->
                                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="{{ route('admin-currency') }}" class="text-muted">List of Currencies</a>
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
                                                <h3 class="card-title">Edit Currency</h3>
                                               
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
                                            <form method="POST" action="{{route('admin-currency-update',$data->id)}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                   <div class="form-group row">
                                                        <label class="col-2 col-form-label">Currency Title<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{$data->currency_title}}" id="currencyTitle" name="currencyTitle" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Currency Symbol<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{$data->currency_symbol }}" id="currencySymbol" name="currencySymbol" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Currency Price<span class="text-danger">*</span></label>
                                                        
                                                        <div class="col-10">
                                                            <input class="form-control" type="text" value="{{$data->currency_price }}" id="currencyPrice" name="currencyPrice" />
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