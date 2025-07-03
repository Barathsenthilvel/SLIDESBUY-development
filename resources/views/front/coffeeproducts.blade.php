<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$StoreConfig->Store_Meta_Title}}</title>
    <meta name="description" content="{{ $StoreConfig->Store_Meta_Description }}" />
    <meta name="keywords" content="{{ $StoreConfig->Store_Meta_Keywords }}" />
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/latest/css/main.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/latest/css/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/latest/css/slick/slick-theme.css') }}" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/latest/css/bootstrap/bootstrap.min.css') }}">
    <!-- Fontawesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <!-- jQuery (Toastr depends on it) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!--additional -->
    <link href="{{URL::asset('assets/front/static/css/style.css')}}" rel="stylesheet" media='screen,print'>
    <link href="{{URL::asset('assets/front/static/css/responsive.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/front/static/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/front/static/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/front/static/css/bootoast.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/front/static/css/toastr.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--additional -->
    <style>
       body{
         background-color: var(--tm-bgprimary) !important;  
       }
       .variant_active{
         border: 3px solid green;    
       }
       .hyperlink{
         cursor: auto !important;   
       }
       .header_color
       {
           color : #5A1E1D !important;
       }
          .testimonial-section {
            background-color: #1a1a1a;
          }
        
          .testimonial-box {
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            min-height: 100%;
          }
        
          .testimonial-content p {
            margin-bottom: 1rem;
          }
        
          .testimonial-rating i {
            color: #fcd34d;
            font-size: 1.2rem;
          }
        
          .cta-button {
            background-color: #f4c542;
            color: #1a1a1a;
            padding: 0.6rem 2rem;
            border-radius: 2rem;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 1rem;
          }
          
          .no-horizontal-padding > * {
          padding-right: 0px;
          padding-left: 0px;
        }
        .font-image {
            background-color: #f7f7f7;
            border-radius: 50%;
            font-size: 35px;
            font-weight: 500;
            width: 50px;
            height: 50px;
            color: #5a1e1d;
        }

    </style>
  </head>
  @php
      $quantity = 1;
      if(!empty(session()->get('cart')->items)){
          if(array_key_exists($product->id,session()->get('cart')->items)){
              $quantity = session()->get('cart')->items[$product->id]['quantity'];
          }
      }
      $img2 = is_null($product->image2) ? $product->image1 : $product->image2;
      $img3 = is_null($product->image3) ? $product->image1 : $product->image3;
      $img4 = is_null($product->image4) ? $product->image1 : $product->image4;
      $rev = $product->reviewtotal();
      $star = 5;
      $wishlistcnt = 0;
        if(Auth::check()){
        if(Auth::user()->wishlist) $wishlistcnt = count(\explode(',',Auth::user()->wishlist));
        }

  @endphp
  <body style="background-color: var(--tm-bgprimary);">
    <!-- HEader -->
    <!--<nav class="p-0 tm-primary-bg p-1">
     <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
              <div class="logo">
                <img src="./assets/img/logo.png" alt="">
              </div>
              <div class="menulist">
                <ul>
                  <li><a class="menu-link" href="">Home</a></li>
                  <li><a class="menu-link" href="">Service</a></li>
                  <li><a class="menu-link" href="">About</a></li>
                  <li><a class="menu-link" href="">Contact</a></li>
                </ul>
              </div>
              <div class="side-bar">
                <i class="fa-solid fa-bars"></i>
              </div>
            </div>
          </div>
        </div>
		
		
      </div>
    </nav>-->
		<nav class="navbar navbar-expand-lg p-0 tm-primary-bg p-1">
			  <div class="container">
				<div class="logo">
				  <img src="{{ URL::asset('/assets/latest/img/logo.png')}}" alt="">
				</div>

			 <!-- Sidebar Trigger Button (can go in your nav) -->
		<button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu" style="border: none;">
		  <i class="fa-solid fa-bars"></i>
		</button>

		<!-- Offcanvas Sidebar -->
		<div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu" aria-labelledby="sideMenuLabel">
		  <div class="offcanvas-header">
			<div class="logo">
			  <img src="{{ URL::asset('/assets/latest/img/logo.png')}}" alt="">
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: white;"></button>
		  </div>
		  <div class="offcanvas-body" style="justify-content: flex-end;">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a href="{{route('front.Contact_Us')}}" class="menu-link"><i class="fa fa-envelope" aria-hidden="true"></i> Help and Support</a>
			  </li>
			  <li class="nav-item">
				<a href="{{(Auth::check()?route('order'):route('front.loginBlade'))}}" class="menu-link"> <i class="fa fa-map-marker" aria-hidden="true"></i> Track Order</a>
			  </li>
			  <li class="nav-item">
				<a href="{{(Auth::check()?route('front.userprofile'):route('front.loginBlade'))}}" class="menu-link"> <i class="fa fa-map-marker" aria-hidden="true"></i>My Account</a>
			  </li>
               @if(!Auth::check())
                <li>
                    <a href="{{route('front.loginBlade')}}" class="menu-link" ><i aria-hidden="true" class="fa fa-sign-in"></i> Login / Signup</a>
                </li>
                @else
                <li> <a  href="javascript:void(0);" class="menu-link">! Hai {{ auth()->user()->name }}</a></li>
                <li> <a href="{{route('user.logout')}}" class="menu-link"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                @endif
			</ul>
		  </div>
		</div>
      </div>
    </nav>
    <!-- HEader -->
    
    <!-- Banner Section -->
    
      <!-- <div class="container-fluid p-0 bg-white">
        <div class="row banner-slick">
          <div class="col-md-12">
            <div class="d-flex justify-content-center w-100 banner position-relative">
              <img src="./assets/img/245.png" alt=" web" class="hidden md:block object-cover">
              <div class="d-flex h-100 justify-content-center w-100 position-absolute banner-content align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 text-center text-white">
                      <h1 class="fw-bolder">Bestie Beans Filter Coffee – Crafted for the <br> Modern Achiever</h1>
                      <p class="text-2xl font-bold lg:text-4xl">A bold, smooth, and premium coffee experience—perfectly roasted to keep youenergized, focused, and ready to take on the day</p>
                      <div class="mt-5">
                        <button class="cta-button fs-6">Order Now</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="d-flex justify-content-center w-100 banner position-relative">
              <img src="./assets/img/2241.png" alt=" web" class="hidden md:block object-cover">
              <div class="d-flex h-100 justify-content-center w-100 position-absolute banner-content align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 text-center text-white">
                      <h1 class="fw-bolder">Bestie Beans Filter Coffee – Crafted for the <br> Modern Achiever</h1>
                      <p class="text-2xl font-bold lg:text-4xl">A bold, smooth, and premium coffee experience—perfectly roasted to keep youenergized, focused, and ready to take on the day</p>
                      <div class="mt-5">
                        <button class="cta-button fs-6">Order Now</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 
        </div>
      </div> -->
    
    <!-- Banner Section -->

    <!-- View Product -->
    <section class="view-product-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center ">
            <h1 class="fw-bold fs-1 header_color">India’s Favourite Filter Coffee - Now at Your Fingertips!</h1>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col-md-6">
            <div class="v-product-show">
              <div class="v-sm-product">
                
                  <div class="inner_photo_product">
                    <img class="show-box show-img active" src="{{URL::asset('assets/media/products/'.$product->image1)}}" alt="">
                  </div>
                
                
                  <div class="inner_photo_product">
                    <img class="show-box show-img " src="{{URL::asset('assets/media/products/'.$img2)}}" alt="">
                  </div>
                
                
                  <div class="inner_photo_product">
                    <img class="show-box show-img " src="{{URL::asset('assets/media/products/'.$img3)}}" alt="">
                  </div>
                
                
                  <div class="inner_photo_product">
                    <img class="show-box show-img " src="{{URL::asset('assets/media/products/'.$img4)}}" alt="">
                  </div>
              </div>
              <div class="v-product">
                <div class="show-box">
                  <img class="show-img active" src="" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row d-flex gap-2 justify-content-between h-100">
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-4">
                  <a href="" class="d-flex align-items-center gap-2">Home <i class="fa-solid fa-angle-right"></i>
                  </a>
                  <a href="" class="d-flex align-items-center gap-2">Products <i class="fa-solid fa-angle-right"></i>
                  </a>
                </div>
                <div class="border-l">
                  <a href="">{{$StoreConfig->productIdprefix." ".$product->product_sku }}</a>
                </div>
              </div>
              <h5 class="fw-bolder header_color">{{$product->product_title}}</h5>
              <div>
                <div class="v-price d-flex gap-3 align-items-center ">
                  <h3 class="fw-bolder header_color">₹{{ ($product->getproductPrice()->isoffer)?$product->getproductPrice()->offer:$product->getproductPrice()->price }}</h3>
                  <h3 class="fw-bolder header_color">
                    <del>₹{{$product->mrp}}</del>
                  </h3>
                  <div class="v-offer">
                    <p>{{ round((( $product->mrp - $product->getproductPrice()->price ) / $product->mrp) * 100) }} % Discount, you save ₹ {{ $product->mrp - $product->getproductPrice()->price }} </p>
                  </div>
                </div>
                <div class="v-rating d-flex align-items-center">
                  <div class="v-rating-box">
                    <a href="#">
                      <i class="{{($star >= 1)?'fa-solid':'far '}} fa-star"></i>
                    </a>
                    <a href="#">
                      <i class="{{($star >= 2)?'fa-solid':'far '}} fa-star"></i>
                    </a>
                    <a href="#">
                      <i class="{{($star >= 3)?'fa-solid':'far '}} fa-star"></i>
                    </a>
                    <a href="#">
                      <i class="{{($star >= 4)?'fa-solid':'far '}} fa-star"></i>
                    </a>
                    <a href="#">
                      <i class="{{($star >= 5)?'fa-solid':'far '}} fa-star"></i>
                    </a>
                  </div>

                    <p class="v-reviews">( 49 reviews )</p>
                </div>
              </div>
              <div class="v-subitems d-flex flex-column gap-2">
                <p>Choose Type</p>
                <div class="v-sub-list d-flex align-items-center gap-3">
                  <a href="/product/bestie-beans-filter-coffee-500g-with-chicory-blend" class="show-box {{ $product->id == 8 ? 'variant_active' : '' }}">
                    <img src="{{URL::asset('/assets/img/image_9.png')}}" alt="">
                    <p>( With Chicory )</p>
                  </a>
                  <a href="/product/bestie-beans-filter-coffee-500g-100-coffee-0-chicory" class="show-box {{ $product->id == 9 ? 'variant_active' : '' }}">
                    <img src="{{URL::asset('/assets/img/image_9.png')}}" alt="">
                    <p>( No Chicory )</p>
                  </a>
                </div>
              </div>
              <div class="v-cart d-flex">
                <div class="v-item-count d-flex gap-3 v-rating-box quantity-wrapper">
                  <input type="button" value="-" class="decrease">
                  <input type="number"  value="{{$product->minquantity}}" min-Quantity="{{$product->minquantity}}" min="1" max="{{$product->quantity}}" class="quantity-input">
                  <input type="button" value="+" class="increase">
                </div>
                <div class="v-cart-btn">
                    <input type="hidden" id="id" value="{{ $product->id }}">
                    @if($product->soldout != 'off' || $product->quantity > 0)
                     <a href="" class="v-btn btn-cart1">Buy Now</a>
                    @else
                      <a href="#" style="cursor:auto !important"class="v-btn">SoldOut</a>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="p-0 h-100 zx-container">
      <div class="container-fluid zx-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="zx-content">
                <h2 class="heading-font text-white">Bestie Beans Filter Coffee <br> (No Chicory) </h2>
                <div class="mt-3">
                  <a href="" class="zx-btn text-white">100% Pure Coffee</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row zx-box">
          <div class="col-md-12 zx-content-box d-flex justify-content-between">
            <div class="p-4 my-auto d-flex flex-column gap-3">
                <h2 class="text-white fw-bolder">Pure Coffee, Pure Wellness – Fuel Your Day the Right Way</h2>
              <h4 class="text-white fw-bolder">Bestie Beans Filter Coffee – Crafted for the Modern Achiever</h4>
              <p class="fs-6 text-white">A bold, smooth, and premium coffee experience—perfectly roasted to keep youenergized, focused, and ready to take on the day</p>
              <div class="d-flex v-button gap-3">
                <div class="v-cart-btn fw-semibold fs-5">
                  <a href="#" class="v-btn scroll-top-action">Order Now</a>
                  
                </div>
                <div class="v-cart-btn zx-btn-bg fw-normal fs-6">
                  <a href="#" class="v-btn text-white hyperlink">Get 10% Off Your First Bag!" (No Chicory)</a>
                </div>
              </div>
            </div>
            <img src="{{ URL::asset('/assets/latest/img/1.png')}}" alt="" class="zx-img">
          </div>
        </div>
      </div>
    </section>
    <!--rep-->
             <section class="tm-primary-bg">
      <div class="tm-img">
        <img src="{{ URL::asset('/assets/latest/img/7.png')}}" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <h1 class="heading-font"> What makes Bestie Beans different from other coffees </h1>
             <h3 style="color:var(--tm-btn-primary)"> Bestie Beans Filter Coffee (No Chicory) – 100% Pure Coffee </h3>
            <div class="list-rm mt-3">
              <ul>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> 100% Premium Coffee Beans – No fillers, no chicory, just rich, smooth, and bold coffee
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Freshly Roasted in Small Batches – Guaranteed freshness for peak flavor and aroma
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Smooth & Never Bitter – Expertly roasted for a balanced, full-bodied taste.
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Clean, Jitter-Free Energy – Fuel your focus without the crash.
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Perfect for Any Brew Method – Whether you love espresso, drip, French press, or pour-over .
                </li>
              </ul>
            </div>
            <a href="#" class="cta-button hyperlink col-sm-12 col-12">Choose Your Blend & Taste the Difference" </a>
          </div>
        </div>
      </div>
    </section>
    <!--rep-->
    <section class="p-0 h-100 zx-container">
      <div class="container-fluid zx-bg1">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="zx-content">
                <h2 class="heading-font text-white">Filter Coffee (With Chicory)</h2>
                <div class="mt-3">
                  <a href="" class="zx-btn text-white">Balanced & Nourishing</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row zx-box">
          <div class="col-md-12 zx-content-box d-flex justify-content-between">
            <div class="p-4 my-auto d-flex flex-column gap-3">
            <h2 class="text-white fw-bolder">The First Coffee Designed for Mind, Body, and Success</h2>
              <h4 class="text-white fw-bolder">Bestie Beans Filter Coffee with Chicory – A Smarter Way to Start Your Day</h4>
              <p class="fs-6 text-white">A smooth, naturally sweet blend with chicory—crafted to keep you sharp, energized, and feeling great from the inside out</p>
              <div class="d-flex v-button gap-3">
                <div class="v-cart-btn fw-semibold fs-5">
                  <a href=#" class="v-btn scroll-top-action">Order Now</a>
                </div>
                <div class="v-cart-btn zx-btn-bg fw-normal fs-6">
                  <a href="#" class="v-btn text-white hyperlink">Get 10% Off Your First Bag!" (With Chicory)</a>
                </div>
              </div>
            </div>
            <img src="{{ URL::asset('/assets/latest/img/2.png')}}" alt="" class="zx-img">
          </div>
        </div>
      </div>
    </section>
    <!--rep 2-->
        <section class="tm-primary-bg">
      <div class="tm-img">
        <img src="{{ URL::asset('/assets/latest/img/7.png')}}" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <h1 class="heading-font"> What makes Bestie Beans different from other coffees </h1>
            <h3 style="color:var(--tm-btn-primary)">Bestie Beans Filter Coffee with Chicory – Balanced & Nourishing </h3>
            <div class="list-rm mt-3">
              <ul>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> A Perfect Harmony of Coffee & Chicory – A smooth, naturally sweet taste with less acidity
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Gentler on the Stomach – Ideal for those who love coffee but struggle with acidity.
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Steady, Sustained Energy – Enjoy focus and clarity without jitters or crashes
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Naturally Sweet, No Sugar Needed – Chicory enhances flavor while keeping it light on your system. 
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span>  Inspired by Tradition, Crafted for Modern Lifestyles – A timeless blend rooted in European and New Orleans coffee culture.
                </li>
              </ul>
            </div>
            <a href="#" class="cta-button hyperlink col-sm-12 col-12">Choose Your Blend & Taste the Difference" </a>
          </div>
        </div>
      </div>
    </section>
    <!--rep 2 -->
    <section class="zx-bg2">
      <div class="container my-auto">
        <div class="row">
          <div class="col-md-6">
            <h1 class="heading-font text-white">Tired of Coffee That’s Too Bitter, Too Acidic, or Just… Meh? </h1>
            <img src="{{ URL::asset('/assets/latest/img/smileynew.png')}}" height="337px" width="337px" wir alt="">
          </div>
        </div>
      </div>
    </section>
    <section class="d-flex justify-content-end">
      <div class="outer-box">
        <h1 class="title fw-bolder header_color"> If you’ve ever taken a sip of coffee and thought: </h1>
        <h3 style="color:#5A1E1D !important">🚫 Too bitter! 🚫 Too sour! 🚫 Lacking depth! You’re not alone.</h3>
        <div class="content-boxes">
          <div class="content-card">
            <div class="icon-star">
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Most store-bought coffee is over-roasted, stale, or made from low-quality beans, leaving you with a cup that’s far from satisfying.</p>
          </div>
          <div class="content-card">
            <div class="icon-star">
              <i class="fa-solid fa-star"></i>
            </div>
            <p>Many brands mask this with artificial flavors or unnecessary additives.</p>
          </div>
          <div class="content-card">
            <div class="icon-star">
              <i class="fa-solid fa-star"></i>
            </div>
            <p>With many coffee brands, flavor is a gamble—sometimes rich and bold, other times flat and forgettable</p>
          </div>
        </div>
        <div class="d-flex justify-content-between outer-end">
          <p class="bottom-text">But at Bestie Beans, we believe great coffee doesn’t need to be complicated—it just needs to be done right</p>
          <a href="#" class="cta-button hyperlink">Try Bestie Beans Risk-Free Today</a>
        </div>
      </div>
    </section>
    <!--old-->
    <!--old -->
    <section class="testimonial-section px-0 py-12 col-12 col-sm-12 col-md-12 col-lg-12 py-sm-12 px-sm-0 py-md-5 px-md-2">
      <div class="container-fluid p-0">
        <div class="row col-xs-12 col-sm-12 no-horizontal-padding">
          <h2 class="heading-font fw-bold text-center mb-4 header_color">What Coffee Lovers Are Saying</h2>
          <div class="testimonial-carousel">
            
            <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    P
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Preethi Susan Isaac” </p>
                <p class="text-white t-review"> Grateful for this beautiful blend that fills our hearts and home with joy.Highly, whole heartedly recommended </p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
            <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    R
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Ramachandran PB” </p>
                <p class="text-white t-review"> Wow..what a Taste! Beats the home-made version. Way to go, TB!!</p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
            <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    N
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Nithesh Babu” </p>
                <p class="text-white t-review"> Excellect and natural taste of coffee and quality foremost. </p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
            <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    V
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Vidhya TC” </p>
                <p class="text-white t-review"> Really satisfied with the taste , aroma and the packing. Good service and good customer service. </p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
              <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    L
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Latha Gopal” </p>
                <p class="text-white t-review"> Real Madras coffee experience good relaxant and excellent Aroma packing the best with zip lock technology for locking the Aroma</p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
              <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    D
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Deena Krishnamurthy” </p>
                <p class="text-white t-review"> Very nice coffee.It gives instant energy and boost to do my upcoming works.aroma is awesome</p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
              <div class="testimonial-box p-sm-4">
              <div class="testimonial-img">
                <!--<img src="{{ URL::asset('/assets/latest/img/Ellipse1.png')}}" alt="">-->
                <div class="font-image">
                    R
                </div>
              </div>
              <div class="testimonial-content mb-3">
                <p class="text-white fw-bold"> “Revathi Srinivasan” </p>
                <p class="text-white t-review"> I have tried this recently. The taste and smell sound good. I became a fan of Bestie Beans Coffee.</p>
              </div>
              <div class="testimonial-rating d-flex gap-2">
                <div class="flex gap-2">
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-star"></i>
                  </a>
                </div>
                <p class="fw-bold text-white">5-Star Review</p>
              </div>
            </div>
          </div>
          <div class="text-center">
            <p class="heading-font fs-2 fw-bold text-center">Join Thousands of Happy Coffee Lovers </p>
            <!--<a href="#" class="fs-5 cta-button py-2 scroll-top-action">Order Now</a>-->
            <a href="#" class="fs-5 cta-button py-2 scroll-top-action">Order Now</a>
            
          </div>
        </div>
      </div>
    </section>


    <section class="tm-primary-bg">
      <div class="container">
        <div class="row">
          <h1 class="heading-font text-center" style="color: var(--tm-bgprimary);">
            Your Best Cup at the Best Price
          </h1>
          <h3 class="text-center" style="color: var(--tm-bgprimary);">
            Choose Your Perfect Blend & Get the Best Deal
          </h3>
          
        </div>
        <div class="row mt-5">
          <div class="col-lg-2"></div>
          
          @foreach($similarproduct as $product)
          @if($product->id == 12 || $product->id == 13)
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="show-box order-box p-0 d-grid overflow-visible">
              <div class="order-item">
                <img src="{{URL::asset('assets/media/products/'.$product->image1)}}" alt="">
              </div>
              <div class="order-details position-relative p-3">
                <h6 class="heading-font fs-4 fw-bold" style="color:#fee5c1 !important">{{ $product->product_title }}</h6>
                <div class="offer-rm">
                  <p class="heading-font fs-5">MRP :</p>
                  <h5 class="offer-price fw-bold">&#8377;{{ $product->mrp }}</h5>
                  <!--<span class="offer-type">Regular Price</span>-->
                </div>
                <div class="offer-rm">
                  <p class="heading-font fs-5">Offer Price:</p>
                  <h5 class="offer-price fw-bold">&#8377;{{ $product->getproductPrice()->price }}</h5>
                  <span class="v-offer">{{ round((( $product->mrp - $product->getproductPrice()->price ) / $product->mrp) * 100) }} % OFF</span>
                </div>
                <div class="p-4 text-center">
                  <p class="heading-font fs-5">{{ round((( $product->mrp - $product->getproductPrice()->price ) / $product->mrp) * 100) }} % OFF ,you save ₹ {{ $product->mrp - $product->getproductPrice()->price }}</p>
                </div>
                <div class="order-btn">
                    @if($product->soldout != 'off' || $product->quantity > 0)
                     <a href="{{ url('/product/' . $product->slug) }}" class="v-btn">Order Now</a>
                    @else
                      <a href="#" style="cursor:auto !important"class="v-btn scroll-top-action">SoldOut</a>
                    @endif
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          <div class="col-lg-2"></div>
        </div>
          
          <div class="col-lg-2"></div>
        </div>
      </div>
    </section>
    <section class="p-0">
      <div class="container-fluid p-0">
        <div class="offer-section d-flex justify-content-between align-items-center">
          <div class="offer-detail p-5">
            <div class="offer-badge">Limited-Time Offers</div>
            <div class="offer-list-rm mt-3">
              <ul>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> First-Time Customer Bonus: Get an Extra <b>10% Off</b> Your First Order with Code <b>BESTIE10</b>
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Free Shipping on <b> Across Chennai</b> – Because fresh coffee should come hassle-free
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Freshness Guarantee: Every bag is roasted to order, ensuring maximum flavor and aroma
                </li>
              </ul>
            </div>
          </div>
          
            <div class="offer-banner">
              <img src="{{ URL::asset('/assets/latest/img/4.png')}}" alt="">
            </div>
          
        </div>
        <div class="offer-section rm-sec d-flex justify-content-between align-items-center">
          
            <div class="offer-banner">
              <img src="{{ URL::asset('/assets/latest/img/6.png')}}" alt="">
            </div>
          
          <div class="offer-detail p-5">
            <div class="offer-badge"> Subscribe Now & Save Your Perks </div>
            <div class="offer-list-rm mt-3">
              <ul>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span>  Save 5% on Every Order – Never run out of your favorite coffee again <b> Use Code SAVE05</b>.
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Early Access to New Blends & Limited Editions – Be the first to try our latest flavors.
                </li>
                <li>
                  <span>
                    <i class="fa-solid fa-star"></i>
                  </span> Exclusive Members-Only Discounts & Special Offers – Get VIP perks just for being a subscriber
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tm-primary-bg p-0">
      <div class="container promo-container">
        <div class="row align-items-center">
          <div class="col-xl-5 col-md-12 mb-2 text-white position-relative">
            <h2 style="color:#ffffff">Risk-Free Guarantee. Love It or It’s on Us!</h2>
            <p>We’re so confident you’ll love Bestie Beans that we offer a 30-Day Money-Back Guarantee. If you don’t absolutely love your coffee, we’ll refund every rupee—no questions asked.</p>
            <button class="sm-button mt-3">Upgrade Your Coffee Experience</button>
            <div class="position-absolute arrow-m">
              <img src="{{ URL::asset('/assets/latest/img/Group1544.png')}}" alt="">
            </div>
          </div>
          <div class="col-xl-7 col-md-12 mb-2 pro-box d-flex justify-content-end">
            <div class="product-image text-center position-relative">
              <div class="limited-offer mb-3">
                <img src="{{ URL::asset('/assets/latest/img/limited-i.png')}}" alt="">
                <p class="text-white fs-4">05:00 mins</p>
                <a href="#" class="cta-button p-2 px-4 rounded-5 fs-5 scroll-top-action">Order NOW</a>
              </div>
              <img src="{{ URL::asset('/assets/latest/img/5.png')}}" class="w-100" alt="Coffee Product">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row text-center">
          <h2 class="heading-font header_color">Frequently Ask Questions</h2>
          <h5 class="header_color">We know you might have a few questions before trying **Bestie Beans Coffee**, so we’ve answered the most common ones below! </h5>
        </div>
        <div class="row mt-3">
          <div class="tab-button-rm mb-4">
            <ul class="nav nav-tabs p-0 tab-btn-group justify-content-lg-center" id="myTab" role="tablist">
              <li class="tab-list active nav-item" role="presentation"><div class="nav-link active" id="available-tab" data-bs-toggle="pill" data-bs-target="#available" type="button" role="tab" aria-controls="available" aria-selected="true">PRODUCT & INGREDIENTS</div></li>
              <li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#brewing_storage" type="button" role="tab" aria-controls="other" aria-selected="false">BREWING & STORAGE</div></li>
              <li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#order_shipping" type="button" role="tab" aria-controls="other" aria-selected="false">ORDERING & SHIPPING</div></li>
              <li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#subscription" type="button" role="tab" aria-controls="other" aria-selected="false">SUBSCRIPTION & RETURNS</div></li>
              <!--<li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">PRODUCT & INGREDIENTS</div></li>-->
              <!--<li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">PRODUCT & INGREDIENTS</div></li>-->
              <!--<li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">PRODUCT & INGREDIENTS</div></li>-->
              <!--<li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">PRODUCT & INGREDIENTS</div></li>-->
              <!--<li class="tab-list nav-item" role="presentation"><div class="nav-link" id="other-tab" data-bs-toggle="pill" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">PRODUCT & INGREDIENTS</div></li>-->
            </ul>
          </div>
          <div class="tab-content" id="myTabContent">
            <div class="active fade show tab-pane" id="available" role="tabpanel" aria-labelledby="available-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>What makes Bestie Beans Coffee different from other brands?</p>
                    </div>
                    <div class="faq-ans">
                     <ul>
                         <li>
                             Bestie Beans is **freshly roasted in small batches**, ensuring peak flavor and aroma.
                         </li>
                          <li>
                            We use **100% premium coffee beans**—no fillers, no artificial flavors.
                         </li>
                          <li>
                             Our **chicory blend is naturally smooth** and lower in acidity, making it easier on the stomach
                         </li>
                     </ul>
                    </div>
                  </div>
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>Is the chicory blend caffeine-free?</p>
                    </div>
                    <div class="faq-ans">
                    <ul>
                      <li>
                          No, it still contains caffeine but at a **slightly lower level than pure coffee**, making it perfect for those who want a balanced energy boost
                      </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--column 2-->
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>What’s the difference between the pure coffee and chicory blend?</p>
                    </div>
                    <div class="faq-ans">
                      <ul>
                         <li>
                             Bestie Beans Filter Coffee (No Chicory)** – 100% pure coffee for those who love a bold, strong, and rich coffee experience
                         </li>
                          <li>
                            Bestie Beans Filter Coffee with Chicory** – A smoother, slightly sweet blend that’s gentler on the stomach with a unique depth of flavor
                         </li>
                          <li>
                             Our **chicory blend is naturally smooth** and lower in acidity, making it easier on the stomach
                         </li>
                     </ul>
                    </div>
                  </div>
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>Is your coffee organic and ethically sourced?</p>
                    </div>
                    <div class="faq-ans">
                      <ul>
                       <li>
                           Yes! We source **premium, ethically grown coffee beans** to ensure quality and sustainability.
                       </li>
                     </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="brewing_storage" role="tabpanel" aria-labelledby="available-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> Can I choose between whole beans and ground coffee?</p>
                    </div>
                    <div class="faq-ans">
                     <ul>
                         <li>
                             Yes! We offer both whole bean and ground options, so you can brew it the way you love.
                         </li>
                         
                     </ul>
                    </div>
                  </div>
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> How should I store my coffee to keep it fresh?</p>
                    </div>
                    <div class="faq-ans">
                    <ul>
                      <li>
                          For maximum freshness, keep your coffee in an **airtight container in a cool, dry place**—away from direct sunlight and moisture
                      </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--column 2-->
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> What brewing methods work best with Bestie Beans Coffee?</p>
                    </div>
                    <div class="faq-ans">
                        <p>Bestie Beans works with **all brewing methods**, including: </p>
                      <ul>
                         <li>
                             Drip Coffee Machine 
                         </li>
                          <li>
                            French Press
                         </li>
                          <li>
                             Espresso Machine  
                         </li>
                         <li>
                            Pour-Over
                         </li>
                          <li>
                             Moka Pot  
                         </li>
                         <li>
                             Cold Brew   
                         </li>
                     </ul>
                    </div>
                  </div>
                  <!--<div class="faq-box mb-3">-->
                  <!--  <div class="faq-qn">-->
                  <!--    <div class="p-3">-->
                  <!--      <i class="fa-solid fa-plus"></i>-->
                  <!--    </div>-->
                  <!--    <p>Is your coffee organic and ethically sourced?</p>-->
                  <!--  </div>-->
                  <!--  <div class="faq-ans">-->
                  <!--    <ul>-->
                  <!--     <li>-->
                  <!--         Yes! We source **premium, ethically grown coffee beans** to ensure quality and sustainability.-->
                  <!--     </li>-->
                  <!--   </ul>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
              </div>
            </div>
            <div class="tab-pane" id="order_shipping" role="tabpanel" aria-labelledby="available-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>How can I place an order?</p>
                    </div>
                    <div class="faq-ans">
                     <ul>
                         <li>
                             Simply select your preferred coffee blend, choose whole bean or ground, and click **“Order Now”** to check out securely
                         </li>
                     </ul>
                    </div>
                  </div>
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>How long does delivery take?</p>
                    </div>
                    <div class="faq-ans">
                    <ul>
                      <li>
                          We process and ship orders within **24-48 hours**, and you can expect delivery within **3-5 business days** depending on your location.
                      </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--column 2-->
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> Do you offer free shipping?</p>
                    </div>
                    <div class="faq-ans">
                      <ul>
                         <li>
                             Yes! We offer free shipping across chennai zone alone
                         </li>
                     </ul>
                    </div>
                  </div>
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p>Do you offer cash on delivery (COD)?</p>
                    </div>
                    <div class="faq-ans">
                      <ul>
                       <li>
                           No! We dont offer COD.  
                       </li>
                     </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="subscription" role="tabpanel" aria-labelledby="available-tab">
              <div class="row">
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> How does the Subscribe & Save option work?</p>
                    </div>
                    <div class="faq-ans">
                     <ul>
                         <li>
                            **Save 5% on every order** when you are registered customer.
                         </li>
                          <li>
                            Choose how often you want your coffee delivered.
                         </li>
                          <li>
                            Modify or cancel your account anytime—no commitments!
                         </li>
                     </ul>
                    </div>
                  </div>
                  <!--<div class="faq-box mb-3">-->
                  <!--  <div class="faq-qn">-->
                  <!--    <div class="p-3">-->
                  <!--      <i class="fa-solid fa-plus"></i>-->
                  <!--    </div>-->
                  <!--    <p> How should I store my coffee to keep it fresh?</p>-->
                  <!--  </div>-->
                  <!--  <div class="faq-ans">-->
                  <!--  <ul>-->
                  <!--    <li>-->
                  <!--        For maximum freshness, keep your coffee in an **airtight container in a cool, dry place**—away from direct sunlight and moisture-->
                  <!--    </li>-->
                  <!--    </ul>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
                <!--column 2-->
                <div class="col-md-6">
                  <div class="faq-box mb-3">
                    <div class="faq-qn">
                      <div class="p-3">
                        <i class="fa-solid fa-plus"></i>
                      </div>
                      <p> What if I don’t like the coffee?</p>
                    </div>
                    <div class="faq-ans">
                      <ul>
                         <li>
                             We stand by our coffee 100%! If you don’t absolutely love it, we offer a **30-day money-back guarantee**.Just contact us, and we’ll process a full refund—**no questions asked.** 
                         </li>
                     </ul>
                    </div>
                  </div>
                  <!--<div class="faq-box mb-3">-->
                  <!--  <div class="faq-qn">-->
                  <!--    <div class="p-3">-->
                  <!--      <i class="fa-solid fa-plus"></i>-->
                  <!--    </div>-->
                  <!--    <p>Is your coffee organic and ethically sourced?</p>-->
                  <!--  </div>-->
                  <!--  <div class="faq-ans">-->
                  <!--    <ul>-->
                  <!--     <li>-->
                  <!--         Yes! We source **premium, ethically grown coffee beans** to ensure quality and sustainability.-->
                  <!--     </li>-->
                  <!--   </ul>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="p-0 tm-primary-bg">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-md-5">
            <img src="{{ URL::asset('/assets/latest/img/LP_25.png')}}" class="w-100" alt="">
          </div>
          <div class="col-md-7 my-auto p-5">
            <div class="d-grid justify-content-center text-center">
              <h1 class="heading-font fw-bold text-white"> STILL HAVE <br> QUESTIONS? </h1>
              <p style="color: var(--tm-bgprimary); font-weight: 600;"> We’re happy to help! </p>
              <p style="color: var(--tm-bgprimary);">Reach out to our support team via email or WhatsApp, and we’ll assist you right</p>
                <div style="color: var(--tm-bgprimary);margin-top: 10px;font-size: large;">
                    <span style="margin-right: 5px;">+91 90944 42772</span>
                    <span><i class="fa fa-phone"></i></span>               
                     <br> 
                    <span style="margin-right: 5px;">tuljavani@gmail.com</span>
                    <span><i class="fa fa-envelope"></i></span>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-coffee">
          <div class="rs-sec position-absolute w-100 h-100 d-flex justify-content-around z-1 align-items-center">
            <div class="logo-rm">
              <img src="{{ URL::asset('/assets/latest/img/logo.png')}}" alt="">
            </div>
            <div>
              <a href="#" class="cta-button fs-3 hyperlink" style="max-width: min-content; color: var(--tm-primary);">Upgrade Your Coffee Game – Order Bestie Beans Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="p-0 d-none">
      <div class="contianer-fluid p-0">
        <div class="row">
          <div class="col-md-12">
            <img src="{{ URL::asset('/assets/latest/img/Group001563.png')}}" class="w-100" alt="">
          </div>
        </div>
      </div>
    </section>
    <script src="{{ URL::asset('/assets/latest/js/main.js')}}">
    </script>
    <!-- jquery and slick js -->
    <script type="text/javascript" src="{{ URL::asset('/assets/latest/css/slick/jquery-3.7.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/latest/css/slick/jquery-migrate.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('/assets/latest/css/slick/slick.min.js')}}"></script>
    <!-- fontawesom 6 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="{{ URL::asset('/assets/latest/css/bootstrap/bootstrap.bundle.js')}}"></script>
    <script>
        function triggertoTop()
        {
         $('html, body').animate({ scrollTop: 0 }, 500);
        }
        
      $(document).ready(function() {
        $('.testimonial-carousel').slick({
          centerMode: true,
          centerPadding: '60px',
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [{
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          }, {
            breakpoint: 986,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },{
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }]
        });
        $('.banner-slick').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          fade: true,
          dots: false,
          autoplay:false,
          autoplaySpeed:2000,
        });
      })
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".faq-qn").forEach((question) => {
    question.addEventListener("click", function () {
      let answer = this.nextElementSibling;
      let isActive = this.classList.contains("active");

      // Close all FAQs first
      document.querySelectorAll(".faq-qn").forEach((qn) => qn.classList.remove("active"));
      document.querySelectorAll(".faq-ans").forEach((ans) => {
        ans.style.maxHeight = null;
        ans.classList.remove("show");
      });

      // Toggle the clicked FAQ smoothly
      if (!isActive) {
        this.classList.add("active");
        answer.classList.add("show");
        answer.style.maxHeight = answer.scrollHeight + "px"; // Slide Down Effect
      } else {
        this.classList.remove("active");
        answer.style.maxHeight = "0px"; // Slide Up Effect
        setTimeout(() => answer.classList.remove("show"), 300); // Delay removing 'show' for animation
      }
    });
  });
});

