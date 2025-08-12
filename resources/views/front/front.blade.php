@extends('front.includes.container')
@section('content')
{{-- @php
   dd($StoreConfig->currencysymbol())
@endphp --}}
@if (Auth::check())
	@php
		$array = \explode(',',Auth::user()->wishlist);
	@endphp
@else
    @php
        $array = [];
    @endphp
@endif

@if(count($frontBanner) > 0)
    @include('front.includes.banner')
@endif

@if(count($Homecat)>0)
    @include('front.includes.category',['category'=>$Homecat])
@endif
@if(count($Homecat2)>0)
    @include('front.includes.category',['category'=>$Homecat2])
@endif
@if(count($Homecat3)>0)
    @include('front.includes.category',['category'=>$Homecat3])
@endif

@if(count($discount)>0)
    @foreach($discount as $discounts)
        @include('front.includes.discount')
    @endforeach
@endif

@if(count($homeProduct)>0)
    @foreach($homeProduct as $discounts)
        @include('front.includes.product')
    @endforeach
@endif

<style>
   .trending-tags{
   border-radius: 50px;
    border: 1px solid hsl(var(--border-color));
    outline: 1px solid transparent;
    text-align: center;
    padding: 8px;
     transition: all 0.3s ease;
   }
     .login-btn {
        background: linear-gradient(90deg, #e648f3, #4d3eff);

        border: none;
    }

    .trending-tags:hover {
        background: linear-gradient(90deg, #9b21cf, #2d1fdd);
        color: #fff !important;
    }

    </style>

<!-- <section class="icons-section common-section">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 nopad icons-wraper commontab-wraper">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 icon-single">
                    <a href="#" class="icon-inner">
                        <div class="icon-img">
                            <span><img src="{{URL::asset('/assets/front/static/images/icons/i3.png')}}"
                                    class="img-responsive center-block mobile-img-wt" alt="slider2"></span>

                        </div>
                        <div class="icon-name">
                            <span>Best Quality</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 icon-single">
                    <a href="#" class="icon-inner">
                        <div class="icon-img">
                            <span><img src="{{URL::asset('/assets/front/static/images/icons/i2.png')}}"
                                    class="img-responsive center-block mobile-img-wt" alt="slider2"></span>
                        </div>
                        <div class="icon-name">
                            <span>Finest Taste</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 icon-single">
                    <a href="#" class="icon-inner">
                        <div class="icon-img">
                            <span><img src="{{URL::asset('/assets/front/static/images/icons/i4.png')}}"
                                    class="img-responsive center-block mobile-img-wt" alt="slider2"></span>
                        </div>
                        <div class="icon-name">
                            <span>Best Price</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6 icon-single">
                    <a href="#" class="icon-inner">
                        <div class="icon-img">
                            <span><img src="{{URL::asset('/assets/front/static/images/icons/i1.png')}}"
                                    class="img-responsive center-block mobile-img-wt" alt="slider2"></span>
                        </div>
                        <div class="icon-name">
                            <span>Shipping Across India</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </div>
</section> -->
<!-- <section class="about-section common-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 aboutinner-right">
                <div>
                    <img src="{{URL::asset('/assets/front/static/images/about.jpg')}}" class="img-responsive center-block pull-right"
                        alt="wit global solutions">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 aboutinner-left">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 section-title mobile-section">About Tulja Bhavani
                    </div>
                </div>
                <div class="content-para aboutcontent-wraper wow fadeInUp">
                    <p>
                        Tulja Bhavani is a Traditional Coffee manufacturing Company delivering the authentic taste
                        of Coffee. Our 30 years experienced SMEs are specialist in creating a delicious cup of
                        coffee to all customers. Tulja Bhavani sources Arabica beans after selecting them carefully
                        from partner plantations and growers in the specialized regions, roasted to perfection. Our
                        experts touch on providing the unique taste to every cup of coffee.
                    </p>
                    <p>The freshly packed coffee distributed through a good logistics system to reach our customers
                        fast. Tulja Bhavani Coffee is now available across Tamilnadu, India. We have a presence in a
                        significant number of cafes, family owned retail chains, Super markets, individual roasters
                        and stores.</p>
                    <div class="row" style="text-align: left;margin-top: 5px;margin-left: 0%;">
                        <a class="readmore-btn" href="{{ route('front.about') }}" style="color:#fff">
                            <span class="readmore-inner">
                                <span>Read More</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="featured-section light-bg common-section" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center text-uppercase section-title middle-liner">
                <span>Gallery</span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopad featuredslider-wraper">
                <div class="row ">
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                {{-- <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-1.jpg')}}"> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                {{-- <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-2.jpg')}}"> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-3.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-4.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery fancybox">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-5.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-6.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-7.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-8.jpg')}}">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopad btmcontainer text-center">
                <a class="readmore-btn" href="https://www.instagram.com/tulja_bestie_beans/" target="_blank">
                    <span class="readmore-inner">
                        <span>Follow us on Instagram</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section> -->



<!-- <section class="video-main-wrapper padding-150"
    style="background:url({{URL::asset('/assets/front/static/images/bg/sliderbg-2.jpg')}}) no-repeat center bottom; background-size:cover;">
    <div class="container">
        <div class="wrapper text-center">
            <a data-fancybox href="{{URL::asset('/assets/front/static/images/video/video.mp4')}}" class="video-btn">
                <i class="fa fa-play-circle"></i>
            </a>
        </div>
    </div>
</section> -->

<!--
<section class="clients-section common-section" id="clients-section">
    <div class="container">

        <div class="col-md-12 col-sm-12 col-xs-12 text-center text-uppercase section-title">
            <div><span>Our Clients</span></div>
            <div class="col-md-12 col-sm-12 col-xs-12 sectiontitle-bottom text-center">WIN - WIN : We partner with
                our clients for their success</div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 commonslider-wraper">
            <div class="client-slider1 product-slider">
                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/1.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>

                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/client-2.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>
                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/client-3.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>
                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/client-4.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>

                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/client-5.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>
                <div class="client-single">
                    <div class="client-logo">
                        <img src="{{URL::asset('/assets/front/static/images/clients/client-3.jpg')}}" class="img-responsive center-block"
                            alt="Tulja Bhavani">
                    </div>
                </div>



            </div>
        </div>
    </div>
</section> -->
<!--
<section class="testimonial-section  common-section text-white" id="testimonial-section">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12 section-title text-uppercase text-center">
            <div>Customer Testimonials</div>
            <div class="col-md-12 col-sm-12 col-xs-12 sectiontitle-bottom text-center">Our customers are our
                Teachers</div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 testimonial-wraper ">
            <div class="testimonial-slider">
                <div class="testimonial-single">
                    <div class="testimonialsingle-inner">
                        <div class="testimonial-icon">
                            <img src="static/images/icons/appos.png" class="img-responsive"
                                alt="wit global solutions">
                        </div>
                        <div class="testimonial-content">
                            "Authentic and very refreshing filter coffee. Hailing from orthodox family, a good
                            coffee is an integral part of everyday and Tulja Bhavani coffee exceeds all
                            expectations. காபின்னா துல்ஜா பவானி காபி தான்... பேஷ் பேஷ் ரொம்ப நன்னா இருக்கு "
                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">Varadhan</div>
                            <div class="testimonial-desig">Veerapuram</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonialsingle-inner">
                        <div class="testimonial-icon">
                            <img src="static/images/icons/appos.png" class="img-responsive"
                                alt="wit global solutions">
                        </div>
                        <div class="testimonial-content">
                            "I got a chance to taste Tulja Bhavani Coffee along with my family we all liked it"

                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">Nandakumar Thiyari</div> -->
                            <!-- <div class="testimonial-desig">Co-Founder. DKK Media</div> -->
                        <!-- </div>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonialsingle-inner">
                        <div class="testimonial-icon">
                            <img src="static/images/icons/appos.png" class="img-responsive"
                                alt="wit global solutions">
                        </div>
                        <div class="testimonial-content">
                            "I really like the taste of the coffee.my family gives first preference to it.Very
                            professional and genuine people to trust."
                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">Rahul Vinod, Sai Varun Silks</div>
                            <div class="testimonial-desig">Kanchipuram</div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="testimonial-single">
                    <div class="testimonialsingle-inner">
                        <div class="testimonial-icon">
                            <img src="static/images/icons/appos.png" class="img-responsive"
                                alt="wit global solutions">
                        </div>
                        <div class="testimonial-content">
                            "Wow..what a Taste! Beats the home-made version. Way to go, TB!!"
                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">PB Ramachandran</div> -->
                            <!-- <div class="testimonial-desig">Director. Silkastic</div> -->
                        <!-- </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="mapcontact-section" id="contact-section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footercontact-left">
                <div class="section-title mobile-footer-contact text-uppercase wow fadeInUp"
                    data-wow-duration="0.5s" data-wow-delay="0.2s">Contact US</div>
                <div class="contactlist-single mobile-single wow fadeInUp" data-wow-duration="0.7s"
                    data-wow-delay="0.7s">
                    <span>+91 90944 42772</span>
                    <span><i class="fa fa-phone"></i></span>
                </div>
                <div class="contactlist-single mobile-single  wow fadeInUp" data-wow-duration="0.7s"
                    data-wow-delay="0.9s">
                    <span>tuljavani@gmail.com</span>
                    <span><i class="fa fa-envelope"></i></span>
                </div>
                <div class="follow-us">
                    <div class="smallbold-title wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">Follow
                        us</div>
                    <ul class="list-inline social-links">
                        <li class="">
                            <a href="https://www.instagram.com/tulja_bestie_beans/" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                        </li>
                        <li class="">
                            <a href="https://www.facebook.com/Tulja.Bhavani.Agencies/" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                        </li>
                        <li class="">
                            <a href="https://www.youtube.com/@Tulja-BestieBeans" target="_blank"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li class="">
                            <a href="https://www.linkedin.com/in/bestie-beans-716250223" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad footercontact-right">
                <div class="mapcontainer" style="overflow:hidden;">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8027252.374111525!2d76.03515118384877!3d10.768598173502047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52673060489c07%3A0xacf7bcdb1bbce28b!2sTulja%20Bhavani%20Agencies!5e0!3m2!1sen!2sin!4v1608030969964!5m2!1sen!2sin"
                        width="100%" height="350" frameborder="0" style="border:0;margin-bottom: -10px;"
                        allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
    </div>WIN - WIN : We partner with our clients for their success

</section> -->




<!-- ======================= Trending tag start ======================= -->
<section class="bg-light py-5">
  <div class="container">
    <h4 class="fw-bold display-5 mb-4">Trending  Tags</h4>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">

      <!-- Tag Item Start -->
      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Playbook</div>
          <!-- <div class="text-muted small">33 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Travel</div>
          <!-- <div class="text-muted small">462 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Animal</div>
          <!-- <div class="text-muted small">1264 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Art</div>
          <!-- <div class="text-muted small">882 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Health</div>
          <!-- <div class="text-muted small">3863 templates</div> -->
        </a>
      </div>

      <!-- Add more tag items below as needed -->
      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Background</div>
          <!-- <div class="text-muted small">10496 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Research</div>
          <!-- <div class="text-muted small">1686 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Culture</div>
          <!-- <div class="text-muted small">2157 templates</div> -->
        </a>
      </div>

      <div class="col">
        <a href="#" class="d-block text-decoration-none text-dark trending-tags">
          <div class="">Worksheet</div>
          <!-- <div class="text-muted small">344 templates</div> -->
        </a>
      </div>

      <!-- ... Add more here ... -->
    </div>
  </div>
</section>
<!-- ======================= Trending tag end ======================= -->

    <!-- ======================= To Featured Author Start =============================== -->
<section class="top-author padding-y-120 section-bg position-relative z-index-1">
    <img src="../assets/images/gradients/featured-gradient.png" alt="" class="bg--gradient white-version">
    <img src="../assets/images/shapes/spider-net.png" alt="" class="spider-net position-absolute top-0 start-0 z-index--1 white-version">
    <img src="../assets/images/shapes/spider-net-white2.png" alt="" class="spider-net position-absolute top-0 start-0 z-index--1 dark-version">
    <img src="../assets/images/shapes/pattern-curve-three.png" alt="" class="position-absolute top-0 end-0 z-index--1">

    <img src="../assets/images/shapes/element1.png" alt="" class="element two">

    <div class="container container-two">
        <div class="row gy-4 align-items-center">
            <div class="col-xl-5">
                <div class="section-content">
                    <div class="section-heading style-left">
                        <h3 class="section-heading__title">Top Featured Author</h3>
                        <p class="section-heading__desc font-18 w-sm">Every month we pick some best products for you. This month's best web themes & templates have arrived, chosen by our content specialists.</p>
                    </div>
                    <div class="author-info d-flex align-items-center gap-3">
                        <div class="author-info__thumb">
                            <img src="assets/images/thumbs/author-img.png" alt="">
                        </div>
                        <div class="author-info__content">
                            <h4 class="author-info__name mb-1">Amplify</h4>
                            <span class="author-info__text">Member Since 2021</span>
                        </div>
                    </div>
                    <div class="flx-align gap-2 mt-48">
                        <a href="profile.html" class="btn btn-main btn-lg pill fw-300"> View Profile </a>
                        <button type="button" class="follow-btn btn btn-outline-light btn-lg pill">Follow</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="circle-content position-relative">
                    <div class="circle static-circle">
                        <div class="circle__badge">
                            <img src="../assets/images/icons/featured-badge.png" alt="">
                        </div>
                        <div class="circle__text">
                            <p>
                                DPmarketer Top Featured Author
                            </p>
                        </div>
                    </div>
                    <div class="row gy-4 card-wrapper">
                        <div class="col-sm-6">
                              <div class="product-item box-shadow">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="../assets/images/thumbs/product-img9.png" alt="" class="cover-img">
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$120</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$259</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">1200 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
</div>
                        </div>
                        <div class="col-sm-6">
                              <div class="product-item box-shadow">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="assets/images/thumbs/product-img10.png" alt="" class="cover-img">
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$129</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$236</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">100 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="product-item box-shadow">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="assets/images/thumbs/product-img11.png" alt="" class="cover-img">
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$79</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$99</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">900 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
</div>
                        </div>
                        <div class="col-sm-6">
                             <div class="product-item box-shadow">
    <div class="product-item__thumb d-flex">
        <a href="product-details.html" class="link w-100">
            <img src="assets/images/thumbs/product-img4.png" alt="" class="cover-img">
        </a>
        <button type="button" class="product-item__wishlist"><i class="fas fa-heart"></i></button>
    </div>
    <div class="product-item__content">
        <h6 class="product-item__title">
            <a href="product-details.html" class="link">SaaS dashboard digital products Title here</a>
        </h6>
        <div class="product-item__info flx-between gap-2">
            <span class="product-item__author">
                by
                <a href="profile.html" class="link hover-text-decoration-underline"> themepix</a>
            </span>
            <div class="flx-align gap-2">
                <h6 class="product-item__price mb-0">$59</h6>
                <span class="product-item__prevPrice text-decoration-line-through">$129</span>
            </div>
        </div>
        <div class="product-item__bottom flx-between gap-2">
            <div>
                <span class="product-item__sales font-14 mb-2">1225 Sales</span>
                <div class="d-flex align-items-center gap-1">
                    <ul class="star-rating">
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                        <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                    </ul>
                    <span class="star-rating__text text-heading fw-500 font-14"> (16)</span>
                </div>
            </div>
            <a href="product-details.html" class="btn btn-outline-light btn-sm pill">Live Demo</a>
        </div>
    </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= To Featured Author End =============================== -->


<!-- ======================= Testimonial Section Start ============================ -->
<section class="testimonial padding-y-120 position-relative section-bg overflow-hidden">

    <img src="assets/images/shapes/brush.png" alt="" class="element-brush">

    <div class="container container-two">
        <div class="section-heading style-left style-flex flx-between align-items-end gap-3">
            <div class="section-heading__inner w-lg">
                <h3 class="section-heading__title">Clients Feedback</h3>
            </div>
            <a href="#" class="btn btn-main btn-lg pill">More Feedback</a>
        </div>
        <div class="testimonial-slider">
            <div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Great quality products - Flags, programs for exceptional capacities, birthday, and occasion welcome are largely still mainstream on paper.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/client1.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Michel John</h5>
            <span class="client-info__designation text-heading fw-500">Market Expert</span>
        </div>
    </div>
</div>
            <div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Great quality products - Flags, programs for exceptional capacities, birthday, and occasion welcome are largely still mainstream on paper.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/client2.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Ralph Edwards</h5>
            <span class="client-info__designation text-heading fw-500">Analytis</span>
        </div>
    </div>
</div>
            <div class="testimonial-item hover-bg-main">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg white-version">
    <img src="assets/images/gradients/testimonial-bg.png" alt="" class="hover-bg dark-version">
    <div class="testimonial-item__rating mb-3">
        <ul class="star-rating">
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
            <li class="star-rating__item"><i class="fas fa-star"></i></li>
        </ul>
    </div>
    <p class="testimonial-item__desc">“Great quality products - Flags, programs for exceptional capacities, birthday, and occasion welcome are largely still mainstream on paper.”</p>
    <div class="testimonial-item__quote">
        <img src="assets/images/icons/quote.svg" alt="" class="quote quote-white">
        <img src="assets/images/icons/quote-dark.svg" alt="" class="quote quote-dark">
    </div>
    <div class="client-info d-flex align-items-center gap-3">
        <div class="client-info__thumb">
            <img src="assets/images/thumbs/client3.png" alt="">
        </div>
        <div class="client-info__content">
            <h5 class="client-info__name mb-2">Jacob Jones</h5>
            <span class="client-info__designation text-heading fw-500">Market Expert</span>
        </div>
    </div>
</div>
        </div>
    </div>
</section>
<!-- ======================= Testimonial Section End ============================ -->


<!-- ====================== Newsletter Section Start ===================== -->
<section class="newsletter position-relative z-index-1 overflow-hidden">
    <img src="assets/images/gradients/newsletter-gradient-bg.png" alt="" class="bg--gradient">

    <img src="assets/images/shapes/element1.png" alt="" class="element two">
    <img src="assets/images/shapes/element2.png" alt="" class="element one">

    <img src="assets/images/shapes/line-vector-one.png" alt="" class="line-vector one">
    <img src="assets/images/shapes/line-vector-two.png" alt="" class="line-vector two">

    <img src="assets/images/thumbs/newsletter-man.png" alt="" class="newsletter-man">

    <div class="container container-two">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="newsletter-content">
                    <h3 class="newsletter-content__title text-white mb-2 text-center">Get update Newsletter</h3>
                    <p class="newsletter-content__desc pb-2 text-white text-center font-18 fw-300">Subscribe our newsletter to get the latest news</p>

                    <form action="#" class="mt-4 newsletter-box position-relative">
                        <input type="text" class="form-control common-input common-input--lg pill text-white" placeholder="Enter Mail">
                        <button type="submit" class="btn btn-main btn-lg pill flx-align gap-1">Subscribe <span class="text d-sm-flex d-none">Now</span> </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====================== Newsletter Section End ===================== -->

@endsection
@push('script')

@endpush
