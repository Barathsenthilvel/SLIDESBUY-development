<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Auth;
use App\Models\Returnproduct;
use App\Models\ReturnProductItem;
use App\Models\Storeconfiguration;
use App\Models\User;
use App\Models\Order;
use App\Models\History;
use App\Mail\ReturnMails;
use App\Models\MailTemplate;
use Illuminate\Support\Facades\Mail;


class ReturnController extends Controller {

    public function index(){
        return view('admin.returnProduct.index');
    }
    public function datatables()
    {
         $datas = Returnproduct::orderBy('id','desc')->get();
         $Storeconfiguration = Storeconfiguration::orderBy('id','desc')->first();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('ReturnOrder_ID', function(Returnproduct $data) use ($Storeconfiguration){
                    return $Storeconfiguration->OrderIDPrefix.''.sprintf('%03d',$data->id);
                })
                ->addColumn('Return_Date', function(Returnproduct $data) use ($Storeconfiguration){
                    return $data->Return_Date;
                })
                ->addColumn('Order_ID', function(Returnproduct $data) use ($Storeconfiguration){
                    return $Storeconfiguration->OrderIDPrefix.''.sprintf('%03d',$data->Order_ID);
                })
                ->addColumn('Docket_No', function(Returnproduct $data) use ($Storeconfiguration){
                    return $data->Docket_No;
                })
                ->addColumn('Charges', function(Returnproduct $data) use ($Storeconfiguration){
                    return $data->Charges;
                })
                ->addColumn('total', function(Returnproduct $data) use ($Storeconfiguration){
                    return round($data->total(),2);
                })
                ->addColumn('invoice', function(Returnproduct $data) use ($Storeconfiguration){
                    if($data->status == 'completed'){
                        return '<div class="action-list"><a href="' . route('admin-invoice-return',$data->id) . '"> <i class="fas fa-edit"></i>Invoice</a></div>';
                    }
                })
                ->addColumn('status', function(Returnproduct $data) use ($Storeconfiguration){
                    return $data->status;
                })
                ->addColumn('action', function(Returnproduct $data) {
                    return '<div class="action-list"><a href="' . route('admin-edit-return',$data->id) . '"> <i class="fas fa-edit"></i>View</a></div>';
                })
                ->rawColumns(['ReturnOrder_ID','Return_Date','action','Docket_No','Order_ID','Charges','invoice','status','total'])->toJson(); //--- Returning Json Data To Client Side
    }

