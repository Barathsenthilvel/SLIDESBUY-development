@if (session()->has('cart_return'))
    @if(count($card->items) <= 0)
        <script>
            window.location.href = "{{URL::to('/')}}"
        </script>
    @endif
@else
    <script>
        window.location.href = "{{URL::to('/')}}"
    </script>
@endif

@if (count($card->ReturnItemsTemp) > 0)
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad cartmob">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-leftinner">
    <div class="profile-navbar mobhide">
        <ul class="list-inline">
            <li><a class="active" href="#">{{($card->return)?'Return Product':'Added Product To return'}}</a></li>
        </ul>
    </div>
    <div clas="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad cartmob" style="overflow-x: scroll;">
        <form action="{{route('Submit-return-product',$card->OrderId)}}" method="POST" id="formsubmit">
            @csrf
        @include('front.includes.returnedrender')
        @if (count($card->ReturnItemsTemp)>0 && !$card->return)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopad bottombtn-wraper text-right contibtn">
                <input class=" readmore-btn transparent-btn" type="submit" value="Submit Form">
        </div>
        </form>
        
        @endif
    </div>
</div>
</div>
@endif

