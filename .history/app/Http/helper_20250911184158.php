<?php

use App\Models\Otp;
use App\Models\Subscription;
use App\Models\SubscriptionLimit;

if (! function_exists('apiResponse')) {
    function apiResponse($status = 200, $message, $data = null, $pagination = null)
    {
        $response = [
            'code'    => $status,
            'message' => $message,
            'data'    => $data,
        ];

        if ($pagination) {
            $response['pagination'] = $pagination;
        }

        return response()->json($response, $status);
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





if (!function_exists('subscription_check')) {
    
    function subscription_check(int $userId, string $feature, int $qty = 1): array
    {
    // هات الاشتراك النشط
        $sub = Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->first();

        if (!$sub) {
            return ['ok' => false, 'remaining' => 0, 'reason' => 'no_active_subscription'];
        }

        // limits row
        $limits = SubscriptionLimit::where('subscription_id', $sub->id)->first();
        if (!$limits) {
            return ['ok' => false, 'remaining' => 0, 'reason' => 'limits_missing'];
        }

        switch ($feature) {
            case 'video':
                $ok = (bool) $limits->video_enabled;
                return ['ok' => $ok, 'remaining' => null, 'reason' => $ok ? null : 'not_enabled'];

            case 'ads':
                $limit = $limits->ads_limit;                 // null = غير محدود
                $used  = (int) $limits->ads_used;
                if (is_null($limit)) return ['ok' => true, 'remaining' => null, 'reason' => null];
                $remaining = max(0, $limit - $used);
                return ['ok' => ($qty <= $remaining), 'remaining' => $remaining, 'reason' => ($qty <= $remaining ? null : 'limit_exceeded')];

            case 'vr':
                $limit = (int) $limits->vr_tours_limit;      // رقم صريح
                $used  = (int) $limits->vr_tours_used;
                $remaining = max(0, $limit - $used);
                return ['ok' => ($qty <= $remaining), 'remaining' => $remaining, 'reason' => ($qty <= $remaining ? null : 'limit_exceeded')];

            default:
                return ['ok' => false, 'remaining' => 0, 'reason' => 'feature_not_supported'];
        }
    }
}

if (!function_exists('subscription_can')) {
    /**
     * نسخة مختصرة تُعيد true/false فقط.
     */
    function subscription_can(int $userId, string $feature, int $qty = 1): bool
    {
        return subscription_check($userId, $feature, $qty)['ok'] ?? false;
    }
}
