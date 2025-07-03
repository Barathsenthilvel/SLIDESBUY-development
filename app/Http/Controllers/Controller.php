<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Cart;
use App\Models\Order;

use App\Models\Vendor;

use App\Models\Storeconfiguration;
use Illuminate\Support\Facades\Mail;
use App\Models\MailTemplate;
use App\Mail\OrderMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $flow_id = [
        'Order_Placed'=>'61c484398ce4c8282b4488d4',
        'Order_Confirmed'=>'61c484bacba4843dc313470b',
        'Order_Shipped'=>'61c485b40b6d73614a5907b8',
        'Order_Delivered'=>'61c486ac2241ee66ec37ab13',
        'Order_Canceled'=>'61c4874e01cae0609b371b62',
        'Order_Failed'=>'61c487b8d6a76a3b8e2f9848',
        'Return_Booked'=>'61c4887da461bb0435326f55',
        'Return_Accepted'=>'61c4896e888cea7eec213955',
        'Return_Request_in_Review'=>'61c48ae4c4faf5743e6eaa9f',
        'Return_Product_Reached'=>'61c48b9dc5bdba252a156ce5',
        'One_Time_Password'=>'6200b10f691cf72a66242ed8',
        'Return_Pick_Up_Booked'=>'6232df8664e35e615f538532',
        'Return_Pick_up_Received'=>'6232e002709ee1293c4159b5',
    ];
    public function singlesentMail($order,$template_name){
        try{
                    $cart = unserialize(bzdecompress(utf8_decode($order->card)));
                    if(empty($cart->singleorder[0]->vendor)) return;
                    $cart->items = [];
                    $cart->items = $cart->singleorder;
                    $Vendor = Vendor::where('id',$cart->singleorder[0]->vendor)->first();
                    
                    $mailTemplates = MailTemplate::where('template_name',$template_name)->first();
                    $mailContents=[
                        'title'=>$mailTemplates->subject_mail,
                        'body'=>$mailTemplates->content_mail,
                        'footer'=>$mailTemplates->footer_mail];
                        
                    $mailData = Mail::to($Vendor->email)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($order,$cart,$mailContents,false));
                } catch(\Exception $e){
                    dd($e);
                    $error = $e;
                }
    }
    public function singlesentMailcustomer($order,$template_name){
        try{
                    $cart = unserialize(bzdecompress(utf8_decode($order->card)));
                    // if(empty($cart->singleorder[0]->vendor)) return;
                    $cart->items = [];
                    $cart->items = $cart->singleorder;
                    $Vendor = Vendor::where('id',$cart->singleorder[0]->vendor)->first();
                    
                    $mailTemplates = MailTemplate::where('template_name',$template_name)->first();
                    $mailContents=[
                        'title'=>$mailTemplates->subject_mail,
                        'body'=>$mailTemplates->content_mail,
                        'footer'=>$mailTemplates->footer_mail];
                    $mailData = Mail::to($order->email)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($order,$cart,$mailContents,false));
                } catch(\Exception $e){
                    // dd($e);
                    $error = $e;
                }
    }
    public function SentEmail(Order $Order = null,$template_name){
        if($Order == null) return;
        $store = Storeconfiguration::where('id',1)->first();
        $cart = unserialize(bzdecompress(utf8_decode($Order->card)));
        $items = $cart->items;
        $vendor = [];
        foreach($items as $item){
            if($item->vendor){
                $vendor[$item->vendor][$item->id] = $item;
            }
        }
        foreach($vendor as $key => $items){
            $Vendor = Vendor::where('id',$key)->first();
            $cart->items = [];
            $cart->items = $vendor[$key];
            // dd($vendor);
                try{
                    
                    $mailTemplates = MailTemplate::where('template_name',$template_name)->first();
                    $mailContents=[
                        'title'=>$mailTemplates->subject_mail,
                        'body'=>$mailTemplates->content_mail,
                        'footer'=>$mailTemplates->footer_mail];
                    $mailData = Mail::to($Vendor->email)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($Order,$cart,$mailContents,false));
                } catch(\Exception $e){
                    $error = $e;
                }
        }
        
    }
    public function sentAdminMail(Order $Order = null,$template_name){
        if($Order == null) return;
        
        $cart = unserialize(bzdecompress(utf8_decode($Order->card)));
        $store = Storeconfiguration::where('id',1)->first();
        $email = json_decode($store->Order_Emails_To);
        
        foreach($email as $Email){
            try{
                $mailTemplates = MailTemplate::where('template_name',$template_name)->first();
                $mailContents=['title'=>$mailTemplates->subject_mail,'body'=>$mailTemplates->content_mail,'footer'=>$mailTemplates->footer_mail];
                Mail::to($Email->value)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($Order,$cart,$mailContents,true));
            }catch(\Exception $e){
                $error = $e;
            }
        }
        
    }
    public function sentSingleAdminMail(Order $Order = null,$template_name){
        if($Order == null) return;
        
        $cart = unserialize(bzdecompress(utf8_decode($Order->card)));
        $cart->items = [];
        $cart->items = $cart->singleorder;
        $store = Storeconfiguration::where('id',1)->first();
        $email = json_decode($store->Order_Emails_To);
        $mailTemplates = MailTemplate::where('template_name',$template_name)->first();
        $mailContents=['title'=>$mailTemplates->subject_mail,'body'=>$mailTemplates->content_mail,'footer'=>$mailTemplates->footer_mail];
        
        foreach($email as $Email){
            try{
                Mail::to($Email->value)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($Order,$cart,$mailContents,false));
            }catch(\Exception $e){
                $error = $e;
            }
        }
        
    }
    public function sentsms($data){
        return true;
        $body = $this->generayebody($data);
        // dd($this->generayebody($data));
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_HTTPHEADER => [
            "authkey: 370935A5r9YzHLdL61c177e6P1",
            "content-type: application/JSON"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

    function generayebody($data){
        $body = ['flow_id'=>$this->flow_id[$data['flow_id']],'mobiles'=>$data['mobile']];
        foreach ($data['data'] as $key => $value) {
            $body[$key] = $value;
        }
        return \json_encode($body);
    }
}
