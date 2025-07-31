<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Interfaces\Contact\ContactRepositoryInterface;

class ContactController extends Controller
{
    protected $contactRepo;
    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }


    public function contactStore(ContactRequest $request)  {

      $contact = $this->contactRepo->contactStore($request->validated());

      if(!$contact){
        return apiResponse(400, 'Contact not created');
      }

      return apiResponse(200, 'Contact created successfully', new ContactResource($contact));
    }



}
