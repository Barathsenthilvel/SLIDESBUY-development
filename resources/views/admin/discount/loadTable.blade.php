@php
    $i=0;
@endphp
<table style="width: 100%;border: 1px solid #000;" class="table table-striped">
    <tr style="border-bottom: 1px solid black">
         <th>S no</th>
        <th >Product Name</th>
        <th >SKU</th>
        <th>Category</th>
        <th>MRP</th>
        <th>Vendor Price</th>
        <th>Our Price</th>
        <th>Discount Price</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$data->product_title}}</td>
        <td>{{$data->product_sku}}</td>
        <td>{{$data->getCategory()}}</td>
        <td>{{$data->mrp}}</td>
        <td>{{ $data->manufacturerPrice }}</td>
        <td>{{$data->ourprice }}</td>
        <td><strong data-id="{{$data->id}}" >{{($type == '%')?$data->ourprice-(($data->ourprice/100)*$number):$data->ourprice-$number}}</strong></td>
    </tr>
    @endforeach
</table>
