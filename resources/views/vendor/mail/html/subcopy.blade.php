
@php echo $mails; die; @endphp
@switch($mails)
@case (3)
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tbody>
    <tr>
    <td width="305">
    <div style="width:315px;font-family:Arial,Helvetica,sans-serif">
    <p><br><br><span style="font-size:18px;padding:20px 0px 0px;color:rgb(0,83,159);font-weight:bold">
    Thank you {{ $order->first_name.' '.$order->last_name }} for shopping with {{$StoreConfig->Store_Meta_Title}}</span></p>
    <p style="margin:0px"><span style="display:block;font-size:14px;margin-left:10px">Your order
    number is:</span><br><span
    style="font-size:18px;margin:10px 0px 15px 10px;color:rgb(1,1,1);font-weight:bold">#{{$StoreConfig->OrderIDPrefix}}{{$order->id}}&nbsp;
    <img src="https://ci5.googleusercontent.com/proxy/cituq6Il_Boi0hWWl_qVpc5vgbMRdbcrl6gdoix91JVsgMYU-EvKcpTnethF0Ojw22CsPJpgzWeA8emUI3qz-OWGshGkartfKz2S3_3CmlUHJeEmQOAj5QomvFMtTwFHFF15o41BawFNgAtin279lSdiFA=s0-d-e1-ft#https://secure.ap-tescoassets.com/UIAssets/MY/grocery/default/i/email/orderConfirmation/tick.png"
    alt="" width="19" height="20" class="CToWUd"></span></p>
    <p
    style="font-size:12px;border-top:1px solid rgb(204,204,204);padding-top:15px;margin-left:10px">
    Payment method:
    <br><span
    style="font-weight:bold;display:block">&nbsp;&nbsp;&nbsp;&nbsp;{{$order->payment_method}}</span><br></p>
    <div
    style="border-bottom:1px solid rgb(204,204,204);padding-bottom:20px;margin-left:10px">
    <p style="font-size:12px;padding:0px;margin:0px;color:rgb(0,0,0)">
    telephone number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order->phone }}<br>
    </p>
    <p style="font-size:12px;padding:0px;margin:20px 0px 0px"><br></p>
    </div>
    <div style="margin-left:10px"></div>
    </div>
    </td>
    <td width="282" align="right" valign="top">
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
    Order Summary</h2>
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
    <strong>{{ $order->apparment != "" ? $order->apparment.' ':''}}
    {{ $order->street != "" ? $order->street.' ':''}}
    {{ $order->city != "" ? $order->city.' ':''}}
    {{ $order->state != "" ? $order->state.' ':''}}<br>
    {{ $order->post_code != "" ? 'post code '.$order->post_code.' ':''}}<br>
    {{ $order->phone != "" ? "Phone no ".$order->phone.' ':''}}<br>
    {{ $order->email != "" ? "Email ".$order->email.'  ':''}}<br>
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
    Guide price: <span
    style="color:rgb(255,0,0)">*</span>
    </td>
    <td width="110"
    style="font-size:14px;width:110px;text-align:right;padding:10px 10px 0px;font-family:Arial,Helvetica,sans-serif">
    {{$cart->totalPrice}}</td>
    </tr>
    @if ($cart->deliverycharge != 0)
    <tr>
    <td
    style="width:150px;padding:10px 0px 0px 10px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
    Delivery:<span
    style="color:rgb(255,0,0)">*</span>
    </td>
    <td
    style="width:110px;text-align:right;padding:10px 10px 0px;font-size:14px;font-family:Arial,Helvetica,sans-serif">
    {{$cart->deliverycharge}}</td>
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
    <strong>Total:</strong></td>
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
    </td>
    </tr>
    </tbody>
    </table>
@break
@endswitch    

