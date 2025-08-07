<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

    
        return view('dashboard.users.index' );
    }

    public function usersIndividual(){

        $users = Users
    }

   
}
