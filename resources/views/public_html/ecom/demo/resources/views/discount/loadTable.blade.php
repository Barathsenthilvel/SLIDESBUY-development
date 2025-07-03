@php
    $i=0;
@endphp
<table style="width: 100%;border: 1px solid #000;" class="table table-striped">
    <tr style="border-bottom: 1px solid black">
         <th>S no</th>
        <th >Product Name</th>
        <th >SKU</th>
        <th>Category</th>
        <th>Base Price</th>
        <th>Discount Price</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$data->product_title}}</td>
        <td>{{$data->product_sku}}</td>
        <td>{{$data->getCategory()}}</td>
        <td>{{$data->product_base_price}}</td>
        <td><strong data-id="{{$data->id}}" >{{($type == '%')?$data->product_base_price-(($data->product_base_price/100)*$number):$data->product_base_price-$number}}</strong></td>
    </tr>
    @endforeach
</table>
