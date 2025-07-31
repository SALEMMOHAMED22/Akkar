<?php

namespace App\Repositories;

use App\Models\Faq;

class FaqsRepository implements FaqsRepositoryInterface
{
   
    public function getFaqs(){
        $faqs = Faq::all();
        if(!$faqs){
            return fa
        }
        return $faqs;
    }
}
