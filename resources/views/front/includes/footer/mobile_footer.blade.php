@switch($screen)
@case('view.cart')
<div class="sticky-foot footer-nav prodetfooter cartfoot" style="display: block;">
    <div class="container ">
        <div class="mobile-footer">
            <ul class="list-inline">
                <li class="" style="background-color: #ff3e6c;border-radius: 4px;"><a style="color:#fff;font-weight: 500;font-size: 15px" href="{{route('front.getCategory')}}"><span class="topay">SHOPPING</span></a></li>
                <li class="" style="background-color: #ff3e6c;border-radius: 4px;"><a style="color:#fff;font-weight: 500;font-size: 15px" href="{{(Auth::check())?route('view.deliveryaddress'):route('front.loginBlade')}}"><span class="topay">CHECKOUT</span></a></li>
            </ul>
        </div>
    </div>
</div>
@push('script')
   <script>
   $(document).ready(function(){
 /*sticky footer*/
       var width = $(window).width();
       var lastScrollTop = 0;
       $(window).scroll(function(event) {
       var width = $(window).width();
       if (width <= 767) {
       function footer()
       {
       var st = $(this).scrollTop();
       if (st> lastScrollTop) { 
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       else
       {
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       lastScrollTop = st;
       }
       footer();
       }		
       });
   });
       
   </script>
@endpush
@break
@case('view.deliveryaddress')
<div class="sticky-foot footer-nav prodetfooter cartfoot" style="display: block;">
    <div class="container ">
        <div class="mobile-footer">
            <ul class="list-inline">
                <li class="" style="background-color: #ff3e6c;border-radius: 4px;width: 71%;"><a style="color:#fff;font-weight: 500;font-size: 14px" href="{{route('view.checkout')}}"><span class="topay">PROCESS TO CHECKOUT</span></a></li>
            </ul>
        </div>
    </div>
</div>
@push('script')
   <script>
   $(document).ready(function(){
 /*sticky footer*/
       var width = $(window).width();
       var lastScrollTop = 0;
       $(window).scroll(function(event) {
       var width = $(window).width();
       if (width <= 767) {
       function footer()
       {
       var st = $(this).scrollTop();
       if (st> lastScrollTop) { 
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       else
       {
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       lastScrollTop = st;
       }
       footer();
       }		
       });
   });
       
   </script>
@endpush
@break
@case('view.checkout')
<div class="sticky-foot footer-nav prodetfooter cartfoot" style="display: block;">
    <div class="container ">
        <div class="mobile-footer">
            <ul class="list-inline">
                <li class="" style="background-color: #ff3e6c;border-radius: 4px;width: 71%;"><a style="color:#fff;font-weight: 500;font-size: 14px" href="{{route('view.payment')}}"><span class="topay">PROCESS TO CHECKOUT</span></a></li>
            </ul>
        </div>
    </div>
</div>
@push('script')
   <script>
   $(document).ready(function(){
 /*sticky footer*/
       var width = $(window).width();
       var lastScrollTop = 0;
       $(window).scroll(function(event) {
       var width = $(window).width();
       if (width <= 767) {
       function footer()
       {
       var st = $(this).scrollTop();
       if (st> lastScrollTop) { 
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       else
       {
           if(st >= $('.profile-leftinner').offset().top + $('.profile-leftinner').outerHeight() - window.innerHeight &&
           st <= $('.mobpricedet').offset().top + $('.mobpricedet').outerHeight() - window.innerHeight +500)
           {
           $(".footer-nav").slideUp();
           }
           else
           {
           $(".footer-nav").slideDown();
           }
       }
       lastScrollTop = st;
       }
       footer();
       }		
       });
   });
       
   </script>
@endpush
@break
@case('view.payment')

<style>
    .profile-leftinner { 
        min-height: auto;
    }
</style>

@break
@case('product.item')
<div class="sticky-foot footer-nav prodetfooter" style="display: block;">
	  <div class="container ">
	  <div class="mobile-footer"> 
	  <ul class="list-inline">
	      <li class="footercart" ><a href="" style="font-size:11px;flex-direction: row;align-items: center;justify-content: center;align-content: center;" class="btn-cart1"><i class="fa fa-shopping-cart"></i>ADD TO CART</a></li>
		  <li class=""><a href="" style="font-size:11px;flex-direction: row;align-items: center;justify-content: center;align-content: center;" id="footerWishlist"><i class="fa fa-heart"></i>WISHLIST</a></li>
	   </ul>
	  </div>
	  </div>
	 </div>
	 @push('script')
   <script>
   $(document).ready(function(){ 
	 /*sticky footer*/
		 var width = $(window).width();
		var lastScrollTop = 0;
		$(window).scroll(function(event) {;
		var width = $(window).width();
		if (width <= 767) {
		function footer()
		{
				var st = $(this).scrollTop();
				 if (st > lastScrollTop){
				 $(".footer-nav").slideDown();
				 } 
				 else {
				 $(".footer-nav").hide();
				 }
				 lastScrollTop = st;
		}
		footer();
		}
		});
		$("#footerWishlist").click(function(e){
		    e.preventDefault();
		    $('#productWish').trigger('click');
		});
   });
      </script>
@endpush
@break
@case('wishlist')

@break
@case('front.account')
@case('profile')
@case('order')
@case('front.userprofile')
<div class="sticky-foot footer-nav orderfoot" style="display: block;">
	  <div class="container ">
	  <div class="mobile-footer"> 
	  <ul class="list-inline">
		  <li class="w1"><a href="{{ route('front.index') }}"><i class="fa fa-home"></i><span>Home</span></a></li>
		  <li class="w2"><a href="{{ route('order') }}" @if($screen == 'order') class="active" @endif><i class="fa fa-shopping-cart"></i><span>Orders</span></a></li>
		  <li class="w3"><a href="{{ route('front.account') }}" @if($screen == 'front.account') class="active" @endif ><i class="fa fa-user"></i><span>Addresses</span></a></li>
		  <li class="w4"><a href="{{ route('front.userprofile') }}" @if($screen == 'front.userprofile') class="active" @endif ><i class="fa fa-user"></i><span>Account</span></a></li>
		  <li class="w5"><a @if($screen == 'profile') class="active" @endif href="{{ route('profile') }}"><span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i> <i class="fa fa-lock fa-stack-1x"></i></span><span class="spanex">Change Pin</span></a></li>
	   </ul>
	  </div>
	  </div>
	 </div>
	  @push('script')
   <script>
   $(document).ready(function(){ 
        	
	 /*sticky footer*/
    	 var searchvar=0;
    	 $("#searchbtm").click(function(e){
    	 if ($('.btmsearch').css('display') == 'none'){
    	  $(".btmsearch").fadeIn();
    	  $('.btmsearch').css('display','block');
    	  searchvar=1;
    	  return false;
    	  }
    	 else if ($('.btmsearch').css('display') == 'block') {
    	  $(".btmsearch").fadeOut();
    	 $('.btmsearch').css('display','none');
    	  return false;
    	  }
    	 });
    	 var width = $(window).width();
    	var lastScrollTop = 0;
    	$(window).scroll(function(event) {;
    	var width = $(window).width();
    	if (width <= 767) {
    	function footer()
    	{
    			var st = $(this).scrollTop();
    			 if (st > lastScrollTop){
    			 $(".footer-nav").slideDown();
    			 } 
    			 else {
    			 $(".footer-nav").hide();
    			 }
    			 lastScrollTop = st;
    	}
    	footer();
    	}
    	});
    	/*sticky footer ends*/
       });
      </script>
@endpush
@break
@default
<div class="sticky-foot footer-nav" style="display: block;">
    <div class="topsearch-wraper index_search btmsearch" style="display: none;">
        <div class="topsearchinner-wraper">
            <form>
                <div class="topsearch">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </div>
            </form>
        </div>
    </div>
    <div class="container ">
        <div class="mobile-footer">
            <ul class="list-inline">
                <li><a href="{{route('front.index')}}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{route('front.getCategory')}}"><i class="fa fa-list"></i>Product</a></li>
                <li><a href="{{(Auth::check()?route('wishlist'):route('front.loginBlade'))}}"><i
                            class="fa fa-heart"></i>Wishlist</a></li>
                <li><a href="{{(Auth::check()?route('front.account'):route('front.loginBlade'))}}"><i
                            class="fa fa-user"></i>Account</a></li>
                <li><a href="{{(Auth::check()?route('order'):route('front.loginBlade'))}}" id="searchbtm"><i
                            class="fa fa-shopping-cart"></i>Order</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="goto-top2">
    <p class="goto-top"> <img src="{{URL::asset('assets/front/images/arrow.png')}}" class="img-responsive center-block" alt="logo" width="20" height="20"></p>
 </div>
 @push('script')
   <script>
   $(document).ready(function(){
                  /*sticky footer*/
           var searchvar=0;
           $("#searchbtm").click(function(e){
           if ($('.btmsearch').css('display') == 'none'){
            $(".btmsearch").fadeIn();
            $('.btmsearch').css('display','block');
            searchvar=1;
            return false;
            }
           else if ($('.btmsearch').css('display') == 'block') {
            $(".btmsearch").fadeOut();
           $('.btmsearch').css('display','none');
            return false;
            }
           });
           var width = $(window).width();
          var lastScrollTop = 0;
          $(window).scroll(function(event) {;
          var width = $(window).width();
          if (width <= 767) {
          function footer()
          {
                  var st = $(this).scrollTop();
                   if (st > lastScrollTop){
                   $(".footer-nav").slideDown();
                   } 
                   else {
                   $(".footer-nav").hide();
                   }
                   lastScrollTop = st;
          }
          footer();
          }
          });
          /*sticky footer ends*/
   });
       
   </script>
@endpush
@endswitch
