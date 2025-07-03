@extends('layout.admin')
@section('content')
<style>
    .fa-check:before {
    content: "\F00C";
    color: green;
}
</style>
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Vendor Payment</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Vendor Payment</a>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>
        </div>
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <button type="button" @click="cancle"
                                        class="btn btn-success mr-2">@{{(isHidden)?'Cancle':'Add Payment'}}</button>
                                </div>
                            </div>
                        </div>

                        <div class="card card-custom" v-if="isHidden">
                            <!--begin::Form-->
                            <form enctype="multipart/form-data" id="creat"   @submit="formsubmit(event,this)" >
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Vendor<span
                                                class="text-danger">*</span></label>
                                        <div class="col-4">
                                            <select class="form-control avoide" id="vendor" name="vendor">
                                                <option disabled>Select</option>
                                                @foreach($vendor as $v)
                                                <option data-productPrefix="{{$v->manufacturerID}}"
                                                    data-vendorperscent="{{$v->vendorperscent}}" value="{{ $v->id }}">
                                                    {{$v->name.' / '.$StoreConfig->VendorIDPrefix.'-'.sprintf("%'03d", $v->id)}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button type="reset" class="btn btn-success mr-2">Resect</button>
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
        <div class="container" id="app1" v-if="isHidden">
            <!--begin::Card-->
            <form action="{{route('admin-submitpay')}}" method="POST" @submit="SubmitPay" >
                @csrf
                <div class="card card-custom gutter-b" id="hide">
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered" id="geniustable1">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Order id</th>
                                    <th>Product SKU</th>
                                    <th>Vendor SKU</th>
                                    <th>Vendor Name & ID</th>
                                    <th>Company Type</th>
                                    <th>Product Name</th>
                                    <th>Cost Price</th>
                                    <th>Discount Flat / %</th>
                                    <th>Value</th>
                                    <th>Total Cost</th>
                                    <th>GST (%)</th>
                                    <th>Tax Amount</th>
                                    <th>Final Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    <th>Choose</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <div class="card card-custom" v-if=datapresent>
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Payment Date<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="date" name="PaymentDate" value="{{date('Y-m-d')}}"  id="PaymentDate" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mode<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <select class="form-control avoide" id="Mode" name="Mode">
                                        <option value="Check">Check</option>
                                        <option value="Online Transaction">Online Transaction</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Txn No<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="" id="TID" name="TID" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Cost Price<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text"  v-model='CostPrice' @input="totalcost" id="CostPrice" name="CostPrice" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Less<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='Less' @input="totalcost"  id="Less" name="Less" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Total Cost<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text"  v-model='TotalCost'  id="TotalCost" name="TotalCost" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">CGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='CGST' @input="taxamount"  id="CGST" name="CGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">SGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='SGST' @input="taxamount"  id="SGST" name="SGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">IGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='IGST' @input="taxamount"  id="IGST" name="IGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tax Amount<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='TaxAmount'  id="TaxAmount" name="TaxAmount" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Total Payment<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='FinalPrice'  id="FinalPrice" name="FinalPrice" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" @click="cancle" class="btn btn-secondary">Cancel</button>
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
            </form>
            <!--end::Card-->
        </div>

        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">List of Vendor Payment</h3>
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
                                <th>Payment Date</th>
                                <th>Transaction ID</th>
                                <th>Vendor Name & ID</th>
                                <th>No. Of Products</th>
                                <th>Company Type</th>
                                <th>After DiscPrice</th>
                                <th>GST (%)</th>
                                <th>Tax Amount</th>
                                <th>Less</th>
                                <th>Final Price</th>
                                <th>Payment Mode</th>
                                <th>Ref No</th>
                                <th>Receipt</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="container" id="app2" v-if="Edit">
            <!--begin::Card-->
            <form action="{{route('admin-submitpay')}}" method="POST" @submit="SubmitPay" >
                @csrf
                <div class="card card-custom gutter-b" id="hide">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            <h3 class="card-label">Edit Payment</h3>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered" id="geniustable2">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Order id</th>
                                    <th>Product SKU</th>
                                    <th>Vendor SKU</th>
                                    <th>Vendor Name & ID</th>
                                    <th>Company Type</th>
                                    <th>Product Name</th>
                                    <th>Cost Price</th>
                                    <th>Discount Flat / %</th>
                                    <th>Value</th>
                                    <th>Total Cost</th>
                                    <th>GST (%)</th>
                                    <th>Tax Amount</th>
                                    <th>Final Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    <th>Choose</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <div class="card card-custom" v-if=datapresent>
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Payment Date<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="date" name="PaymentDate" value="{{date('Y-m-d')}}"  id="PaymentDate" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mode<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <select class="form-control avoide" id="Mode" name="Mode">
                                        <option value="Check">Check</option>
                                        <option value="Online Transaction">Online Transaction</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Txn No<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" value="" id="TID" name="TID" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Cost Price<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text"  v-model='CostPrice' @input="totalcost" id="CostPrice" name="CostPrice" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Less<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='Less' @input="totalcost"  id="Less" name="Less" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Total Cost<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text"  v-model='TotalCost'  id="TotalCost" name="TotalCost" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">CGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='CGST' @input="taxamount"  id="CGST" name="CGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">SGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='SGST' @input="taxamount"  id="SGST" name="SGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">IGST (5%)<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='IGST' @input="taxamount"  id="IGST" name="IGST" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tax Amount<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='TaxAmount'  id="TaxAmount" name="TaxAmount" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Total Payment<span class="text-danger">*</span></label>
                                <div class="col-4">
                                    <input class="form-control" type="text" v-model='FinalPrice'  id="FinalPrice" name="FinalPrice" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" @click="cancle" class="btn btn-secondary">Cancel</button>
                        </div>
                        <!--end::Form-->
                    </div>
                </div>
            </form>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Entry-->
</div>

<!--end::Content-->
<!--begin::Footer-->


@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            isHidden: false,
        },
        methods : {
            cancle(){
                this.isHidden = !this.isHidden;
                if(!this.isHidden){
                    app1.isHidden = false;
                }
            },
            formsubmit(e,t){
            app1.isHidden = true;
            const formData = new FormData(e.target);
                e.preventDefault();
                setTimeout(function(){
                    $('#geniustable1').DataTable({
                        processing: false,
                        serverSide: true,
                        scrollX: true,
                        ajax: {
                            url : "{{ route('admin-paydatatable') }}",
                            type : 'GET',
                            data : { FromDate : $("#FromDate").val(),ToDate : $("#ToDate").val(),vendor : $("#vendor").val()}
                        },
                        searching: false,
                        pageLength: 50,
                        columns: [
                                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                    { data: 'Order_id', name: 'Order_id'},
                                    { data: 'ProductSKU', name: 'ProductSKU'},
                                    { data: 'VendorSKU', name: 'VendorSKU'},
                                    { data: 'VendorNameID', name: 'VendorNameID'},
                                    { data: 'CompanyType', name: 'CompanyType'},
                                    { data: 'ProductName', name: 'ProductName'},
                                    { data: 'CostPrice', name: 'CostPrice'},
                                    { data: 'Discount', name: 'Discount'},
                                    { data: 'Value', name: 'Value'},
                                    { data: 'TotalCost', name: 'TotalCost'},
                                    { data: 'GST', name: 'GST'},
                                    { data: 'TaxAmount', name: 'TaxAmount'},
                                    { data: 'FinalPrice', name: 'FinalPrice'},
                                    { data: 'Quantity', name: 'Quantity'},
                                    { data: 'Total', name: 'Total'},
                                    { data: 'Status', name: 'Status'},
                                    { data: 'PaymentStatus', name: 'PaymentStatus'},
                                    { data: 'Choose', name: 'Choose'},

                                ],
                            drawCallback : function( settings ) {
                                $('.select').niceSelect();
                            },
                        bDestroy: true
                    })
                ,0});
            }
        }
    });


    var app1 = new Vue({
        el: '#app1',
        data: {
            isHidden: false,
            CostPrice : 0,
            Less : 0,
            TotalCost : 0,
            SGST: 0,
            CGST : 0,
            IGST : 0,
            TaxAmount : 0,
            FinalPrice : 0,
            datapresent : false
        },
        methods: {
            cancle(){
                this.isHidden = !this.isHidden;
                app.isHidden = !app.isHidden;
            },
            totalcost(){
                this.TotalCost = parseFloat(this.CostPrice) - parseFloat(this.Less);
                this.FinalPrice = this.TotalCost + this.TaxAmount;
            },
            taxamount(){
                this.TaxAmount = parseFloat(this.SGST) + parseFloat(this.CGST) + parseFloat(this.IGST);
                this.totalcost();
            },
            SubmitPay(e){
                e.preventDefault();
                const formData = new FormData(e.target);
                $.ajax({
                    method:"POST",
                    url:'{{route('admin-submitpay')}}',
                    data:formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.msg){
                            $('.alert-success>div').html('<p>'+data.msg+'</p>');
                            $('.alert-success').show();
                            table.ajax.reload();
                        }else{
                            var Ptag = "";
                            for(var error in data.errors) { Ptag +='<p>'+data.errors[error]+'</p>'; };
                            $('.alert-danger>div').html(Ptag);
                            $('.alert-danger').show();
                        }
                        console.log(data);
                        window.scrollTo({top:0,behavior:'smooth'});
                        app1.cancle();
                    },
                    error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
                });
            }
        }
    });

    var app2 = new Vue({
        el: '#app2',
        data: {
            Edit:false,
            CostPrice : 0,
            Less : 0,
            TotalCost : 0,
            SGST: 0,
            CGST : 0,
            IGST : 0,
            TaxAmount : 0,
            FinalPrice : 0,
            datapresent : true
        },
        methods :{
            cancle(){
                this.Edit = !this.Edit;
            },
            totalcost(){
                this.TotalCost = parseFloat(this.CostPrice) - parseFloat(this.Less);
                this.FinalPrice = this.TotalCost + this.TaxAmount;
            },
            taxamount(){
                this.TaxAmount = parseFloat(this.SGST) + parseFloat(this.CGST) + parseFloat(this.IGST);
                this.totalcost();
            },
            editpayment(id){
                // $("html, body").animate({ scrollTop: $('#app2').offset().top }, 1000);
            },
            SubmitPay(e){
                e.preventDefault();
                const formData = new FormData(e.target);
                $.ajax({
                    method:"POST",
                    url:'{{route('admin-editsubmitpay')}}',
                    data:formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.msg){
                            $('.alert-success>div').html('<p>'+data.msg+'</p>');
                            $('.alert-success').show();
                            table.ajax.reload();
                        }else{
                            var Ptag = "";
                            for(var error in data.errors) { Ptag +='<p>'+data.errors[error]+'</p>'; };
                            $('.alert-danger>div').html(Ptag);
                            $('.alert-danger').show();
                        }
                        setTimeout(()=> {  app2.cancle(); },0);
                        console.log(data);
                        window.scrollTo({top:0,behavior:'smooth'});
                    },
                    error:function(erroe){
                        console.log(erroe);
                        window.scrollTo({top:0,behavior:'smooth'});
                        alert("Something is wrong");
                    }
                });
            }
        }
    });

  function editpayment(id,url){
        app2.Edit = true;
        setTimeout(()=> {
        var Edittable = $('#geniustable2').DataTable({
            processing: false,
            serverSide: true,
            scrollX: true,
            ajax: {
                url : id,
                type : 'GET',
            },
            dom: 'Bfrtip',
            searching: false,
            pageLength: 50,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'Order_id', name: 'Order_id'},
                { data: 'ProductSKU', name: 'ProductSKU'},
                { data: 'VendorSKU', name: 'VendorSKU'},
                { data: 'VendorNameID', name: 'VendorNameID'},
                { data: 'CompanyType', name: 'CompanyType'},
                { data: 'ProductName', name: 'ProductName'},
                { data: 'CostPrice', name: 'CostPrice'},
                { data: 'Discount', name: 'Discount'},
                { data: 'Value', name: 'Value'},
                { data: 'TotalCost', name: 'TotalCost'},
                { data: 'GST', name: 'GST'},
                { data: 'TaxAmount', name: 'TaxAmount'},
                { data: 'FinalPrice', name: 'FinalPrice'},
                { data: 'Quantity', name: 'Quantity'},
                { data: 'Total', name: 'Total'},
                { data: 'Status', name: 'Status'},
                { data: 'PaymentStatus', name: 'PaymentStatus'},
                { data: 'Choose', name: 'Choose'},
            ],
            drawCallback : function( settings ) {
                $('.select').niceSelect();
            },
            bDestroy: true
        });}, 0);

        $.ajax({
            type:"GET",
            url:url,
            success:function(data){
                $('#PaymentDate').val(data.PaymentDate);
                $('#Mode option[value="'+data.Mode+'"]').attr("selected", "selected");
                $('#TID').val(data.TID);
                app2.CostPrice = data.CostPrice;
                app2.FinalPrice = data.FinalPrice;
                app2.IGST = data.IGST;
                app2.Less = data.Less;
                app2.SGST = data.SGST;
                app2.TaxAmount = data.TaxAmount;
                app2.TotalCost = data.TotalCost;
                $('html, body').animate({ scrollTop: $("#app2").offset().top - 120 }, 600);
                console.log(data);
            }
        });
  }

