<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\OtpVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Validator;
use App\Models\MailTemplate;
use App\Mail\ContactMails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as Input;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\UserForgetMail;
use App\Mail\WelcomeMail;
use App\Models\Order;
use App\Models\Orderlog;
use App\Models\Address;
use App\Models\Product;
use App\Models\Storeconfiguration;
use App\Models\State;
use App\Models\City;
use App\Models\Pincode;
use App\Mail\AdminMails;
use App\Mail\AdminMails1;
use App\Models\Country;
use App\Http\Controllers\Front\CartController;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Redirect;
// use App\Mail\SendOtpMail;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public $perpage = 5;
    public function __construct()
    {
      $this->middleware('auth',['except'=>['index','register','login','otp-form','send-otp','checkout','contact','cart','logout','LoadLogin','myaccount','verify','forgotpassword','thankyou','contactus','termandconduction','aboutus','signOnWithMobileNo','showOtpForm','verifyOtp','showLoginForm','signIn','showLinkRequestForm','sendResetLinkEmail','showResetForm','resendOtp','reset','wishlist']]);
    }

    public function showLinkRequestForm()
{
    return view('front.auth.email'); // Or your custom view
}
public function sendResetLinkEmail(Request $request)
{
    try {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'This email is not registered in our system.'
            ], 404);
        }

        // Check if requested within last 5 minutes (300 seconds)
        if ($user->password_requested_at && now()->diffInSeconds($user->password_requested_at) < 300) {
            $remainingSeconds = 300 - now()->diffInSeconds($user->password_requested_at);
            $remainingMinutes = ceil($remainingSeconds / 60);

            return response()->json([
                'status' => false,
                'message' => 'Please wait ' . $remainingMinutes . ' minute(s) before requesting again.',
                'retry_after' => $remainingSeconds
            ], 429);
        }

        // Send reset link using Laravel's built-in password reset
        $status = Password::sendResetLink($request->only('email'));

        if (in_array($status, [Password::RESET_LINK_SENT, 'passwords.sent'])) {
            // Update the password_requested_at timestamp
            $user->update(['password_requested_at' => now()]);

            return response()->json([
                'status' => true,
                'message' => 'Password reset link has been sent to your email address. Please check your inbox (and spam folder).'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Unable to send reset link. Please try again later.'
        ], 500);

    } catch (\Exception $e) {
        \Log::error('Password reset error: ' . $e->getMessage());

        return response()->json([
            'status' => false,
            'message' => 'An error occurred while processing your request. Please try again later.'
        ], 500);
    }
}


