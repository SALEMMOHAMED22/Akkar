<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {

        return view('dashboard.users.index');
    }

    public function usersIndividual()
    {
        $usersIndividual = User::with('jobtitle')->where('type', 'individual')->get();

        // dd($usersIndividual);
        return DataTables::of($usersIndividual)
            ->addIndexColumn()
            ->addColumn('type', function ($user) {
                return $user->type;
            })
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('age', function ($user) {
                return $user->age;
            })
            ->addColumn('job_title', function ($user) {
                return $user->jobtitle->name_;
            })
            ->addColumn('national_id', function ($user) {
                return $user->national_id;
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d');
            })
            ->editColumn('email_notification', function ($user) {
                return $user->email_notification ? $user->email_notification : 'Not Set';
            })
            ->addColumn('action', function ($user) {
                return view('dashboard.users.actions', compact('user'))->render();
            })
            ->rawColumns(['action']) // مهمة لو فيه HTML
            ->make(true);
    }
}
