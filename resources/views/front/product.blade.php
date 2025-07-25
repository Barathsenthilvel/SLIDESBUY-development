@extends('front.includes.container')
{{-- @section('title',  $product->metaname)
@section('meta_keywords',$product->metakeyword)
@section('meta_description', $product->metadescription) --}}
@section('content')


<style>

.btn-mainsss::before, .btn-mainsss::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: inherit;
    background: var(--main-gradient);
    z-index: -1;
    transition: 0.2s linear;
}

.btn-mainsss {
    background-color: hsl(var(--main)) !important;
    border: transparent !important;
    z-index: 1;
}
    </style>
@php
    $price = $product->getproductPrice();
    $rev = $product->reviewtotal();
    $star = $rev->reviewtotal/20;
@endphp
@if (Auth::check())
@php
	$array = \explode(',',Auth::user()->wishlist);
@endphp
@else
@php
	$array = [];
@endphp
@endif
<style>
    .common-section {
        padding: 70px 0 0 0;
    }

</style>



{{-- breadcumn section start --}}
<section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1">

    <div class="breadcrumb-two">
        <img src="assets/images/gradients/breadcrumb-gradient-bg.png" alt="" class="bg--gradient">
        <div class="container container-two">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-two-content">

                        <ul class="breadcrumb-list flx-align gap-2 mb-2">
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">Home</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <a href="all-product.html" class="breadcrumb-list__link text-body hover-text-main">Products</a>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                            </li>
                            <li class="breadcrumb-list__item font-14 text-body">
                                <span class="breadcrumb-list__text">SaaS</span>
                            </li>
                        </ul>

                        <h3 class="breadcrumb-two-content__title mb-3 text-capitalize">{{ $product->product_title }}SKU : {{$StoreConfig->productIdprefix}}-{{$product->product_sku}}</h3>

                        <div class="breadcrumb-content flx-align gap-3">
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="text">By <a href="#" class="link text-main fw-600">Oviousdev</a> </span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/cart-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/cart-white.svg" alt="" class="dark-version w-20">
                                </span>
                                <span class="text">158 sales</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/check-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/check-icon-white.svg" alt="" class="dark-version">
                                </span>
                                <span class="text">Recently Updated</span>
                            </div>
                            <div class="breadcrumb-content__item text-heading fw-500 flx-align gap-2">
                                <span class="icon">
                                    <img src="assets/images/icons/check-icon.svg" alt="" class="white-version">
                                    <img src="assets/images/icons/check-icon-white.svg" alt="" class="dark-version">
                                </span>
                                <span class="text">Well Documented</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-two">
        <div class="breadcrumb-tab flx-wrap align-items-start gap-lg-4 gap-2">
            <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-product-details-tab" data-bs-toggle="pill" data-bs-target="#pills-product-details" type="button" role="tab" aria-controls="pills-product-details" aria-selected="true">Product Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill" data-bs-target="#pills-rating" type="button" role="tab" aria-controls="pills-rating" aria-selected="false" tabindex="-1">
                    <span class="d-flex align-items-center gap-1">
                        <span class="star-rating">
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                            <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                        </span>
                        <span class="star-rating__text text-body"> 5.0</span>
                        <span class="star-rating__text text-body"> (180)</span>
                    </span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false" tabindex="-1">Comments (50)</button>
                </li>
            </ul>
            <div class="social-share">
                <button type="button" class="social-share__button">
                    <img src="assets/images/icons/share-icon.svg" alt="">
                </button>
                <div class="social-share__icons left">
                    <ul class="social-icon-list colorful-style">
                        <li class="social-icon-list__item">
                            <a href="https://www.facebook.com" class="social-icon-list__link text-body flex-center"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.twitter.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.google.com" class="social-icon-list__link text-body flex-center"> <i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>
{{--  --}}



