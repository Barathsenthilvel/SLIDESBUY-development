<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> Digital Market Place HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon-two.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- line awesome -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>
<style>
    .nav-menu__item {
    position: relative;
}

.nav-submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    z-index: 999;
    min-width: 200px;
    padding: 10px 0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

.nav-menu__item:hover > .nav-submenu,
.nav-submenu__item:hover > .nav-submenu {
    display: block;
}
    </style>
<body>
@php
$wishlistcnt = 0;
    if(Auth::check()){
    if(Auth::user()->wishlist) $wishlistcnt = count(\explode(',',Auth::user()->wishlist));
    }

@endphp
<!--==================== Preloader Start ====================-->
 <div class="loader-mask">
  <div class="loader">
      <div></div>
      <div></div>
  </div>
</div>
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="overlay"></div>
<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- ==================== Scroll to Top End Here ==================== -->

<!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a  href="{{ route('front.index') }}" class="mobile-menu__logo">
            <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="white-version">
            <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="dark-version">



            {{-- <img src="assets/images/logo/logo.png" alt="Logo" class="white-version">
            <img src="assets/images/logo/white-logo-two.png" alt="Logo" class="dark-version"> --}}
        </a>
        <div class="mobile-menu__menu">

<ul class="nav-menu flx-align nav-menu--mobile">
    <li class="nav-menu__item has-submenu">
        <a href="javascript:void(0)" class="nav-menu__link">Home</a>
        <ul class="nav-submenu">
            <li class="nav-submenu__item">
                <a href="index.html" class="nav-submenu__link"> Home One</a>
            </li>
            <li class="nav-submenu__item">
                <a href="index-two.html" class="nav-submenu__link"> Home Two</a>
            </li>
            <li class="nav-submenu__item">
                <a href="index-three.html" class="nav-submenu__link"> Home Three</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item has-submenu">
        <a href="javascript:void(0)" class="nav-menu__link">Products</a>
         <ul class="nav-submenu">
            <li class="nav-submenu__item">
                <a href="all-product.html" class="nav-submenu__link"> All Products</a>
            </li>
            <li class="nav-submenu__item">
                <a href="product-details.html" class="nav-submenu__link"> Product Details</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item has-submenu">
        <a href="javascript:void(0)" class="nav-menu__link">Pages</a>
         <ul class="nav-submenu">
            <li class="nav-submenu__item">
                <a href="profile.html" class="nav-submenu__link"> Profile</a>
            </li>
            <li class="nav-submenu__item">
                <a href="cart.html" class="nav-submenu__link"> Shopping Cart</a>
            </li>
            <li class="nav-submenu__item">
                <a href="cart-personal.html" class="nav-submenu__link"> Mailing Address</a>
            </li>
            <li class="nav-submenu__item">
                <a href="cart-payment.html" class="nav-submenu__link"> Payment Method</a>
            </li>
            <li class="nav-submenu__item">
                <a href="cart-thank-you.html" class="nav-submenu__link"> Preview Order</a>
            </li>
            <li class="nav-submenu__item">
                <a href="dashboard.html" class="nav-submenu__link"> Dashboard</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item has-submenu">
        <a href="javascript:void(0)" class="nav-menu__link">Blog</a>
         <ul class="nav-submenu">
            <li class="nav-submenu__item">
                <a href="blog.html" class="nav-submenu__link"> Blog</a>
            </li>
            <li class="nav-submenu__item">
                <a href="blog-details.html" class="nav-submenu__link"> Blog Details</a>
            </li>
            <li class="nav-submenu__item">
                <a href="blog-details-sidebar.html" class="nav-submenu__link"> Blog Details Sidebar</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item">
        <a href="contact.html" class="nav-menu__link">Contact</a>
    </li>
</ul>
            <div class="header-right__inner d-lg-none my-3 gap-1 d-flex flx-align">

    <a href="register.html" class="btn btn-main pill">
        <span class="icon-left icon">
            <img src="assets/images/icons/user.svg" alt="">
        </span>Create Account
    </a>
    <div class="language-select flx-align select-has-icon">
        <img src="assets/images/icons/globe.svg" alt="" class="globe-icon white-version">
        <img src="assets/images/icons/globe-white.svg" alt="" class="globe-icon dark-version">
        <select class="select py-0 ps-2 border-0 fw-500">
            <option value="1">Eng</option>
            <option value="2">Bn</option>
            <option value="3">Eur</option>
            <option value="4">Urd</option>
        </select>
    </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->

<main class="change-gradient">
    <!-- ============================ Sale Offer Start =========================== -->
