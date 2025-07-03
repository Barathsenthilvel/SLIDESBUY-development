<table style="width: 100%;border: 1px solid #000;" class="table table-striped">
    <tr style="border-bottom: 1px solid black">
        <th style="width: 50%">Category Name</th>
        <th style="width: 50%">Sort Order</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td style="width: 50%">{{$data->category_name}}</td>
        <td style="width: 50%"><input type="number" data-id="{{$data->id}}" name="sort[]" placeholder="Sort Category" required onchange="arraypush(this)"></td>
    </tr>
    @endforeach
</table>