    public function edit(Returnproduct $id){
        $order = Order::findOrFail($id->Order_ID);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$id->id)->get();
        $User = User::where('id',$id->user_id)->first();
        return view('admin.returnProduct.edit',compact('id','ReturnProductItem','User','order','Store'));
    }

    public function updatereturnstatus(Request $request){
        $Returnproduct = Returnproduct::where('id',$request->id)->first();
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$Returnproduct->id)->get();
        $Returnproduct->status = $request->value;
        $Returnproduct->update();
        $data1['msg'] = 'Status Updated.';
        $order = Order::where('id',$Returnproduct->Order_ID)->first();
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        try{
            if($request->value =="Progress"){
                    try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$order->id);
                        $data = ['flow_id'=>'Return_Request_in_Review','mobile'=>$order->getdialing(),'data'=>['order_no'=>$order_no]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                 $mailTemplates = MailTemplate::where('template_name',22)->where('status','1')->first();
            }elseif($request->value =="Pick Up Booked"){
                 $mailTemplates = MailTemplate::where('template_name',14)->where('status','1')->first();
                    try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$order->id);
                        $return_id = $Store->OrderIDPrefix.sprintf('%03d',$Returnproduct->id);
                        $data = ['flow_id'=>'Return_Pick_Up_Booked','mobile'=>$order->getdialing(),'data'=>['order_id'=>$order_no,'ref_id'=>$return_id]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
            }elseif($request->value =="Pick Up Received"){
                 $mailTemplates = MailTemplate::where('template_name',15)->where('status','1')->first();
                    try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$order->id);
                        $return_id = $Store->OrderIDPrefix.sprintf('%03d',$Returnproduct->id);
                        $data = ['flow_id'=>'Return_Pick_up_Received','mobile'=>$order->getdialing(),'data'=>['track_id'=>$order_no]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }

            }elseif($request->value =="Product Received"){
                    try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$order->id);
                        $return_id = $Store->OrderIDPrefix.sprintf('%03d',$Returnproduct->id);
                        $data = ['flow_id'=>'Return_Product_Reached','mobile'=>$order->getdialing(),'data'=>[]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                 $mailTemplates = MailTemplate::where('template_name',16)->where('status','1')->first();

            }
            elseif($request->value =="Payment in Progress"){
                 $mailTemplates = MailTemplate::where('template_name',18)->where('status','1')->first();

            }
            elseif($request->value =="completed"){
                 $mailTemplates = MailTemplate::where('template_name',17)->where('status','1')->first();

            }
            elseif($request->value == "cancel"){
                 $mailTemplates = MailTemplate::where('template_name',21)->where('status','1')->first();
            }
      $mailContents=[
        'title'=>$mailTemplates->subject_mail,
        'body'=>$mailTemplates->content_mail,
        'footer'=>$mailTemplates->footer_mail, 'Returnproduct'=>$Returnproduct,'ReturnProductItem'=>$ReturnProductItem];
            Mail::to($order->email)->bcc($mailTemplates->bcc_mail)->send(new ReturnMails($mailContents));

        } catch(\Exception $e){
            echo $e;
            $error = $e;
        }
        
        return response()->json($data1);
    }
    public function updatereturnstatusitem(Request $request){
        
        $ReturnProductItem = ReturnProductItem::where('id',$request->id)->first();
        $ReturnProductItem->Return_Status = $request->value;
        $ReturnProductItem->update();
        $Returnproduct = Returnproduct::where('id',$ReturnProductItem->returnproduct_id)->first();
        $data1['savedata'] = $Returnproduct->getdata();
        $order = Order::where('id',$Returnproduct->Order_ID)->first();
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        if($request->value =="Return Accepted"){
            $this->updateCartAcc($Returnproduct,$ReturnProductItem);
        }else{
            $this->updateCartDec($Returnproduct,$ReturnProductItem);
        }
        $data1['msg'] = 'Status Updated.';
        $History = new History();
        $History->tableid = $ReturnProductItem->id;
        $History->message = $request->value;
        $History->save();
        
        try{
            if($request->value =="Return Accepted"){
                try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$order->id);
                        $product_name = substr($ReturnProductItem->Product,0 ,10);
                        $data = ['flow_id'=>'Return_Accepted','mobile'=>$order->getdialing(),'data'=>['SKU'=>$order_no,'product_name'=>$product_name."..."]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                 $mailTemplates = MailTemplate::where('template_name',12)->where('status','1')->first();
            }elseif($request->value =="Return Declined"){
                 $mailTemplates = MailTemplate::where('template_name',13)->where('status','1')->first();

            }
    
            $mailContents=['title'=>$mailTemplates->subject_mail,'body'=>$mailTemplates->content_mail,'footer'=>$mailTemplates->footer_mail,'ReturnProductItem' =>$ReturnProductItem->id];
            Mail::to($order->email)->bcc($mailTemplates->bcc_mail)->send(new ReturnMails($mailContents));

        } catch(\Exception $e){
            // echo $e;
            // $error = $e;
        }
        
        return response()->json($data1);
    }
    public function updatepaymentstatus(Request $request){
        $ReturnProductItem = ReturnProductItem::where('id',$request->id)->first();
        $ReturnProductItem->Payment_Status = $request->value;
        $ReturnProductItem->update();
        $data1['msg'] = 'Payment Updated.';
        $History = new History();
        $History->tableid = $ReturnProductItem->id;
        $History->message = $request->value;
        $History->save();
        return response()->json($data1);
    }
    public function Docket_No(Request $request){
        $Returnproduct = Returnproduct::where('id',$request->id)->first();
        $Returnproduct->Docket_No  = $request->value;
        $Returnproduct->update();
        $data1['msg'] = 'Docket No Updated.';
        return response()->json($data1);
    }
    public function Charges(Request $request){
        $Returnproduct = Returnproduct::where('id',$request->id)->first();
        $Returnproduct->Charges  = $request->value;
        $Returnproduct->update();
        $data1['msg'] = 'Charges No Updated.';
        return response()->json($data1);
    }
        public function Other(Request $request){
        $Returnproduct = Returnproduct::where('id',$request->id)->first();
        $Returnproduct->others  = $request->value;
        $Returnproduct->update();
        $data1['msg'] = 'Updated.';
        return response()->json($data1);
    }
    
    public function history($id){
        $History = History::where('tableid',$id)->get();
        $P = "";
        foreach ($History as $key => $value) {
            $P =$P.'<p> Message : '.$value->message.', Date :'.$value->created_at.'</p>';
        }
        return $P;
    }
    
    public function invoice(Returnproduct $id){
        $order = Order::findOrFail($id->Order_ID);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        $user = User::where('id',$order->user_id)->first();
        $user = ($user?$user:null);
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$id->id)->get();
        return view('admin.returnProduct.view', compact('order','Store','items','user','ReturnProductItem','id'));
    }
    
        function updateCartDec($Returnproduct,$ReturnProductItem){
        $Order = Order::where('id',$Returnproduct->Order_ID)->first();
        $product = unserialize(bzdecompress(utf8_decode($ReturnProductItem->productobj)));
        $cartitem = unserialize(bzdecompress(utf8_decode($Order->card)));

        if(array_key_exists($product->id,$cartitem->ReturnItems)){
            $cartitem->ReturnItems[$product->id]->Returnquantity = $cartitem->ReturnItems[$product->id]->Returnquantity -1;
            if($cartitem->ReturnItems[$product->id]->Returnquantity <= 0){
                $array = $cartitem->ReturnItems;
                unset($array[$product->id]);
                $cartitem->ReturnItems = $array;
            }
            $Order->card =  utf8_encode(bzcompress(serialize($cartitem), 9));
            $Order->update();
        }

    }
    function updateCartAcc($Returnproduct,$ReturnProductItem){
        $Order = Order::where('id',$Returnproduct->Order_ID)->first();
        $product = unserialize(bzdecompress(utf8_decode($ReturnProductItem->productobj)));
        $cartitem = unserialize(bzdecompress(utf8_decode($Order->card)));

        if(empty($cartitem->ReturnItems)){
            $cartitem->ReturnItems = $this->insertitem($cartitem,$product);
            $Order->card =  utf8_encode(bzcompress(serialize($cartitem), 9));
            $Order->update();
        }else{
            if(array_key_exists($product->id,$cartitem->ReturnItems)){
                $cartitem->ReturnItems[$product->id]->Returnquantity = $cartitem->ReturnItems[$product->id]->Returnquantity + 1;
                $Order->card =  utf8_encode(bzcompress(serialize($cartitem), 9));
                $Order->update();
            }else{
                $cartitem->ReturnItems[$product->id] = clone $cartitem->items[$product->id];
                $cartitem->ReturnItems[$product->id]['Returnquantity'] = 1;
                $Order->card =  utf8_encode(bzcompress(serialize($cartitem), 9));
                $Order->update();
            }
        }
    }

    function insertitem($cartitem,$product){
        $array = [];
        $array[$product->id] = clone $cartitem->items[$product->id];
        $array[$product->id]['Returnquantity'] = 1;
        return $array;
    }
}
