<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Interfaces\Contact\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
   

    public function contactStore(array $data)
    {
      
        $contact = Contact::create($data);


        if(!$contact){
            return false;
        }

        return $contact;
    }
}
