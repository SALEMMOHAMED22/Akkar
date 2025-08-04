<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Http\Requests\Dashboard\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('dashboard.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
    return view('dashboard.admins.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(AdminRequest $request)
    {
        $data = $request->except('_token');
        // return $data;
        $admin = Admin::create($data);
        return redirect()->route('dashboard.admins.index')->with('success', 'Admin created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if($id == 1){
            return redirect()->back()->with('error', 'You can not edit this admin');
        }
        $admin = Admin::findOrFail($id);
        if(! $admin){
            return redirect()->back()->with('error', 'Admin not found');
        }
        $roles = Role::all();
        return view('dashboard.admins.edit' , compact('admin' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        if(! $admin){
            return redirect()->back()->with('error', 'Admin not found');
        }
        $data = $request->except('_token');
        return
        $admin->update($data);
        return redirect()->route('dashboard.admins.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
