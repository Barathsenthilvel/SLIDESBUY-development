<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriptionData;
    public $planData;
    public $userData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriptionData, $planData, $userData)
    {
        $this->subscriptionData = $subscriptionData;
        $this->planData = $planData;
        $this->userData = $userData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("🎉 Subscription Confirmed - Welcome to SLIDESBUY Premium!")
                    ->markdown('mails.subscription')
                    ->with([
                        'subscriptionData' => $this->subscriptionData,
                        'planData' => $this->planData,
                        'userData' => $this->userData
                    ]);
    }
}
