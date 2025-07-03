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

<section class="icons-section common-section">
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
</section>
<section class="about-section common-section" id="about-section">
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
</section>

<section class="featured-section light-bg common-section" id="gallery">
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
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-1.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="gallery">
                            <a class="group1 fancybox" data-fancybox="gallery-images"
                                href="#" data-title="Coffe Love">
                                <img class="hvr-grow img-responsive" src="{{URL::asset('/assets/front/static/images/gallery/web-image-2.jpg')}}">
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
</section>



<section class="video-main-wrapper padding-150"
    style="background:url({{URL::asset('/assets/front/static/images/bg/sliderbg-2.jpg')}}) no-repeat center bottom; background-size:cover;">
    <div class="container">
        <div class="wrapper text-center">
            <a data-fancybox href="{{URL::asset('/assets/front/static/images/video/video.mp4')}}" class="video-btn">
                <i class="fa fa-play-circle"></i>
            </a>
        </div>
    </div>
</section>


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
</section>

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
                            <div class="testimonial-name">Nandakumar Thiyari</div>
                            <!-- <div class="testimonial-desig">Co-Founder. DKK Media</div> -->
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
                            "I really like the taste of the coffee.my family gives first preference to it.Very
                            professional and genuine people to trust."
                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">Rahul Vinod, Sai Varun Silks</div>
                            <div class="testimonial-desig">Kanchipuram</div>
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
                            "Wow..what a Taste! Beats the home-made version. Way to go, TB!!"
                        </div>
                        <div class="testimonial-namewraper">
                            <div class="testimonial-name">PB Ramachandran</div>
                            <!-- <div class="testimonial-desig">Director. Silkastic</div> -->
                        </div>
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
    </div>
</section>
@endsection
@push('script')

@endpush