function deletepayment(e,t){
    $confirm('Are you wante to delete?',"#3699FF").then(()=>{
        $.ajax({
        type:"GET",
        url:e,
        success:function(){
            $.notify("Deleted Successfully.","success");
            table.ajax.reload();
            }
        });
    });
}


  function formsubmit(e,t){
    app1.isHidden = true;
    const formData = new FormData(e.target);
        e.preventDefault();
        var paytable = $('#geniustable1').DataTable({
               processing: false,
               serverSide: true,
               scrollX: true,
               ajax: {
                   url : "{{ route('admin-paydatatable') }}",
                   type : 'GET',
                   data : { FromDate : $("#FromDate").val(),ToDate : $("#ToDate").val(),vendor : $("#vendor").val()}
               },
               dom: 'Bfrtip',
               searching: false,
               pageLength: 50,
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'Order_id', name: 'Order_id'},
                        { data: 'ProductSKU', name: 'ProductSKU'},
                        { data: 'VendorSKU', name: 'VendorSKU'},
                        { data: 'VendorNameID', name: 'VendorNameID'},
                        { data: 'CompanyType', name: 'CompanyType'},
                        { data: 'ProductName', name: 'ProductName'},
                        { data: 'CostPrice', name: 'CostPrice'},
                        { data: 'Discount', name: 'Discount'},
                        { data: 'Value', name: 'Value'},
                        { data: 'TotalCost', name: 'TotalCost'},
                        { data: 'GST', name: 'GST'},
                        { data: 'TaxAmount', name: 'TaxAmount'},
                        { data: 'FinalPrice', name: 'FinalPrice'},
                        { data: 'Quantity', name: 'Quantity'},
                        { data: 'Total', name: 'Total'},
                        { data: 'Status', name: 'Status'},
                        { data: 'PaymentStatus', name: 'PaymentStatus'},
                        { data: 'Choose', name: 'Choose'},
                     ],
                    drawCallback : function( settings ) {
                        $('.select').niceSelect();
                    },
                bDestroy: true
            });
    }
