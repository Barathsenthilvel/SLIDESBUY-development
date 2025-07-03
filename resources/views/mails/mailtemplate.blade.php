
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
<p>{!!$body!!}<span style="font-weight: bold;"><br>username is {!!$username!!}<br><br>Password is {!!$password!!}</span></p>
<p><a href="{{route('admin.login')}}" target="_blank">Admin Login</a></p>
{!!$footer!!}

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
This is an email from {!!$StoreConfig->Store_Meta_Title!!}
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
