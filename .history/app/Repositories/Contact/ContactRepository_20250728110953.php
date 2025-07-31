<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Interfaces\Contact\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
   

    public function contactStore(array $data)
    {
      
        $contact = Contact::create($data);


        if(<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
        </body>
        </html>$contact){
            return $contact;
        }
    }
}
