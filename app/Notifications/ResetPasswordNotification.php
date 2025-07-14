<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Reset Your Password') // 🔸 Custom Subject
            ->greeting('Hello ' . $notifiable->name . ',') // 🔸 Optional
            ->line('We received a request to reset your password.') // 🔸 Custom Message
            ->action('Click here to reset your password', $resetUrl) // 🔸 Custom Button text
            ->line('If you didn’t request a password reset, no further action is required.') // 🔸 Extra line
            ->salutation('Regards, Your App Team'); // 🔸 Closing
    }

//     public function toMail($notifiable)
// {
//     return (new MailMessage)
//         ->view('mails.password_reset', [
//             'resetUrl' => $this->resetUrl($notifiable),
//             'user' => $notifiable,
//         ]);
// }

// protected function resetUrl($notifiable)
// {
//     return url(route('password.reset', [
//         'token' => $this->token,
//         'email' => $notifiable->getEmailForPasswordReset(),
//     ], false));
// }

}


