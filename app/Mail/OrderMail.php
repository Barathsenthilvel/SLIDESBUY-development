<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$cart,$mailContents,$is_full = true)
    {

        $this->mail_data = $mailContents;
        $this->subject = $mailContents['title'];
        $this->footer = $mailContents['footer'];
        $this->body = $mailContents['body'];
        $this->order = $order;
        $this->cart = $cart;
        $this->is_full = $is_full;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->subject($this->subject)->markdown('mails.Order')->with(['body'=>$this->body,'order'=>$this->order,'cart'=>$this->cart,'mails'=>'3','footer'=>$this->footer,'is_full'=>$this->is_full]);
    }
}
