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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Sales Report</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Sales Report</a>
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
                            <h3 class="card-title">Sales Report</h3>
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
                        <h3 class="card-label">List of Sales Report</h3>
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
                                <th>Product SKU</th>
                                <th>Vendor SKU</th>
                                <th>Product Name</th>
                                <th>Vendor Name & ID</th>
                                <th>Cost Price</th>
                                <th>Mark Up (%)</th>
                                <th>Mark Up Price</th>
                                <th>Price 1</th>
                                <th>Customer Group</th>
                                <th>Customer Group Price</th>
                                <th>Price 2</th>
                                <th>Discount</th>
                                <th>Discount Price</th>
                                <th>Price 3</th>
                                <!--<th>Coupon</th>-->
                                <!--<th>Coupon Price</th>-->
                                <th>Amount</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>GST (%)</th>
                                <th>GST Amount</th>
                                <th>Total Amount</th>
                                <!--<th>Customer Paid</th>-->
                                <th>Profit / Loss</th>
                                <th>status</th>
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
                   url : "{{ route('admin-report-get') }}",
                   type : 'POST',
                   data : { FromDate : $("#FromDate").val(),ToDate : $("#ToDate").val(),_token: '{{ csrf_token() }}'}
               },
               dom: 'Bfrtip',
               searching: false,
               buttons: ['copy', 'csv', 'excel'],
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'Order_id', name: 'Order_id'},
                        { data: 'Product_sku', name: 'Product_sku'},
                        { data: 'vendorsku', name: 'vendorsku'},
                        { data: 'Product_name', name: 'Product_name'},
                        { data: 'vendorIDName', name: 'vendorIDName'},
                        { data: 'Cost', name: 'Cost'},
                        { data: 'markup', name: 'markup'},
                        { data: 'markupprice', name: 'markupprice'},
                        { data: 'PriceOne', name: 'PriceOne'},
                        { data: 'Customer', name: 'Customer'},
                        { data: 'CustomerPrice', name: 'CustomerPrice'},
                        { data: 'PriceTwo', name: 'PriceTwo'},
                        { data: 'discount', name: 'discount'},
                        { data: 'DiscountPrice', name: 'DiscountPrice'},
                        { data: 'PriceThree', name: 'PriceThree'},
                        // { data: 'Coupon', name: 'Coupon'},
                        // { data: 'CouponPrice', name: 'CouponPrice'},
                        { data: 'Amount', name: 'Amount'},
                        { data: 'Quantity', name: 'Quantity'},
                        { data: 'Total', name: 'Total'},
                        { data: 'ProductTax', name: 'ProductTax'},
                        { data: 'ProductTaxAmount', name: 'ProductTaxAmount'},
                        { data: 'TotalAmount', name: 'TotalAmount'},
                        // { data: 'CustomerPay', name: 'CustomerPay'},
                        { data: 'ProfitLoss', name: 'ProfitLoss'},
                        { data: 'status', name: 'status'},

                     ],
                drawCallback : function( settings ) {
                        $('.select').niceSelect();
                },
                stateSave: true,
                bDestroy: true
            });
     }
</script>
 @endpush   