<?php
use App\Models\Otp;

if (! function_exists('apiResponse')) {
    function apiResponse($status, $message, $data = null)
    {
        $response =  [
            'status' => $status,
            'message' => $message,

        ];
        if ($data) {
            $response['data'] = $data;
        };

        return response()->json($response, $status);
    }




}

if (! function_exists('sendOtp')) {
    function sendOtp($email)
    {   
        $randOtp = rand(1000,9999);

        $otp = Otp::create([
            'email' => $email,
            'otp' => $randOtp,
            'valid' => 1,
        ]);

        

        return $randOtp;

    }
}


