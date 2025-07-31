<?php

use App\Models\Otp;

if (! function_exists('apiResponse')) {
    function apiResponse($status, $message, $data = null , $pagination = null)
    {
         $response = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,
        ];

        if ($pagination) {
            $response['pagination'] = $pagination;
        }

        return response()->json($response,$status);
    }
}
static function sendResponse($code = 200, $message = null, $data = null, $pagination = null)
    {
        $response = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,
        ];

        if ($pagination) {
            $response['pagination'] = $pagination;
        }

        return response()->json($response, $code);
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



        return $randOtp;
    }
}
