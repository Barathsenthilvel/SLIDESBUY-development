<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>{{$StoreConfig->Store_Meta_Title}}</title>
        <meta name="description" content="{{ $StoreConfig->Store_Meta_Description }}" />
        <meta name="keywords" content="{{ $StoreConfig->Store_Meta_Keywords }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{ url('/') }}/">
        <link href="{{URL::asset('assets/media/banner/'.$StoreConfig->fav_icon)}}" rel="icon">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

     <!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon-two.png') }}">

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- Fontawesome -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
<!-- Slick -->
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
<!-- Line Awesome -->
<link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

<!-- Wishlist Styles -->
<style>
.wishlist-btn {
    transition: all 0.3s ease !important;
    border: 2px solid #e1e5e9 !important;
    background: white !important;
    color: #666 !important;
    border-radius: 50% !important;
    width: 40px !important;
    height: 40px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    position: relative !important;
}

.wishlist-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
}

.wishlist-btn.active {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%) !important;
    border-color: #ff6b6b !important;
    color: white !important;
}

.wishlist-btn.active i {
    color: white !important;
}

.wishlist-btn:not(.active) i {
    color: #666 !important;
}

.wishlist-btn.active:hover {
    background: linear-gradient(135deg, #ff5252 0%, #d32f2f 100%) !important;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4) !important;
}

.wishlist-btn:not(.active):hover {
    border-color: #ff6b6b !important;
    color: #ff6b6b !important;
}

.wishlist-btn:not(.active):hover i {
    color: #ff6b6b !important;
}

/* Wishlist count badge */
.wishlist-count {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%) !important;
    color: white !important;
    border-radius: 50% !important;
    min-width: 20px !important;
    height: 20px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 12px !important;
    font-weight: 600 !important;
    position: absolute !important;
    top: -8px !important;
    right: -8px !important;
}

/* Product item wishlist button */
.product-item__wishlist {
    position: absolute !important;
    top: 15px !important;
    right: 15px !important;
    z-index: 10 !important;
}
</style>

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/boostrap.bundle.min.js') }}"></script>
<!-- Countdown -->
<script src="{{ asset('assets/js/countdown.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('assets/js/counterup.min.js') }}"></script>
<!-- Slick JS -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ asset('assets/js/apexchart.js') }}"></script>
<!-- Marquee -->
<script src="{{ asset('assets/js/marquee.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>





{{--
      <link href="{{URL::asset('assets/front/static/css/jquery-ui.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/price_range_style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/owl.theme.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/bootstrap.min.css')}}" rel="stylesheet" media='screen,print'>
        <link href="{{URL::asset('assets/front/static/css/OverlayScrollbars.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/select2.min.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/front/static/css/slick.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/front/static/css/slick-theme.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/front/index.html')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/style.css')}}" rel="stylesheet" media='screen,print'>
        <link href="{{URL::asset('assets/front/static/css/responsive.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/sweetalert.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/jquery.fancybox.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/bootoast.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/front/static/css/toastr.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}

       <!-- start script-->
       {{-- <script>
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
        /></noscript> --}}

           <!--end script-->


<script async src="https://www.googletagmanager.com/gtag/js?id=G-NB533LB60J"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-NB533LB60J'); </script>
        <script>
            const firebaseConfig = {
            //   apiKey: "AIzaSyD9LNiyoP1HzDSZtaI1xEZg8iqWd0zgyzs",
            //   authDomain: "otparun-c5a3e.firebaseapp.com",
            //   databaseURL: "https://otparun-c5a3e-default-rtdb.firebaseio.com",
            //   projectId: "otparun-c5a3e",
            //   storageBucket: "otparun-c5a3e.appspot.com",
            //   messagingSenderId: "989404442406",
            //   appId: "1:989404442406:web:f9b9e670fe921b28429be7",
            //   measurementId: "G-DN1BVLF8NJ"

              apiKey: "AIzaSyCMrEwG66K3djlhw1Uk4WGqnxi7Rj0SURg",
              authDomain: "tuljamart.firebaseapp.com",
              projectId: "tuljamart",
              storageBucket: "tuljamart.firebasestorage.app",
              messagingSenderId: "30177802948",
              appId: "1:30177802948:web:61b711af0e0c7c9850e791",
              measurementId: "G-CJC7ZLD3DB"
            };
        </script>
        {{-- <style>
        .prdname{
            min-height : unset;
        }
            .p-e-none{
                pointer-events: none;
            }
            .pagination>.active>span {
                background-color: #652120;
                border-color: #652120;
            }
            .pagination>li>a{
                color: #652120
            }
            .pagination{
                position: absolute;
                bottom: -70px;
                left: auto;
            }
            .added{
                border: 1px solid #652120;
            }
            .Cat_name{
                position: absolute;
                z-index: 12;
                top: 43%;
                /* left: 43%; */
                color: white;
                font-size: 20px;
                width: -webkit-fill-available;
                display: flex;
                justify-content: center;
                background: #00000073;
            }
            @media only screen and (max-width: 425px) {
                .pagination{
                    position: unset;
                }
            }
            .login-navbar li.active{
                border-bottom: 2px solid #e7b360;
                transition: all 0.5s ease;
            }
            li.active a{
                color: #331110;
            }
            @media only screen and (max-width: 766px){
                .dropdown-menu{
                    min-width: 320px;
                    min-height:50px
                }
                .dropdown-menu>li{
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                }
                .dropdown-menu>li>div{
                    flex: 0 0 50%;
                    text-align: center;

                }
                .dropdown-menu>li>div>a{
                    font-weight: 600;
                    color: black
                }
            }
            @media only screen and (min-width: 767px){
                .dropdown-menu{
                    min-width: 767px;
                    min-height:50px
                }
                .nav>li{
                    position: unset;
                }
                .dropdown-menu>li{
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                }
                .dropdown-menu>li>div{
                    flex: 0 0 33.333333%;
                    text-align: center;

                }
                .dropdown-menu>li>div>a{
                    font-weight: 600;
                    color: black
                }
            }
            .menu ul,
            .menu>div>ul>li>a{
                list-style: none;
                color: black
            }
            .menu>div>ul{
                padding: 0
            }
            .menu>div>ul>li{
                margin: 12px;
            }
        </style> --}}
     </head>
<body>
        @include('front.includes.header')
        <!-- End of Geader -->
        @yield('content')
        <!-- Start of Footer -->
        @include('front.includes.footer')
        <!-- End of Footer -->
        <!-- Login and register Modal -->
      <!--mobile sticky footer-->



{{--
        <script>
           $(document).ready(function(){


          /*mobile category slider*/
              $(".thumbnailcat-slider").slick({
                  infinite: false,
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  arrows: false,
                  speed: 300,
                  autoplay:false,
              }); --}}
          {{-- /*mobile category slide ends*/ --}}

          {{-- });
        </script> --}}
    {{-- <script>
           $(window).scroll(function () {
        if ($('div.navbar-fixed-top').hasClass("shrink")) {
            $('.invert').show();
            $('.Normal').hide();
        } else {
            $('.invert').hide();
            $('.Normal').show();
        }
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
{{-- Wishlist functionality now handled by main.js --}}

    {{-- function myfunction(search,textsearch){
    window.location.href=search+'?search='+textsearch;
    } --}}
    @if($errors->any())
        @foreach ($errors->all() as $ERR)
            toastr["error"]('{{$ERR}}');
        @endforeach
    @endif
    </script>
    @stack('script')

    {{-- Wishlist functionality is now handled by main.js --}}
</body>

</html>
