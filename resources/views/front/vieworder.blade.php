@extends('front.includes.container')
@section('content')
@php
    $date =  date('y:m:d',strtotime('now'));
@endphp
<style>
    .open>.dropdown-menu {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px;
}
.prdorder-common {
    padding: 20px 0px 10px 15px;
}
@media only screen and (min-width: 767px){
        .dropdown-menu {
             min-width: 50px;
            min-height: 50px;
        }
    }
    .pagination{
        position : unset;
    }
</style>
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">View Order</div>
				</div>
			</div>
		</div>
	</div>
	<div class="banner-breadcrumb">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<ul class="breadcrumb">
					  <li><a href="{{route('front.index')}}">Home</a></li>
					  <li><a href="#">View Order</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
<section class="myorder-section commonaccount-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 orderview">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a class="active" href="{{route('order')}}">My Orders</a></li>
                            <li><a href="{{route('front.account')}}">Addresses</a></li>
                            <li><a href="{{route('front.userprofile')}}">Account Settings</a></li>
                            <li><a href="{{route('profile')}}">Change Pin</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad ordershow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  orderlist-wraper orderslist" id="apporder">
                            @include('front.orderlist')
                            
                            {{-- <nav class="product_pagination" aria-label="Page navigation">
                                <ul class="pagination pagination-mg">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var page = 1;
@if(\Session::has('msg'))
    toastr["success"]('{{ \Session::get('msg') }}');
@endif
$('body').on('click','.page-item',function(e){
    e.preventDefault();
    const prames = new URL(e.target.href);
    page = prames.searchParams.get('page')
    fetch(`{{ route('Ajaxorder') }}?page=${page}`).then(response => response.text()).then(data => apporder.innerHTML = data)
})
function Conformation(is,event){
    event.preventDefault();
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "reason");

    bootbox.prompt({title:"Confirmation to cancel order !", inputType:'textarea',message:'Cancel Reason  *',callback : function(result){
        if(result != null && result != ""){
                input.setAttribute("value", result);
            is.appendChild(input);
            const formData = new FormData(is)
            // is.submit();
            fetch(is.action,{ body: formData, method: "post"}).then(response => response.json()).then(data => { 
                toastr["success"](data.status); 
                fetch(`{{ route('Ajaxorder') }}?page=${page}`).then(response => response.text()).then(data => apporder.innerHTML = data)
            })
            }
        }
    });
}

</script>
@endpush