</section>
<!-- ======================== Breadcrumb Two Section End ===================== -->
<!-- ======================= Product Details Section Start ==================== -->
<div class="product-details mt-32 padding-b-120">
<div class="container container-two">
    <div class="row gy-4">
        {{-- Left: Vertical Thumbnails --}}
        <div class="col-md-2">
            <div class="d-flex flex-column gap-2">
                @foreach([1, 2, 3, 4] as $i)
                    @php
                        $image = 'image' . $i;
                        $imagePath = 'assets/media/products/' . $product->$image;
                    @endphp
                    @if(!empty($product->$image) && file_exists(public_path($imagePath)))
                        <a href="{{ asset($imagePath) }}" data-lightbox="product">
                            <img src="{{ asset($imagePath) }}" class="img-fluid border rounded" alt="thumb-{{ $i }}">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Center: Main Preview Image and Buttons --}}
        <div class="col-md-7">
            @php
                $mainImage = null;
                foreach([1,2,3,4] as $i) {
                    $img = 'image'.$i;
                    $imgPath = 'assets/media/products/'.$product->$img;
                    if (!empty($product->$img) && file_exists(public_path($imgPath))) {
                        $mainImage = asset($imgPath);
                        break;
                    }
                }
            @endphp

            <div class="">
                @if($mainImage)
                    <img src="{{ $mainImage }}" class="img-fluid rounded w-100" alt="Main Image">
                @endif
            </div>

            <div class="product-details__buttons flx-align justify-content-center gap-3">
                <a href="#" class="btn btn-mainsss d-inline-flex align-items-center gap-2 pill px-sm-5 justify-content-center">Live Preview
            <img src="assets/images/icons/eye-outline.svg" alt="">
        </a>
                <a href="#" class="screenshot-btn btn btn-white pill px-sm-5"
                   data-images='[
                       @php $first = true; @endphp
                       @foreach([1,2,3,4] as $i)
                           @php
                               $img = 'image' . $i;
                               $imgPath = 'assets/media/products/' . $product->$img;
                           @endphp
                           @if(!empty($product->$img) && file_exists(public_path($imgPath)))
                               @if(!$first), @endif"{{ asset($imgPath) }}"
                               @php $first = false; @endphp
                           @endif
                       @endforeach
                   ]'>
                   Screenshot
                </a>
            </div>

            <div class="mt-4">
                <p class="text-muted">
                    {{ $product->description ?? 'No description available.' }}
                </p>
            </div>
        </div>

        {{-- Right: Sidebar (Add to Cart, Price, Author Info) --}}
        <div class="col-md-3">
            <div class="product-sidebar section-bg p-3 rounded">
                            <div class="product-sidebar__top position-relative flx-between gap-1">
                        <button type="button" class="btn-has-dropdown font-heading font-18">Regular License</button>
                        <div class="license-dropdown active">
                            <div class="license-dropdown__item cursor-pointer mb-3 pb-3 border-bottom activeSelectItem">
                                <h6 class="license-dropdown__title font-body mb-1 font-16">Regular License</h6>
                                <p class="license-dropdown__desc font-13">Use, by you or one client, in a solitary finished result which end clients are not charged for. The complete cost incorporates the thing cost and a purchaser expense..</p>
                            </div>
                            <div class="license-dropdown__item cursor-pointer">
                                <h6 class="license-dropdown__title font-body mb-1 font-16">Extended License</h6>
                                <p class="license-dropdown__desc font-13">Use, by you or one client, in a solitary final result which end clients can be charged for. The all out cost incorporates the thing cost and a purchaser expense.</p>
                            </div>
                            <div class="mt-3 pt-2 border-top text-center ">
                                <a href="#" class="link hover-text-decoration-underline font-14 text-main fw-500">View License Details</a>
                            </div>
                        </div>
                        <h6 class="product-sidebar__title">$1580.00</h6>
                    </div>

                <ul class="list-unstyled mb-3">
                    <li>✔ Quality verified</li>
                    <li>✔ Use for a single project</li>
                    <li>✔ Non-paying users only</li>
                </ul>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="supportCheck">
                    <label for="supportCheck" class="form-check-label">Extended support 12 month</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <del>$12</del>
                    <strong>$7.25</strong>
                </div>

                <button class="btn btn-main d-flex w-100 justify-content-center align-items-center gap-2 pill px-sm-5 mt-32">Add To Cart</button>
                <div class="author-details">
                        <div class="d-flex align-items-center gap-2">
                            <div class="author-details__thumb flex-shrink-0">
                                <img src="assets/images/thumbs/author-details-img.png" alt="">
                            </div>
                            <div class="author-details__content">
                                <h6 class="author-details__name font-18 mb-2"><a href="profile.html" class="link hover-text-main">Oviousdev</a></h6>

                                <span class="d-flex align-items-center gap-1">
                                    <span class="star-rating">
                                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                                        <span class="star-rating__item font-11"><i class="fas fa-star"></i></span>
                                    </span>
                                    <span class="star-rating__text text-body"> 5.0</span>
                                </span>
                            </div>
                        </div>

                        <ul class="badge-list flx-align gap-2 mt-3">
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge1.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge2.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge3.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge4.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge5.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge6.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge7.png" alt="">
                            </li>
                            <li class="badge-list__item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Badge Info">
                                <img src="assets/images/thumbs/badge8.png" alt="">
                            </li>
                        </ul>
                        <a href="profile.html" class="btn btn-outline-light w-100 pill mt-32">View Portfolio</a>
                    </div>
                    {{-- <div class="d-flex flex-wrap gap-1 mt-2">
                        @for($i = 1; $i <= 8; $i++)
                            <img src="{{ asset('assets/images/thumbs/badge'.$i.'.png') }}" width="30" alt="badge">
                        @endfor
                    </div> --}}

                                    <ul class="meta-attribute">
                                        <li class="meta-attribute__item">
                                            <span class="name">Last Update</span>
                                            <span class="details">Feb 21, 2024</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Published</span>
                                            <span class="details">Feb 15, 2024</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Category</span>
                                            <span class="details">Themes</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Widget Ready</span>
                                            <span class="details">Yes</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">High Resolution</span>
                                            <span class="details">Yes</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Copatible with</span>
                                            <span class="details">
                                                <a href="#" class="hover-text-decoration-underline">Contact Form 7,</a>
                                                <a href="#" class="hover-text-decoration-underline"> Calendar,</a>
                                                <a href="#" class="hover-text-decoration-underline"> Elementor,</a>
                                                <a href="#" class="hover-text-decoration-underline"> Elementor Pro,</a>
                                                <a href="#" class="hover-text-decoration-underline"> WooCommerce 8.x.x</a>
                                            </span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">File size</span>
                                            <span class="details">85 MB</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Framework</span>
                                            <span class="details">Underscores</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Software Version</span>
                                            <span class="details">
                                                <a href="#" class="hover-text-decoration-underline">WordPress 6.3.x,</a>
                                                <a href="#" class="hover-text-decoration-underline">WordPress 6.2.x,</a>
                                                <a href="#" class="hover-text-decoration-underline">WordPress 6.1.x,</a>
                                                <a href="#" class="hover-text-decoration-underline">WordPress 6.0.x,</a>
                                                <a href="#" class="hover-text-decoration-underline">WordPress 5.9.x,</a>
                                            </span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Marketplace Files
                                                Included</span>
                                            <span class="details">
                                                <a href="#" class="hover-text-decoration-underline">PHP Files,</a>
                                                <a href="#" class="hover-text-decoration-underline">CSS Files,</a>
                                                <a href="#" class="hover-text-decoration-underline">SCSS Files,</a>
                                                <a href="#" class="hover-text-decoration-underline">JS Files,</a>
                                            </span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Layout</span>
                                            <span class="details">Responsive</span>
                                        </li>
                                        <li class="meta-attribute__item">
                                            <span class="name">Tags</span>
                                            <span class="details">
                                                <a href="#" class="hover-text-decoration-underline">theme,</a>
                                                <a href="#" class="hover-text-decoration-underline">web design,</a>
                                                <a href="#" class="hover-text-decoration-underline">minimal design,</a>
                                                <a href="#" class="hover-text-decoration-underline">trendy,</a>
                                                <a href="#" class="hover-text-decoration-underline">responsive,</a>
                                                <a href="#" class="hover-text-decoration-underline">wordpress,</a>
                                                <a href="#" class="hover-text-decoration-underline">saas,</a>
                                                <a href="#" class="hover-text-decoration-underline">dashboard,</a>
                                            </span>
                                        </li>
                                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- ======================= Product Sidebar End ========================= -->

