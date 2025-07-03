@if(session()->get('cart_return')->ReturnItemsTemp)
    <div class="table-title">
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Discounted Price</th>
                @if($Order->country == 'India' && $Order->state == 'Tamil Nadu')
                <th>SGST</th>
        		<th>CGST</th>
        		@else
        		<th>IGST</th>
        		@endif
                <th>Total</th>
                <th>Reason</th>
                <th>Photos</th>
                <th>Videos url</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @php
                $storeConfig = session()->get('cart_return')->storeConfig;
            @endphp
            @foreach (session()->get('cart_return')->ReturnItemsTemp as $key=>$item)
            @php
                if($storeConfig->include_tax == 'Exclusive'){
                    $Price = round($item->total/$item->quantity,2);
                    $Total = round(($item->total/$item->quantity) + ($item->producttaaAmount/$item->quantity),2);
                }else{
                    $Price = round(($item->total/$item->quantity) - ($item->producttaaAmount/$item->quantity),2);
                    $Total =  round($item->total/$item->quantity,2);
                }
            @endphp
            <tr>
                <td>{{$item->product_title}}</td>
                <td>{{$item->VendorPrice}}</td>
                <td>{{$Price}}</td>
                @if($Order->country == 'India' && $Order->state == 'Tamil Nadu')
                <td>{{($item->producttaaAmount/$item->quantity)/2}}</td>
                <td>{{($item->producttaaAmount/$item->quantity)/2}}</td>
                @else
                <td>{{round($item->producttaaAmount/$item->quantity,2)}}</td>
                @endif
                <td>{{$Total}}</td>
                <td>
                    <select name="Reason[]" id="" required>
                        <option value="">Select</option>
                        <option  value="Damaged / Defect">Damaged / Defect</option>
                        <option  value="Wrong Product">Wrong Product</option>
                        <option  value="Quality Issue">Quality Issue</option>
                        <option  value="Others">Others</option>
                    </select>
                </td>
                <td><input type="file" name='photo[]'  accept="image/x-png,image/gif,image/jpeg"></td>
                <td><input type="url" name='video[]' placeholder="Video URL" required></td>
                <td>
                    <a href="" data-id="{{$key}}" class="product-remove RemovefromReduce"><span class="fa fa-trash deskhide"></span><span class="remove-item mobhide"> Remove </span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif


