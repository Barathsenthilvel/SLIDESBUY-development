@php
$wishlistcnt = 0;
    if(Auth::check()){
    if(Auth::user()->wishlist) $wishlistcnt = count(\explode(',',Auth::user()->wishlist));
    }

@endphp
<header class="common-header mobile-navbar-fixed-top">
    <nav class="navbar navbar-default">
        <div class="container bg-color">
            <div class="navbar-header">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 pl-0">
                    <a class="navbar-brand" href="{{ route('front.index') }}">
                        <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}" class="img-responsive logo-image" alt="logo">
                    </a>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-2 mt-15 p-35">
                    <div>
                        <a  href="{{(Auth::check()?route('wishlist'):route('front.loginBlade'))}}">
                            <div>
                                <span class="common-count"><i class="fa fa-heart-o f-icon" aria-hidden="true"></i>
                                    <span class="cart-count wishlistcnt">{{$wishlistcnt}}</span>
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu customcart-dropmenu">
                            <li>
                                <div id="wishlist_dropdown"> </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-2 mt-15">
                    <div>
                        <a href="{{route('view.cart')}}">
                            <div>
                                <span class="common-count"><i class="fa fa-cart-plus f-icon" aria-hidden="true"></i>
                                    @if (session()->has('cart'))
                                        <span class="cart-count carcnt">{{session()->get('cart')->totalitem}}</span>
                                    @else
                                        <span class="cart-count carcnt">0</span>
                                    @endif
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu customcart-dropmenu">
                            <li>
                                <div id="dropdownlist"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar one"></span>
                        <span class="icon-bar two"></span>
                        <span class="icon-bar three"></span>
                    </button>
                </div>


            </div>
            <div class="header-right mobile-subheader">
                <div class="topmenu-wraper">
                    <ul class="list-inline pull-right">
                        <li><a href="{{route('front.Contact_Us')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Help and Support</a></li>
                        <li> <a href="{{(Auth::check()?route('order'):route('front.loginBlade'))}}"> <i class="fa fa-map-marker" aria-hidden="true"></i> Track Order</a></li>
                        <li> <a href="{{(Auth::check()?route('front.userprofile'):route('front.loginBlade'))}}"> <i class="fa fa-map-marker" aria-hidden="true"></i>My Account</a></li>
                        
                        {{-- <li> <a onclick="chkmyorderlogin();" href="javascript:void(0);"> <i class="fa fa-map-marker" aria-hidden="true"></i> Repeat Order</a></li> --}}
                        @if(!Auth::check())
                        <li>
                            <a href="{{route('front.loginBlade')}}" ><i aria-hidden="true" class="fa fa-sign-in"></i> Login / Signup</a>
                        </li>
                        @else
                        <li> <a  href="javascript:void(0);">! Hai {{ auth()->user()->name }}</a></li>
                        <li> <a href="{{route('user.logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                        @endif
                    
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-wraper">
            <div class="container nopad">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 min-h">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menugroup-main">
                                @foreach($headMenu as $headmenus)
                                    @foreach($headmenus['menu_name'] as $keys => $menuName)
                                    @if($headmenus['menu_type'][$keys] == 1)
                                        <li class=""><a href="{{route($headmenus['page_link'][$keys])}}">{{$menuName}}</a><span class="xsmenu-trigger"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false"></span></li>
                                    @else
                                    <li class="dropdown"><a href="#" class="dropdown-toggle">{{$menuName}}</a>
                                        <span class="xsmenu-trigger" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"></span>
                                        <ul class="dropdown-menu">
                                            <li class="menu">
                                                @foreach($headmenus['page_link'][$keys] as $cateNames)
                                                    @if(count($cateNames[1]) > 0  && $cateNames[0]->parent_category_id == 0)
                                                    <div>
                                                        <a><span> {{$cateNames[0]->category_name}} </span></a>
                                                        <ul>
                                                            @foreach($cateNames[1] as $subCat)
                                                            <li><a href="{{route('front.getCategory',$subCat->Category_url)}}">{{$subCat->category_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @elseif(count($cateNames[1]) == 0 && $cateNames[0]->parent_category_id==0)
                                                    <div>
                                                        <a href="{{route('front.getCategory',$cateNames[0]->Category_url)}}"><span>{{$cateNames[0]->category_name}}</span></a>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>
<header class="common-header navbar-fixed-top mobile-hide">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar one"></span>
                    <span class="icon-bar two"></span>
                    <span class="icon-bar three"></span>
                </button>
                <a class="navbar-brand" href="{{ route('front.index') }}">
                    <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->logo)}}"
                        class="img-responsive logo-image" alt="logo">
                </a>
            </div>
            <div class="header-right mobile-subheader">
                <div class="topmenu-wraper">
                    <ul class="list-inline pull-right">
                        <li><a href="{{route('front.Contact_Us')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Help and Support</a></li>
                        <li> <a href="{{(Auth::check()?route('order'):route('front.loginBlade'))}}"> <i class="fa fa-map-marker" aria-hidden="true"></i> Track Order</a></li>
                        <li> <a href="{{(Auth::check()?route('front.userprofile'):route('front.loginBlade'))}}"> <i class="fa fa-map-marker" aria-hidden="true"></i> My Account</a></li>
                        {{-- <li> <a onclick="chkmyorderlogin();" href="javascript:void(0);"> <i class="fa fa-map-marker"
                                    aria-hidden="true"></i> Repeat Order</a></li> --}}
                        @if(!Auth::check())
                        <li>
                            <a href="{{route('front.loginBlade')}}" ><i aria-hidden="true" class="fa fa-sign-in"></i> Login / Signup</a>
                        </li>
                        @else
                        <li> <a  href="javascript:void(0);">! Hai {{ auth()->user()->name }}</a></li>
                        <li> <a href="{{route('user.logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-wraper" style="background-color:#fff;">

            <div class="container nopad">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menugroup-main">
                                @foreach($headMenu as $headmenus)
                                    @foreach($headmenus['menu_name'] as $keys => $menuName)
                                    @if($headmenus['menu_type'][$keys] == 1)
                                        <li class=""><a href="{{route($headmenus['page_link'][$keys])}}">{{$menuName}}</a><span class="xsmenu-trigger"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false"></span></li>
                                    @else
                                    <li class="dropdown"><a href="#" class="dropdown-toggle">{{$menuName}} </a>
                                        <span class="xsmenu-trigger" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false"></span>
                                        <ul class="dropdown-menu">
                                            <li class="menu">
                                                
                                                @foreach($headmenus['page_link'][$keys] as $cateNames)
                                                
                                                    @if(count($cateNames[1]) > 0  && $cateNames[0]->parent_category_id == 0)
                                                    <div>
                                                        <a><span> {{$cateNames[0]->category_name}} </span></a>
                                                        <ul>
                                                            @foreach($cateNames[1] as $subCat)
                                                            <li><a href="{{route('front.getCategory',$subCat->Category_url)}}">{{$subCat->category_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @elseif(count($cateNames[1]) == 0 && $cateNames[0]->parent_category_id==0)
                                                    <div>
                                                        <a href="{{route('front.getCategory',$cateNames[0]->Category_url)}}"><span>{{$cateNames[0]->category_name}}</span></a>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <ul class="list-inline text-right whishlist-menu">
                            <li class="text-center">
                                <a data-toggle="tooltip" title="Wishlist"
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
                            </li>
                            <li class="text-center">
                                <a data-toggle="tooltip" title="Cart" href="{{route('view.cart')}}">
                                    <div>
                                        <div class="text-center" style="color:#560835;float:left;margin-top:6px;">Cart
                                        </div>
                                        <span class="cart-icon common-count">
                                            @if (session()->has('cart'))
                                            <span class="cart-count carcnt">{{session()->get('cart')->totalitem}}</span>
                                            @else
                                            <span class="cart-count carcnt">0</span>
                                            @endif
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu customcart-dropmenu">
                                    <li>
                                        <div id="dropdownlist"></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>

</header>