</script>
    <script type="text/javascript">
            var table = $('#geniustable').DataTable({
               processing: false,
               serverSide: true,
               scrollX: true,
               ajax: {
                   url : "{{ route('admin-VendorPayment-get') }}",
                   type : 'GET',
               },
               dom: 'Bfrtip',
               searching: false,
               buttons: ['copy', 'csv', 'excel'],
               columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'PaymentDate', name: 'PaymentDate'},
                        { data: 'TID', name: 'TID'},
                        { data: 'VendorName&ID', name: 'VendorName&ID'},
                        { data: 'ProductCount', name: 'ProductCount'},
                        { data: 'CompanyType', name: 'CompanyType'},
                        { data: 'AfterDiscountPrice', name: 'AfterDiscountPrice'},
                        { data: 'GST', name: 'GST'},
                        { data: 'TaxAmount', name: 'TaxAmount'},
                        { data: 'Less', name: 'Less'},
                        { data: 'FinalPrice', name: 'FinalPrice'},
                        { data: 'Mode', name: 'Mode'},
                        { data: 'RefNo', name: 'RefNo'},
                        { data: 'Receipt', name: 'Receipt'},
                        { data: 'Action', name: 'Action'}
                     ],
                drawCallback : function( settings ) {
                    $('.select').niceSelect();
                },
                stateSave: true,
                bDestroy: true
            });
        function paycal(){
            app1.datapresent = $('input[name="Pay[]"]:checked').length != 0;
            var total =  $('input[name="Pay[]"]:checked').map(function(){
                    return $(this).data('amount');
                }).get();
            const reducer = (accumulator, curr) => accumulator + curr;
            if($('input[name="Pay[]"]:checked').length != 0){ app1.CostPrice = total.reduce(reducer); }
            else{  app1.CostPrice = 0; }
            app1.totalcost();
            console.log(total.reduce(reducer));
        }

        function paycaledit(){
            app2.datapresent = $('input[name="Payed[]"]:checked').length != 0;
            var total =  $('input[name="Payed[]"]:checked').map(function(){
                    return $(this).data('amount');
                }).get();
            const reducer = (accumulator, curr) => accumulator + curr;
            if($('input[name="Payed[]"]:checked').length != 0){ app2.CostPrice = total.reduce(reducer); }
            else{  app2.CostPrice = 0; }
            app2.totalcost();
            console.log(total.reduce(reducer));
        }
    </script>
 @endpush
