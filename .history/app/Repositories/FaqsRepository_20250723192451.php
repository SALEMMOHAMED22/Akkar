<?php

namespace App\Repositories;

class FaqsRepository implements FaqsRepositoryInterface
{
   
    public function getFaqs(){
        $faqs = Faq::all();
        return $faqs;
    }
}