public function showResetForm(Request $request, $token)
{
    return view('front.auth.reset', [
        'token' => $token,
        'email' => $request->email
    ]);
}

    public function LoadLogin()
    {
      if(Auth::check()){
        return Redirect::to('/');
    }
      $Country = Country::where('status',1)->get();
      return view('front.login',compact('Country'));
    }
    public function myaccount()
    {
      if(Auth::check()){
        $Address = Address::where('user_id',Auth::user()->id)->get();
        return view('front.Myaccount',compact('Address'));
      }
      return redirect()->route('front.index');
    }
        public function userprofile(){

        $Country = Country::where('status',1)->get();
        $State = State::where('status', 1)->where('country_id',Auth::user()->country)->get();
        $City = City::where('status', 1)->where('country_id',Auth::user()->country)->where('state_id',Auth::user()->state)->get();
        $Pincode = Pincode::where('status', 1)->where('country_id',Auth::user()->country)->where('state_id',Auth::user()->state)->where('city_id',Auth::user()->city)->get();

        return view('front.userprofile',\compact('Country','State','City','Pincode'));
    }
    public function userprofileupdate(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->city = $request->city;
        $user->pincode = $request->pincode;
        $user->state = $request->state;
        $user->street = $request->street;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->update();
        return redirect()->route('front.userprofile');
    }
    public function updateProfile(Request $request){
      $user = Auth::user();
      $user->name = $request->name;
      $user->mobile = $request->mobile;
      if(!empty($request->new_password)){
        if($request->new_password != $request->confirm_password){
          return response()->json(['msg'=>"Password Miss match"]);
        }else{
          $user->password = \Hash::make($request->new_password);
        }
      }
      $user->update();
      return response()->json(['msg'=>"Profile Updated"]);
    }
    public function repeartorder(Request $request,Order $Order){
        $items = unserialize(bzdecompress(utf8_decode($Order->card)));
        foreach($items->items as $item){
            $CartController = new CartController();
            $CartController->addtocard($request,$item->id);
        }
        return Redirect::back()->with('msg', 'Add to Cart');;
    }
    public function vieworder(Request $request,$id){

        $order = Order::findOrFail($id);
        $Store = Storeconfiguration::findOrFail(1);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $similarorder = Order::where('order_id',$order->order_id)->get();
        // $ids = $similarorder->pluck('id');
        // $Orderlog = Orderlog::whereIn('order_id',$ids)->orderBy('id', 'desc')->get();
        return view('front.viewOrder1', compact('order','Store','similarorder'));
    }
    public function Ajaxorder(Request $request){
        $page = ($request->page == null) ? 1:$request->page;
        $order = Order::where('user_id',Auth::user()->id)->get()->unique('order_id')->sortByDesc('id');
        $Store = Storeconfiguration::findOrFail(1);
        $offset = ($page - 1)*$this->perpage;
        $order = new LengthAwarePaginator($order->slice($offset, $this->perpage), $order->count(), $this->perpage, $page);

        // Set the proper URL path for pagination
        $order->setPath(request()->url());

        return view('front.orderlist',['order'=>$order,'Store'=>$Store]);
    }
    public function order(Request $request){
      $page = ($request->page == null) ? 1:$request->page;
      $order = Order::where('user_id',Auth::user()->id)->get()->unique('order_id')->sortByDesc('id');
      $offset = ($page - 1)*$this->perpage;
      $order = new LengthAwarePaginator($order->slice($offset, $this->perpage), $order->count(), $this->perpage, $page);

      // Set the proper URL path for pagination
      $order->setPath(request()->url());

      $Store = Storeconfiguration::findOrFail(1);
      return view('front.vieworder', compact('order','Store'));
  }
  //   public function login(Request $request){
  //     $Store = Storeconfiguration::findOrFail(1);
  //     $data1['welcome'] = "Welcome to ".$Store->Store_Meta_Title;
  //   	$rules = [
  //                 'email'   => 'required|email',
  //                 'password' => 'required|min:6'
  //               ];
  //     $customs = [
  //           'email.required'   => 'Email field should be filled.',
  //           'email.email'      => 'Email field should be maildid.',
  //           'password.required'   => 'Password field should be filled.',
  //           'password.min'        => 'Password field should contain minimum 6.'
  //         ];

  //       $validator = Validator::make($request->all(), $rules,$customs);

  //       if ($validator->fails()) {
  //         return response()->json(['errors'=>"Check Email And password !!"]);
  //       }
  //     if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
  //       if(Auth::guard('web')->user()->is_verify != 'Yes'){
  //         Auth::guard('web')->logout();
  //         $data1['Msg'] = 'Your Email is not Verified!';
  //         return response()->json($data1);
  //       }
  //       if(Auth::guard('web')->user()->status == 0){
  //           Auth::guard('web')->logout();
  //           return response()->json(['errors'=>"Your Account is Deactivate"]);
  //       }
  //       $data1['url'] = redirect()->back();
  //       return response()->json($data1);
  //     }
  //     // if unsuccessful, then redirect back to the login with the form data
  //     return response()->json(['errors'=>"Check Email And password !!"]);
	// }
        public function showLoginForm(){
// dd('login page');
        return view('front.signin');
        }

//  public function login(Request $request){

//   $request->validate([

//     'email' => 'required|email',
//     'password' =>'required'
//   ]);

//   $user = User::where('email',$request->email)->first();

//   if($user && Hash::check($request->password,$user->password)){

//     Auth::login($user);

//     return redirect()->route('/home');
//   }
//   return back()->with('error','invalid creditionals');
//  }
public function signIn(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }


    // we check this email is there are not
    if (!User::where('email', $request->email)->exists()) {
        return response()->json([
            'field'   => 'email',
            'message' => 'This email is not registered.',
        ], 401);
    }

    // Attempt login
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'field'   => 'password',
            'message' => 'Invalid password.',
        ], 401);
    }

    $request->session()->regenerate();

    return response()->json(['success' => true]);
}

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('login.form');
    // }



