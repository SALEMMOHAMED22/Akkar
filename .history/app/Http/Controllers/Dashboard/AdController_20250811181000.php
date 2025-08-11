<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


    public function createAd(){
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

    public function 
}
