
@extends('front.includes.container')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/css/intlTelInput.min.css">
<style>
.iti__country-list {
        width: 240px !important;
    }
.iti {
    width: 100% !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/intlTelInput.min.js"></script>

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
            <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
            <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="dark-version">
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

<!-- ================================== Account Page Start =========================== -->
<section class="account d-flex">
    <img src="assets/images/thumbs/account-img.png" alt="" class="account__img">
    <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
        <img src="assets/images/shapes/pattern-curve-seven.png" alt="" class="position-absolute end-0 top-0 z-index--1 h-100">
        <div class="account-thumb">
            <img src="assets/images/thumbs/banner-img.png" alt="">
            <div class="statistics animation bg-main text-center">
                <h5 class="statistics__amount text-white">50k</h5>
                <span class="statistics__text text-white font-14">Customers</span>
            </div>
        </div>
    </div>
    <div class="account__right padding-t-120 flx-align">

        <div class="dark-light-mode">
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
        </div>

        <div class="account-content">
            <a href="index.html" class="logo mb-64">
                <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
                <img src="assets/images/logo/slidesbuy.png" alt="" class="dark-version">
            </a>
            <h4 class="account-content__title mb-48 text-capitalize">Create A Free Account</h4>

            <form action="#">
                <div class="row gy-4">
                    <div class="col-12">
                        <label for="name" class="form-label mb-2 font-18 font-heading fw-600">Full Name</label>
                        <div class="position-relative">
                            <input type="text" class="common-input common-input--bg common-input--withIcon" id="name" placeholder="Your full name">
                            <span class="input-icon"><img src="assets/images/icons/user-icon.svg" alt=""></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
                        <div class="position-relative">
                            <input type="email" class="common-input common-input--bg common-input--withIcon" id="email" placeholder="infoname@mail.com">
                            <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="your-password" class="form-label mb-2 font-18 font-heading fw-600">Password</label>
                        <div class="position-relative">
                            <input type="password" class="common-input common-input--bg common-input--withIcon" id="your-password" placeholder="6+ characters, 1 Capital letter">
                            <span class="input-icon toggle-password cursor-pointer" id="#your-password"><img src="assets/images/icons/lock-icon.svg" alt=""></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="common-check my-2">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="agree">
                            <label class="form-check-label mb-0 fw-400 font-16 text-body" for="agree">I agree to the terms & conditions</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-main btn-lg w-100 pill"> Create An Account</button>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-light btn-lg-icon btn-lg w-100 pill">
                            <span class="icon icon-left"><img src="assets/images/icons/google.svg" alt=""></span>
                            Sign up with google
                        </button>
                    </div>
                    <div class="col-sm-12 mb-0">
                        <div class="have-account">
                            <p class="text font-14">Already a member? <a class="link text-main text-decoration-underline  fw-500" href="login.html">Login</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- ================================== Account Page End =========================== -->

@endsection
@push('script')
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script>
$(document).ready(function(){
    $('#otp').on('input', function () {
      let value = $(this).val().replace(/\D/g, '');
      if (value.length > 6) {
        value = value.slice(0, 6);
      }
      $(this).val(value);
    });

    $('#mobile').on('input', function () {
      let value = $(this).val().replace(/\D/g, '');
      if (value.length > 10) {
        value = value.slice(0, 10);
      }
      $(this).val(value);
    });
})
let iti;
document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector("#mobile");
    iti = window.intlTelInput(input, {
        initialCountry: "in",
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/utils.js"
    });

    //initialize firebase library for captcha

    function setupInvisibleRecaptcha() {
    firebase.initializeApp(firebaseConfig);
    if (!window.recaptchaVerifier) {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': function(response) {
                // reCAPTCHA solved, will proceed with sending OTP
                // console.log('reCAPTCHA solved: ', response);
                //sendOTP(); // Optional: You can auto-trigger OTP here or use manual button
            },
            'expired-callback': function() {
                console.warn('reCAPTCHA expired, resetting...');
                toastr["error"]("reCAPTCHA expired. Please try again.");
                window.recaptchaVerifier.clear();
                setupInvisibleRecaptcha();
            }
        });

        window.recaptchaVerifier.render().then(function(widgetId) {
            window.recaptchaWidgetId = widgetId;
        });
    }
}