<div class="sale-offer ">
    <div class="container container-full ">
        <div class="sale-offer__content flx-between position-relative">
            <div class="sale-offer__countdown">

                <div class="countdown" data-date="14-10-2026" data-time="12:00">
                    <div class="day"><span class="num"></span><span class="word"></span></div>
                    <div class="hour"><span class="num"></span><span class="word"></span></div>
                    <div class="min"><span class="num"></span><span class="word"></span></div>
                    <div class="sec"><span class="num"></span><span class="word"></span></div>
                </div>

            </div>
            <div class="sale-offer__discount flx-align gap-2">
                <span class="sale-offer__text text-heading text-capitalize">New Year Flash Sale Offer</span>
                <strong class="sale-offer__qty text-heading font-heading">45% OFF</strong>
                <a href="#" class="btn btn-sm btn-white pill fw-500">Shop Now</a>
            </div>
            <div class="sale-offer__button">
                <button type="submit" class="sale-offer__close text-heading"><i class="las la-times"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Sale Offer End =========================== -->
    <!-- ==================== Header Start Here ==================== -->
<header class="header">
    <div class="container container-full">
        <nav class="header-inner flx-between">
            <!-- Logo Start -->
            <div class="logo">
                <a href="index.html" class="link white-version">
                    <img src="assets/images/logo/slidesbuy.png" alt="Logo">
                </a>
                <a href="index.html" class="link dark-version">
                    <img src="assets/images/logo/slidesbuy.png" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">

