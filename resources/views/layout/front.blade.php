<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sri Kolhapuri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==== favicon css ====-->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">


    <!-- vendor css files -->

    <!--==== bootstrap css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!--==== fontawesome css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">

    <!--==== flaticon css ====-->
    <link rel="stylesheet" href="{{asset('assets/font/flaticon.css')}}">

    <!--==== select css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

    <!--==== menu css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">

    <!--==== animate css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">

    <!--==== slider css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">

    <!--==== venobox css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/venobox.css')}}">

    <!--==== scroll animation css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <!--==== range slider css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">

    <!--==== style css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!--==== responsive css ====-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <style>
        .table-bordered p {
            line-break: anywhere;
        }
    </style>
</head>

<body>
    <!-- start preloader area -->

    <!-- end preloader area -->

    <!-- start top to button -->
    <div class="top-to">
        <button class="top-to-btn">
            <i class="fas fa-long-arrow-alt-up"></i>
        </button>
        <p>back to top</p>
    </div>
    <!-- end top to button -->

    <!-- start header area -->
    <header>

        <!-- start top-bar area -->



        <!-- start menu area -->
              <section class="home4 mid-menu menubar position-relative">
            <div class="container">
                <div class="border-area">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                            <div class="logo">
                                <a href="{{route('front.index')}}">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-4 col-6">
                            <nav class="navbar p-0 position-static desktop-menu">
                                <div class="main-menu">
                                    <ul class="menu">
                                        <li>
                                            <a href="{{route('front.index')}}">home</a>
                                      
                                        </li>
                             
                                        <li><a href="contact.html">contact</a></li>
                                    
                                         <li><a href="#!">Categories</a>
                                            <ul class="submenu-list">
                                                @foreach($Category as $Category)

                                                <li><a href="{{route('front.getCategory',[$Category->id])}}">{{$Category->category_name}}</a>
                                                <ul>
                                                @foreach($Category->subs as $subCategory)
                                               
                                                <li><a href="{{route('front.getCategory',[$Category->id,$subCategory->id])}}">{{$subCategory->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
    
                            <nav class="navbar p-0 mobile-menu position-static">
                                <div class="header-menu position-static">
                                    <ul class="menu">
                                        <li class="active">
                                            <a href="#!">home</a>
                                   
                                        </li>
                                        <li><a href="about.html">about</a></li>

                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="#!">Categories</a>
                                            <ul class="submenu-list">
                                                @foreach($fronCategory as $Category)
                                                <li><a href="about.html">{{$Category->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="section search" style="margin-left: -58%;">
                            <form action="#!">
                                <input type="search" placeholder="search here..." class="inputs" style="border-radius: 16px;width:100%;">
                                <button type="submit" style="margin-left: -12%;margin-bottom: -2%;"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="notification">
                                <ul class="d-flex justify-content-end">
                                    @guest
                                    <li>
                                        <a href="{{route('user.login')}}">
                                            <i class="flaticon-user-1"></i>
                                        </a>
                                    </li>
                                    @endguest
                                    @auth
                                    <li>
                                        <a href="{{route('user.logout')}}">
                                            <i class="fas fa-power-off"></i>
                                        </a>
                                    </li>
                                    @endauth
                                    <li>
                                        <a href="wishlist.html">
                                            <i class="flaticon-heart" ></i>
                                            <span class="quantity">01</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="flaticon-shopping-cart"></i>
                                                <span class="quantity">02</span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <div id="cart_render">
                                                    @include('front.includes.cart_render')
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
        <!-- end menu area -->
    </header>
    <!-- end header area -->

    <!-- start fancybox area -->

    <!-- end fancybox area -->

     @yield('content')

    <!-- start footer area -->
    @include('front.includes.footer')
    <!-- end footer area -->

    <!-- start modal area -->
   
    <!-- end modal area -->

    <!-- vendor js files -->

    <!--==== jquery min js ====-->
    <script src="{{asset('assets/plugins/jquery-3.5.1.min.js')}}"></script>

    <!--==== bootstrap min js ====-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--==== select js ====-->
    <script src="{{asset('assets/plugins/select2.min.js')}}"></script>

    <!--==== menu js ====-->
    <script src="{{asset('assets/plugins/menu.min.js')}}"></script>

    <!--==== slider js ====-->
    <script src="{{asset('assets/plugins/slick.min.js')}}"></script>

    <!--==== parallax js ====-->
    <script src="{{asset('assets/plugins/parallax.js')}}"></script>

    <!--==== countdown js ====-->
    <script src="{{asset('assets/plugins/jquery.countdown.min.js')}}"></script>

    <!--==== venobox js ====-->
    <script src="{{asset('assets/plugins/venobox.min.js')}}"></script>

    <!--==== scroll animation js ====-->
    <script src="{{asset('assets/plugins/aos.js')}}"></script>

    <!--==== jquery ui js ====-->
    <script src="{{asset('assets/plugins/jquery-ui.min.js')}}"></script>

    <!--==== elevate zoom js ====-->
    <script src="{{asset('assets/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script>

    <!--==== packary js ====-->
    <script src="{{asset('assets/plugins/packery.pkgd.min.js')}}"></script>

    <!--=== Google map ===-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0"></script>

    <!--==== script js ====-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        $('body').on('click','.add-cart.button-style1',function(e) {
            e.preventDefault();
            var url = '{{ route('user.add.card',)}}/'+$(this).data('id');
            $.ajax({
                type: "GET",
                url: url,
                success:function(data){ 
                    $('#cart_render').load('{{route('user.render.card')}}');
                }
            });
        });
        $('body').on('click','.cart.button-style1',function(e) {
            e.preventDefault();
            var quantity = $(this).parent()[0].childNodes[1].childNodes[1].value;
            var url = '{{ route('user.add.card',)}}/'+$(this).data('id');
            $.ajax({
                type: "GET",
                url: url,
                data:{quantity:quantity},
                success:function(data){ 
                    $('#cart_render').load('{{route('user.render.card')}}');
                }
            });
        });
        $('body').on('click','.icon.remove',function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url:'{{ route('user.remove.card',)}}/'+$(this).data('id'),
                success:function(data){ 
                    $('#cart_render').load('{{route('user.render.card')}}');
                }
            });
        });
    </script>
    @stack('script')
</body>



</html>