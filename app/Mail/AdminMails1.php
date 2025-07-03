<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMails1 extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailContents)
    {
        $this->mail_data = $mailContents;
        $this->subject = $mailContents['title'];
        $this->body = $mailContents['body'];
        $this->password = $mailContents['password'];
        $this->footer = $mailContents['footer'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mails.mailtemplate1')->with(['body'=>$this->body,'password'=>$this->password,'footer'=>$this->footer]);
    }
}
