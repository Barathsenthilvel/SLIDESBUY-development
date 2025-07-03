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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Order Report</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Order Report</a>
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
    <div class="flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Order Report</h3>
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
                        <div class="card card-custom">
                            <!--begin::Form-->
                            <form method="POST" action="{{route('admin-report-get')}}">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-2 col-form-label">From Date</label>
                                        <div class="col-4">
                                            <input class="form-control" type="date" value="{{date('Y-m-d')}}"
                                                id="FromDate" />
                                        </div>
                                        <label for="example-date-input" class="col-2 col-form-label">To Date</label>
                                        <div class="col-4">
                                            <input class="form-control" type="date" value="{{date('Y-m-d')}}"
                                                id="ToDate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" onclick="loadtable()" class="btn btn-success mr-2">Submit</button>
                                    {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>

            </div>
        </div>
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">List of Order Report</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered" id="geniustable">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Order Id</th>
                                <th>Order Date</th>
                                
                                <th>Total MRP</th>
                                <th>Discount</th>
                                <th>Special Discount</th>
                                <th>Coupon</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Delivery Charges</th>
                                <th>Total</th>
                                <th>Total Items</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                
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
     $('#geniustable').DataTable({
               processing: false,
               serverSide: false,
               scrollX: true,
               buttons: ['copy', 'csv', 'excel'],
               bDestroy: true
            });
     function loadtable(){
        var table = $('#geniustable').DataTable({
               processing: false,
               serverSide: true,
               scrollX: true,
               ajax: {
                   url : "{{ route('admin-report-order-get') }}",
                   type : 'POST',
                   data : { FromDate : $("#FromDate").val(),ToDate : $("#ToDate").val(),_token: '{{ csrf_token() }}'}
               },
               dom: 'Bfrtip',
               searching: false,
               buttons: ['copy', 'csv', 'excel'],
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'Order_id', name: 'Order_id'},
                        { data: 'Order_date', name: 'Order_date'},
                        
                        { data: 'total_mrp', name: 'total_mrp'},
                        { data: 'discountmrp', name: 'discountmrp'},
                        { data: 'specialdiscount_total', name: 'specialdiscount_total'},
                        { data: 'coupen', name: 'coupen'},
                        { data: 'totalPrice', name: 'totalPrice'},
                        { data: 'totaltax', name: 'totaltax'},
                        { data: 'deliverycharge', name: 'deliverycharge'},
                        { data: 'grandTotal', name: 'grandTotal'},
                        { data: 'total_items', name: 'total_items'},
                        { data: 'payment_status', name: 'payment_status'},
                        { data: 'order_status', name: 'order_status'}

                     ],
                     columnDefs: [
                         {
                             targets: 11,
                            width: '100px',
                            render: function(data, type, full, meta) {
                               return `Items : ${data}`;
                            }
                         
                     },{
                             targets: 13,
                            width: '100px',
                            render: function(data, type, full, meta) {
                               
                                    let temp = ''
                                    for (const key in data[3]) {
                                        temp  = `${temp} </br> ${key}: ${data[3][key]}`
                                    }
                                    return temp;
                            }
                         
                     }],
                drawCallback : function( settings ) {
                        $('.select').niceSelect();
                },
                
                stateSave: true,
                bDestroy: true
            });
     }
</script>
 @endpush   