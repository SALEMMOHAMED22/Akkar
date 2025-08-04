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

        $email = $request->email;
        $password = $request->password;

       
        if(auth('admin')->attempt(['email' => $email , 'password' => $password] , true)){
            return redirect()->route('dashboard.home');
        }
        return redirect()->back()->withErrors(['email' => 'Credintials does not match']);
    }


    public function logout(){
        auth('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
