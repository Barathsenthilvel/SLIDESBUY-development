@extends('layout.admin')

@section('content')

<!-- Button trigger modal-->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
    Launch demo modal
</button> --}}

<!-- Modal-->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="height: 300px;">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Coupon View</h5>
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
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Coupon View
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-4">
                                <label> Title : {{$id->title}}</label>

                            </div>
                            <div class="col-4">
                                <label>code : {{$id->code}}</label>

                            </div>
                            <div class="col-4">
                                <label>For : {{($id->user == 0)?'All User':'Existing User'}}</label>

                            </div>
                            <div class="col-4">
                                <label>Value :{{$id->value}} {{($id->type == 0)?'Flat':'%'}}</label>
                            </div>
                            <div class="col-4">
                                <label>Order value :{{$id->OrderValue}} </label>
                            </div>
                            <div class="col-4">
                                <label>Expiry date :{{$id->expirydate}} </label>
                            </div>
                            <div class="col-4">
                                <label>Usage Frequency :{{$id->count}} </label>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">List of Coupon users</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered" id="geniustable">
                        <thead>
                            <tr>
                                <tr>
                                    <th>Sno</th>
                                    <th>User ID</th>
                                    <th>User Email</th>
                                    <th>order id</th>
                                    <!--<th>Count</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CouponUsage as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$StoreConfig->OrderIDPrefix }}{{$item->userid}}</td>
                                <td>{{$item->useremail}}</td>
                                <td>{{$StoreConfig->OrderIDPrefix }}{{sprintf('%03d',$item->orderid)}}</td>
                                <!--<td>{{$item->count}}</td>-->
                                </tr>
                            @endforeach
                        </tbody>
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
        "scrollX": true
    });
    });
</script>
@endpush
