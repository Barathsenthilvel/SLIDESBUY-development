<footer>
    <div class="col-md-12 col-sm-12 col-xs-12 nopad footerinner-wraper">
       <div class="container">
          <div class="row footer-top mobrow-0">
             <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row mobileres">
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Policy</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.Privacy_Policy')}}">Privacy Policy</a></li>
                         <li><a href="{{route('front.Shipping_Policy')}}">Shipping Policy</a></li>
                         <li><a href="{{route('front.TermsConditions')}}">Terms & Conditions</a></li>
                         <li><a href="{{route('front.returnandcancle')}}">Returns, Exchange & Cancellation</a></li>
                         <!--<li><a href="{{route('front.CustomsTaxes')}}">Duties, Customs & Taxes</a></li>-->
                         <!--<li><a href="{{route('front.Disclaimer')}}">Disclaimer</a></li>-->
                      </ul>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Company</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.about')}}">About</a></li>
                         <!--<li><a href="{{route('front.Careers')}}">Careers</a></li>-->
                         <!--<li><a href="">Blog</a></li>-->
                         <li><a href="{{route('front.Contact_Us')}}">Contact Us</a></li>
                      </ul>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-menu">
                      <div class="footer-title text-uppercase text-white">Others</div>
                      <ul class="list-inline">
                         <li><a href="{{route('front.FAQ')}}">FAQ</a></li>
                         <li><a href="{{(Auth::check())?route('view.order'):route('front.loginBlade')}}">Track Order</a></li>
                         <li><a href="{{route('front.Vendor')}}">Become an Vendor</a></li>
                         <li><a target="_blank" href="{{route('admin.login')}}">Vendor Login</a></li>
                      </ul>
                   </div>
                   <div class="col-md-3 col-sm-3 col-xs-12">
                       <div class="footer-title text-uppercase text-white">Social Links</div>
                       <div class="row pad-lft-15">
                           <div class="col-md-12 col-sm-12 col-xs-12 follow-us">
                              <ul class="list-inline social-links">
                                 <li><a target="_blank" href="https://www.facebook.com/Tulja.Bhavani.Agencies/"><i class="fa fa-facebook"></i></a></li>
                                 <li><a target="_blank" href="https://www.youtube.com/@Tulja-BestieBeans"><i class="fa fa-youtube"></i></a></li>
                                 <li><a target="_blank" href="https://www.instagram.com/tulja_bestie_beans/"><i class="fa fa-instagram"></i></a></li>

                              </ul>
                           </div>
                        </div>
                   </div>
                </div>
                <!--<div class="row pad-lft-15">-->
                <!--   <div class="col-md-12 col-sm-12 col-xs-12 follow-us">-->
                <!--      <ul class="list-inline social-links">-->
                <!--         <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                <!--         <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                <!--      </ul>-->
                <!--   </div>-->
                <!--</div>-->
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12 footer-inner footer-form pad-lft-15">
                <div class="footer-title text-uppercase text-white">Payments</div>
                <div class="footerform-inner">
                   <div class="payment-sprite">
                      <img src="{{URL::asset('assets/media/payment_logo.png')}}" alt="payment" style="max-width: 110px;">
                      <!--<span class="bg-payment1"></span>-->
                      <!--<span class="bg-payment2"></span>-->
                      <!--<span class="bg-payment3"></span>-->
                      <!--<span class="bg-payment4"></span>-->
                      <!--<span class="bg-payment5"></span>-->
                      <!--<span class="bg-payment6"></span>-->
                   </div>
                   <!-- <form id="footerform" method="post">
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Email" />
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" placeholder="Message"></textarea>
                      </div>
                      <div>
                          <button type="submit" class="submit-btn">
                              Send Messsage
                          </button>
                      </div>
                      </form> -->
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 nopad copyright">
       <div class="container">
          <!--{{ $StoreConfig->Store_Meta_Title }} © {{ date('Y') }}. All Rights Reserved  |  Designed & Developed By Witglobalsolutions-->
       </div>
    </div>
 </footer>


