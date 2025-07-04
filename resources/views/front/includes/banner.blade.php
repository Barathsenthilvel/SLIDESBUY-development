<section class="homeslider-section">
    <div class="homeslider-inner home">
        @foreach($frontBanner as $front)
        {{-- @dd($front); --}}
       <div class="homeslider one">
          <img src="{{asset('/assets/media/banner/'.$front->web_image)}}" class="img-responsive" alt="{{$front->web_image}}">
       </div>
       @endforeach
    </div>
    <div class="downarrow-wraper text-center">
        <a href="#products"><i class="fa fa-angle-down"></i></a>
    </div>
</section>
{{--
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
        <a href="index.html" class="mobile-menu__logo">
            <img src="assets/images/logo/logo.png" alt="Logo" class="white-version">
            <img src="assets/images/logo/white-logo-two.png" alt="Logo" class="dark-version">
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
                    <img src="assets/images/logo/logo-two.png" alt="Logo">
                </a>
                <a href="index.html" class="link dark-version">
                    <img src="assets/images/logo/white-logo.png" alt="Logo">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">

<ul class="nav-menu flx-align ">
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
    <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>
</div>
            <!-- Header Right End  -->
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== --> --}}
