<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Interfaces\General\GeneralRepositoryInterface;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $generalRepo;
    public function __construct(GeneralRepositoryInterface $generalRepo)
    {
        $this->generalRepo = $generalRepo;
    }


    public function getAboutUs()
    {
        return $this->generalRepo->getAboutUs();
    }
}
