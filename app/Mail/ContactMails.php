<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMails extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data;
    public $subject;
    public $footer;
    public $body;
    public $customerName;
    public $customerMessage;
    public $userDisplayName;
    public $isLoggedIn;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailContents)
    {
        $this->mail_data = $mailContents;
        $this->subject = $mailContents['title'] ?? 'Thank You for Contacting Us';
        $this->footer = $mailContents['footer'] ?? 'Best regards, SLIDESBUY Team';
        $this->body = $mailContents['body'] ?? 'Thank you for contacting us. We have received your message and will get back to you soon.';
        $this->customerName = $mailContents['customerName'] ?? 'Customer';
        $this->customerMessage = $mailContents['customerMessage'] ?? '';
        $this->userDisplayName = $mailContents['userDisplayName'] ?? 'Customer';
        $this->isLoggedIn = $mailContents['isLoggedIn'] ?? false;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('mails.contact-thank')
                    ->with([
                        'mail_data' => $this->mail_data,
                        'footer' => $this->footer,
                        'body' => $this->body,
                        'customerName' => $this->customerName,
                        'customerMessage' => $this->customerMessage,
                        'userDisplayName' => $this->userDisplayName,
                        'isLoggedIn' => $this->isLoggedIn
                    ]);
    }
}
