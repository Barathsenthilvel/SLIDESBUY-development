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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Update Return Product</h5>
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
                        Return
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Return Order ID : {{$StoreConfig->OrderIDPrefix}}{{sprintf('%03d',$id->id)}}</label>
                            </div>
                            <div class="col-4">
                                <label>Order ID : {{$StoreConfig->OrderIDPrefix}}{{sprintf('%03d',$id->Order_ID)}}</label>
                            </div>
                            <div class="col-4">
                                <label>Return Date : {{$id->Return_Date}}</label>
                            </div>
                            <div class="col-4">
                                <label>Docket No : </label>
                                <input type="text" class="form-control" onchange="Docket_No({{$id->id}},this)" value="{{$id->Docket_No}}">
                            </div>
                            <div class="col-4">
                                <label>Charges : {{$id->Charges}}</label>
                                <input type="text" class="form-control" onchange="Charges({{$id->id}},this)" value="{{$id->Charges}}">
                            </div>
                            <div class="col-4">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control form-control-solid" name="" id="" onchange="updatereturnstatus(this,{{$id->id}})">
                                    <option {{($id->status == 'active')?'selected':''}} value="active">active</option>
                                    <option {{($id->status == 'Pending')?'selected':''}} value="Progress">Progress</option>
                                    <option {{($id->status == 'Pending')?'selected':''}} value="Pick Up Booked">Pick Up Booked</option>
                                    <option {{($id->status == 'Pending')?'selected':''}} value="Pick Up Received">Pick Up Received</option>
                                    <option {{($id->status == 'Pending')?'selected':''}} value="Product Received">Product Received</option>
                                    <option {{($id->status == 'Pending')?'selected':''}} value="Payment in Progress">Payment in Progress</option>
                                    <option {{($id->status == 'completed')?'selected':''}} value="completed">completed</option>
                                    <option {{($id->status == 'cancel')?'selected':''}} value="cancel">cancel</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            {{-- <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Customer Details
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-4">
                                <label>Order ID : {{$User->email}}</label>
                            </div>
                            <div class="col-4">
                                <label>Return Date <span class="text-danger">*</span></label>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="col-4">
                                <label>Docket No <span class="text-danger">*</span></label>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="col-4">
                                <label>Charges <span class="text-danger">*</span></label>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="col-4">
                                <label>Status <span class="text-danger">*</span></label>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                        </div>
                    </div>
            </div> --}}
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
                    <table class="table table-bordered" id="geniustable">
                        <thead>
                            <tr>
                                <tr>
                                    <th>Sno</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Discounted Price</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <th>SGST</th>
                                    <th>CGST</th>
                                    @else
                                    <th>IGST</th>
                                    @endif
                                    <th>Total</th>
                                    <th>Reason</th>
                                    <th>Photos</th>
                                    <th>Videos url</th>
                                    <th>Return Status</th>
                                    <!--<th>Payment Status</th>-->
                                    <th>History</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ReturnProductItem as $key=>$item)
                            @php
                                $product = unserialize(bzdecompress(utf8_decode($item->productobj)));
                                if($Store->include_tax == 'Exclusive'){
                                        $Price = round($product->total/$product->quantity,2);
                                        $Total = round(($product->total/$product->quantity) + ($product->producttaaAmount/$product->quantity),2);
                                    }else{
                                        $Price = round(($product->total/$product->quantity) - ($product->producttaaAmount/$product->quantity),2);
                                        $Total =  round($product->total/$product->quantity,2);
                                    }
                            @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src='{{URL::asset('assets/media/products/'.$product->image1)}}' alt="{{$product->image1}}" style="height: 80px;width: 50px;"></td>
                                <td>{{$item->Product}}</td>
                                <td>{{$product->VendorPrice}}</td>
                                <td>{{$Price}}</td>
                                @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                <td>{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                <td>{{($product->producttaaAmount/$product->quantity)/2}}</td>
                                @else
                                <td>{{round($product->producttaaAmount/$product->quantity,2)}}</td>
                                @endif
                                <td>{{$item->Total}}</td>
                                <td>{{$item->Reason}}</td>
                                <td><img src='{{URL::asset('assets/media/returnproduct/'.$item->Photo)}}' alt="{{$item->Photo}}" style="height: 50px;width: 80px;"></td>
                                <td><a href="{{$item->Video}}" target="__blank">View Video</a></td>
                                <td>
                                    <select class="form-control form-control-solid" name="" id="" onchange="updatereturnstatusitem(this,{{$item->id}})" style="width: 100%">
                                        <option value="">select</option>
                                        <option  {{($item->Return_Status == 'Return Accepted')?'selected':''}} value="Return Accepted">Return Accepted</option>
                                        <!--<option  {{($item->Return_Status == 'Pick Up Booked')?'selected':''}} value="Pick Up Booked">Pick Up Booked</option>-->
                                        <!--<option  {{($item->Return_Status == 'Pick Up Finished')?'selected':''}} value="Pick Up Finished">Pick Up Finished</option>-->
                                        <!--<option  {{($item->Return_Status == 'Product Received')?'selected':''}} value="Product Received">Product Received</option>-->
                                        <option  {{($item->Return_Status == 'Return Declined')?'selected':''}} value="Return Declined">Return Declined</option>
                                    </select>
                                </td>
                                <!--<td>-->
                                <!--    <select class="form-control form-control-solid" name="" id="" onchange="updatepaymentstatus(this,{{$item->id}})">-->
                                <!--        <option value="">select</option>-->
                                <!--        <option  {{($item->Payment_Status == 'N/A')?'selected':''}} value="N/A">N/A</option>-->
                                <!--        <option  {{($item->Payment_Status == 'Pending')?'selected':''}} value="Pending">Pending</option>-->
                                <!--        <option  {{($item->Payment_Status == 'Payment  Completed')?'selected':''}} value="Payment  Completed">Payment  Completed</option>-->
                                <!--        <option  {{($item->Payment_Status == 'No Refund')?'selected':''}} value="No Refund">No Refund</option>-->
                                <!--    </select>-->
                                <!--</td>-->
                                <td><a href="{{route('admin-history-return',$item->id)}}" class="datamodel" data-toggle="modal" data-target="#exampleModalScrollable">History</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Calculation</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body" id="app">
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Product Price : @{{ Price }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Product Discount Price : @{{ Discount }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Tax  : @{{ Tax }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label>Others (+/-) </label>
                            <input type="number" class="form-control" @change="Oth()" v-model='Others'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label>Return Amount : @{{ Amount }}</label>
                        </div>
                    </div>
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
@php
$getdata = $id->getdata();
@endphp
@push('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script type="text/javascript">
        $(function(){
        var table = $('#geniustable').DataTable({
        "scrollX": true
            });
        });

        var app = new Vue({
            el: '#app',
            data: {
                Price : 0,
                Discount : 0,
                Tax : 0,
                Others : 0,
                Amount : 0
            },
            created : function(){
                this.Price =  {{ (float)$getdata['product'] }}
                this.Discount =  {{ (float)$getdata['discount'] }}
                this.Tax =  {{ (float)$getdata['tax'] }}
                this.Others =  {{ (float)$getdata['Others'] }}
                this.Amount =  {{ (float)$getdata['total'] }}
            },
            watch : {
                Others : function(val){
                    val = val || 0
                    this.Amount = (parseFloat(val) + parseFloat(this.Tax) + parseFloat(this.Discount)).toFixed(2)
                }
            },
            methods : {
                trigger(){
                    this.Others = this.Others || 0
                    this.Amount = parseFloat(this.Others) + parseFloat(this.Tax) + parseFloat(this.Discount)
                },
                Oth(){
                    $.ajax({
                        method:"Post",
                        url:'{{route('admin-Other-return')}}',
                        data:{"_token": "{{ csrf_token() }}",id:{{$id->id}},value:app.Others},
                        success:function(data){
                            if(data.msg){
                                $.notify(data.msg,"success");
                            }
                        },
                        error:function(erroe){
                            alert("Something is wrong");
                        }
                    });
                }
            }
        });

    function updatereturnstatus(obj,id){
        $.ajax({
            method:"Post",
            url:'{{route('admin-updatereturnstatus-return')}}',
            data:{"_token": "{{ csrf_token() }}",id:id,value:obj.value},
            success:function(data){
                if(data.msg){
                $.notify(data.msg,"success");
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    function updatereturnstatusitem(obj,id){
        $.ajax({
            method:"Post",
            url:'{{route('admin-updatereturnstatusitem-return')}}',
            data:{"_token": "{{ csrf_token() }}",id:id,value:obj.value},
            success:function(data){
                if(data.msg){
                    $.notify(data.msg,"success");
                }
                app.Price = parseFloat(data.savedata.product);
                app.Discount = parseFloat(data.savedata.discount);
                app.Tax = parseFloat(data.savedata.tax);
                app.Others = parseFloat(data.savedata.Others);
                app.trigger();
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    function updatepaymentstatus(obj,id){
        $.ajax({
            method:"Post",
            url:'{{route('admin-updatepaymentstatus-return')}}',
            data:{"_token": "{{ csrf_token() }}",id:id,value:obj.value},
            success:function(data){
                if(data.msg){
                $.notify(data.msg,"success");
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    function Docket_No(id,obj){
        $.ajax({
            method:"Post",
            url:'{{route('admin-Docket_No-return')}}',
            data:{"_token": "{{ csrf_token() }}",id:id,value:obj.value},
            success:function(data){
                if(data.msg){
                    $.notify(data.msg,"success");
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    function Charges(id,obj){
        $.ajax({
            method:"Post",
            url:'{{route('admin-Charges-return')}}',
            data:{"_token": "{{ csrf_token() }}",id:id,value:obj.value},
            success:function(data){
                if(data.msg){
                $.notify(data.msg,"success");
                }
            },
            error:function(erroe){
                alert("Something is wrong");
            }
        });
    }

    $(".datamodel").on('click',function(e){
        e.preventDefault();
        $("#exampleModalScrollable .modal-body").load($(this).attr('href'));
    });
</script>
@endpush
