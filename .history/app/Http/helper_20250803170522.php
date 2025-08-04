<?php

use App\Models\Otp;

if (! function_exists('apiResponse')) {
    function apiResponse($status = 200 , $message, $data = null , $pagination = null)
    {
         $response = [
            'code'    => $status,
            'message' => $message,
            'data'    => $data,
        ];

        if ($pagination) {
            $response['pagination'] = $pagination;
        }

        return response()->json($response,$status);
    }
}
if (! function_exists('sendOtp')) {
    function sendOtp($email)
    {
        $randOtp = rand(1000, 9999);

        $otp = Otp::create([
            'identifier' => $email,
            'code' => $randOtp,
            'valid' => 1,
        ]);



        return $otp->code;
    }
}