<!-- ==================== Footer Two Start Here ==================== -->
{{-- <footer class="footer-two section-bg position-relative z-index-1 overflow-hidden">

    <img src="assets/images/gradients/footer-gradient-bg.png" alt="" class="bg--gradient">

    <img src="assets/images/shapes/footer-pattern1.png" alt="" class="position-absolute end-0 top-0 z-index--1">
    <img src="assets/images/shapes/footer-pattern2.png" alt="" class="position-absolute start-0 top-0 z-index--1">

    <div class="footer-inner padding-y-120">
        <div class="container container-two">
            <div class="row gy-5">
                <div class="col-xl-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-widget__logo">
                            <a href="index.html">
                                <img src="assets/images/logo/logo.png" alt="" class="white-version">
                                <img src="assets/images/logo/white-logo.png" alt="" class="dark-version">
                            </a>
                        </div>
                        <p class="footer-widget__desc">Lorem consultancy elitsed do eiusmod tempor inci didunt ut labore dolore magna aliqua sed do eiusmod.</p>
                        <div class="footer-widget__social">
                            <ul class="social-icon-list">
                                <li class="social-icon-list__item">
                                    <a href="https://www.facebook.com" class="social-icon-list__link flx-center"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.twitter.com" class="social-icon-list__link flx-center"> <i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.linkedin.com" class="social-icon-list__link flx-center"> <i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.pinterest.com" class="social-icon-list__link flx-center"> <i class="fab fa-pinterest-p"></i></a>
                                </li>
                                <li class="social-icon-list__item">
                                    <a href="https://www.pinterest.com" class="social-icon-list__link flx-center"> <i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 col-xs-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Policy</h5>
                        <ul class="footer-lists">
                            <li class="footer-lists__item"><a href="{{route('front.Privacy_Policy')}}"  class="footer-lists__link">Privacy Policy</a></li>
                            <li class="footer-lists__item"><a href="{{route('front.Shipping_Policy')}}"  class="footer-lists__link">Shipping Policy</a></li>
                            <li class="footer-lists__item"><a href="{{route('front.TermsConditions')}}"  class="footer-lists__link">Terms & Conditions </a></li>
                             <li class="footer-lists__item" ><a href="{{route('front.returnandcancle')}}" class="footer-lists__link">Returns, Exchange & Cancellation</a></li> --}}
                            {{-- <li class="footer-lists__item"><a href="{{route('front.Privacy_Policy')}}"  class="footer-lists__link">Shopping Cart</a></li>
                            <li class="footer-lists__item"><a href="{{route('front.Privacy_Policy')}}"  class="footer-lists__link">Dashboard</a></li> --}}
                        {{-- </ul>
                    </div>
                </div>
                <div class="col-xl-1 d-xl-block d-none"></div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Company</h5>
                        <ul class="footer-lists">
                            <li class="footer-lists__item"><a href="{{route('front.about')}}" class="footer-lists__link">About </a></li>
                            <li class="footer-lists__item"><a href="{{route('front.Contact_Us')}}" class="footer-lists__link">Contact Us </a></li> --}}
                            {{-- <li class="footer-lists__item"><a href="register.html" class="footer-lists__link">Register</a></li>
                            <li class="footer-lists__item"><a href="blog.html" class="footer-lists__link">Blog </a></li>
                            <li class="footer-lists__item"><a href="blog-details.html" class="footer-lists__link">Blog Details</a></li> --}}
                        {{-- </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Others</h5>
                        <ul class="footer-lists">
                            <li class="footer-lists__item"><a href="{{route('front.FAQ')}}" class="footer-lists__link">FAQ</a></li>
                            <li class="footer-lists__item"><a href="{{(Auth::check())?route('view.order'):route('front.loginBlade')}}" class="footer-lists__link">Track Order</a></li>
                            <li class="footer-lists__item"><a href="{{route('front.Vendor')}}" class="footer-lists__link">Become an Vendor</a></li>
                            <li class="footer-lists__item"><a target="_blank" href="{{route('admin.login')}}"  class="footer-lists__link">Vendor Login</a></li> --}}
                            {{-- <li class="footer-lists__item"><a href="all-product.html" class="footer-lists__link">Figma</a></li>
                        </ul>
                    </div>
                </div> --}}

                {{-- me added --}}
                {{-- <div class="col-xl-3 col-sm-6 col-xs-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Payments</h5>
                        <img src="{{URL::asset('assets/media/payment_logo.png')}}" alt="payment" style="max-width: 110px;">
                    </div>
                </div> --}}



            {{-- </div>
        </div>
    </div> --}}
    <!-- bottom Footer Two -->
    {{-- <div class="bottom-footer-two">
        <div class="container container-two">
            <div class="bottom-footer__inner flx-between gap-3">
                <p class="bottom-footer__text font-14"> Copyright &copy; 2024 DPmarket, All rights reserved.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link font-14">Terms of service</a>
                    <a href="#" class="footer-link font-14">Privacy Policy</a>
                    <a href="contact.html" class="footer-link font-14">cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer> --}}

