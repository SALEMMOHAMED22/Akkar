<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kenkioko\OTP\Models\OTP;

class SendOtpNotify extends Notification
{
    use Queueable;

   public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

   
    public function toMail(object $notifiable): MailMessage
    {
        
     $otp =  sendOtp($this->email);
            // dd($otp);
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

 
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
