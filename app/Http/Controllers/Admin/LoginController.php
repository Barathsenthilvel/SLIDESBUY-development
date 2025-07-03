<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\MailTemplate;
use Auth;
use Validator;
use App\Mail\AdminMails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request as Input;

class LoginController extends Controller
{

    public function __construct() 
    {
      $this->middleware('auth:webadmin',['except'=>['showLoginForm','login','forgot']]);
    }
 
    public function showLoginForm()
    {
      return view('admin.login');
    }
    public function forgot(Request $request)
    {
      $email=$request['email'];
      $random = Str::random(10);
      $mailTemplates = MailTemplate::where('template_name','5')->where('status','1')->first();
      $adminUsers=Admin::where('Username',$email)->first();

      if(empty($adminUsers)){
        return redirect()->back()->withErrors(["Enter Valid Username"]);
      }
      $email = $adminUsers->admin_email;
      $adminUsers->password=Hash::make($random);
      $adminUsers->save();
      $mailContents=[
          'title'=>$mailTemplates->subject_mail,
          'body'=>$mailTemplates->content_mail,
          'password'=>$random,
          'footer'=>$mailTemplates->footer_mail,
          'username'=>$adminUsers->Username,
      ];

      Mail::to($email)->bcc($mailTemplates->bcc_mail)->send(new AdminMails($mailContents));

      return redirect()->back()->withSuccess("We have sent you the new password, Please Check you mail");

    }

    public function login(Request $request){

    	$rules = [
                  'username'   => 'required',
                  'password' => 'required|min:6'
                ];
      $customs = [
            'username.required'   => 'Email field should be filled.',
            'password.required'   => 'Password field should be filled.',
            'password.min'        => 'Password field should contain minimum 6.'
          ];

        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }
      if (Auth::guard('webadmin')->attempt(['Username' => $request->username, 'password' => $request->password])) {
        return redirect()->route('admin.dashboard');
      }

      // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->withInput($request->input())->withErrors(['Credentials Doesn\'t Match !' ]); 

    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if(Auth::user()->is_vendor ==""){
      $dashboad['Product'] = Product::where('status','1')->count();
        }else{
            $dashboad['Product'] = Product::where('status','1')->where("vendor",Auth::user()->is_vendor)->count();
        }
      $dashboad['User'] = User::where('status','1')->count();
      $dashboad['Order'] = Order::all()->unique('order_id')->sortByDesc('id')->count();
      if(Auth::user()->is_vendor){
          $dashboad['Cancellec_order'] = Order::orderBy('id','desc')->where('delivery_status','Canceled')->where('vendor_id',Auth::user()->is_vendor)->limit(5)->get();
      }else{
          $dashboad['Cancellec_order'] = Order::orderBy('id','desc')->where('delivery_status','Canceled')->limit(5)->get();
      }
      
      
      $dashboad['Vendor'] = Vendor::where('status','1')->count();
      if(Auth::user()->is_vendor ==""){
        $dashboad['NewProduct'] = Product::where('status','1')->orderBy('id','desc')->limit(5)->get();
        $dashboad['NewOrder'] = Order::orderBy('id','desc')->limit(5)->get()->unique('order_id')->sortByDesc('id');
      }else{
        $dashboad['NewProduct'] = Product::where('status','1')->where("vendor",Auth::user()->is_vendor)->orderBy('id','desc')->limit(5)->get();
        $dashboad['NewOrder'] = Order::orderBy('id','desc')->where("vendor_id",Auth::user()->is_vendor)->limit(5)->get()->unique('order_id')->sortByDesc('id');
      }
      
    if(Auth::user()->is_vendor){
        $I = 0;
        $dashboad['VendorNewOrder'] = Order::orderBy('id','desc')->get()->unique('order_id')->sortByDesc('id')->filter(function($Order){
            $Amount = 0;
            $true = false;
            $cartitem = unserialize(bzdecompress(utf8_decode($Order->card)));
            $array = [];
            foreach ($cartitem->items as $key => $items) {
              if($items->vendor == Auth::user()->is_vendor){
                $true = true;
                $Amount += $items->total;
                $array[] = $items;
              }
            }
            if($true){
              $Order['amount'] = $Amount;
            $Order['vendorItems'] = $array;
                $array = [];
              return $Order;
            }
        });
      }
    //   dd($dashboad['VendorNewOrder']);
      $dashboad['NewCustomer'] = User::orderBy('id','desc')->limit(5)->get();
      $dashboad['Review'] = Review::orderBy('id','desc')->limit(5)->get();
      $dashboad['vendore'] = Vendor::orderBy('id','desc')->limit(5)->get()->unique('order_id')->sortByDesc('id')->groupBy('name');
      $year = Order::all()->groupBy(function($item){
        return $item->created_at->format('Y');
      });
      $Temp = [];
      foreach($year as $key => $post){ 
        $Temp[] = $key;
      }
      $dashboad['Years'] = $Temp;
      $mounth=date("m");
      $year = date('Y');
      for($i=0;$i<12;$i++){
        $mon = date("F", mktime(0, 0, 0, $mounth, 10));
        $Order = Order::whereMonth('created_at',$mounth)->whereYear('created_at',$year);
        $data[$mon] = $this->vendorAdminSales($Order);
        if($mounth == 1){
          $mounth = 12;
        }else{
          $mounth--;
        }
      }
      $dashboad['sales'] = json_encode($data);
      // dd($dashboad);
      return view('admin.dashboard',compact('dashboad'));
    }
    
