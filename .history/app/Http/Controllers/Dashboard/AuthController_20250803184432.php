<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin' , except: ['logout']),
        ];
    }
    
    public function showLoginForm(){

        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request){

        $email = $request->email;
        $password = $request->password;



       
        if(auth('admin')->attempt(['email' => $email , 'password' => $password ] , true)){
            
            return redirect()->route('dashboard.home');
        }
        return redirect()->back()->withErrors(['email' => 'Credintials does not match']);
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