public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|confirmed|min:6',
    'agree' => 'accepted',
  ], [
    'name.required' => 'Full name is required.',
    'name.string' => 'Full name must be a valid text.',
    'name.max' => 'Full name cannot exceed 255 characters.',
    'email.required' => 'Email address is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'This email address is already registered. Please use a different email or login.',
    'password.required' => 'Password is required.',
    'password.confirmed' => 'Password confirmation does not match.',
    'password.min' => 'Password must be at least 6 characters long.',
    'agree.accepted' => 'You must agree to the terms and conditions.',
  ]);

    if ($validator->fails()) {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        return back()->withErrors($validator)->withInput();
    }

    // Generate OTP
    $otp = rand(100000, 999999);
    $otpExpiresAt = now()->addMinutes(2);

    // Store data in session
    Session::put('register_data', $request->only('name', 'email', 'password'));
    Session::put('otp', $otp);
    Session::put('otp_expires', $otpExpiresAt);

    try {
        // Send OTP email
        Mail::to($request->email)->send(new SendOtpMail($otp));

        // Store OTP in database
        OtpVerification::updateOrCreate(
            ['email' => $request->email],
            ['otp' => $otp, 'expires_at' => $otpExpiresAt]
        );

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'OTP sent to your email successfully! Please check your inbox.',
                'redirect_url' => url('/otp-form')
            ]);
        }

        return redirect(url('/otp-form'))->with('success', 'OTP sent to your email.');

    } catch (\Exception $e) {
        \Log::error('Registration error: ' . $e->getMessage());

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again later.'
            ], 500);
        }

        return back()->with('error', 'Failed to send OTP: ' . $e->getMessage());
    }
}

// public function register(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:5',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|confirmed|min:3',
//     ]);

//     // Generate OTP
//     $otp = rand(100000, 999999);

//     // Save data temporarily in session
//     Session::put('register_data', $request->only('name', 'email', 'password'));
//     Session::put('otp', $otp);
//     Session::put('otp_expires', now()->addMinutes(10));

//     // Send OTP to email
//     Mail::to($request->email)->send(new SendOtpMail($otp));

//     return redirect()->route('otp.form')->with('success', 'OTP sent to your email.');
// }

public function showOtpForm()
{
    // dd(Session::get('register_data'));

    if (!Session::has('register_data')) {
        return redirect()->route('user.register')->with('error', 'Session expired. Please register again.');
    }



    return view('front.otpform');
}

//     public function verifyOtp(Request $request)
//     {
//         // dd($request);
//         $request->validate(['otp' => 'required|digits:6']);


//         // dd($request);
//         $data = Session::get('register_data');

//         $otpRecord = OtpVerification::where('email', $data['email'])
//             ->where('otp', $request->otp)
//             ->where('expires_at', '>', now())
//             ->first();

//             // dd($otpRecord);
//         if ($otpRecord) {
//             User::create([
//                 'name'     => $data['name'],
//                 'email'    => $data['email'],
//                 'password' => Hash::make($data['password']),
//             ]);

//             Session::forget('register_data');
//             OtpVerification::where('email', $data['email'])->delete();
// // dd('coming to home');
//             // return redirect('login')->with('success', 'Account created successfully!');
//                return redirect(url('/login'))->with('success', 'Account created successfully!');
//         } else {
//             return back()->with('error', 'Invalid or expired OTP.');
//         }
//     }

public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required|digits:6']);

    $data = Session::get('register_data');

    $otpRecord = OtpVerification::where('email', $data['email'])
        ->where('otp', $request->otp)
        ->where('expires_at', '>', now())
        ->first();

    if ($otpRecord) {
        // Create the user
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Send welcome email
        try {
            Mail::to($data['email'])->send(new WelcomeMail([
                'name' => $data['name'],
                'email' => $data['email']
            ]));
        } catch (\Exception $e) {
            \Log::error('Welcome email error: ' . $e->getMessage());
            // Don't fail the registration if welcome email fails
        }

        Session::forget('register_data');
        OtpVerification::where('email', $data['email'])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Account created successfully! Welcome email sent.',
            'redirect' => url('/login')
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired OTP.'
        ], 422);
    }
}
public function resendOtp(Request $request)
{
    $registerData = session('register_data');

    if (!$registerData || !isset($registerData['email'])) {
        return response()->json([
            'success' => false,
            'message' => 'Session expired. Please register again.'
        ]);
    }

    $email = $registerData['email'];
    $otp = rand(100000, 999999); // Generate new 6-digit OTP

    // Set expiration to 1 minute from now
    $expiresAt = Carbon::now()->addMinutes(1);

    // Store/update the OTP
    OtpVerification::updateOrCreate(
        ['email' => $email],
        ['otp' => $otp, 'created_at' => now(), 'expires_at' => $expiresAt]
    );

    // Update expiry in session for JS sync
    Session::put('otp_expires_at', $expiresAt);

    // ✅ Send OTP Email
    try {
        Mail::to($email)->send(new \App\Mail\SendOtpMail($otp));
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to send OTP. Error: ' . $e->getMessage()
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'OTP resent successfully',
        'expires_at' => $expiresAt->timestamp
    ]);
}

