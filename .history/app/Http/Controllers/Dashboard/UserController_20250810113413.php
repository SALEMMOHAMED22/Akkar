<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function showUserIndividual()
    {

        return view('dashboard.users.individual');
    }

    public function showUserCompany()
    {

        return view('dashboard.users.company');
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
                return $user->jobtitle->name_en;
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


    public function usersCompany()
    {
        $usersCompany = User::with('companytype' , 'identifies')->where('type', 'company')->get();

        // dd($usersIndividual);
        return DataTables::of($usersCompany)
            ->addIndexColumn()
            ->addColumn('type', function ($user) {
                return $user->type;
            })
            ->addColumn('company_name', function ($user) {
                return $user->company_name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('phone', function ($user) {
                return $user->phone;
            })
            ->addColumn('national_id', function ($user) {
                return $user->national_id;
            })
            ->addColumn('company_type', function ($user) {
                return $user->companytype->name_en;
            })
            ->editColumn('email_notification', function ($user) {
                return $user->email_notification ? $user->email_notification : 'Not Set';
            })
            ->addColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d');
            })
            ->addColumn('image', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->image])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->personal_photo])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->national_id_front])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->national_id_back])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->engineer_card_front])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->engineer_card_back])->render();
            })
            // ->addColumn('actions', function ($user) {
            //     return view('dashboard.datatable.actions', )->render();
            // })
            ->rawColumns(['action', 'image' ])
            ->make(true);
    }
}
