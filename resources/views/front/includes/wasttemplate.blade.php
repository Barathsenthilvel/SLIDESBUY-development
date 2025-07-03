@if(!$Address->isEmpty())
<div class="table-title">
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Address as $add)
        <tr>
            <td>{{$add->name}} {{$add->last}}</td>
            <td>{{$add->email}}</td>
            <td>{{$add->address1.' '.$add->address2.' '.$add->getcity().' '.$add->getState().' '.$add->getContry().' '.$add->getpincode()}}</td>
            <td>{{$add->phone}}</td>
            <td>
                <a href="{{route('user.edit.address',[$add->id])}}" style="color:#560835" class="edit editAddress" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="{{route('user.delete.address',[$add->id])}}" style="color:#560835" class="delete Delete-link" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="table-title">
</div>
<div style="text-align: center;
    font-size: 16px;
    font-weight: 600;">
    <span>Address Empty</span>
</div>
@endif