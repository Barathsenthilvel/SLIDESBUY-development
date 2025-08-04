<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> Digital Market Place HTML Template</title>
    <!-- Favicon -->
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon-two.png') }}">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- Fontawesome -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
<!-- Slick -->
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
<!-- Magnific popup -->
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
<!-- Line awesome -->
<link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
<!-- Main css -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

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
            {{-- <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="white-version"> --}}
            {{-- <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="dark-version"> --}}

            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="white-version">
            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="dark-version">



            {{-- <img src="assets/images/logo/logo.png" alt="Logo" class="white-version">
            <img src="assets/images/logo/white-logo-two.png" alt="Logo" class="dark-version"> --}}
        </a>
        <div class="mobile-menu__menu">

<ul class="nav-menu flx-align nav-menu--mobile">
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
</ul>
            <div class="header-right__inner d-lg-none my-3 gap-1 d-flex flx-align">

    <a href="register.html" class="btn btn-main pill">
        <span class="icon-left icon">
        <img src="{{ asset('assets/images/icons/user.svg') }}" alt="">
        </span>Create Account
    </a>
    <div class="language-select flx-align select-has-icon">
       <div class="user-profile">
            <button class="user-profile__button flex-align">
                <span class="user-profile__thumb">
                    <img src="{{ asset('assets/images/icons/Avatar18.svg') }}"  class="cover-img" alt="">
                </span>
            </button>
            <ul class="user-profile-dropdown show">
                <li class="sidebar-list__item">
                    <a href="dashboard-profile.html" class="sidebar-list__link">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon2.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active2.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">Profile</span>
                    </a>
                </li>

                <li class="sidebar-list__item">
                    <a href="setting.html" class="sidebar-list__link">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon10.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active10.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <li class="sidebar-list__item">
                    <a href="login.html" class="sidebar-list__link">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon13.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active13.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
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
                    {{-- <img src="assets/images/logo/slidesbuy.png" alt="Logo"> --}}
                      <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="white-version">
                   {{-- <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt="" class="dark-version"> --}}
                </a>
                <a href="index.html" class="link dark-version">
                    {{-- <img src="assets/images/logo/slidesbuy.png" alt="Logo"> --}}
                      {{-- <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="white-version"> --}}
                <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt="" class="dark-version">
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
        <img src={{ asset('assets/images/icons/cart.svg') }} alt="" class="white-version">
        <img src={{ asset('assets/images/icons/cart-white.svg') }} alt="" class="dark-version">
        <span class="qty-badge font-12">0</span>
    </a>

     <!-- Light Dark Mode -->
 <div class="theme-switch-wrapper position-relative">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" class="d-none" id="checkbox">
        <span class="slider text-black header-right__button white-version">
            <img src={{ asset('assets/images/icons/sun.svg ') }}alt="">
        </span>
        <span class="slider text-black header-right__button dark-version">
            <img src={{ asset('assets/images/icons/moon.svg') }} alt="">
        </span>
    </label>
</div>

    <div class="header-right__inner gap-3 flx-align d-lg-flex d-none">
         <ul class="">
                {{-- <a href="{{route('front.loginBlade')}}" class="btn btn-main pill">
                    <span class="icon-left icon">
                        <img src="{{ asset('assets/images/icons/user.svg') }}" alt="">
                    </span>Login / Signup
                    </a> --}}
          @if(!Auth::check())
            <li>
                    <a href="{{route('front.loginBlade')}}" class="btn btn-main pill">
                    <span class="icon-left icon">
                        <img src="assets/images/icons/user.svg" alt="">
                    </span>Login / Signup
                    </a>
            </li>
          @else
           <div class="user-profile">
            <button class="user-profile__button flex-align">
                <span class="user-profile__thumb">
                    <img src="{{ asset('assets/images/icons/Avatar18.svg') }}" class="cover-img" alt="">
                </span>
            </button>
            <ul class="user-profile-dropdown show">
                <li class="sidebar-list__item">
                    <a class="dropdown-item" href="{{ route('account.profile') }}">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon2.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active2.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
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
{{-- @auth
    <div class="flx-align select-has-icon">
        <div class="user-profile">
            <button class="user-profile__button flex-align">
                <span class="user-profile__thumb">
                    <img src="{{ asset('assets/images/icons/Avatar18.svg') }}" class="cover-img" alt="">
                </span>
            </button>
            <ul class="user-profile-dropdown show">
                <li class="sidebar-list__item">
                    <a class="dropdown-item" href="{{ route('account.profile') }}">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon2.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active2.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}
    {{-- @endauth --}}
    </div>
    <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
</div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->


