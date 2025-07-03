@if (isset($State))
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>State *</label>
        <select name="state_id" id="state_id1" class="form-control" style=" width: 100%;padding: 8px;">
            <option selected>Select state</option>
            @foreach ($State as $state)
            <option value="{{$state->id}}" {{($Address->state_id == $state->id)? "selected":""}}>{{$state->state_name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>Town / City *</label>
        <select name="city_id" id="city_id1" class="form-control" style=" width: 100%;padding: 8px;">
            <option selected>Select City</option>
            @foreach ($City as $city)
            <option value="{{$city->id}}" {{($Address->city_id == $city->id)? "selected":""}}>
                {{$city->city_name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>ZIP *</label>
        <select name="pincode_id" id="pincode_id1" class="form-control" style=" width: 100%;padding: 8px;">
            <option selected>Select Pincode</option>
            @foreach ($Pincode as $pincode)
            <option value="{{$pincode->id}}" {{($Address->pincode_id == $pincode->id)? "selected":""}}>
                {{$pincode->pincode}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-6 form-group">
    <label>Phone *</label>
    <input type="text" class="form-control" name="phone" value="{{$Address->phone}}" required="">
</div>
@else
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>State *</label>
        <input type="text" class="form-control" name="state_id" id="state_id1" value="" required="">
    </div>
</div>
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>Town / City *</label>
        <input type="text" class="form-control" name="city_id" id="city_id1" value="" required="">
    </div>
</div>
<div class="col-xs-6">
    <div class="select-box form-group">
        <label>ZIP *</label>
        <input type="text" class="form-control" name="pincode_id" id="pincode_id1" value="" required="">
    </div>
</div>
<div class="col-xs-6 form-group">
    <label>Phone *</label>
    <input type="text" class="form-control" name="phone" value="" required="">
</div>
@endif
