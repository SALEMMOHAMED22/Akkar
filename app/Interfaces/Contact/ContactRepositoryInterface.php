<?php

namespace App\Interfaces\Contact;

interface ContactRepositoryInterface
{
    public function contactStore(array $data);
}
