<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMails extends Mailable
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
        $this->footer = $mailContents['footer'];
        $this->body = $mailContents['body'];
        $this->customerName = $mailContents['customerName'];
        $this->customerMessage = $mailContents['customerMessage'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mails.thank')->with(['mail_data'=>$this->mail_data,'footer'=>$this->footer,'body'=>$this->body,'customerName'=>$this->customerName,'customerMessage'=>$this->customerMessage]);
    }
}
