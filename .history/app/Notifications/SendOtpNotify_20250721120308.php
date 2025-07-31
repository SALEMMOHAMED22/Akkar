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
            ->greeting('otp code')
            ->line('Verify your code.')
            ->line('Code : ' .$otp->token);
    }

 
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