<!-- ======================= Product Details Section End ==================== -->













@endsection
@push('script')
<script src="{{URL::asset('assets/front/js/jquery.fancybox.min.js')}}"></script>
<script>
    $(".detcateg").insertAfter(".detsocial");
     $('.quantity').each(function () {
          var spinner = $(this),
              input = spinner.find('input[type="number"]'),
              btnUp = spinner.find('.quantity-up'),
              btnDown = spinner.find('.quantity-down'),
              min = input.attr('min'),
              max = input.attr('max'),
              step = parseFloat(input.attr('step'));
          //	console.log(step);

          btnUp.click(function () {
              //console.log(step);
              var oldValue = parseFloat(input.val());
              if (oldValue >= max) {
                  var newVal = oldValue;
                  toastr["error"](`Only ${newVal} quantity available`);
              } else {
                  var newVal = oldValue + step;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
          });

          btnDown.click(function () {
              //	console.log(step);
              var oldValue = parseFloat(input.val());
              if (oldValue <= min) {
                  var newVal = oldValue;
              } else {
                  var newVal = oldValue - step;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
          });

      });

     /*produtdeatil slider*/
          $(".singleprd-slider").slick({
              infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: true,
              fade: true,
              speed: 300,
              autoplay:false,
              lazyLoad: 'ondemand',
              asNavFor: '.thumbnailprd-slider',
          });
          $(".thumbnailprd-slider").slick({
              slidesToScroll: 1,
              slidesToShow: 6,
              infinite: true,
              arrows: false,
              autoplay: false,
              //dots:true,
              vertical: false,
              verticalSwiping: true,
              //autoplaySpeed: 4000,
              asNavFor: '.singleprd-slider',
              focusOnSelect: true,
              //centerMode: false,
              responsive: [{
                      breakpoint: 1024,
                      settings: {
                          slidesToShow: 6,
                          slidesToScroll: 1
                      }
                  },
                  {
                      breakpoint: 767,
                      settings: {

                          slidesToShow: 4,
                          vertical: false,
                          slidesToScroll: 1
                      }
                  },
                  {
                      breakpoint: 480,
                      settings: {
                          slidesToShow: 3,
                          vertical: false,
                          slidesToScroll: 1
                      }
                  }
              ]
          });
          /**/



   // Remove active class from all thumbnail slides
  $('.thumbnailprd-slider .slick-slide').removeClass('slick-active');
  $('.thumbnailprd-slider .slick-slide').eq(0).addClass('slick-active');
  $('.product_topline .slick-prev').prop('disabled', true);
  $('.singleprd-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
   var mySlideNumber = nextSlide;
  //alert(slick.slideCount);
  if(mySlideNumber==(slick.slideCount-1))
  {
     $('.product_topline .slick-next').prop('disabled', true);
     $('.product_topline .slick-next').fadeOut(100);
  }
  else if(mySlideNumber==0)
  {
   $('.product_topline .slick-prev').prop('disabled', true);
   $('.product_topline .slick-prev').fadeOut(100);
  }
  else
  {
   $('.product_topline .slick-next').prop('disabled', false);
   $('.product_topline .slick-prev').prop('disabled', false);
   $('.product_topline .slick-next').fadeIn(100);
   $('.product_topline .slick-prev').fadeIn(100);
  }

   $('.thumbnailprd-slider .slick-slide').removeClass('slick-active');
   $('.thumbnailprd-slider .slick-slide').eq(mySlideNumber).addClass('slick-active');
});


  if ($(window).width() > 767){
      $('.imgBox').imgZoom({
      boxWidth: 400,
      boxHeight: 400,
      marginLeft: 15,
      });
  }
  //$('.products').fancybox();


  $('.product_pagination li').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
  return false;
  });
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
      /*sticky footer ends*/
  </script>