const viewcart = '{{route('view.cart')}}';
    const viewCheckout = '{{route('view.deliveryaddress')}}';
    toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }


    //*************************************   Cart *****************************************************************************************************************************
    $(document).ready(function(){
        
         $('.scroll-top-action').on('click',function(t){
            triggertoTop();    
        })
        
        $('.btn-cart1').on('click', function (t) {
            t.preventDefault();
            $.ajax({
                method: "GET",
                url: "{{route('user.add.card')}}",
                data: {
                    quantity: $('#prices1').val(),
                    id: $("#id").val()
                },
                success: function (data) {
                    $('.carcnt').text(data.totalitem);
                    toastr["success"]('Added to Cart');
                    let cartURl = "{{ route('view.cart') }}";
                    // setTimeout(() => {
                        window.location.href = cartURl;
                    // }, 2000);
                },
                error: function (erroe) {

                }
            });
        });
        $('body').on('click','.btn-cart2',function (t) {
            
            t.preventDefault();
            $.ajax({
                method: "GET",
                url: "{{route('user.add.card')}}",
                data: {
                    quantity: $(this).data('q'),
                    id: $(this).data('id')
                },
                success: function (data) {
                    $('.carcnt').text(data.totalitem);
                    toastr["success"]('Added to Cart');
                },
                error: function (erroe) {

                }
            });
        });
        $('body').on('click','.btn-cart3',function (t) {
            
            var q = $(this).parent().find('.quantity').val();
            t.preventDefault();
            $.ajax({
                method: "GET",
                url: "{{route('user.add.card')}}",
                data: {
                    quantity: q,
                    id: $(this).data('id')
                },
                success: function (data) {
                    $('.carcnt').text(data.totalitem);
                    toastr["success"]('Added to Cart');
                },
                error: function (erroe) {

                }
            });
        });

$('body').on('click','.btn.btn-link.btn-close',function(t){

    t.preventDefault();
    $.ajax({
        method: "GET",
        url: "{{route('user.remove.card')}}/"+$(this).data('id'),
        success: function (data) {
            $('.cart-count').text(data.totalitem);
            $('.dropdown-box').load("{{route('user.render.card')}}");
            toastr["success"]('Removed from Cart');
        },
        error: function (erroe) {

        }
    });
});
$('body').on('click','.btn-wishlist',function(e){
    e.preventDefault();
    @if(Auth::check())
            if(!$(this).hasClass("added")){
				$(this).addClass("added");
            $.ajax({
                method:"GET",
                url:'{{route('wishlistAdd')}}',
                data:{id:$(this).data('id')},
                success:function(data){
                    $('.wishlistcnt').text(data)
					toastr["success"]('Added to wishlist');
                 },
                error:function(erroe){ }
            });
            }else{
				$(this).removeClass("added");
                $.ajax({
                    method:"GET",
                    url:'{{route('wishlistremove')}}',
                    data:{id:$(this).data('id')},
                    success:function(data){
                        $('.wishlistcnt').text(data)
                        toastr["error"]('Removed from wishlist');
                    },
                    error:function(erroe){ }
                });
            }
            @else
                window.location.href = "{{route('front.loginBlade')}}";
            @endif
    });
    
    });
