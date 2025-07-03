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
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">Return Product</h5>
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
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header flex-wrap py-3">
                                        <div class="card-title">
                                            <h3 class="card-label">List of Return Product</h3>
                                        </div>
                                        <div class="card-toolbar">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered" id="geniustable" >
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Return Order ID</th>
                                                    <th>Return Date</th>
                                                    <th>Order ID</th>
                                                    <th>Docket No</th>
                                                    <th>Charges</th>
                                                    <th>Total</th>
                                                    <th>status</th>
                                                    <th>Invoice</th>
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
        var table = $('#geniustable').DataTable({
               processing: false,
               serverSide: true,
               ajax: "{{ route('admin-datatables-return') }}",
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'ReturnOrder_ID', name: 'ReturnOrder_ID' },
                        { data: 'Return_Date', name: 'Return_Date' },
                        { data: 'Order_ID', name: 'Order_ID' },
                        { data: 'Docket_No', name: 'Docket_No' },
                        { data: 'Charges', name: 'Charges' },
                        { data: 'total', name: 'total'},
                        { data: 'status', name: 'status' },
                        { data: 'invoice', searchable: false, orderable: false},
                        { data: 'action', searchable: false, orderable: false },
                     ],
                drawCallback : function( settings ) {
                        $('.select').niceSelect();
                }
            });
    });
    </script>
 @endpush
