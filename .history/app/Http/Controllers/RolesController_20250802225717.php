<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Dashboard\RoleRequest;
use Illuminate\Support\Facades\{DB, Session};
use App\Http\Requests\Dashboard\RoleRequest as DashboardRoleRequest;

class RolesController extends Controller
{
    //
    public function index(Request $request)
    {
        // return 'erre';
        // $this->authorize('roles-عرض');
        $roles = Role::paginate(10);

        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        // $this->authorize('roles-اضافة');
        // $permissions = Permission::all();
        // dd($permissions);
        return view('dashboard.roles.create');
    }


    public function store(RoleRequest $request)
    {
    
        // $this->authorize('roles-اضافة');

        $role = Role::create([
            'role_ar' => $request->role_ar,
            'role_en' => $request->role_en,
            'permissions' => json_encode($request->permissions),
        ]);
        if(! $role){
            retu
        }
       
        Session::flash('message', ['type' => 'success', 'text' => __('Role created successfully')]);
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $roles = Role::get();
        // $this->authorize('roles-تعديل');
        $ids = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();
        $permissionNum = $role->permissions->count();
        // return 'err';
        return view('dashboard.roles.update', compact('role', 'permissions', 'permissionNum', 'ids', 'roles'));
    }

    public function update(UpdateRoleRequest $request, PermissionRequest $req, Role $role)
    {
        // $this->authorize('roles-تعديل');

        if ($request->select_all) {
            $permissions = json_decode($request->select_all);
        } else {
            $permissions = $req->permission_name;
        }
        $role->update(['name' => $request->name]);
        $role->syncPermissions($permissions);

        Session::flash('message', ['type' => 'success', 'text' => __('Role updated successfully')]);
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->revokePermissionTo($role->permissions);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
