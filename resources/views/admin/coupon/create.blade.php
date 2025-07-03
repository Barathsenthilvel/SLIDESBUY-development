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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Coupon</h5>
                    <!--end::Page Title-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin-coupon-index') }}" class="text-muted">List of Coupon</a>
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
    <div class="d-flex flex-column-fluid" >
        <!--begin::Container-->
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Add Coupon</h3>
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

                        <form method="POST" action="{{route('admin-coupon-store')}}" @submit="SubmitPay">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Coupon Title
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="text" value="" id="title" name="title"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Coupon Code
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="text" value="" id="code" name="code"
                                            required  style="text-transform: uppercase;"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">For
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <div class="radio-inline">
                                            <label class="radio radio-outline radio-success">
                                                <input type="radio" name="user" value=0 required v-model="user"/>
                                                <span></span>
                                                New User
                                            </label>
                                            <label class="radio radio-outline radio-success">
                                                <input type="radio" name="user" value=1 v-model="user" @click='loaduser'/>
                                                <span></span>
                                                Existing User
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Type
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <div class="radio-inline">
                                            <label class="radio radio-outline radio-success">
                                                <input type="radio" name="type" value="0" v-model='type' required v-on:input='checkvalue' />
                                                <span></span>
                                                Flat
                                            </label>
                                            <label class="radio radio-outline radio-success">
                                                <input type="radio" name="type" value="1" v-model='type' v-on:input='checkvalue' />
                                                <span></span>
                                                %
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Value
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="number" value="" v-model='value' @keyup='checkvalue' id="value" name="value"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Usage Frequency
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="number" v-model='count' value="" id="count" name="count"
                                            required />
                                    </div>
                                    <div class="col-4" ><p></p>( If zero means unlimited times can use )</p></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Order Value
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="number" value="" id="OrderValue"
                                            name="OrderValue" required />
                                    </div>
                                    <div class="col-4" ><p></p>( If zero means no order value limit )</p></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Expiry Date
                                        <span class="text-danger">*</span></label>
                                    <div class="col-4">
                                        <input class="form-control" type="date" value="{{date("Y-m-d")}}" id="expirydate" name="expirydate" required min='{{date("Y-m-d")}}' />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Status
                                        <span class="text-danger"></span></label>
                                    <div class="col-4">
                                        <span class="switch switch-outline switch-icon switch-success">
                                            <label>
                                                <input type="checkbox"  name="status" value="1" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                                                <div class="form-group row" v-if='user == 1' >
                                    <label class="col-2 col-form-label">Customers
                                        <span class="text-danger">*</span></label>
                                    <div class="col-10">
                                        <table class="table table-bordered" id="geniustable">
                                            <thead>
                                                <tr>
                                                    <th>Customer Code</th>
                                                    <th>Email</th>
                                                    <th>Customer Group</th>
                                                    <th>Choose</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="User of Users">
                                                    <td>@{{User.Code}}</td>
                                                    <td>@{{User.email}}</td>
                                                    <td>@{{User.Customer}}</td>
                                                    <td><input type="checkbox" name="Userids" @click="addremove(User.id)" :value="User.id"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var table = null;
    var app = new Vue({
        el: '#app',
        data : {
            user: '',
            Users: [],
            userid: [],
            value: 0,
            count: 0,
            type: 0
        },
        methods : {
            loaduser(){
                setTimeout(function(){
                    LoaduserJS();
                },0);
            },
            checkvalue(){
                setTimeout(function(){
                    if(app.type == 1 && app.value >100){
                        $.notify("Your % is above 100","success");
                        app.value = 100;
                    }
                },1);
            },
            addremove(id){
                if(this.userid.indexOf(id) == -1){
                    this.userid.push(id);
                }else{
                    var newarray = this.userid.filter(function(f) { return f !== id })
                    this.userid = newarray;
                }
                console.log(id);
            },
            SubmitPay(e){
                e.preventDefault();
                var formData = new FormData(e.target);
                if(this.userid.length == 0 && this.user == 1){
                    $.notify("Add At Least One User","success");
                    return;
                }
                formData.append('userid',this.userid);
                $.ajax({
                    method:"POST",
                    url:'{{route('admin-coupon-store')}}',
                    data:formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.msg){
                            $('.alert-success>div').html('<p>'+data.msg+'</p>');
                            $('.alert-success').show();
                            e.target.reset();
                            app.user == '';
                        }else{
                            var Ptag = "";
                            for(var error in data.errors) { Ptag +='<p>'+data.errors[error]+'</p>'; };
                            $('.alert-danger>div').html(Ptag);
                            $('.alert-danger').show();
                        }
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

    function LoaduserJS(){
        $.ajax({
            method:"GET",
            url:'{{route('admin-coupon-getuser')}}',
                success:function(data){
                    app.Users = data;
                    setTimeout(function(){
                        table = $('#geniustable').DataTable();
                    },1);
                },
                error:function(erroe){
                    console.log(erroe);
                    window.scrollTo({top:0,behavior:'smooth'});
                    alert("Something is wrong");
                }
            });
        console.log("load use");
    }


    $('#kt_datetimepicker_3').datetimepicker({
        format: 'L'
    });
    var KTBootstrapSwitch = function () {
        var demos = function () {
            $('[data-switch=true]').bootstrapSwitch();
        };
        return {
            init: function () {
                demos();
            },
        };
    }();

    jQuery(document).ready(function () {
        KTBootstrapSwitch.init();
    });
</script>

@endpush