<ul class="nav-menu flx-align">
    @foreach($headMenu as $headmenus)
        @foreach($headmenus['menu_name'] as $keys => $menuName)
            @if($headmenus['menu_type'][$keys] == 1)
                <li class="nav-menu__item">
                    <a href="{{ route($headmenus['page_link'][$keys]) }}" class="nav-menu__link">{{ $menuName }}</a>
                </li>
            @else
                <li class="nav-menu__item has-submenu">
                    <a href="javascript:void(0)" class="nav-menu__link">{{ $menuName }}</a>
                    <ul class="nav-submenu">
                        @foreach($headmenus['page_link'][$keys] as $cateNames)
                            @if(count($cateNames[1]) > 0 && $cateNames[0]->parent_category_id == 0)
                                <li class="nav-submenu__item has-submenu">
                                    <a href="javascript:void(0)" class="nav-submenu__link">{{ $cateNames[0]->category_name }}</a>
                                    <ul class="nav-submenu">
                                        @foreach($cateNames[1] as $subCat)
                                            <li class="nav-submenu__item">
                                                <a href="{{ route('front.getCategory', $subCat->Category_url) }}" class="nav-submenu__link">{{ $subCat->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @elseif(count($cateNames[1]) == 0 && $cateNames[0]->parent_category_id == 0)
                                <li class="nav-submenu__item">
                                    <a href="{{ route('front.getCategory', $cateNames[0]->Category_url) }}" class="nav-submenu__link">{{ $cateNames[0]->category_name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    @endforeach

    <!-- {{-- <li class="nav-menu__item">
        <a href="{{ route('front.contact') }}" class="nav-menu__link">Contact</a>
    </li> --}} -->
</ul>
       </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            <div class="header-right flx-align">
    <a href="cart.html" class="header-right__button cart-btn position-relative">
        <img src="assets/images/icons/cart.svg" alt="" class="white-version">
        <img src="assets/images/icons/cart-white.svg" alt="" class="dark-version">
        <span class="qty-badge font-12">0</span>
    </a>

     <!-- Light Dark Mode -->
 <div class="theme-switch-wrapper position-relative">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" class="d-none" id="checkbox">
        <span class="slider text-black header-right__button white-version">
            <img src="assets/images/icons/sun.svg" alt="">
        </span>
        <span class="slider text-black header-right__button dark-version">
            <img src="assets/images/icons/moon.svg" alt="">
        </span>
    </label>
</div>

    <div class="header-right__inner gap-3 flx-align d-lg-flex d-none">
         <ul class="">
          @if(!Auth::check())
            <li>
                    <a href="{{route('front.loginBlade')}}" class="btn btn-main pill">
                    <span class="icon-left icon">
                        <img src="assets/images/icons/user.svg" alt="">
                    </span>Login / Signup
                    </a>
            </li>
          @else
            <li> <a  href="javascript:void(0);">! Hai {{ auth()->user()->name }}</a></li>
            <li> <a href="{{route('user.logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
            @endif

             <li class="text-center">
                                <!-- <a data-toggle="tooltip" title="Wishlist"
                                    href="{{(Auth::check()?route('wishlist'):route('front.loginBlade'))}}">
                                    <div>
                                        <div class="text-center" style="color:#560835;float:left;margin-top:2px;">
                                            Wishlist
                                        </div>
                                        <span class="wishlist-icon common-count">
                                            <span class="cart-count wishlistcnt">{{$wishlistcnt}}</span>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu customcart-dropmenu">
                                    <li>
                                        <div id="wishlist_dropdown"> </div>
                                    </li>
                                </ul>
                            </li> -->
        </ul>
     
    <div class="language-select flx-align select-has-icon">
        <img src="assets/images/icons/globe.svg" alt="" class="globe-icon white-version">
        <img src="assets/images/icons/globe-white.svg" alt="" class="globe-icon dark-version">
        <select class="select py-0 ps-2 border-0 fw-500">
            <option value="1">Eng</option>
            <option value="2">Bn</option>
            <option value="3">Eur</option>
            <option value="4">Urd</option>
        </select>
    </div>
    </div>
    <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
</div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->
    <!--========================== Banner Section Start ==========================-->
<section class="hero section-bg z-index-1">
    <img src="assets/images/gradients/banner-gradient.png" alt="" class="bg--gradient white-version">

    <img src="assets/images/shapes/element-moon1.png" alt="" class="element one">
    <img src="assets/images/shapes/element-moon2.png" alt="" class="element two">

    <div class="container container-two">
        <div class="row align-items-center gy-sm-5 gy-4">
            <div class="col-lg-6">
                <div class="hero-inner position-relative pe-lg-5">
                    <div>
                        <h1 class="hero-inner__title">2M+ curated digital products</h1>
                        <p class="hero-inner__desc font-18">Explore the best premium themes and plugins available for sale. Our unique collection is hand-curated by experts. Find and buy the perfect premium theme  today.</p>

                        <div class="position-relative">
                            <div class="search-box">
                                <input type="text" class="common-input common-input--lg pill shadow-sm auto-suggestion-input" placeholder="Search theme, plugins & more...">
                                <button type="submit" class="btn btn-main btn-icon icon border-0"><img src="assets/images/icons/search.svg" alt=""></button>
                            </div>

                            <ul class="auto-suggestion-list">
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Business in HTML</a>
                                </li>
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Business in WordPress</a>
                                </li>
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Business in CMS</a>
                                </li>
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Ecommerce in HTML</a>
                                </li>
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Ecommerce in WordPress</a>
                                </li>
                                <li>
                                    <a href="#" class="auto-suggestion-list__item w-100 text-body">Ecommerce in CMS</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Tech List Start -->
                        <div class="product-category-list">
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="WordPress">
                                <img src="assets/images/thumbs/tech-icon1.png" alt="" class="white-version">
                                <img src="assets/images/thumbs/tech-icon-white1.png" alt="" class="dark-version">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Laravel">
                                <img src="assets/images/thumbs/tech-icon2.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PHP">
                                <img src="assets/images/thumbs/tech-icon3.png" alt="" class="white-version">
                                <img src="assets/images/thumbs/tech-icon-white3.png" alt="" class="dark-version">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="HTML">
                                <img src="assets/images/thumbs/tech-icon4.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sketch">
                                <img src="assets/images/thumbs/tech-icon5.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Figma">
                                <img src="assets/images/thumbs/tech-icon6.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bootstrap">
                                <img src="assets/images/thumbs/tech-icon7.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tailwind">
                                <img src="assets/images/thumbs/tech-icon8.png" alt="">
                            </a>
                            <a href="all-product.html" class="product-category-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="React">
                                <img src="assets/images/thumbs/tech-icon9.png" alt="">
                            </a>
                        </div>
                        <!-- Tech List End -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-thumb">
                    <img src="assets/images/thumbs/banner-img.png" alt="">
                    <img src="assets/images/shapes/dots.png" alt="" class="dotted-img white-version">
                    <img src="assets/images/shapes/dots-white.png" alt="" class="dotted-img dark-version">
                    <img src="assets/images/shapes/element2.png" alt="" class="element two end-0">

                    <div class="statistics animation bg-main text-center">
                        <h5 class="statistics__amount text-white">50k</h5>
                        <span class="statistics__text text-white font-14">Customers</span>
                    </div>

                    <div class="statistics style-two bg-white text-center">
                        <h5 class="statistics__amount statistics__amount-two text-heading">22k</h5>
                        <span class="statistics__text text-heading font-14">Themes & Plugins</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== Banner Section End ==========================-->

      