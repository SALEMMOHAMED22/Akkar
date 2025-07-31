<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function showLoginForm(){

        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request){

        $credentials = $request->only('email' , 'password');
        if(auth()->attempt($credentials)){
            return redirect()->route('dashboard.home');
        }
        return redirect()->route('dashboard.login')->with('error' , 'Invalid email or password');
    }
}
