<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = AdCategory
        return view('dashboard.categories.index');
    }
}
