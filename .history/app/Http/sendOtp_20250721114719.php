
<?php

use App\Models\Otp;

if (! function_exists('sendOtp')) {
    function sendOtp($email)
    {   
        $randOtp = rand(1000,9999);

        $otp = Otp::create([
            'email' => $email,
            'otp' => $randOtp,
            'valid' => 
        ]);
        



    }
}
