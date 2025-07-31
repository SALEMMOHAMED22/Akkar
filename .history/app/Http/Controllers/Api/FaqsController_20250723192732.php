<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\FaqsRepositoryInterface;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public $faqsRepo;
    public function __construct(FaqsRepositoryInterface $faqsRepo)
    {
        $this->faqsRepo = $faqsRepo;
    }


    public function getFaqs()
    {
        $faqs = $this->faqsRepo->getFaqs();
        if (!$faqs) {
            return apiResponse(404, 'Faqs not found');
        }
        return $faqs;
    }
}
