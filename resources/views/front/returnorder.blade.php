@extends('front.includes.container')
@section('content')
<style>
    @media (min-width: 768px){
        .modal-dialog {
    width: fit-content;
    margin: 30px auto;
    }
    .modal-dialog p{
        padding: 3px 5px;
    }

}
.profile-leftinner{
        min-height:auto;
    }
.removeitem-wraper {
    position: absolute;
    z-index: 9;
    right: 15px;
    top: calc(50% - 20px);
     width: unset;
     height: unset;
    /* border: 1px solid #c3c3c3; */
     border-radius: unset;
    /* text-align: center; */
    /* line-height: 27px; */
    background-color: rgba(148, 148, 148, 0.5);
    cursor: pointer;
    /* transition: all 0.5s ease; */
    /* color: #fff; */
    padding: 9px 12px;
    background-color: #e7b360;
}

.transparent-btn{
    color : #fff;
}

</style>
                                <!-- Edit Modal HTML -->
                                <div id="view" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        </div>
                                    </div>
                                </div>
                                <div id="view1" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">History</h5>

                                              </div>
                                              <div class="modal-body">

                                              </div>
                                        </div>
                                    </div>
                                </div>

<section class="banner-section">
    <div class="banner-inner">
        <div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
            <div class="pagetitle-wraper">
                <div class="container">
                    <div class="pagetitle">{{ ($card->return)?'Return Product':'Product for Return'}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="#">{{ ($card->return)?'Return Product':'Product for Return'}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="myorder-section commonaccount-section orderstyle">
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="profile-navbar mobhide">
                <ul class="list-inline">
                    <li><a href="#" @click='tabone = true;tabtwo = false' v-bind:class="[tabone?'active' :'']">Product for Return</a></li>
                    <li><a href="#" @click='tabone = false;tabtwo = true' v-bind:class="[tabtwo?'active' :'']">Returned</a></li>
                </ul>
            </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-leftwraper cartfull mobpad0" v-if='tabtwo'>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Reference ID & Date</th>
                                <!--<th></th>-->
                                <!--<th>Order ID</th>-->
                                <th>Invoice</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Returnproduct as $Product)
                            <tr>
                                <td>SKR{{sprintf('%03d',$Product->id)}}<br>{{ $Product->Return_Date}}</td>
                                <!--<td>{{ $Product->Return_Date}}</td>-->
                                <!--<td>{{$StoreConfig->OrderIDPrefix }} - {{sprintf('%03d',$Product->Order_ID)}}</td>-->
                                <td>@if($Product->status == 'completed')<a href="{{ route('front.return.invoice',$Product->id) }}">Invoice</a>@endif</td>
                                <td>{{ $Product->status }}</td>
                                <td>@if($Product->status == 'active') <a class="cancelreturn" href="{{route('front.return.cancel',$Product->id)}}">Cancel</a> @endif</td>
                                <td><a href="{{route('front.return.view',$Product->id)}}" class="view" data-toggle="modal">View</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6"></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
            @php
             function dateDiffInDays($date1, $date2)
                  {
                      // Calculating the difference in timestamps
                      return $diff = strtotime($date2) - strtotime($date1);

                      // 1 day = 24 hours
                      // 24 * 60 * 60 = 86400 seconds
                      // return abs(round($diff / 86400));
                  }
                $date =  date('y-m-d H:i:s',strtotime('now'));
                $updated_at3 = date('y-m-d H:i:s',strtotime($Order->Deliverydate.'+3 days'));
                $diff = dateDiffInDays($date,$updated_at3);


            @endphp
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-leftwraper cartfull mobpad0" style="padding: 0 5px 0 0px;" v-if='tabone'>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner" @if($updated_at3 < $date) style="opacity: 0.5;pointer-events: none;" @endif>
                    @if (!$card->return)
                        <div class="profile-navbar mobhide">
                            <ul class="list-inline">
                                <li style="display:flex;flex-direction: row;justify-content: space-between;">
                                    <a class="active" style="border-bottom: unset" href="#">Order ID : {{$StoreConfig->OrderIDPrefix }}{{sprintf('%03d',$Order->id)}}</a> @if($updated_at3 > $date)
                                    <a class="active" style="border-bottom: unset;color:black" href="#">You have @{{countDone}} to return</a>@else<a class="active" style="border-bottom: unset;color:black" href="#">return period ended </a> @endif</li>
                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad cartmob">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cartitem-lits orderlist-wraper">
                            <!--@if (!$card->return)-->
                            @foreach ($card->singleorder as $key => $item)
                            @php
                                
                                if(array_key_exists($item->id,$card->ReturnItems)){
                                    $quantity = $item->quantity - $card->ReturnItems[$item->id]->quantity;
                                }else{
                                    $quantity = $item->quantity;
                                }
                            @endphp
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single mobpad0">
                                <div class="row mobmar0">
                                    <div class="col-lg-3 col-md-3 col-sm-3 orderimg-wraper">
                                        <a href="{{route('product.item',['slug'=>$item->slug])}}"><img src="{{asset('assets/media/products/'.$item->image1)}}" class="img-responsive" alt="slider2"></a>
                                    </div>
                                    <div class="mobprqty">
                                        <div class="col-lg-5 col-md-5 col-sm-10 prdorder-detail prdorder-common prdmobname">
                                            <a href="{{route('product.item',['slug'=>$item->slug])}}"><div class="productname">{{$item->product_title}}</div></a>
                                            <div class="productcode">({{($StoreConfig->include_tax != 'Exclusive')?'Inclusive':'Exclusive'}} of Tax {{($item->getproductPrice()->tax->tax_type == 1)?$item->getproductPrice()->tax->tax_rate.' %':'Rs/ '.$item->getproductPrice()->tax->tax_rate}})</div>
                                        </div>
                                        {{-- <div class="col-lg-2 col-md-2 col-sm-4 single-price ">
                                            <div class="cartitem-caption">Price</div>
                                            <div class="cartitem-value"><span><i class="fa fa-inr"></i> {{($item->getproductPrice()->isoffer)?$item->getproductPrice()->offer:$item->getproductPrice()->price}}</span>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-5 col-md-5 col-sm-2 quantity-wraper ">
                                            <div class="cartitem-caption">Quantity</div>
                                            <div class="quantity">
                                                <div class="quantity-button quantity-down">
                                                    -
                                                </div><input id="prices1" pid="{{$item->id}}" max='{{(int)$quantity}}' min="{{$item->minquantity}}" onblur="checkminqty()" onchange=""
                                                    onkeypress="return validateQty(event);" onmousemove="" step="{{$item->minquantity}}" readonly
                                                    type="number" value="1">
                                                <div class="quantity-button quantity-up">
                                                    +
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 singletotal-price prdorder-common carttot">
                                        <div class="cartitem-caption">Total</div>
                                        <div class="cartitem-value"><span><i class="fa fa-inr"></i>{{$item->total}}</span>
                                        </div>
                                    </div> --}}
                                    @if($quantity > 0)
                                    <div class="removeitem-wraper mobremove Addtoreturn">
                                        <a href="" data-id="{{$item->id}}" class="product-remove" style="color:white"><span class="fa fa-plus deskhide"></span><span class="remove-item mobhide">Add To Return</span></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        <!--@endif-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " v-if='tabone'>
                <div class="row" id="returncart">
                    @include('front.includes.returnProduct')
                </div>
            </div>
            </div>
        </div>
    </div>

</section>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            countDone: '',
            interval : null,
            seconds : {{(int)$diff}},
            tabone : true,
            tabtwo : false
        },
        mounted : function(){
                this.interval = setInterval(() => {
                    var days = Math.floor(app.seconds / (3600*24));

                    var hours  = app.seconds - days*3600*24;
                    var hrs   = Math.floor(hours / 3600);


                    var minutes  = hours - hrs*3600;
                    var mnts = Math.floor(minutes / 60);

                    sec  = minutes -  mnts*60;
                    app.countDone = days+" days, "+hrs+" Hrs, "+mnts+" Minutes"
                    app.seconds -= 1
                    }, 1000);
        },
        methods : {

        }
    })
        $('body').on('click','.view',function(e){
            e.preventDefault();
            $('#view .modal-content').load($(this).attr('href'));
            $('#view').modal('toggle');
        });

        $('body').on('click','.view1',function(e){
            e.preventDefault();
            $('#view1 .modal-body').load($(this).attr('href'));
            $('#view1').modal('toggle');
        });

        $('body').on('click', '.quantity-up', async function (t) {
        t.preventDefault();
            var spinner = $(this).parent(),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max'),
            id = input.attr('pid'),
            step = parseFloat(input.attr('step'));
            var oldValue = parseFloat(input.val());
               if (oldValue >= max) {
                   var newVal = oldValue;
               } else {
                   var newVal = oldValue + step;
               }
               spinner.find("input").val(newVal);
               spinner.find("input").trigger("change");

    });

    $('body').on('click', '.quantity-down', async function (t) {
        t.preventDefault();
            var spinner = $(this).parent(),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max'),
            id = input.attr('pid'),
            step = parseFloat(input.attr('step'));
            var oldValue = parseFloat(input.val());
               if (oldValue <= min) {
                   var newVal = oldValue;
               } else {
                   var newVal = oldValue - step;
               }
               spinner.find("input").val(newVal);
               spinner.find("input").trigger("change");

    });

    $('body').on('click','.Addtoreturn',function (t){
        t.preventDefault();
        var newVal = this.parentNode.getElementsByClassName('quantity')[0].children[1].value;
        var id = this.children[0].dataset.id;
        if(newVal == "0"){  toastr["error"]('Add quantity First'); return false;}
                $.ajax({
                    method: "GET",
                    url: "{{route('user.add.cardReturn')}}",
                    data: {
                        quantity: newVal,
                        id: id
                    },
                    success: function (data) {
                        $('#returncart').load("{{route('user.render.cartReturn')}}");
                        toastr["success"]('Product Added');
                    },
                    error: function (erroe) {

                    }
                });
    });


    $('body').on('click', '.RemovefromReduce', function (t) {
        t.preventDefault();
        var url = "{{route('user.remove.cardReturn')}}/" + $(this).data('id');
        $.ajax({
            method: "GET",
            url: url,
            success: function (data) {
                $('#returncart').load("{{route('user.render.cartReturn')}}");
                toastr["success"]('Product Removed');
            },
            error: function (erroe) {

            }
        });
    });

    $("body").on('submit','#formsubmit',function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    $.ajax({
        method:"POST",
        url:$(this).prop('action'),
        data:formData,
        cache: false,
        processData: false,
        contentType: false,
        success:function(data){
                if(data.error){ toastr["error"](data.error); }
                if(data.msg){
                    toastr["success"](data.msg);
                    location.reload();
                    // window.location.href = data.url;
                }
            },
        error:function(erroe){
                alert("Something is wrong");
            }
        });
    });
    $("body").on('click','.cancelreturn',function(e) {
        e.preventDefault();
        if (confirm('Yes to Process') == true) {
            toastr["success"]('Cancelled successfully');
            window.location.href = $(this).attr('href');
        }
    });

</script>
@endpush
