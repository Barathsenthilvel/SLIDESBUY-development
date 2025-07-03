<div class="modal-header">
    <h4 class="modal-title">Product</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-2">
            Return Order ID : <br>SKR{{sprintf('%03d',$id->id)}}
        </div>
        <div class="col-md-2">
            Order ID : <br>{{$StoreConfig->OrderIDPrefix }}{{sprintf('%03d',$id->Order_ID)}}
        </div>
        <div class="col-md-2">
            Return Date : <br> {{$id->Return_Date}}
        </div>
        <!--<div class="col-md-2">-->
        <!--    Docket No : <br>{{$id->Docket_No}}-->
        <!--</div>-->
        <!--<div class="col-md-2">-->
        <!--    Charges : <br>{{$id->Charges}}-->
        <!--</div>-->
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>MRP</th>
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
    </thead>
    <tbody>
        @foreach ($ReturnProductItem as $key => $item)
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
                <td>@if($product->image1)<img src='{{URL::asset('assets/media/products/'.$product->image1)}}' alt="{{$product->image1}}" style="height: 80px;width: 60px;">@else No Image @endif</td>
                <td>{{$item->Product}}</td>
                <td>{{$product->mrp}}</td>
                <td>{{$Price}}</td>
                @if($order->country == 'India' && $order->state == 'Tamil Nadu')
                <td>{{($product->producttaaAmount/$product->quantity)/2}}</td>
                <td>{{($product->producttaaAmount/$product->quantity)/2}}</td>
                @else
                <td>{{round($product->producttaaAmount/$product->quantity,2)}}</td>
                @endif
                <td>{{$item->Total}}</td>
                <td>{{$item->Reason}}</td>
                <td>@if($item->Photo)<img src='{{URL::asset('assets/media/returnproduct/'.$item->Photo)}}' alt="{{$item->Photo}}" style="height: 50px;width: 80px;">@else No Image @endif</td>
                <td>@if($item->Video)<a href="{{$item->Video}}" target="__blank">View Video</a>@else No video @endif</td>
                <td>{{$item->Return_Status}}</td>
                <!--<td>{{$item->Payment_Status}}</td>-->
                <td><a href="{{route('front.return.history',$item->id)}}" class="view1" data-toggle="modal">View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

