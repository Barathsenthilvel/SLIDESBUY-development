
<table border="0" cellpadding="0" cellspacing="0" width="700" style="border:1px solid rgb(181,182,178)">
<tbody>
<tr>
<td>
<div style="width:700px;font-family:Arial,Helvetica,sans-serif;">
 <div style="overflow:hidden;border-bottom:4px solid rgb(0,0,0);zoom:1">
                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center" style="background-color: #f3ecee;margin-right:10px">
                                        <a href="{{route('front.index')}}" rel="noreferrer">
                                            <img src="{{URL::asset('assets/media/banner/'.$StoreConfig->invert_logo)}}" border="0"  style="width: 128px;height: 80px; display:block; margin:0 auto;">
                                        </a>
                                    </td>
                                </tr>
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
<h3 style="color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px;">
    New Contact Form Submission
</h3>

<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
    <p style="margin: 0 0 15px 0; font-size: 16px;">
        <strong style="color: #007bff;">Name:</strong>
        <span style="color: #333;">{{$name}}</span>
    </p>

    <p style="margin: 0 0 15px 0; font-size: 16px;">
        <strong style="color: #007bff;">Email:</strong>
        <span style="color: #333;">{{$email}}</span>
    </p>

    <p style="margin: 0 0 15px 0; font-size: 16px;">
        <strong style="color: #007bff;">User Status:</strong>
        <span style="color: #333;">{{ isset($isLoggedIn) && $isLoggedIn ? 'Logged In User' : 'Guest User' }}</span>
    </p>

    @if(isset($userDisplayName) && $userDisplayName != 'Customer')
    <p style="margin: 0 0 15px 0; font-size: 16px;">
        <strong style="color: #007bff;">Username:</strong>
        <span style="color: #333;">{{$userDisplayName}}</span>
    </p>
    @endif

    <p style="margin: 0; font-size: 16px;">
        <strong style="color: #007bff;">Message:</strong>
    </p>
    <div style="background-color: white; padding: 15px; border-left: 4px solid #007bff; margin-top: 10px; border-radius: 4px;">
        <p style="margin: 0; color: #333; line-height: 1.6;">{{$form_message}}</p>
    </div>
</div>

<p style="font-size: 14px; color: #666; margin-top: 20px;">
    <strong>Note:</strong> This is a new contact form submission that requires your attention.
</p>
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
