@if ($model == "Shipped")
<h4 align="center">Shipping</h4>
<form action="{{route('admin-update-node',[$order->id])}}" id="model" method="POST">
    {{ csrf_field() }}
<div class="form-group row">
    <label class="col-2 col-form-label">Track ID<span class="text-danger">*</span></label>

    <div class="col-8">
        <input class="form-control" type="text" value="{{$order->track_id }}" id="track_id" name="track_id" />
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Notes<span class="text-danger">*</span></label>

    <div class="col-8">
        <textarea class="form-control" name="d_s_n" id="d_s_n">{{$order->d_s_n}}</textarea>
    </div>
    <br>
    <p>Note: Link must be start with http eg(https://www.google.com/)</p>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
    </div>
</div>
</form>
@else
<h4 align="center">Return Notes</h4>
<form action="{{route('admin-updateReject-node',[$order->id])}}" id="model" method="POST">
    {{ csrf_field() }}
<div class="form-group row">
    <div class="col-12">
        <textarea class="form-control" name="d_r_n" id="d_r_n">{{$order->d_r_n}}</textarea>
    </div>
    <br>
    <p>Note: Link must be start with http eg(https://www.google.com/)</p>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
    </div>
</div>
</form>
@endif