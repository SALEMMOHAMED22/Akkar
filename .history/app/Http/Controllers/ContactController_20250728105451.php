<?php

namespace App\Http\Controllers;

use App\Interfaces\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        
    }
}
