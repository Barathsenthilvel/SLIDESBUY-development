
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
                    <div style="overflow:hidden">
                        <table cellpadding="20" cellspacing="0" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td width="305">
                                        <div style="width:315px;font-family:Arial,Helvetica,sans-serif">
                                            {!! $body !!}
                                            {{-- <p><br><br><span
                                                    style="font-size:18px;padding:20px 0px 0px;color:rgb(0,83,159);font-weight:bold">
                                                    Thank you {{ $order->first_name.' '.$order->last_name }} for shopping with {{$StoreConfig->Store_Meta_Title}}</span></p> --}}
                                            <p style="margin:0px"><span
                                                    style="display:block;font-size:14px;margin-left:10px">Your Return order
                                                    number is:</span><span
                                                    style="font-size:18px;margin:10px 0px 15px 10px;color:rgb(1,1,1);font-weight:bold">#SKR{{sprintf('%03d',$id->id)}}&nbsp;
                                                    <img src="https://ci5.googleusercontent.com/proxy/cituq6Il_Boi0hWWl_qVpc5vgbMRdbcrl6gdoix91JVsgMYU-EvKcpTnethF0Ojw22CsPJpgzWeA8emUI3qz-OWGshGkartfKz2S3_3CmlUHJeEmQOAj5QomvFMtTwFHFF15o41BawFNgAtin279lSdiFA=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/tick.png"
                                                        alt="" width="19" height="20" class="CToWUd"></span></p>
                                            <p style="margin:0px"><span
                                                    style="display:block;font-size:14px;margin-left:10px">Your Return order
                                                    status:</span><span
                                                    style="font-size:18px;margin:10px 0px 15px 10px;color:rgb(1,1,1);font-weight:bold">{{$id->status}}&nbsp;
                                                    <img src="https://ci5.googleusercontent.com/proxy/cituq6Il_Boi0hWWl_qVpc5vgbMRdbcrl6gdoix91JVsgMYU-EvKcpTnethF0Ojw22CsPJpgzWeA8emUI3qz-OWGshGkartfKz2S3_3CmlUHJeEmQOAj5QomvFMtTwFHFF15o41BawFNgAtin279lSdiFA=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/tick.png"
                                                        alt="" width="19" height="20" class="CToWUd"></span></p>
                                                        {{-- @if($order->track_id != null)
                                                        <p style="margin:0px"><span
                                                    style="display:block;font-size:14px;margin-left:10px">Your Track id:</span><span
                                                    style="font-size:18px;margin:10px 0px 15px 10px;color:rgb(1,1,1);font-weight:bold"><a href="{{$order->d_s_n}}" target="_blank" rel="noreferrer">{{$order->track_id}}</a>&nbsp;</span></p>
                                                        @endif
                                            <p
                                                style="font-size:12px;border-top:1px solid rgb(204,204,204);padding-top:15px;margin-left:10px">
                                                Payment method:
                                                <br><span
                                                    style="font-weight:bold;display:block">&nbsp;&nbsp;&nbsp;&nbsp;{{$order->payment_method}}</span><br></p>
                                            <div
                                                style="border-bottom:1px solid rgb(204,204,204);padding-bottom:20px;margin-left:10px">
                                                <p style="font-size:12px;padding:0px;margin:0px;color:rgb(0,0,0);display:none">
                                                    telephone number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order->phone }}<br>
                                                </p>
                                                <p style="font-size:12px;padding:0px;margin:20px 0px 0px"><br></p>
                                            </div> --}}
                                            <div style="margin-left:10px"></div>
                                        </div>
                                    </td>
                                    {{-- <td width="282" align="right" valign="top">
                                        <div style="text-align:left;font-family:arial">
                                            <table cellpadding="0" cellspacing="0" border="0" width="282"
                                                style="font-family:Arial,Helvetica,sans-serif">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div style="width:282px">
                                                                <div style="height:7px;font-size:0px"><img
                                                                        src="https://ci6.googleusercontent.com/proxy/XvCPUXk3gIyztLI3u9iKMCNA-QJ5XXhpv7U499vgN4eOn8HotDdHYeTtaxZO2-Zpeyucry6V7oFOfHyGYhXqvTcpNhSJN5JbR_Kvjoi9Ezklm1BmGDMqSCyQxJx860nN1OQHxwdv8Q0QHQwNMCAr5lPngHLeGlnK7FRU=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/orderConfTop.gif"
                                                                        alt="" width="282" height="7" align="bottom"
                                                                        class="CToWUd"></div>
                                                                <div
                                                                    style="padding:0px 10px 7px;border-bottom:1px solid rgb(186,186,186);border-left:1px solid rgb(186,186,186);border-right:1px solid rgb(186,186,186)">
                                                                    <h2
                                                                        style="padding:0px;margin:0px;font-size:18px;font-weight:normal">
                                                                        Return Summary</h2>
                                                                </div>
                                                                <table bgcolor="#e3f4e1" cellpadding="0" cellspacing="0"
                                                                    border="0"
                                                                    style="width:100%;border-right:1px solid rgb(186,186,186);border-left:1px solid rgb(186,186,186);border-bottom:1px solid rgb(186,186,186)">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="font-family:Arial,Helvetica,sans-serif">
                                                                                <div>
                                                                                    <table cellpadding="0"
                                                                                        cellspacing="0" border="0"
                                                                                        style="margin:5px 5px 5px 10px">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="font-size:12px;padding-bottom:10px;font-family:Arial,Helvetica,sans-serif">
                                                                                                    Delivery Address:
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="font-size:14px;margin:0px">
                                                                                                    <table
                                                                                                        cellspacing="0"
                                                                                                        border="0"
                                                                                                        width="97%"
                                                                                                        style="font-size:14px;font-family:Arial,Helvetica,sans-serif">
                                                                                                        <tbody>
                                                                                                            <tr
                                                                                                                style="vertical-align:top">
                                                                                                                <td><img src="https://ci5.googleusercontent.com/proxy/cituq6Il_Boi0hWWl_qVpc5vgbMRdbcrl6gdoix91JVsgMYU-EvKcpTnethF0Ojw22CsPJpgzWeA8emUI3qz-OWGshGkartfKz2S3_3CmlUHJeEmQOAj5QomvFMtTwFHFF15o41BawFNgAtin279lSdiFA=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/tick.png"
                                                                                                                        alt=""
                                                                                                                        width="18"
                                                                                                                        height="20"
                                                                                                                        align="middle"
                                                                                                                        class="CToWUd">&nbsp;
                                                                                                                </td>
                                                                                                                <td
                                                                                                                    style="padding-left:15px;font-size:14px;font-family:Arial,Helvetica,sans-serif;word-break:break-all">
                                                                                                                    <strong>{{$order->first_name.' '.$order->last_name}}<br>
                                                                                                                            {{$order->apparment.' '.$order->street}}<br>{{$order->city.', '.$order->state.', '.$order->country}}<br>Pincode : {{$order->post_code}}<br>
                                                                                                                            Phone No : {{$order->phone}}<br>
                                                                                                                            Email : {{$order->email}}
                                                                                                                    </strong>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table><br>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table bgcolor="#e3f4e1" cellpadding="0" cellspacing="0"
                                                                    border="0"
                                                                    style="width:100%;border-right:1px solid rgb(186,186,186);border-left:1px solid rgb(186,186,186);border-bottom:1px solid rgb(186,186,186)">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="font-family:Arial,Helvetica,sans-serif">

                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div
                                                                    style="border-left:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204);font-family:Arial,Helvetica,sans-serif">
                                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                                        style="font-family:Arial,Helvetica,sans-serif;border-right:1px solid rgb(204,204,204)"
                                                                        width="281">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:14px;padding:10px">
                                                                                    No of Items:
                                                                                </td>
                                                                                <td
                                                                                    style="font-size:14px;text-align:right;padding:10px;font-family:Arial,Helvetica,sans-serif">
                                                                                    {{$cart->totalitem}}&nbsp;&nbsp;Items

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <div
                                                                                        style="border-width:0px 0px 1px;border-top-style:initial;border-right-style:initial;border-left-style:initial;border-top-color:initial;border-right-color:initial;border-left-color:initial;border-bottom-style:solid;border-bottom-color:rgb(204,204,204);height:1px;margin:0px 10px;width:95%;line-height:1px;font-size:0px">
                                                                                        &nbsp;</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="150"
                                                                                    style="font-size:14px;width:150px;padding:10px 0px 0px 10px;font-family:Arial,Helvetica,sans-serif">
                                                                                    (+) Guide price:
                                                                                </td>
                                                                                <td width="110"
                                                                                    style="font-size:14px;width:110px;text-align:right;padding:10px 10px 0px;font-family:Arial,Helvetica,sans-serif">
                                                                                    {{$cart->totalPrice}}</td>
                                                                            </tr>
                                                                            @if ($cart->deliverycharge != 0)
                                                                                <tr>
                                                                                    <td
                                                                                        style="width:150px;padding:10px 0px 0px 10px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
                                                                                    (+) Delivery :
                                                                                    </td>
                                                                                    <td
                                                                                        style="width:110px;text-align:right;padding:10px 10px 0px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
                                                                                        {{$cart->deliverycharge}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @if ($cart->deliverycharge != 0)
                                                                                <tr>
                                                                                    <td
                                                                                        style="width:150px;padding:10px 0px 0px 10px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
                                                                                    (+) Tax : <br><small>({{($cart->storeConfig->include_tax == "Exclusive")?'Exclusive':'Inclusive'}})</small>
                                                                                    </td>
                                                                                    <td
                                                                                        style="width:110px;text-align:right;padding:10px 10px 0px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
                                                                                        {{$cart->tax}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <div
                                                                                        style="border-width:0px 0px 1px;border-top-style:initial;border-right-style:initial;border-left-style:initial;border-top-color:initial;border-right-color:initial;border-left-color:initial;border-bottom-style:solid;border-bottom-color:rgb(204,204,204);height:1px;margin:10px 10px 0px;width:95%;line-height:1px;font-size:0px">
                                                                                        &nbsp;</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="width:150px;font-size:14px;padding:10px 0px 10px 10px;font-family:Arial,Helvetica,sans-serif">
                                                                                    <strong>Total : </strong></td>
                                                                                <td
                                                                                    style="width:110px;text-align:right;margin:0px;font-size:14px;padding:10px;font-family:Arial,Helvetica,sans-serif">
                                                                                    <strong>{{$cart->grandTotal}}</strong></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div style="height:7px;font-size:0px"><img
                                                                        src="https://ci5.googleusercontent.com/proxy/pIz0cwBaqooMKTc4Nk0UO84unxvOaREL_Z-HPnLqT83k563zfciEqcdDwfjesYxVDttm0uiJNRk1ZpkuOL4_WFm-kyk9Y0ZGuiolvvLnzpG8e_QrgaxPl8vhIuBJaWDweW164XYLNuar-ggiJQn-9u4z1FHERot6AeswgDvT=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/orderConfBottom.gif"
                                                                        alt="" width="282" height="7" align="bottom"
                                                                        class="CToWUd"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                                                        {{($item->Return_Status)?$item->Return_Status:'N/A'}}</td>
                                                        <!--<td-->
                                                        <!--style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:5px 5px 5px 12px;border-right:1px solid rgb(204,204,204);border-bottom:1px solid rgb(204,204,204)">-->
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
                    <table cellpadding="0" cellspacing="0" border="0" width="100%"
                        style="border-bottom:1px solid rgb(204,204,204)">
                        <tbody>
                            <tr>
                                <td style="padding:10px 20px 20px;font-family:Arial,Helvetica,sans-serif">
                                    <div style="clear:both">

                                            {!! $footer !!}

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody>
                            <tr>
                                <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;background: #222;">
                                    <p style="margin-top:-29px;padding:0px;text-align: center;color:#fff">

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