<footer class="footer-two section-bg position-relative z-index-1 overflow-hidden">
    <img src="assets/images/gradients/footer-gradient-bg.png" alt="" class="bg--gradient">
    <img src="assets/images/shapes/footer-pattern1.png" alt="" class="position-absolute end-0 top-0 z-index--1">
    <img src="assets/images/shapes/footer-pattern2.png" alt="" class="position-absolute start-0 top-0 z-index--1">

    <div class="footer-inner py-5">
        <div class="container container-two">
            <div class="row gy-4 gx-5 flex-wrap justify-content-between">

                <!-- Logo & About -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-widget__logo mb-3">
                            <a href="index.html">
                                <img  src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
                                <img  src="assets/images/logo/slidesbuy.png" alt="Logo" class="dark-version">
                            </a>
                        </div>
                        <p class="footer-widget__desc">Lorem consultancy elitsed do eiusmod tempor inci didunt ut labore dolore magna aliqua sed do eiusmod.</p>
                       <ul class="social-icon-list">


                        <li class="social-icon-list__item">
                            <a target="_blank" href="https://www.facebook.com/Tulja.Bhavani.Agencies/"  class="social-icon-list__link flx-center"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a target="_blank" href="https://www.youtube.com/@Tulja-BestieBeans" class="social-icon-list__link flx-center"> <i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a target="_blank" href="https://www.instagram.com/tulja_bestie_beans/" class="social-icon-list__link flx-center"> <i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.pinterest.com" class="social-icon-list__link flx-center"> <i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li class="social-icon-list__item">
                            <a href="https://www.pinterest.com" class="social-icon-list__link flx-center"> <i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>

                <!-- Policy Links -->
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Policy</h5>
                        <ul class="footer-lists">
                            <li><a href="{{route('front.Privacy_Policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('front.Shipping_Policy')}}">Shipping Policy</a></li>
                            <li><a href="{{route('front.TermsConditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('front.returnandcancle')}}">Returns, Exchange & Cancellation</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Company Links -->
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Company</h5>
                        <ul class="footer-lists">
                            <li><a href="{{route('front.about')}}">About</a></li>
                            <li><a href="{{route('front.Contact_Us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Other Links -->
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Others</h5>
                        <ul class="footer-lists">
                            <li><a href="{{route('front.FAQ')}}">FAQ</a></li>
                            <li><a href="{{(Auth::check()) ? route('view.order') : route('front.loginBlade')}}">Track Order</a></li>
                            <li><a href="{{route('front.Vendor')}}">Become a Vendor</a></li>
                            <li><a target="_blank" href="{{route('admin.login')}}">Vendor Login</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Payments -->
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget__title">Payments</h5>
                        <img src="{{URL::asset('assets/media/payment_logo.png')}}" alt="payment" class="img-fluid" style="max-width: 110px;">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="bottom-footer-two mt-4">
        <div class="container container-two">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="mb-0 font-14 text-center text-md-start">Copyright &copy; 2024 DPmarket, All rights reserved.</p>
                <div class="footer-links d-flex gap-3 flex-wrap justify-content-center">
                    <a href="#" class="footer-link font-14">Terms of Service</a>
                    <a href="#" class="footer-link font-14">Privacy Policy</a>
                    <a href="contact.html" class="footer-link font-14">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ==================== Footer Two End Here ==================== -->





