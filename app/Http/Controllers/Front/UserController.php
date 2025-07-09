<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\OtpVerification;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\MailTemplate;
use App\Mail\ContactMails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as Input;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\UserForgetMail;
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



class UserController extends Controller
{
    public $perpage = 5;
    public function __construct()
    {
      $this->middleware('auth',['except'=>['index','register','login','checkout','contact','cart','logout','LoadLogin','myaccount','verify','forgotpassword','thankyou','contactus','termandconduction','aboutus','signOnWithMobileNo']]);
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
        $order = new LengthAwarePaginator($order->slice($offset, $this->perpage), $order->count(), $this->perpage ,$page);
        return view('front.orderlist',['order'=>$order,'Store'=>$Store]);
    }
    public function order(Request $request){
      $page = ($request->page == null) ? 1:$request->page;
      $order = Order::where('user_id',Auth::user()->id)->get()->unique('order_id')->sortByDesc('id');
      $offset = ($page - 1)*$this->perpage;
      $order = new LengthAwarePaginator($order->slice($offset, $this->perpage), $order->count(), $this->perpage ,$page);
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
 public function showLoginfrom(){

  return view('fornt.auth.login');
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

 public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:5',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:3',
    ]);

    // Generate OTP
    $otp = rand(100000, 999999);

    // Save data temporarily in session
    Session::put('register_data', $request->only('name', 'email', 'password'));
    Session::put('otp', $otp);
    Session::put('otp_expires', now()->addMinutes(10));

    // Send OTP to email
    Mail::to($request->email)->send(new SendOtpMail($otp));

    return redirect()->route('otp.form')->with('success', 'OTP sent to your email.');
}

    public function showOtpForm()
{
  dd('coming');
    // Check if session exists before showing form
    if (!Session::has('register_data')) {
        return redirect()->route('register.form')->with('error', 'Session expired. Please register again.');
    }

    return view('front.otpform'); // Make sure this Blade file exists
}

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $data = Session::get('register_data');

        $otpRecord = OtpVerification::where('email', $data['email'])
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if ($otpRecord) {
            User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Session::forget('register_data');
            OtpVerification::where('email', $data['email'])->delete();

            return redirect('login')->with('success', 'Account created successfully!');
        } else {
            return back()->with('error', 'Invalid or expired OTP.');
        }
    }
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
    if(Auth::check()){
      $array = \explode(',',Auth::user()->wishlist);
      $Product = Product::whereIn('id',$array)->get();
      return view('front.wishlist',compact('Product'));
    }
    return redirect('/');
  }
  public function wishlistAdd(Request $request){
    $id = $request->id;
    $array = \explode(',',Auth::user()->wishlist);
    if(empty($array[0])){ $array = []; }
    $array[] = $id;
    $temp = implode(',',$array);
    $user = Auth::user();
    $user->wishlist = $temp;
    $user->update();
    return count($array);
  }
  public function wishlistremove(Request $request){
    $id = $request->id;
    $array = \explode(',',Auth::user()->wishlist);
    $key  = array_search($id,$array,true);
    unset($array[$key]);
    $temp = implode(',',$array);
    $user = Auth::user();
    $user->wishlist = $temp;
    $user->update();
    return count($array);
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

      Mail::to($email)->bcc($contactbcc)->send(new ContactMails($mailContents));


      if (Mail::failures()) {
        // return failed mails
        return redirect()->back()->withError("Enter Validate Email Id");
    }

      \Mail::send('mails.contact', array(
        'name' => $customerName,
        'email' => $email,
        'subject' => $mailTemplates->subject_mail,
        'form_message' => $customerMessage,
    ), function($message) use ($emails,$request,$mailTemplates,$contactbcc){
        $message->from($request->get('email'));
        $message->to($emails, 'Hello Admin')->bcc($contactbcc)->subject($mailTemplates->subject_mail);
    });
       return redirect()->back()->withSuccess("Mail Sent");
    }
  public function wishlistTemplate(){
    $array = \explode(',',Auth::user()->wishlist);
    $Product = Product::whereIn('id',$array)->get();
    return view('front.includes.wishlistTemplate',compact('Product'));
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
