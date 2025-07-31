<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Interfaces\FaqsRepositoryInterface;

class FaqsRepository implements FaqsRepositoryInterface
{
   
    public function getFaqs(){
        $faqs = Faq::all();
        if(!$faqs){
            return false;
        }
        return $faqs;
    }
}
