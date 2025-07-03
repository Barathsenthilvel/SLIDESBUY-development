@php
$checked = true;
@endphp
@forelse ($Address as $add)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderlist-single address-single custom-radio">
    <div class="row mobmar0">
        <div
            class="col-lg-4 col-md-5 col-sm-5 col-xs-12 prdorder-common addrnamemob">
            <input type="radio" {{($checked)?'checked':''}} id="{{$add->id}}" value="{{$add->id}}" name="shipping">
                <label for="{{$add->id}}" class="container3">
                <span class="checkmark deskhide"></span>
                <span class="cardnumber-span">
                    <span class="cartitem-caption"> Name </span>
                    <span class="cartitem-value addressname-container">
                        <span>{{$add->name.' '.$add->last}}</span>
                        <span>{{$add->phone}}</span>
                    </span>
                </span>
            </label>
        </div>
        <div
            class="col-lg-8 col-md-7 col-sm-7 col-xs-12 cvv-container prdorder-common addrnamedet">
            <div class="cartitem-caption">Address</div>
            <div class="cartitem-value">
                <span>
                    {{$add->address1}},
                    {{$add->getcity().', '.$add->getState()}},
                    {{$add->getContry().', '.$add->getpincode()}}
                </span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  singleaddr-bottom editaddr">
            <a class="small-lightbtn editAddress"  href="{{route('user.edit.address',[$add->id])}}" ><i class="fa fa-edit deskhide"></i><span class="mobhide">Edit Address</span></a>
            <a class="small-lightbtn Delete-link"  href="{{route('user.delete.address',[$add->id])}}" ><i class="fa fa-trash deskhide"></i><span class="mobhide">Delete Address</span></a>
        </div>

    </div>
</div>
@empty
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="
    text-align: center;
    font-size: 15px;
    font-weight: 500;
">
        <div class="">Add your delivery address</div>
    </div>
@endforelse
@php
$checked = false;
@endphp