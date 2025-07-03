<div class="login-popup">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-no lh-1 ls-normal" href="#signin">Login</a>
                </li>
                <li class="delimiter">or</li>
                <li class="nav-item">
                    <a class="nav-link border-no lh-1 ls-normal" href="#register">Register</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="forgot">
                    <form method="POST" id="formforget" action="{{route('front.forgot')}}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address *" required />
                        </div>
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Sent email</button>
                    </form>
                </div>
                <div class="tab-pane active" id="signin">
                    <form method="POST" id="formlogin" action="{{route('front.login')}}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Username or Email Address *" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password *"
                                required />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                    name="signin-remember" />
                                <label class="form-control-label" for="signin-remember">Remember
                                    me</label>
                            </div>
                            <a href="#forgot" class="lost-link nav-link">Lost your password?</a>
                        </div>
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="ls-m">or Login With</label>
                        <!--<div class="social-links">-->
                        <!--    <a href="#" class="social-link social-google fab fa-google border-no"></a>-->
                        <!--    <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>-->
                        <!--    <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="tab-pane" id="register">
                    <form method="POST" id="formreg" action="{{route('user.register')}}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="email" name="email" placeholder="Your Email Address *"
                                required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password *"
                                required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="confirm Password *"
                                required />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" title="Aggree th term and conduction"/>
                                <label class="form-control-label" for="register-agree">I agree to the
                                    privacy policy</label>
                            </div>
                        </div>
                        <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
                    </form>
                    <div class="form-choice text-center">
                        <label class="ls-m">or Register With</label>
                        <!--<div class="social-links">-->
                            
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>