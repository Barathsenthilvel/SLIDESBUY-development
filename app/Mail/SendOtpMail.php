<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $userName;

    public function __construct($otp, $userName = null)
    {
        $this->otp = $otp;
        $this->userName = $userName;
    }

    public function build()
    {
        return $this->from('noreply@slidesbuy.com', 'Slidesbuy')
                    ->subject('Your OTP Code - Slidesbuy')
                    ->view('mails.otp')
                    ->with(['userName' => $this->userName]);
    }
}
