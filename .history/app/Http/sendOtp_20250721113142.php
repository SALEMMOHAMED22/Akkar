
<?php


if (! function_exists('sendOtp')) {
    function sendOtp($status, $message, $data = null)
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
