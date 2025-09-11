<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Property\PropertyRepositoryInterface;

class PropertyController extends Controller
{
    public $propertyRepo;
    public function __construct(PropertyRepositoryInterface $propertyRepo)
    {
        $this->propertyRepo = $propertyRepo;
    }



    
}
