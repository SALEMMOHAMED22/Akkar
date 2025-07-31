<?php

namespace App\Interfaces\Profile;

interface ProfileInterface
{
    public function updateProfile(array $data);
    public function emailNotification(string );

}
