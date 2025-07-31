<?php

namespace App\Repositories\Contact;

use App\Interfaces\Contact\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
   

    public function contactStore(array $data)
    {
        $contact = new Contact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->subject = $data['subject'];
        $contact->message = $data['message'];
        $contact->save();
    }
}
