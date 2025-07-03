@if($Country->id == '100')
<div class="form-group row">
    <label class="col-2 col-form-label">Billing State
    <span class="text-danger">*</span></label>
    <div class="col-3">
    <select class="form-control" id="billingState" name="billingState" required>
       <option value="">select State</option>
       @foreach ($State as $state )
       <option value="{{$state->id}}">{{$state->state_name}}</option>
       @endforeach
    </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Billing City
    <span class="text-danger">*</span></label>
    <div class="col-3">
    <select class="form-control" id="billingCity" name="billingCity" required>
       <option value="">select City</option>
    </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Pincode
    <span class="text-danger">*</span></label>
    <div class="col-4">
        <input class="form-control" type="text" value="" id="pincode" name="pincode" required/>
    </div>
</div>
@else
<div class="form-group row">
    <label class="col-2 col-form-label">Billing State
    <span class="text-danger">*</span></label>
    <div class="col-4">
        <input class="form-control" type="text" value="" id="billingState" name="billingState" required/>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Billing City
    <span class="text-danger">*</span></label>
    <div class="col-4">
        <input class="form-control" type="text" value="" id="billingCity" name="billingCity" required/>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Pincode
    <span class="text-danger">*</span></label>
    <div class="col-4">
        <input class="form-control" type="text" value="" id="pincode" name="pincode" required/>
    </div>
</div>
@endif