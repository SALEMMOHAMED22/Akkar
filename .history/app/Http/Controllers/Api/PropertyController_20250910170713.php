<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public $property;
    public function __construct()
    {
        $this->property = new \App\Models\Property();
    }
}
