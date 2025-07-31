<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Notifications\SendOtpNotify;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(array $data)
    {
        $commonData = [
            'type'     => $data['type'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'bio'      => $data['bio'],
            'national_id' => $data['national_id'],
            'password' => Hash::make($data['password']),
        ];

        if ($data['type'] === 'individual') {
            $individualData = [
                'name'        => $data['name'] ?? null,
                'age'         => $data['age'] ?? null,
                'job_title'   => $data['job_title'] ?? null,
            ];
            $user = User::create(array_merge($commonData, $individualData));
            // dd($user);
            dd
            new SendOtpNotify($user);
        } elseif ($data['type'] === 'company') {
            $companyData = [
                'company_name' => $data['company_name'] ?? null,
                'company_type' => $data['company_type'] ?? null,
                'username'     => $data['username'] ?? null,
            ];
            dd($companyData);
            $user = User::create(array_merge($commonData, $companyData));
            new SendOtpNotify($user->email);
        } else {
            throw new \Exception('Invalid user type');
        }

        return $user;
    }


    public function login(array $credentials)
    {

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        //  generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
        ];
    }


    public function logout()
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            throw new \Exception('Unauthorized');
        }

        $token = $user->currentAccessToken();

        if (!$token) {
            throw new \Exception('Token not found');
        }

        $token->delete();

        return [
            'message' => 'Logged out successfully',
        ];
    }
}
