<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public function index(){
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



    public function showAd($id){
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



    public function updateStatus(Request $request, $id)
{
    // تحقق من صحة القيمة المرسلة
    $request->validate([
        'status' => 'required|in:active,pending,rejected',
    ]);

    // جلب الإعلان بناءً على الـ id
    $ad = Ad::findOrFail($id);

    // تحديث الحالة
    $ad->status = $request->input('status');
    $ad->save();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'تم تحديث حالة الإعلان بنجاح');
}

}
 