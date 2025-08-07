<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
    
        return view('dashboard.users.index' );
    }

    public function usersIndividual(){

        $usersIndividual = User::where('type' , 'idividual')->get();

        return DataTables::of($usersIndividual)->make(true);

    }

   
}
