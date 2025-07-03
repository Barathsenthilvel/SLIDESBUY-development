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