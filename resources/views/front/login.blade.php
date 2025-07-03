
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
<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Login/Register</div>
				</div>
			</div>
		</div>

	</div>
	<div class="banner-breadcrumb">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<ul class="breadcrumb">
					  <li><a href="{{ route('front.index') }}">Home</a></li>
					  <li><a href="#">Login/Register</a></li>
										</ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
<section class="register-section commonaccount-section contact">
    <h3 style="text-align: center;color:#333333 !important"> Welcome to Tuljamart </h3>
    <div class="container">
		<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
			<div class="login-box">
				<div class="login-navbar">
					<ul class="nav-justified list-inline" role="tablist">
						<li role="presentation" class="{{(isset($_GET['r']))?'':'active'}}" ><h4 style="text-align: center;color:#333333 !important">Login / Signup</h4></li>
						<!--<li role="presentation" class="{{(isset($_GET['r']))?'active':''}}"><a href="#register" aria-controls="register" role="tab" data-toggle="tab" aria-expanded="true">Register</a></li>-->
					</ul>

					<div class="tab-content">
					    
						<div role="tabpanel" class="tab-pane {{(isset($_GET['r']))?'':'active'}}" id="login">
						    
							<div class="loginform-wraper" >
								<form id="formlogin" action="#" method="# name="">
                                    @csrf
                                    <div class="fieldset">
                                        <div class="help-content" style="color:#333333 !important">
                                           Please enter a 10 digit mobile number * 
                                        </div>
                                     </div>
									<div class="fieldset">
										<input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" name="email" id="username" />
									</div>
									<div class="fieldset" id="otpdiv" style='display:none'>
										<input type="text" maxlength="6" class="form-control" placeholder="Enter Your OTP" name="otp" id="otp" />
									</div>
									<div class="fieldset" style='display:none'>
										<input type="password" class="form-control" placeholder="Password" name="password" id="pwd" />
										<p class="forgotpwd-link"><a href="javascript:void(0);" data-toggle="modal" data-target="#forgotpassword" >Forgot password?</a></p>
									</div>
									<div class="formbtn-container">
										<input type="button"  class="savebtn btn-block" data-isverifyotp="false" name="submit" id="submit" value="login with OTP" />

										<div class="btnbelow-caption text-center" style="display:none">
											<small>Don’t have account? <a href="#register" aria-controls="register" role="tab" data-toggle="tab" aria-expanded="false">Signup</a></small>
										</div>

										<div class="or-divider text-center" style="display:none">
											(or)
										</div>

										<div class="social-loginwraper text-center" style="display:none">
											<div class="sociallogin-caption">With your social network</div>
											<ul class="list-inline">
												<li>
												<a href="#"><i class="fa fa-facebook"></i></a>
												</li>
												<li>
												<a href="#">
												    <img src="images/google-icon.png" class="img-responsive center-block" alt="logo">
												</a>
												</li>
												<li>
												<a href="#"><i class="fa fa-twitter"></i></a>
												</li>
												</ul>
										</div>

									</div>
									<div class="help-content" id="editnoDiv" style="margin-top: 10px;display:none">
                                           <a href="#" id="editno"> Click here </a> to Edit mobile number
                                        </div>
								</form>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane {{(isset($_GET['r']))?'active':''}}" id="register">
							<div class="loginform-wraper" v-show="!otp" style="padding: 20px 0px;">
								<form method="post" ref="form"  @submit="submit($event,this)" action="">
								    @csrf
								    <div class="fieldset">
										<input type="text"  class="form-control"  required placeholder="Full Name" name="name" id="name">
                                       
									</div>
									<div class="fieldset">
										<input type="email" v-model="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="Email" name="email" id="emailmob">
                                        <small v-if="showvalise" style="color: red;padding-left: 15px;">Email Id already taken</small>
									</div>
                                    <div class="fieldset">
                                        <select name="dialing" class="form-control" id="" @change="countrychange($event)" required Placeholder="Select Country">
                                            <option value="">Select Country</option>
                                            @foreach ( $Country as $country)
                                            <option value="{{$country->dialing}}" data-dialing="{{ $country->dialing }}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="fieldset">
										<input type="text" v-model="Phone" class="form-control" name="Phone" pattern="[7-9]{1}[0-9]{9}" required placeholder="Mobile No" title="Phone number with 7-9 and remaing 9 digit with 0-9">
										<small v-if="phonevalidation" style="color: red;padding-left: 15px;">Mobile No already taken</small>
									</div>
									<div class="fieldset">
										<input type="password" class="form-control" minlength="6" v-model="pass" id="password" name="password" placeholder="Password *" required />
									</div>
									<div class="fieldset">
										<input type="password" class="form-control" minlength="6"  v-model="confpass" id="confirmPassword" name="confirmPassword" placeholder="confirm Password *" required />
									</div>
									<div class="fieldset d-flex" style="display: flex;">
									    <label style="width: 100%;">Enter Value @{{ num1 }}  + @{{ num2 }} = </label>
										<input type="number" class="form-control"  v-model="enter_number"  required />
									</div>
									<div class="formbtn-container">
										<input type="submit" class="savebtn btn-block" name="submit" id="submit" value="Register">
										<div class="btnbelow-caption text-center">
											<small>Already registered? <a href="#login" aria-controls="login" role="tab" data-toggle="tab" aria-expanded="false">Sign in</a></small>
										</div>
									</div>
								</form>
							</div>
                            <div class="loginform-wraper" v-show="otp" style="padding: 20px 0px;">
                                <div class="fieldset">
                                    <p>Enter One time Password,<br>
                                        We sent you the code to Mobile No
                                        @{{dialing}} @{{ Phone}}</p>

                                </div>
                                <div class="fieldset">
                                    <input type="text" class="form-control" :disabled = "Checking" v-model="OTP" required placeholder="OTP" >
                                    <p><span V-html="count"></span></p>
                                </div>
                                <div class="formbtn-container" v-if="!tryagain">
									<button type="button" class="savebtn btn-block" :disabled="tryagain" @click="generateOTP()"  v-html="otpbutton"></button>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
  </section>
  <!--sticky footer ends-->
        <div class="modal fade login-modal" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="login-box">
                       <div class="login-navbar">
                          <ul class="list-inline">
                             <li><a class="active" href="javascript:void(0);">Forgot PIN</a></li>
                          </ul>
                       </div>
                       <div class="loginform-wraper">
                          <form method="post" action="{{route('front.forgot')}}"  class="" id="formforget">
                              @csrf
                             <div class="fieldset">
                                <div class="help-content">
                                   Enter Registered Email
                                </div>
                             </div>
                             <div class="fieldset">
                                <!--<div class="fieldset col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:0px">-->
                                <!--   <input type="number" class="form-control"  minlength="1" maxlength="4" required="required" value="91">-->
                                <!--</div>-->
                                <div class="fieldset col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px">
                                   <input name="email" type="email" class="form-control" placeholder="Email"required="required">
                                </div>
                             </div>
                             <div class="formbtn-container">
                                <input type="submit" class="savebtn btn-block" name="submit" id="submit" value="SUBMIT">
                                <div class="btnbelow-caption" style="display:none">
                                   <small class="pull-left">
                                   <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal">Sign in</a>
                                   </small>
                                   <small class="pull-right">
                                   Not a member? <a href="register.html" class="">Sign up</a>
                                   </small>
                                </div>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
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
