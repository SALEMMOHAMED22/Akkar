<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdRejectedMail;
use Illuminate\Support\Facades\Mail;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'user',
            'images',
            'userWorks',
            'adFiles',
            'reviews',
        ])->latest()->paginate(9);

        return view('dashboard.ads.index', compact('ads'));
    }

    public function showAd($id)
    {
        $ad = Ad::with([
            'adCategory',
            'adSubCategory',
            'adSubSubCategory',
            'user',
            'images',
            'userWorks',
            'adFiles',
            'reviews.user',
        ])->findOrFail($id);

        return view('dashboard.ads.show', compact('ad'));
    }


    public function createAd()
    {
        return view('dashboard.ads.create');
    }
    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|in:approved,pending,rejected',
        ]);


        $ad = Ad::findOrFail($id);

        $ad->status = $request->input('status');
        $ad->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الإعلان بنجاح');
    }

    public function AdStore(Request $request)
    {
        return  $request;
    }

    public function reject(Request $request, $id)
    {

        return $request;
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $ad = Ad::findOrFail($id);
        $ad->status = 'rejected';
        $ad->save();

        $user_email = $ad->user->email_notification ? $ad->user->email_notification : $ad->user->email;
       
         Mail::to($user_email)->send(new AdRejectedMail($ad, $reason));
         
        return redirect()->route('dashboard.ads.show', $id)
            ->with('success', 'تم رفض الإعلان وإرسال السبب للمستخدم.');
    }
}
