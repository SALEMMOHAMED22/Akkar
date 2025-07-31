<?php

namespace App\Interfaces\Profile;

interface ProfileInterface
{
    public function updateProfile(array $data);
    public function emailNotification(string $email);
    public function identifiesStore(array $data);
    public function identifiesUpdate(array $data);

    public function providerProfile($ProviderId);

}
