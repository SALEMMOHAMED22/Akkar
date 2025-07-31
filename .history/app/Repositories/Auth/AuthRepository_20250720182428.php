<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Auth\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        $commonData = [
            'type'     => $data['type'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'bio'      => $data['bio'],
            
            'password' => Hash::make($data['password']),
        ];

        if ($data['type'] === 'individual') {
            $individualData = [
                'name'        => $data['name'] ?? null,
                'age'         => $data['age'] ?? null,
                'job_title'   => $data['job_title'] ?? null,
            ];
            $user = User::create(array_merge($commonData, $individualData));
        } elseif ($data['type'] === 'company') {
            $companyData = [
                'company_name' => $data['company_name'] ?? null,
                'company_type' => $data['company_type'] ?? null,
                'username'     => $data['username'] ?? null,
            ];
            $user = User::create(array_merge($commonData, $companyData));
        } else {
            throw new \Exception('Invalid user type');
        }

        return $user;
    }
}
