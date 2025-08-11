<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
