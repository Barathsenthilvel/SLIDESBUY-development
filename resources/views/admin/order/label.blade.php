<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $StoreConfig->store_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #{{$items->storeConfig->OrderIDPrefix}}{{sprintf('%03d',$order->map_id )}}
                </small>
            </h1>
            <!--<div class="page-tools">-->
            <!--    <div class="action-buttons">-->
            <!--        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">-->
            <!--            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>-->
            <!--            Print-->
            <!--        </a>-->
            <!--        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">-->
            <!--            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>-->
            <!--            Export-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <span class="text-default-d3">{{ $StoreConfig->store_name }}</span>
                            </div>
                        </div>
                    </div>
            
                    <hr class="row brc-default-l1 mx-n1 mb-4" />
                    <div class="row">
                        @isset($user)
                        <div class="col-sm-4">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Billing To:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{$user->name}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{$user->Phone}}</b></div>
                                <div class="my-1"><i class="fa fa-email fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{$user->email}}</b></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Shipping To:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{$order->first_name.' '.$order->last_name}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{$order->apparment.' '.$order->street}}<br>{{$order->city.', '.$order->state.', '.$order->country}}<br>Pincode : {{$order->post_code}}
                                </div>
                                @if($order->Phone)<div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{$order->Phone}}</b></div>@endif
                                @if($order->email)<div class="my-1"><i class="fa fa-email fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{$order->email}}</b></div>@endif
                            </div>
                        </div>
                        @endisset
                        <div class="text-95 col-sm-4 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID:</span> #{{$items->storeConfig->OrderIDPrefix}}{{sprintf('%03d',$order->map_id )}}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Issue Date:</span> {{ date_format($order->created_at,'Y-M-d') }}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Payment Status:</span> <span
                                        class="badge badge-warning badge-pill px-25">paid</span></div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-4">
                        <table style="width:100%">
                            <thead>
                                <tr class="row text-600 text-white bgc-default-tp1 py-25">
                                    <th class="d-none d-sm-block col-1">#</th>
                                    <th class="col">Description</th>
                                    <th class="col">MRP</th>
                                    <th class="col">Discount Price</th>
                                    <th class="col">Quantity</th>
                                    <th class="col">Taxable Amount</th>
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <th class="col">SGST</th>
                                    <th class="col">CGST</th>
                                    @else
                                    <th class="col">IGST</th>
                                    @endif
                                    <th class="col">Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($similarorder as $value)
                    	            @php
                    	                $items = unserialize(bzdecompress(utf8_decode($value->card)));
                    	            @endphp
                                @foreach ($items->singleorder as $index =>$item)
                                <tr class="row mb-2 mb-sm-0 py-25">
                                    <td class="col">{{ ++$index }}</td>
                                    <td class="col">{{ $item->product_title }} <br><small>{{ ($item->vendor)?$item->vendorObject->name:'Admin' }}</small></td>
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}}{{(isset($item->mrp))?$item->mrp:'---'}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round(((float)$item['total']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}</td>
                                    @else
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round(((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'])/(float)$item->quantity,2)}}</td>
                                    @endif
                                    <td class="col">{{$item->quantity}}</td>
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
                                    @else
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
                                    @endif
                                    @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount']/2,2)}} ({{$item['producttax']->tax_rate/2}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @else
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['producttaaAmount'],2)}} ({{$item['producttax']->tax_rate}} {{($item['producttax']->tax_type == 1)?'%':'RS'}})</td>
                                    @endif
                                    @if($items->storeConfig->include_tax == "Exclusive")
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2)}}</td>
                                    @else
                                    <td class="col">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{round((float)$item['total']-(float)$item['coupon_amount'],2)}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                        
                        <div class="row border-b-2 brc-default-l2"></div>


                        <div class="row mt-3">
                            <div class="col-2 col-sm-9 text-grey-d2 text-95 mt-2 mt-lg-0">
                                
                            </div>
                            <div class="col-12 col-sm-3 text-grey text-90 order-first order-sm-last">
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        Total MRP
                                    </div>
                                    <div class="col-5">
                                        <span class="text-120 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->totalmrp}}</span>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        (-) Discount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->discountmrp }}</span>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        Subtotal
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->totalPrice}}</span>
                                    </div>
                                </div>
                                @if($items->specialdiscount > 0)
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        (-) Special Discount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->specialdiscount}}</span>
                                    </div>
                                </div>
                                 @endif
                                 @if($items->CouponClass)
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        (-) Discount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->coupen }}</span>
                                    </div>
                                </div>
                                 @endif
                                 @if($StoreConfig->include_tax != 'Inclusive')
                                 <div class="row my-2">
                                    <div class="col-7 text-right">
                                        (+) Tax
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->tax }}</span>
                                    </div>
                                </div>
                                 @endif
                                 @if($items->deliverycharge != null )
                                 <div class="row my-2">
                                    <div class="col-7 text-right">
                                        (+) Delivery Charges
                                    </div>
                                     @if($items->deliverycharge == 0)
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">Free Delivery</span>
                                    </div>
                                    @else
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->deliverycharge}}</span>
                                    </div>
                                    @endif
                                </div>
                                 @endif
                                 
                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                        Total Amount
                                    </div>
                                    <div class="col-5">
                                        <span class="text-150 text-success-d3 opacity-2">{{($StoreConfig->currencysymbol())?$StoreConfig->currencysymbol():'Rs.'}} {{$items->grandTotal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }
    </style>
    <script type="text/javascript">
        window.onload = function () {
            window.print()
        }
    </script>
</body>

</html>