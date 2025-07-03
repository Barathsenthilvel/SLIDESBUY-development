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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Subscriptions</h5>
                                        <!--end::Page Title-->
                                        <!--begin::Breadcrumb-->
                                       
                                        <!--end::Breadcrumb-->
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
                                @if(session('success'))

                                        <div class="alert alert-custom alert-success fade show" role="alert">
                                        <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                        <div class="alert-text">{{session('success')}}</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>

                                    @endif

                                @if(session('error'))

                                        <div class="alert alert-custom alert-danger fade show" role="alert">
                                        <div class="alert-icon"><i class="flaticon2-radial-warning"></i></div>
                                        <div class="alert-text">{{session('error')}}</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header flex-wrap py-3">
                                        <div class="card-title">
                                            <h3 class="card-label">Subscriptions Setup</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <a href="{{ route('admin-plan-create') }}" class="btn btn-primary font-weight-bolder">
                                                <i class="la la-plus"></i>Add Subscription Plan</a>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered" id="plantable" >
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>DiscountType</th>
                                                    <th>DownloadLimit</th>
                                                    <th>Validity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                          
                                        </table>
                                        <!--end: Datatable-->
                                    </div>
                                </div>
                                <!--end::Card-->
                               
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
 @endsection   
 @push('script')                  
     <script type="text/javascript">
        $(function(){
        var table = $('#plantable').DataTable({
               processing: false,
               serverSide: true,
               ajax: "{{ route('admin-plan-datatable') }}",
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'name', name: 'name' },
                        { data: 'price', name: 'price' },
                        { data: 'discount', name: 'discount' },
                        { data: 'discount_type', name: 'discount_type' },
                        { data: 'download_limit', name: 'download_limit' },
                        { data: 'validity', name: 'validity' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false },
                     ],
                drawCallback : function( settings ) {
                        $('.select').niceSelect();
                }
            });
    });

$(document).on('change','.droplinks',function () {

        var link = $(this).val();
        var data = $(this).find(':selected').attr('data-val');
        if(data == 0)
        {
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-success").addClass("drop-danger");
        }
        else{
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-danger").addClass("drop-success");
        }
        $.get(link);
        $.notify("Status Updated Successfully.","success");
      });

{{-- DATA TABLE ENDS--}}

</script>
 @endpush   
