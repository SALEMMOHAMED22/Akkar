<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
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



       $admin = Admin::where('email' , $email)->first();
        if(!$admin){
            return redirect()->back()->withErrors(['email' => 'Credintials does not match']);
        }

        if($admin->status == 0){
            return redirect()->back()->withErrors(['email' => 'Your account is not active']);
        }

        if(auth('admin')->attempt(['email' => $email , 'password' => $password ] , true)){

            return redirect()->route('dashboard.home');
        }
        // return redirect()->back()->withErrors(['email' => 'Credintials does not match']);
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
