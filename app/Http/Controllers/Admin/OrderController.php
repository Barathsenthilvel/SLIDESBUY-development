<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Module;
use App\Models\Orderlog;
use App\Models\Storeconfiguration;
use Auth;
use Validator;

use DataTables;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\MailTemplate;
use App\Mail\OrderMail;
use Razorpay\Api\Api;

class OrderController extends Controller{

 
  public function datatables(Request $request){
        $is_vendor = auth()->user()->is_vendor;
        $order_id = Order::when($is_vendor, function($query,$search){
            return $query->where('vendor_id',$search);
        })->get()->unique('order_id')->sortByDesc('id')->pluck('id')->toArray();
        
        $search=[];
      
        $store = Storeconfiguration::where('id',1)->first();
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
        if(!empty($search[1])){
            $search[1] = str_replace($store->OrderIDPrefix,'',$search[1]);
        }
  
        $data = Order::whereIn('id',$order_id)->when($search[0],function($query,$search){
            return $query->where('id',$search);  
        })
        // ->when($is_vendor, function($query,$search){
        //     return $query->where('vendor_id',$search);
        // })
        ->when($search[1],function($query,$search){
            return $query->where('id','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            $date = explode("|",$search);
            $date[0] = date('y-m-d',strtotime($date[0]." -1 days"));
            $date[1] = date('y-m-d',strtotime($date[1]." +1 days"));
            return $query->whereBetween('created_at',$date);
        })
        ->when($search[3],function($query,$search){
            return $query->orWhere('first_name','LIKE',"%{$search}%")
                        ->orWhere('last_name','LIKE',"%{$search}%")
                        ->orWhere('phone','LIKE',"%{$search}%")
                        ->orWhere('email','LIKE',"%{$search}%");
        })
        ->when($search[4],function($query,$search){
            return $query->where('totalPrice',$search);
        })
        ->when($search[5],function($query,$search){
            return $query->where('payment_method',$search);
        })
        ->when($search[6],function($query,$search){
            return $query->where('payment_status',$search);
        })
        ->when($search[7],function($query,$search){
            return $query->where('delivery_status',$search);
        })->orderBy('id','DESC')->get();

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('total_items',function(Order $data){
                    // dd($data->totalitemsorders);
                    return $data->totalitemsorders;
                })
                ->addColumn('overaallstatus',function(Order $data){
                    return $data->orderstatus;
                })
                ->addColumn('vendororderdata',function(Order $data){
                    return $data->vendororderdata;
                })
                ->addColumn('is_vendor',function(Order $data){
                    return auth()->user()->is_vendor;
                })
                ->addColumn('URL',function(Order $data){
                    return ['label'=>\route('admin-order-label',$data->id)];
                })
                ->toJson(); //--- Returning Json Data To Client Side

    }
    
    public function index(){
        // dd(Order::orderBy('id', 'desc')->get()->unique('order_id')->pluck('id')->toArray());
        return view('admin.order.index');
    }

    public function paymentstatus($id1,$id2)
    {
        $data = Order::findOrFail($id1);
        $data->payment_status = $id2;
        $data->update();
    }

    public function orderststus($id1,$id2){
        $data = Order::findOrFail($id1);
        $store = Storeconfiguration::where('id',1)->first();
        $data->delivery_status = $id2;
        if($id2 == 'Delivered'){
            $data->Deliverydate = now();
        }
        if($id2 == 'Shipped'){
            $data->shipped_date = now();
        }
        $data->update();
        $cart = unserialize(bzdecompress(utf8_decode($data->card)));
        try{
            if($id2=="placed"){
                // $this->singlesentMail($data,4);
            }elseif($id2=="Confirmed"){
                $this->singlesentMailcustomer($data,7);
            }elseif($id2=="Delivered"){
                $this->singlesentMailcustomer($data,9);
            }elseif($id2=="Canceled"){
                    $cart = unserialize(bzdecompress(utf8_decode($data->card)));
                    $item = $cart->singleorder[0];
                    $amount = (int)($item['total']-$item['coupon_amount'])*100;
                    $Razorpay = unserialize(bzdecompress(utf8_decode($data->stripe_object)));
                        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
                        $payment = $api->payment->fetch($Razorpay->id);
                        if($payment->status != 'captured'){
                            if($payment->status == 'refunded'){
                                    $data->delivery_status = 'Canceled';
                                    // $data->reason = $request->reason;
                                    $data->payment_status = 'refund';
                                    $data->update();
                            }
                        }
                    
                    try{
                            $refund = $payment->fetch($payment->id)->refund(array("amount"=>$amount,"speed"=>"normal","receipt"=>"Order ID $data->map_id"));
                            $data->delivery_status = 'Canceled';
                            // $data->reason = $request->reason;
                            $data->payment_status = 'refund';
                            $data->refund_id = (isset($refund))?$refund->id:'';
                            $data->refund_object = (isset($refund))?utf8_encode(bzcompress(serialize($refund), 9)):'';
                            $data->update();
                    }catch(\Razorpay\Api\Errors\BadRequestError $e){
                        // return response()->json(['status'=>'Error While Refund']); 
                    }
                    $this->singlesentMail($data,25);
                    $this->singlesentMailcustomer($data,10);
                    $this->sentSingleAdminMail($data,27);
            }elseif($id2=="Shipped"){
                    // $this->singlesentMailcustomer($data,8);
            }elseif($id2=="fail"){
                
            }

            } catch(\Exception $e){
                echo $e;
                $error = $e;
            }
    }
    public function label($id){
        $is_vendor = auth()->user()->is_vendor;
        $order = Order::findOrFail($id);
        $Store = Storeconfiguration::findOrFail(1);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $user = User::where('id',$order->user_id)->first();
        $user = ($user?$user:null);
        $similarorder = Order::when($is_vendor, function($query,$search){
            return $query->where('vendor_id',$search);
        })->where('order_id',$order->order_id)->get();
        $ids = $similarorder->pluck('id');
        $Orderlog = Orderlog::whereIn('order_id',$ids)->orderBy('id', 'desc')->get();
        return view('admin.order.label', compact('order','Store','items','user','similarorder','Orderlog'));
    }
    public function view($id){
        $is_vendor = auth()->user()->is_vendor;
        $order = Order::findOrFail($id);
        $Store = Storeconfiguration::findOrFail(1);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $user = User::where('id',$order->user_id)->first();
        $user = ($user?$user:null);
        $similarorder = Order::when($is_vendor, function($query,$search){
            return $query->where('vendor_id',$search);
        })->where('order_id',$order->order_id)->get();
        $ids = $similarorder->pluck('id');
        $Orderlog = Orderlog::whereIn('order_id',$ids)->orderBy('id', 'desc')->get();
        return view('admin.order.view', compact('order','Store','items','user','similarorder','Orderlog'));
    }
    public function shippinfnodes($id,$model){
        $order = Order::findOrFail($id);
       return view('admin.order.Shipppedmodel', compact('order','model'))->render();
    }
    public function updatenotes(Request $request,$id){
        $store = Storeconfiguration::where('id',1)->first();
        $data = Order::findOrFail($id);
        $data->track_id = $request->track_id;
        $data->d_s_n = $request->d_s_n;
        $data->update();
        
        $this->singlesentMailcustomer($data,8);
        return response()->json(['msg'=>'Updated ']);
    }
    public function updateReject(Request $request,$id){
        $data = Order::findOrFail($id);
        $data->d_r_n = $request->d_r_n;
        $data->update();
        return response()->json(['msg'=>'Updated ']);
    }
}