</script>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '698472925993707');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=698472925993707&ev=PageView&noscript=1"
/></noscript>
    
  </body>
  <footer>
    <div class="col-md-12 col-sm-12 col-xs-12 nopad footerinner-wraper">
       <div class="container">
          <div class="row footer-top mobrow-0">
             <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row mobileres">
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Policy</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.Privacy_Policy')}}">Privacy Policy</a></li>
                         <li><a href="{{route('front.Shipping_Policy')}}">Shipping Policy</a></li>
                         <li><a href="{{route('front.TermsConditions')}}">Terms & Conditions</a></li>
                         <li><a href="{{route('front.returnandcancle')}}">Returns, Exchange & Cancellation</a></li>
                         <!--<li><a href="{{route('front.CustomsTaxes')}}">Duties, Customs & Taxes</a></li>-->
                         <!--<li><a href="{{route('front.Disclaimer')}}">Disclaimer</a></li>-->
                      </ul>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Company</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.about')}}">About</a></li>
                         <!--<li><a href="{{route('front.Careers')}}">Careers</a></li>-->
                         <!--<li><a href="">Blog</a></li>-->
                         <li><a href="{{route('front.Contact_Us')}}">Contact Us</a></li>
                      </ul>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Others</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.FAQ')}}">FAQ</a></li>
                         <li><a href="{{(Auth::check())?route('view.order'):route('front.loginBlade')}}">Track Order</a></li>
                         <li><a href="{{route('front.Vendor')}}">Become an Vendor</a></li>
                         <li><a target="_blank" href="{{route('admin.login')}}">Vendor Login</a></li>
                      </ul>
                   </div>
                   <!--<div class="col-md-3 col-sm-3 col-xs-12">-->
                   <!--    <div class="footer-title text-uppercase text-white">Social Links</div>-->
                   <!--    <div class="row pad-lft-15">-->
                   <!--        <div class="col-md-12 col-sm-12 col-xs-12 follow-us">-->
                   <!--           <ul class="list-inline social-links">-->
                   <!--              <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>-->
                   <!--              <li><a target="_blank" href="#"><i class="fa fa-youtube"></i></a></li>-->
                   <!--              <li><a target="_blank" href="https://www.instagram.com/tulja_Bhavani_coffee/"><i class="fa fa-instagram"></i></a></li>-->
                   <!--           </ul>-->
                   <!--        </div>-->
                   <!--     </div>-->
                   <!--</div>-->
                </div>
                <!--<div class="row pad-lft-15">-->
                <!--   <div class="col-md-12 col-sm-12 col-xs-12 follow-us">-->
                <!--      <ul class="list-inline social-links">-->
                <!--         <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                <!--      </ul>-->
                <!--   </div>-->
                <!--</div>-->
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-form pad-lft-15">
                <div class="footer-title text-uppercase text-white">Payments</div>
                <div class="footerform-inner">
                   <div class="payment-sprite">
                      <img src="{{URL::asset('assets/media/payment_logo.png')}}" alt="payment" style="max-width: 110px;">
                      <!--<span class="bg-payment1"></span>-->
                      <!--<span class="bg-payment2"></span>-->
                      <!--<span class="bg-payment3"></span>-->
                      <!--<span class="bg-payment4"></span>-->
                      <!--<span class="bg-payment5"></span>-->
                      <!--<span class="bg-payment6"></span>-->
                   </div>
                   <!-- <form id="footerform" method="post">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Email" />
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" placeholder="Message"></textarea>
                      </div>
                      <div>
                          <button type="submit" class="submit-btn">
                              Send Messsage
                          </button>
                      </div>
                      </form> -->
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 nopad copyright">
       <div class="container">
          <!--{{ $StoreConfig->Store_Meta_Title }} © {{ date('Y') }}. All Rights Reserved  |  Designed & Developed By Witglobalsolutions-->
       </div>
    </div>
 </footer>
</html>