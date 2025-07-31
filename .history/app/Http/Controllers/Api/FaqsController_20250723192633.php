<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\FaqsRepositoryInterface;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public $faqsrepo;
    public function __construct(FaqsRepositoryInterface $faqsrepo)
    {
        $this->faqsrepo = $faqsrepo;
    }
}
