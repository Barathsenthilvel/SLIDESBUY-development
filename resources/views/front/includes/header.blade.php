<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Slidesbuy</title>
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


.header, .header-menu, .nav-menu, .header-menu .nav-menu {
    overflow: visible !important; /* ensure dropdowns are not clipped */
}

.nav-submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #ffffff;
    z-index: 2000;
    min-width: 200px;
    padding: 8px 0;
    border-radius: 12px;
    box-shadow: 0 12px 32px rgba(0,0,0,0.12);
    /* show full list without internal scrollbar */
    max-height: none;
    overflow: visible;
    white-space: nowrap;         /* keep items in one line */
}

/* User profile dropdown behavior */
.user-profile { position: relative; }
.user-profile-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    min-width: 220px;
    background: #fff;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    border-radius: 8px;
    padding: 8px 0;
    z-index: 1000;
}
.user-profile:hover .user-profile-dropdown { display: block; }
.user-profile-dropdown.open { display: block; }

/* Ensure dropdown shows on both hover and click */
.user-profile:hover .user-profile-dropdown,
.user-profile-dropdown.open {
    display: block !important;
}
.user-profile-dropdown .sidebar-list__item a { display: flex; align-items: center; gap: 10px; padding: 10px 14px; }
.user-profile-dropdown .sidebar-list__item a:hover { background: #f5f7fb; }

.nav-menu__item:hover > .nav-submenu,
.nav-submenu__item:hover > .nav-submenu {
    display: block;
}

/* Nested submenu position (flyout to the right) */
.nav-submenu .nav-submenu {
    top: 0;
    left: 100%;
}

/* Submenu items UI */
.nav-submenu__item { list-style: none; }
.nav-submenu__link {
    display: block;
    padding: 10px 18px;
    color: #0f172a; /* slate-900 */
    text-decoration: none;
    font-weight: 600;
}
.nav-submenu__link:hover {
    background: #f5f7fb;
    color: #6a42f1; /* theme purple */
}

/* Ensure mobile user dropdown is visible and not clipped */
@media (max-width: 991.98px) {
    .mobile-menu, .mobile-menu__inner { overflow: visible !important; }
    .mobile-menu .user-profile { position: relative; }
    .mobile-menu .user-profile-dropdown {
        position: absolute;      /* avoid layout shift */
        top: calc(100% + 8px);   /* sit just below the button */
        right: auto;
        left: 2px;              /* align to left side of button */
        display: none;           /* controlled via .open */
        min-width: 220px;
        z-index: 9999;           /* above panel content */
    }
    .mobile-menu .user-profile-dropdown.open { display: block; }
}

/* Active page styling with » arrow */
.nav-submenu__item.activePage > .nav-submenu__link {
    color: #6a42f1;
    position: relative;
}
.nav-submenu__item.activePage > .nav-submenu__link::before {
    content: "\00BB"; /* » */
    margin-right: 8px;
    color: #6a42f1;
}

/* Ensure header sits above page content */
.header {

    position: relative;
    /* z-index: 1500;currentyle hide for modbile menu tetsig this css */
 }

/* Add mega menu styles */
.mega-parent { position: static; }
.mega-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    padding: 24px;
    background: #ffffff;
    z-index: 2100;
    box-shadow: 0 12px 32px rgba(0,0,0,0.12);
    border-radius: 12px;
}
.mega-columns { display: grid; grid-template-columns: repeat(4, minmax(180px, 1fr)); gap: 16px; }
.mega-col .mega-title { display:block; font-weight: 700; padding: 8px 0; color: #0f172a; text-decoration: none; }
.mega-col .mega-list { list-style: none; padding: 0; margin: 0; }
.mega-col .mega-list li a { display:block; padding: 6px 0; color:#334155; text-decoration:none; }
.mega-col .mega-list li a:hover { color:#6a42f1; }

/* Show on hover */
.nav-menu__item.mega-parent:hover > .mega-menu { display: block; }

/* Keep classic submenu behavior for non-mega items */

</style>
<body>
@php
$wishlistcnt = 0;
if(auth()->check()){
    $wishlistcnt = auth()->user()->wishlists()->count();
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
<div class="mobile-menu d-lg-none d-block change-gradient">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a  href="{{ route('front.index') }}" class="mobile-menu__logo">
            {{-- <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="white-version"> --}}
            {{-- <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"alt="Logo" class="dark-version"> --}}

            <img src="{{ asset('assets/images/logo/newslides.png') }}"alt=""  class="white-version">
            <img src="{{ asset('assets/images/logo/newslides.png') }}"alt=""  class="dark-version">



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
                                    <a href="{{ route('front.getCategory', $cateNames[0]->Category_url) }}" class="nav-submenu__link">{{ $cateNames[0]->category_name }}</a>
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
                @if(!auth()->check())
                    <a href="{{ route('front.loginBlade') }}" class="btn btn-main pill">
                        <span class="icon-left icon">
                        <img src="{{ asset('assets/images/icons/user.svg') }}" alt="">
                        </span>Create Account
                    </a>
                    <a href="{{ route('login.form') }}" class="btn btn-outline-main pill">
                        <span class="icon-left icon">
                        <img src="{{ asset('assets/images/icons/user.svg') }}" alt="">
                        </span>Login
                    </a>
                @else
                    <div class="user-profile">
                        <button class="user-profile__button flex-align">
                            <span class="user-profile__thumb">
                                <img src="{{ asset('assets/images/icons/new-avatar.svg') }}"  class="cover-img" alt="">
                            </span>
                        </button>
                        <ul class="user-profile-dropdown">
                            <li class="sidebar-list__item">
                                <a href="{{ route('account.profile') }}" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon2.svg') }}" alt="" class="icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon-active2.svg') }}" alt="" class="icon icon-active">
                                    </span>
                                    <span class="text">My Account</span>
                                </a>
                            </li>
{{--
                            <li class="sidebar-list__item">
                                <a href="{{ route('account.profile') }}#profile" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon10.svg') }}" alt="" class="icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon-active10.svg') }}" alt="" class="icon icon-active">
                                    </span>
                                    <span class="text">Settings</span>
                                </a>
                            </li> --}}
                            <li class="sidebar-list__item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="sidebar-list__link">
                                    <span class="sidebar-list__icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon13.svg') }}" alt="" class="icon">
                                        <img src="{{ asset('assets/images/icons/sidebar-icon-active13.svg') }}" alt="" class="icon icon-active">
                                    </span>
                                    <span class="text">Logout</span>
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->

