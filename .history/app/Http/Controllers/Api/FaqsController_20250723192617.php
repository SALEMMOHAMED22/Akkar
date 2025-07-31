<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public $faqsrepo;
    public function __construct(FaqRepositoryInterface $faqsrepo)
    {
        $this->faqsrepo = $faqsrepo;
    }
}