<script>

$('body .countClick').click(function(e){
e.preventDefault();
    var userid={{(Auth::check())?Auth::id():0}};
    var prodid={{$product->id}};
    $.ajax({
    method:"post",
    url:'{{url('likes')}}',
    data: {
        "_token": "{{ csrf_token() }}",
        userid: userid,
        prodid:prodid
        },
    success:function(data){
        console.log(data.data);
        $('#likeCounts').text(data.data);

            },
    error:function(error){

    }
});
});

    $('body #star_rating i').click(function(e){
		var star = $(this).data('star');
		$('#rating').val(star);
		$('body #star_rating i').each((i,e) =>{
			if(e.dataset.star <= star){
				e.classList.add("fa-star");
				e.classList.remove("fa-star-o");
			}else{
				e.classList.remove("fa-star");
				e.classList.add("fa-star-o");
			}
		})
    });
$('body #reviewSubmit').submit(function(e){
e.preventDefault();
const formData = new FormData(e.target);
formData.set('rating', $("#rating").val());
$.ajax({
    method:"POST",
    url:$(this).prop('action'),
    data:formData,
    cache: false,
    processData: false,
    contentType: false,
    success:function(data){
        $('#tab3').load('{{route('load.review',['id'=>$product->id])}}');
    },
    error:function(erroe){

    }
});
});
$("#seerating").on('click',function() {
    $('html,body').animate({ scrollTop: $("#see").offset().top},'slow');
    $( "#see" ).trigger( "click" );

});


// Set the date we're counting down to

var countDownDate = {{($price->discount)?strtotime("+1 day", strtotime($price->discount->expiry_date))*1000:strtotime("now")}};

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("product-countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("product-countdown").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endpush