function vendorAdminSales($Order){
      $grandTotal = 0;
      $count = 0;
      $total = 0;
      $netamountGstorder = $this->netamountGstorder($Order);
      return ['grandTotal' =>round($netamountGstorder['netamount'],2),'total'=>round($netamountGstorder['total'],2),'ordercount'=>intval($netamountGstorder['ordercount'])];
    }
    
    public function netamountGstorder($Order){
      $netamount = 0;
      $total = 0;
      $return = null;
      $count = [];
      $id = null;
      $Order = $Order->get();
      foreach ( $Order as $key => $order) {
        $cartitem = unserialize(bzdecompress(utf8_decode($order->card)));
        foreach ($cartitem->singleorder as $key => $items) {
          if(Auth::user()->is_vendor){
              if(!$items->vendorObject){ continue;}
              if($items->vendorObject->id != Auth::user()->is_vendor){ continue;}
              $count[] = $order->id;
              $return = $this->getproductamount($items,$cartitem);
              $netamount += $return['netamount'];
              $total += $return['total'];
          }else{
            $count[] = $order->id;
            $return = $this->getproductamount($items,$cartitem);
            $netamount += $return['netamount'];
            $total += $return['total'];
          }
        }
      }
    //   $count = count(array_unique($count));
    $count = $Order->unique('order_id')->count();
      return ['netamount'=>$netamount,'total'=>$total,'ordercount'=>$count];
    }

    public function getproductamount($items,$card){
        
        if(Auth::user()->is_vendor){
            return ['netamount'=>$items->manufacturerPrice ,'total'=>$items->manufacturerPrice+$items->shipping_price];
        }
        
        
      $netamount = 0;
      $total = 0;
        $count = count($card->items);
        $deliverycharde = $card->deliverycharge/$count;
    //   if($items['vendorObject'] != null){
    //     $amount = (($items->manufacturerPrice/100)*$items->vendorObject->vendorperscent)+$items->manufacturerPrice;
    //   }else{
    //     $amount = $items->manufacturerPrice;
    //   }
      
    //   if($items->CustomerGroup->type == 1){
    //     $amount = $amount - ((float)($amount/100)*(float)$items->CustomerGroup->amount);
    //   }else{
    //     $amount = $amount - (float)$items->CustomerGroup->amount;
    //   }
    //   if($items->discount){
    //     if($items->discount->type == 'RS'){
    //       $amount = $amount - (float)$items->discount->number;
    //     }else{
    //       $amount = $amount - ($amount/100)*$items->discount->number;
    //     }  
    //   }
    //   echo ($amount * $items->quantity)+ $items->producttaaAmount,'<br>';
    
        // $amount = $amount* $items->quantity;
        $amount = $items->total - $items->coupon_amount;
        return ['netamount'=>$amount ,'total'=>$amount+$items->producttaaAmount+$deliverycharde];
    }
    public function datatables()
    {

         $datas = Admin::where('id','!=','1')->where('status',1)->orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                      ->addIndexColumn()
                      ->addColumn('admin_name', function(Admin $data) {
                        return $data->admin_name.' '.$data->last_name;
                    })
                      ->addColumn('role', function(Admin $data) {
                        return $data->getRole()->role_name;
                    })
                      ->addColumn('status', function(Admin $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-user-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-user-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Admin $data) {
                                return '<div class="action-list"><a href="' . route('admin-user-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-user-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['role','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){

    return view('admin.user.index');
    }

    public function create(){
      $role=Role::where('status',1)->get();
    return view('admin.user.create',compact('role'));
      }

    public function store(Request $request){
    $requestedData=$request->all();

    $rules=[

      'firstName' => 'required',
      'lastName' => 'required',
      'adminEmail' => 'required|unique:admins,admin_email,'.$request->input('adminEmail'),
      'Username'=>'required|unique:admins,Username,'.$request->input('Username'),
      'userRole' => 'required',
    ];

    $customs=[
     'firstName.required'  => 'First Name should be filled',
      'lastName.required'  => 'Last Name should be filled',
      'adminEmail.required' => 'Email should be filled',
      'adminEmail.unique'   => 'Email already taken',
      'Username.required' => 'Username should be filled',
      'Username.unique'   => 'Username already taken',
      'userRole.required'    => 'User Role should be filled',
    ];

    $validator = Validator::make($request->all(), $rules,$customs);
    if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }
        if ($file = $request->file('userImage')) 
         {      
            $userFile = time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/media/users',$userFile); 
        }else{
          $userFile='';
        } 

        $data = new Admin;

        $data->admin_name=$requestedData['firstName'];
        $data->last_name=$requestedData['lastName'];
        $data->admin_email=$requestedData['adminEmail'];
        $data->role_id=$requestedData['userRole'];
                $data->Username=$requestedData['Username'];
        $data->photo=$userFile;
        $data->password=Hash::make('123456');
        $data->save();
        $data1['msg'] = 'New User Added Successfully.';
        return response()->json($data1);

    }

    public function edit($id){
      $role=Role::where('status',1)->get();
      $data=Admin::findOrFail($id);
    return view('admin.user.edit',compact('role','data'));
      }


    public function update(Request $request,$id){
    $requestedData=$request->all();

    $rules=[

      'firstName' => 'required',
      'lastName' => 'required',
      'adminEmail' => 'required|unique:admins,admin_email,'.$id,
      'Username'=>'required|unique:admins,Username,'.$id,
      'userRole' => 'required',
    ];

    $customs=[
      'firstName.required'  => 'First Name should be filled',
      'lastName.required'  => 'Last Name should be filled',
      'adminEmail.required' => 'Email should be filled',
      'adminEmail.unique'   => 'Email already taken',
      'Username.required' => 'Username should be filled',
      'Username.unique'   => 'Username already taken',
      'userRole.required'    => 'User Role should be filled',
    ];

    $validator = Validator::make($request->all(), $rules,$customs);
    if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        $data = Admin::findOrFail($id);

        if ($file = $request->file('userImage')) 
         {      
            $userFile = time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/media/users',$userFile); 
            if($data->web_image != null)
                {
                    if (file_exists(public_path().'/assets/media/users/'.$data->web_image)) {
                        unlink(public_path().'/assets/media/users/'.$data->web_image);
                    }
                }
        }else{
          $userFile =$data->photo;
        }


        $data->admin_name=$requestedData['firstName'];
        $data->last_name=$requestedData['lastName'];
        $data->admin_email=$requestedData['adminEmail'];
        $data->role_id=$requestedData['userRole'];
        $data->Username=$requestedData['Username'];
        $data->photo=$userFile;
        $data->password=Hash::make('123456');
        $data->save();
        $data1['msg'] = 'User Updated Successfully.';

        return response()->json($data1);

    }

    public function status($id1,$id2)
      {
          $data = Admin::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function changePassword()
      {
    return view('admin.settings.create');
      }

      public function changingPassword(Request $request)
      {
        $rules=[
          'oldPassword'          => 'required',
          'newPassword'              => 'required|min:6',
          'cnfPassword' => 'required|same:newPassword|min:6'
    ];

    $customs=[
      'oldPassword.required'            => 'Old Password should be filled',
      'newPassword.required'            => 'New Password should be filled',
      'cnfPassword.required'            => 'Confirm Password should be filled',
      'newPassword.min'        => 'New Password field should contain minimum 6.',
      'cnfPassword.min'        => 'Confirm Password field should contain minimum 6.',
      'cnfPassword.same' => 'Password Confirmation should match the New Password',
    ];
    $user = Admin::find(Auth::guard('webadmin')->user()->id);
    $oldpassword = $request->input('oldPassword');

        if (!Hash::check($oldpassword, $user->password)) { 

          return response()->json(array('errors' => ['Entered Password is invalid']));
        }

          $validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {

          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $user->password=Hash::make($request->input('newPassword'));
        $user->save();
    $data1['msg'] = 'Password Updated Successfully.';
        return response()->json($data1);
      }


  public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        if($data->is_vendor){
            $Vendor = Vendor::findOrFail($data->is_vendor);
            $Vendor->delete();
        }
        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    
       public function getOrder(Request $request){
      $search = $request->search;
      $result = Order::where('order_id','LIKE',"%{$search}%")->orderBy('id','desc')->limit(6)->get();
      return response()->json($result);
    }

    public function chart(Request $request){
      $year = $request->Year;
      $mounth=date("m");
      for($i=0;$i<12;$i++){
        $mon = date("F", mktime(0, 0, 0, $mounth, 10));
        $Order = Order::whereMonth('created_at',$mounth)->whereYear('created_at',$year)->where('payment_status','success');
        $data[$mon] = $this->vendorAdminSales($Order);
        if($mounth == 1){
          $mounth = 12;
        }else{
          $mounth--;
        }
      }
      return response()->json($data);
    }
}
