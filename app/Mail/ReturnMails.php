<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ReturnProductItem;

class ReturnMails extends Mailable
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
        $this->orderTEmplate = (isset($mailContents['Returnproduct']))?true:false;
        $this->Returnproduct = (isset($mailContents['Returnproduct']))?$mailContents['Returnproduct']:false;
        $this->ReturnProductItemID = (isset($mailContents['ReturnProductItem']))?$mailContents['ReturnProductItem']:0;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->orderTEmplate){
            $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$this->Returnproduct->id)->get();
            return $this->subject($this->subject)->markdown('mails.return2')->with(['mail_data'=>$this->mail_data,'footer'=>$this->footer,'body'=>$this->body,'id'=>$this->Returnproduct, 'ReturnProductItem'=>$ReturnProductItem]);
        }
        $ReturnProductItem = ReturnProductItem::where('id',$this->ReturnProductItemID)->get();
        return $this->subject($this->subject)->markdown('mails.return')->with(['mail_data'=>$this->mail_data,'footer'=>$this->footer,'body'=>$this->body,'ReturnProductItem'=>$ReturnProductItem]);
    }
}