// Step 2: Call this on page load or before sending OTP
setupInvisibleRecaptcha();

});

    const form = document.querySelector("#submit");
    form.addEventListener("click", function (e) {
          e.preventDefault();
          const dialCode = "+" + iti.getSelectedCountryData().dialCode;
          const mobileNo = $('#mobile').val();
          let Mobnumber = mobileNo.startsWith(dialCode) ? mobileNo.slice(dialCode.length) : mobileNo;
          $('#submit').attr('data-isverifyotp') == 'true' ? verifyOTP(Mobnumber) : verifyUserandSendOTP(mobileNo)
          console.log('ddddddddddd => ',$('#submit').attr('data-isverifyotp'))
    });

    const editno = document.querySelector("#editno");
        editno.addEventListener("click", function (e) {
         $('#mobile').attr('disabled',false);
         $('#otp').hide();
         $('#submit').val('Login with OTP')
    });


// const FireBase_init = function(){
//             firebase.initializeApp(firebaseConfig);
//             window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
//                 'size': 'invisible',
//                 'callback': (response) => {
//                     // reCAPTCHA solved, allow signInWithPhoneNumber.
//                     // onSignInSubmit();
//                 }
//             });
//         }
// FireBase_init()

var downloadTimer = null;
    var app = new Vue({
        el : '#register',
        data : {
            otpbutton : 'Resend OTP',
            otp : false,
            tryagain : true,
            OTP : '',
            Checking : false,
            Phone : '',
            otpverifide : false,
            pass : "",
            confpass : '',
            mesage : 'sec',
            email : '',
            showvalise  : false,
            dialing : '',
            count : '',
            phonevalidation : false,
            confirmationResult : null,
            num1 : parseInt(Math. random() * (100 - 1)),
            num2 : parseInt(Math. random() * (100 - 1)),
            enter_number : '',
        },
        watch : {
            OTP : function(data){
                if(data.length >= 6){
                    this.Checking = true
                    app.confirmationResult.confirm(data).then(function (result) {
                        toastr["success"]("Registraing...");
                        app.formsubmit();
                    })
                    .catch(function (error) {
                        toastr["error"]('Wrong OTP try again')
                        app.OTP = ''
                        app.Checking = false

                    })

                    // axios.get(`{{route('Otpverify')}}?otp=${app.OTP}`)
                    // .then(function (response) {
                    //     if(response.data.status){
                    //         toastr["success"]("Registraing...");
                    //         app.formsubmit();
                    //     }else{
                    //         toastr["error"]('Wrong OTP try again')
                    //         app.OTP = ''
                    //         app.Checking = false
                    //     }
                    // })
                    // .catch(function (error) {
                    // console.log(error);
                    // });
                }
            },
            email : function(data){
                axios.get(`{{route('checkemail')}}?email=${data}`)
                .then(function (response) {
                    if(response.data.status){
                        app.showvalise = true
                    }else{
                        app.showvalise = false
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
            Phone : function(data){
                axios.get(`{{route('checkphone')}}?phone=${data}`)
                .then(function (response) {
                    if(response.data.status){
                        app.phonevalidation = true
                    }else{
                        app.phonevalidation = false
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
            },
        },
        methods : {
            countrychange(e){
                console.log(e);
                if(e.target.options.selectedIndex > -1) {
                    this.dialing = e.target.options[e.target.options.selectedIndex].dataset.dialing
                }
            },
            submit(e,obj){
                this.Checking = false
                e.preventDefault();
                if(app.showvalise) { toastr["error"]('Email Id already taken'); return;  }
                if(app.phonevalidation) { toastr["error"]('Mobile No already taken'); return;  }
                if(this.pass != this.confpass){ toastr["error"]('Password Miss Match'); return;  }
                if(this.num1 + this.num2 == parseInt(this.enter_number) ){
                    console.log('formData : ',formData);

                    app.formsubmit();
                }else{
                    this.num1 = parseInt(Math. random() * (100 - 1)),
                    this.num2 = parseInt(Math. random() * (100 - 1)),
                    toastr["error"]('Enter Correct value'); return;
                }
                // if(!this.otpverifide){
                //     this.generateOTP();
                // }
            },
            generateOTP(mobileNumber){
                // var mobile = `${this.dialing.replace('+','')}${this.Phone}`
                // axios.post(`{{route('generateOTP')}}?phone=${mobile}&_token={{ csrf_token() }}`)
                const appVerifier = window.recaptchaVerifier;
                const PhoneNumber = mobileNumber;
                firebase.auth().signInWithPhoneNumber(PhoneNumber, appVerifier)
                .then((confirmationResult)=>{
                        app.start();
                        app.tryagain = true
                        app.confirmationResult = confirmationResult;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            start(){
                this.otp = true
                var cont = 100;
                downloadTimer = setInterval(function(){
                    if(cont <= 0){
                        clearInterval(downloadTimer);
                        app.count = 'Please click Resend OTP'
                        app.tryagain = false
                    }else{
                        cont -= 1
                        app.count = `You Will Receive With in ${cont} ${app.mesage}`
                    }
                },1000)
            },
            formsubmit(){
                const formData = new FormData(this.$refs.form);
                var url = this.$refs.form.action
                console.log('formData : ',formData);
                $.ajax({
                    method:"POST",
                    url:url,
                    data:formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data.msg){
                            toastr["success"](data.msg);
                            setTimeout(() => {  location.reload(); }, 500);

                        }else{
                            toastr["error"](errMessage(data));
                            clearInterval(downloadTimer);
                            app.otp = false
                        }
                    },
                    error:function(erroe){
                        alert("Something is wrong");
                    }
                });
            }
        }
    });

    let confirmationResult;

    function sendOTP(phoneNumber) {
        const dialCode = "+" + iti.getSelectedCountryData().dialCode;
        const fullmobNo   = dialCode+""+phoneNumber
        console.log('fullmobNo : ',fullmobNo)

        let baseText = 'Sending OTP';
        let dotCount = 0;

        intervalId = setInterval(function () {
            dotCount = (dotCount + 1) % 4;
            let dots = '.'.repeat(dotCount);
            $('#submit').val(baseText + ' ' + dots);
        }, 500);

        firebase.auth().signInWithPhoneNumber(fullmobNo, window.recaptchaVerifier)
            .then(function (result) {
                console.log('result : ',result);
                confirmationResult = result;
                clearInterval(intervalId);
                $('#mobile').attr('disabled',true)
                toastr["success"]("OTP has been sent Successfully!!!")
                $('#otpdiv').show();
                $('#submit').val('Verify OTP');
                $('#submit').attr('data-isverifyotp',true)
            }).catch(function (error) {
                   console.log('error : ',error);
                     toastr["error"]("Error while sending the OTP");
            });
    }

    function verifyOTP(mobnumber){
        const code = document.getElementById("otp").value;
        confirmationResult.confirm(code).then(result => {
            const user = result.user;
            loginUserService(mobnumber)
        }).catch(error => {
            toastr["error"]("OTP incorrect try again");
            $('#editnoDiv').show();
            $('#otp').val('');
            // $('#submit').attr('data-isverifyotp',false)
        });
    }

    function verifyUserandSendOTP(mobNumber)
    {
        if(mobNumber.length < 10)
        {
           toastr["error"]("Please enter your 10 digits mobile number");
           return true;
        }
        // axios.get(`{{route('checkphone')}}?phone=${mobNumber}`)
        // .then(function (response) {
        //     if(response.data.status){
               sendOTP(mobNumber);
            // }
        // })
        // .catch(function (error) {
        //     toastr["error"]("Something went wrong !!!");        })
    }

    function loginUserService(payload)
    {
        let baseText = 'Verifying OTP';
        let dotCount = 0;

        verifyOTP = setInterval(function () {
            dotCount = (dotCount + 1) % 4;
            let dots = '.'.repeat(dotCount);
            $('#submit').val(baseText + ' ' + dots);
        }, 500);

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

        $.ajax({
            method:"POST",
            url:"{{ route('login.mobile') }}",
            data: {
                mobile : payload
            },
            success:function(data){
                if(data.status == 'success')
                {
                    clearInterval(verifyOTP);
                    $('#submit').val('Verified');
                   toastr["success"]("Login Successful!!!");
                    setTimeout(function () {
                        window.location.href = "{{ route('view.cart') }}";
                    }, 2000);
                }
                else{
                    $('#submit').val('Verify OTP')
                    toastr["error"](data.message);
                }

            },
            error:function(erroe){
                $('#submit').val('Verify OTP')
                alert("Something is wrong");
            }
          });
    }

</script>
@endpush
