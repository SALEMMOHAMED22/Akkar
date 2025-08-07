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
    $usersIndividual = User::where('type', 'individual')->;

    return DataTables::of($usersIndividual)
        ->addIndexColumn()
        ->editColumn('email_notification', function ($user) {
            return $user->email_notification ? $user->email_notification : 'Not Set';
        })
        ->addColumn('action', function ($user) {
            return view('dashboard.users.actions', compact('user'))->render();
        })
        ->make(true);
}
   
}