<!-- <main> -->
 <main class="change-gradient">
    <!-- ============================ Sale Offer Start =========================== -->
{{-- <div class="sale-offer ">
    <div class="container container-full ">
        <div class="sale-offer__content flx-between position-relative">

            <div class="sale-offer__discount flx-align gap-2">
                <span class="sale-offer__text text-heading text-capitalize">Enjoy Premium Plans at </span>
                <a href="{{ route('login.form') }}" class="btn btn-sm btn-white pill fw-500">Signup</a>
                <strong class="sale-offer__qty text-heading font-heading">~50% OFF</strong>

            </div>
            <div class="sale-offer__button">
                <button type="submit" class="sale-offer__close text-heading"><i class="las la-times"></i></button>
            </div>
        </div>
    </div>
</div> --}}

<div class="sale-offer ">
    <div class="container container-full ">
        <div class="sale-offer__content flx-center position-relative">

            <div class="sale-offer__discount flx-align gap-2">
                <span class="sale-offer__text text-heading text-capitalize">Enjoy Premium Plans at </span>
                <a href="{{ route('login.form') }}" class="btn btn-sm  fw-500 btn btn-main pill">Signup</a>
                <strong class="sale-offer__qty text-heading font-heading">~50% OFF</strong>

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
                      <img src="{{ asset('assets/images/logo/newslides.png') }}"alt=""  class="white-version">
                   {{-- <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt="" class="dark-version"> --}}
                </a>
                <a href="index.html" class="link dark-version">
                    {{-- <img src="assets/images/logo/slidesbuy.png" alt="Logo"> --}}
                      {{-- <img src="{{ asset('assets/images/logo/slidesbuy.png') }}"alt=""  class="white-version"> --}}
                <img src="{{ asset('assets/images/logo/newslides.png') }}"alt="" class="dark-version">
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
                <li class="nav-menu__item mega-parent">
                    <a href="javascript:void(0)" class="nav-menu__link">{{ $menuName }}</a>
                    <div class="mega-menu">
                        <div class="mega-columns">
                            @foreach($headmenus['page_link'][$keys] as $cateNames)
                                @if($cateNames[0]->parent_category_id == 0)
                                    <div class="mega-col">
                                        <a href="{{ route('front.getCategory', $cateNames[0]->Category_url) }}" class="mega-title">{{ $cateNames[0]->category_name }}</a>
                                        @if(count($cateNames[1]) > 0)
                                            <ul class="mega-list">
                                                @foreach($cateNames[1] as $subCat)
                                                    <li>
                                                        <a href="{{ route('front.getCategory', $subCat->Category_url) }}">{{ $subCat->category_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
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
    @if(auth()->check())
    <a href="{{ route('wishlist') }}" class="header-right__button wishlist-btn position-relative">
        <img src="{{ asset('assets/images/icons/heart.svg') }}" alt="" class="white-version">
        <img src="{{ asset('assets/images/icons/heart-white.svg') }}" alt="" class="dark-version">
        <span class="qty-badge font-12 wishlist-count">{{ $wishlistcnt }}</span>
    </a>
    @else
    <a href="{{ route('login.form') }}" class="header-right__button wishlist-btn position-relative">
        <img src="{{ asset('assets/images/icons/heart.svg') }}" alt="" class="white-version">
        <img src="{{ asset('assets/icons/heart-white.svg') }}" alt="" class="dark-version">
        <span class="qty-badge font-12">0</span>
    </a>
    @endif

     <!-- Light Dark Mode -->
 <div class="theme-switch-wrapper position-relative d-none">
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
          @if(!auth()->check())
            <li>
                    <a href="{{route('login.form')}}" class="btn btn-main pill">
                    <span class="icon-left icon">
                        <img src="../assets/images/icons/user.svg" alt="">
                    </span>Login / Signup
                    </a>
            </li>
          @else
           <div class="user-profile" id="desktopUserProfile">
            <button class="user-profile__button flex-align" id="desktopUserButton" type="button">
                <span class="user-profile__thumb">
                    <img src="{{ asset('assets/images/icons/user.png') }}" class="cover-img" alt="">
                </span>
            </button>
            <ul class="user-profile-dropdown" id="desktopUserDropdown">
                <li class="sidebar-list__item">
                    <a class="dropdown-item" href="{{ route('account.profile') }}">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon2.svg') }}" alt="" class="icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon-active2.svg') }}" alt="" class="icon icon-active">
                        </span>
                        <span class="text">My Account</span>
                    </a>
                </li>
                <li class="sidebar-list__item">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                        <span class="sidebar-list__icon">
                            <img src="{{ asset('assets/images/icons/sidebar-icon13.svg') }}" alt="" class="icon">
                        </span>
                        <span class="text">Log Out</span>
                    </a>
                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                </li>
            </ul>
        </div>
            @endif

             <li class="text-center">
                                <!-- <a data-toggle="tooltip" title="Wishlist"
                                    href="">
                                    <div>
                                        <div class="text-center" style="color:#560835;float:left;margin-top:2px;">
                                            Wishlist
                                        </div>
                                        <span class="wishlist-icon common-count">
                                            {{-- <span class="cart-count wishlistcnt">{{$wishlistcnt}}</span> --}}
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


