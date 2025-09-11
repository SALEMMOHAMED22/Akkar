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
            ->addColumn('is_active', function ($user) {
                return $user->getStatusTranslated();
            })
            ->addColumn('image', function ($user) {
                $url = $user->image ?: 'images/default.png'; // الصورة الافتراضية
                return view('dashboard.datatable.image', ['url' => $url])->render();
            })
            ->addColumn('personal_photo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->personal_photo])->render();
            })
            ->addColumn('national_id_front', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->national_id_front])->render();
            })
            ->addColumn('national_id_back', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->national_id_back])->render();
            })
            ->addColumn('engineer_card_front', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->engineer_card_front])->render();
            })
            ->addColumn('engineer_card_back', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->engineer_card_back])->render();
            })
            ->addColumn('action', function ($user) {
                return view('dashboard.users.actions', compact('user'))->render();
            })
            ->rawColumns(['action', 'image',  'personal_photo', 'national_id_front', 'national_id_back', 'engineer_card_front', 'engineer_card_back'])
            ->make(true);
    }


    public function usersCompany()
    {
        $usersCompany = User::with('companytype', 'identifies')->where('type', 'company')->get();

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
            ->addColumn('company_logo', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->company_logo])->render();
            })
            ->addColumn('tax_record_front', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->tax_record_front])->render();
            })
            ->addColumn('tax_record_back', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->tax_record_back])->render();
            })
            ->addColumn('tax_card_front', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->tax_card_front])->render();
            })
            ->addColumn('tax_card_back', function ($user) {
                return view('dashboard.datatable.image', ['url' => $user->identifies->tax_card_back])->render();
            })
            // ->addColumn('actions', function ($user) {
            //     return view('dashboard.datatable.actions', )->render();
            // })
            ->rawColumns(['action', 'image', 'company_logo', 'tax_record_front', 'tax_record_back', 'tax_card_front', 'tax_card_back'])
            ->make(true);
    }


    public function changeStatus(Request $request)
    {
        $user = User::find($request->id);

        $user->is_active == 1 ? $status = 0 : $status = 1;

        $user =  $user->update([
            'is_active' => $status
        ]);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ], 500);
        }


        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.status_changed_successfully'),
        ], 200);
    }
}
