@if ($Country->id == '100')
<div class="form-group row">
    <label class="col-2 col-form-label">Billing State<span class="text-danger">*</span></label>
    <div class="col-3">
        <select class="form-control" id="stateName" name="stateName" >
        <option value="">Select</option>
        @foreach ($State as $state )
        <option value="{{$state->id}}">{{$state->state_name}}</option>
        @endforeach
    </select>
    </div>
</div>
@else
<div class="form-group row">
    <label class="col-2 col-form-label">Billing State<span class="text-danger">*</span></label>
    <div class="col-3">
        <input class="form-control" type="text" value="" id="stateName" name="stateName" >
    </select>
    </div>
</div>
@endif
