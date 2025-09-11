
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