<script>
// Toggle user dropdown on click (desktop)
document.addEventListener('DOMContentLoaded', function(){
  const btn = document.getElementById('desktopUserButton');
  const dd = document.getElementById('desktopUserDropdown');
  if (btn && dd) {
    btn.addEventListener('click', function(e){
      e.stopPropagation();
      dd.classList.toggle('open');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e){
      if (!btn.contains(e.target) && !dd.contains(e.target)) {
        dd.classList.remove('open');
      }
    });
  }

  // Ensure My Account dropdown works on mobile (hamburger menu)
  document.addEventListener('click', function(e){
    const profileBtnMobile = e.target.closest('.mobile-menu .user-profile__button');
    const anyMobileDropdown = document.querySelectorAll('.mobile-menu .user-profile-dropdown');

    if (profileBtnMobile) {
      e.stopPropagation();
      const container = profileBtnMobile.closest('.user-profile');
      const dropdown = container ? container.querySelector('.user-profile-dropdown') : null;
      if (dropdown) {
        anyMobileDropdown.forEach(function(d){ if (d !== dropdown) d.classList.remove('open'); });
        dropdown.classList.toggle('open');
      }
      return;
    }

    // Prevent closing when clicking inside dropdown
    if (e.target.closest('.mobile-menu .user-profile-dropdown')) {
      return;
    }

    // Close if clicked outside
    anyMobileDropdown.forEach(function(d){ d.classList.remove('open'); });
  });

  // Add hover support for desktop user profile
  const desktopProfile = document.querySelector('#desktopUserProfile');
  if (desktopProfile) {
    const desktopDropdown = desktopProfile.querySelector('.user-profile-dropdown');

    desktopProfile.addEventListener('mouseenter', function(){
      if (desktopDropdown) {
        desktopDropdown.classList.add('open');
      }
    });

    desktopProfile.addEventListener('mouseleave', function(){
      if (desktopDropdown) {
        desktopDropdown.classList.remove('open');
      }
    });
  }
});
</script>