// public function resendOtp(Request $request)
// {
//     $registerData = session('register_data');

//     if (!$registerData || !isset($registerData['email'])) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Session expired. Please register again.'
//         ]);
//     }

//     $email = $registerData['email'];
//     $otp = rand(100000, 999999); // Generate new 6-digit OTP

//     // Set expiration to 1 minute from now
//     $expiresAt = Carbon::now()->addMinutes(1);

//     // Store/update the OTP
//     OtpVerification::updateOrCreate(
//         ['email' => $email],
//         ['otp' => $otp, 'created_at' => now(), 'expires_at' => $expiresAt]
//     );


//     // Update expiry in session for JS sync
//     Session::put('otp_expires_at', $expiresAt);

//     return response()->json([
//         'success' => true,
//         'message' => 'OTP resent successfully',
//         'otp' => $otp, // remove in production
//         'expires_at' => $expiresAt->timestamp
//     ]);
// }







	//  public function register(Request $request){
  //   	$rules = [
  //                 'email'   => 'required|email|unique:users,email,'.$request['email'],
  //                 'password' => 'min:6|required|same:confirmPassword',
  //                 'confirmPassword' => 'required|min:6'
  //               ];
  //     $customs = [

  //           'email.required'   => 'Email field should be filled.',
  //           'email.email'      => 'Email field should be maildid.',
  //           'email.unique'      => 'Mail id already taken',
  //           'password.required'   => 'Password field should be filled.',
  //           'password.same'   => 'Password field same as Confirm Password.',
  //           'password.min'        => 'Password field should contain minimum 6.',
  //           'confirmPassword.required'   => 'Confirm Password field should be filled.',
  //           'confirmPassword.min'        => 'Confirm Password field should contain minimum 6.'
  //         ];
  //       $validator = Validator::make($request->all(), $rules,$customs);
  //       if ($validator->fails()) {
  //         return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
  //       }
  //       $data=new User;
  //       $data->name=$request['name'];
  //       $data->email=$request['email'];
  //       $data->Phone = $request['Phone'];
  //       $data->password=\Hash::make($request['password']);
  //       $data->email_verify = md5(time().$request->email);
  //       $data->is_verify = 'Yes';
  //       $data->dialing = str_replace('+','',$request->dialing);
  //       $data->save();
  //       Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']]);
  //       //Mail::to($request->email)->send(new RegisterMail(['token'=>$data->email_verify,'id'=>$data->id]));
  //       $data1['msg'] = 'Account created login';
  //       return response()->json($data1);
  //   }
  //   public function verify($id,$token){
  //     $data=User::where('id',$id)->where('email_verify',$token)->first();
  //     if(!empty($data)){
  //       $data->is_verify = 'Yes';
  //       $data->email_verified_at = date('Y-m-d H:i:s');
  //       $data->update();
  //         return Redirect::to(route('front.index'));
  //     }else{
  //       return Redirect::to(route('front.index'));
  //     }

  //   }
  //   public function forgotpassword(Request $request){
  //     $email = $request->email;

  //     $mailTemplates = MailTemplate::where('template_name','2')->where('status','1')->first();
  //     $data=User::where('email',$email)->first();
  //     if(empty($data)){
  //       return response()->json(['msg'=>'register first']);
  //     }
  //     $password = rand(1111111111,9999999999);
  //     $mailContents=[
  //         'title'=>$mailTemplates->subject_mail,
  //         'body'=>$mailTemplates->content_mail,
  //         'password'=>$password,
  //         'footer'=>$mailTemplates->footer_mail,
  //     ];
  //     Mail::to($email)->bcc($mailTemplates->bcc_mail)->send(new AdminMails1($mailContents));
  //     $data->password=\Hash::make($password);
  //     $data->update();
  //     return response()->json(['msg'=>'Password sent to your Email']);
  //   }
  //   public function cart(Request $request){
  //     $Cart = new Cart();
  //     $Cart->oldcard($request->session()->get('cart_'.Auth::user()->id));
  //     return view('front.cart',compact('Cart'));
  //   }
  //   public function thankyou(){
  //     return view('front.includes.Ajax.thankyou');
  // }
  public function wishlist(){
    try {
      if(auth()->check()){
        $wishlistProducts = auth()->user()->wishlists()->with('product')->get()->pluck('product');

        // Debug information
        \Log::info('Wishlist Debug', [
          'user_id' => auth()->id(),
          'wishlist_count' => auth()->user()->wishlists()->count(),
          'products_count' => $wishlistProducts->count(),
          'products' => $wishlistProducts->toArray()
        ]);

        // Get download counts for wishlist products
        $downloadCounts = [];
        if($wishlistProducts->count() > 0) {
            $downloadCounts = \App\Models\Product::getDownloadCounts($wishlistProducts);
        }
        return view('front.wishlist',compact('wishlistProducts', 'downloadCounts'));
      } else {
        // For guest users, show empty wishlist with login prompt
        $wishlistProducts = collect(); // Empty collection
        $downloadCounts = []; // Empty download counts
        return view('front.wishlist',compact('wishlistProducts', 'downloadCounts'));
      }
    } catch (\Exception $e) {
      \Log::error('Wishlist Error: ' . $e->getMessage());
      \Log::error('Wishlist Error Stack: ' . $e->getTraceAsString());

      // Return a simple error view or redirect
      return response()->json([
        'error' => 'Wishlist error: ' . $e->getMessage(),
        'trace' => $e->getTraceAsString()
      ], 500);
    }
  }

  public function wishlistAdd(Request $request){
    if(!Auth::check()){
      return response()->json(['status' => 'error', 'message' => 'Please login to add items to wishlist'], 401);
    }

    $productId = $request->id;

    // Check if product already in wishlist
    $exists = Auth::user()->wishlists()->where('product_id', $productId)->exists();

    if($exists){
      return response()->json(['status' => 'error', 'message' => 'Product already in wishlist'], 400);
    }

    try {
      // Add to wishlist
      Auth::user()->wishlists()->create([
        'product_id' => $productId
      ]);

      $wishlistCount = Auth::user()->wishlists()->count();
      return response()->json(['status' => 'success', 'count' => $wishlistCount]);
    } catch (\Exception $e) {
      return response()->json(['status' => 'error', 'message' => 'Failed to add to wishlist: ' . $e->getMessage()], 500);
    }
  }

  public function wishlistremove(Request $request){
    if(!Auth::check()){
      return response()->json(['status' => 'error', 'message' => 'Please login to remove items from wishlist'], 401);
    }

    $productId = $request->id;

    try {
      // Remove from wishlist
      Auth::user()->wishlists()->where('product_id', $productId)->delete();

      $wishlistCount = Auth::user()->wishlists()->count();
      return response()->json(['status' => 'success', 'count' => $wishlistCount]);
    } catch (\Exception $e) {
      return response()->json(['status' => 'error', 'message' => 'Failed to remove from wishlist: ' . $e->getMessage()], 500);
    }
  }

   public function contact(Request $request){
      $requestData=$request->all();
        $Store = Storeconfiguration::findOrFail(1);
        $contact_to = json_decode($Store->Contact_Us_Emails_To, true);
        $contact_bcc = json_decode($Store->Contact_Us_Emails_BCC, true);
        $emails = [];
        $contactbcc = [];
        foreach($contact_to as $c){
            $emails[] = $c['value'];

        }
        foreach($contact_bcc as $c){
            $contactbcc[] = $c['value'];
        }

      $email=$requestData['email'];
      $customerName=$requestData['userName'];
      $customerMessage=$requestData['comment'];
      $mailTemplates = MailTemplate::where('template_name','3')->where('status','1')->first();


       $mailContents=[
          'title'=>$mailTemplates->subject_mail,
          'body'=>$mailTemplates->content_mail,
          'footer'=>$mailTemplates->footer_mail,
          'customerName'=>$customerName,
          'customerMessage'=>$customerMessage,
      ];
    $contactbcc[] = $mailTemplates->bcc_mail;

      // Send mails after the HTTP response without a queue worker
      app()->terminating(function () use ($email, $contactbcc, $mailContents, $emails, $request, $mailTemplates, $customerName, $customerMessage) {
          try {
              Mail::to($email)->bcc($contactbcc)->send(new ContactMails($mailContents));
          } catch (\Throwable $e) {
              \Log::error('Contact user mail failed: '.$e->getMessage());
          }

          try {
              \Mail::send('mails.contact', array(
                'name' => $customerName,
                'email' => $email,
                'subject' => $mailTemplates->subject_mail,
                'form_message' => $customerMessage,
              ), function($message) use ($emails,$request,$mailTemplates,$contactbcc){
                  $message->from($request->get('email'));
                  $message->to($emails, 'Hello Admin')->bcc($contactbcc)->subject($mailTemplates->subject_mail);
              });
          } catch (\Throwable $e) {
              \Log::error('Contact admin mail failed: '.$e->getMessage());
          }
      });
       if ($request->ajax() || $request->wantsJson()) {
           return response()->json(['success' => true, 'message' => 'Mail Sent']);
       }
       return redirect()->back()->withSuccess("Mail Sent");
    }
  public function wishlistTemplate(){
    $wishlistProducts = Auth::user()->wishlists()->with('product')->get()->pluck('product');
    return view('front.includes.wishlistTemplate',compact('wishlistProducts'));
  }
    public function contactus(){
    return view('front.contactus');
  }
  public function termandconduction(){
      return view('front.term&conduction');
  }
  public function aboutus(){
      return view('front.adoutus');
  }
  public function profile(){
    return view('front.profileupdate');
  }
    public function logout() {
      Auth::logout();
      return redirect('/');
    }

    public function getstate(Request $request){
      $state = State::where('status','=',1)->where('country_id',$request->country_name)->get();
      return response()->json($state);
    }
    public function getCity(Request $request){
        if(!is_numeric($request->state_name)){
          $State = new State();
          $State->country_id = $request->country;
          $State->state_name = $request->state_name;
          $State->save();
          return response()->json(['new'=>true,'data'=>$State]);
        }else{
          $city = City::where('status','=',1)->where('country_id',$request->country)->where('state_id',$request->state_name)->get();
          return response()->json(['new'=>false,'data'=>$city]);
        }
    }
    public function getPincode(Request $request){
      if(!is_numeric($request->city_name)){
        $City = new City();
        $City->country_id = $request->country;
        $City->state_id = $request->state;
        $City->city_name = $request->city_name;
        $City->save();
        return response()->json(['new'=>true,'data'=>$City]);
      }else{
        $Pincode = Pincode::where('status','=',1)->where('country_id',$request->country)->where('state_id',$request->state)->where('city_id',$request->city_name)->get();
        return response()->json(['new'=>false,'data'=>$Pincode]);
      }
  }
  public function selectPincode(Request $request){
    $Pincode = Pincode::where('id',$request->pincode)->first();
    if(empty($Pincode)){
      $Pincode = new Pincode();
      $Pincode->country_id = $request->country;
      $Pincode->state_id = $request->state;
      $Pincode->city_id = $request->city;
      $Pincode->pincode = $request->pincode;
      $Pincode->save();
      return response()->json(['new'=>true,'data'=>$Pincode]);
    }
  }

 public function return(Order $Order){
    if($Order->user_id != Auth::user()->id){  return Redirect::back(); }
      $card = unserialize(bzdecompress(utf8_decode($Order->card)));
      $card->OrderId = $Order->id;
      session()->put('cart_return',$card);
      return view('front.returnorder',compact('card'));
  }

  public function signOnWithMobileNo(Request $request)
  {
    $user = User::where('Phone',$request->mobile)->first();

    if (!$user) {
         $user =  User::create(['Phone' => $request->mobile]);
    }

    Auth::login($user);

    return response()->json([
        'status' => 'success',
        'message' => 'Logged in successfully'
    ]);
  }


}
