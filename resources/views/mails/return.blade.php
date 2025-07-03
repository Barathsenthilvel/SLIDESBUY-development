<table border="0" cellpadding="0" cellspacing="0" width="700" style="border:1px solid rgb(181,182,178)">
    <tbody>
    <tr>
    <td>
    <div style="width:700px;font-family:Arial,Helvetica,sans-serif;">
     <div style="overflow:hidden;border-bottom:4px solid rgb(0,0,0);zoom:1">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="background-color: #f3ecee;margin-right:10px"><a
                                                href="{{route('front.index')}}"
                                                rel="noreferrer"><img
                                                    src="{{URL::asset('assets/media/banner/'.$StoreConfig->invert_logo)}}"
                                                     border="0"  style="width: 128px;height: 80px;"></a></td>
                                </tbody>
                            </table>
                        </div>

    <div>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" width="100%"
    style="border-bottom:1px solid rgb(204,204,204)">
    <tbody>
    <tr>
    <td style="padding:10px 20px 20px;font-family:Arial,Helvetica,sans-serif">
    <div style="clear:both">
    {!! $body !!}
    <div>
        <table cellpadding="0" cellspacing="0" border="0" width="685"
            style="border:1px solid rgb(204,204,204);font-family:Arial,Helvetica,sans-serif;margin-left:5px">
            <tbody>
                <tr>
                    <td
                        style="background-image:url(&quot;https://ci4.googleusercontent.com/proxy/sGO-WhgiOFUXw6spOT6ChN75i7PbIn_Cv-KRB-l0uWe0tVKTzBAWKWdwfVR76zLwdCf6rVuMCJLvvq7ibHcCPYpe1IuLTUqTCzqsC69ukL1x7KOo3lcfF8NXbol_Lh95rw790iL46Sd5E6-rgaydcvqr31sDBOOVgZ4tjHzhQ70=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/orderItemsHdBgTop.jpg&quot;);background-repeat:repeat-x;background-position:0% 100%;border-bottom:1px solid rgb(204,204,204);padding:10px">
                        <h2 style="margin:0px;font-weight:normal;font-size:14px">Your Return items</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0" style="width:685px">
                            <tbody>
                                <tr>
                                    <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        Images</td>
                                    <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        Product</td>
                                        <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-bottom:1px solid rgb(204,204,204)">
                                        Price<span style="color:rgb(255,0,0)">*</span></td>
                                    <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        GST</td>
                                        <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        Total</td>
                                        <td
                                        style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        Return Status</td>
                                        <!--<td-->
                                        <!--style="background-color:rgb(232,243,255);font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">-->
                                        <!--Payment Status</td>-->

                                </tr>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($ReturnProductItem as $item )
                                @php
                                $product = unserialize(bzdecompress(utf8_decode($item->productobj)));
                                if($item->Return_Status != 'Return Declined'){
                                    $total += $item->Total;
                                }
                                @endphp
                                <tr>
                                    <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        <img src="{{URL::asset('/assets/media/products/'.$product->image1)}}" class="img-responsive" alt="slider2" style="width: 50px;"></td>
                                    <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        {{mb_strlen($item->Product,'utf-8') > 30 ? mb_substr($item->Product,0,30,'utf-8').'...' : $item->Product}}</td>
                                        <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        {{$item->Price}}</td>
                                    <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        {{$item->GST}}</td>
                                    <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        {{round($item->Total)}}</td>
                                        <td
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">
                                        {{($item->Return_Status != null)?$item->Return_Status:'N/A'}}</td>
                                        <!--<td-->
                                        <!--style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-bottom:1px solid rgb(204,204,204)">-->
                                        <!--{{$item->Payment_Status}}</td>-->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {!! $footer !!}

    </div>
    </td>
    </tr>
    </tbody>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tbody>
    <tr>
    <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;background: #222;" height="75">
    <p style="text-align: center;color:#fff">

    This is an email from {{$StoreConfig->Store_Meta_Title}}
    </p>
    <p style="margin-top:-29px;padding:0px;text-align: center;color:#fff">
                                            <a><img src="https://img.icons8.com/color/40/000000/twitter--v1.png"/></a>
                                            <a><img src="https://img.icons8.com/color/40/000000/instagram-new--v1.png"/></a>
                                            <a><img src="https://img.icons8.com/color/40/000000/facebook.png"/></a>
                                            <a><img src="https://img.icons8.com/color/40/000000/pinterest--v1.png"/></a>
                                        </p>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </td>
    </tr>
    </tbody>
    </table>
