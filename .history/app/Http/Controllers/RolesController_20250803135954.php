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
        return view('dashboard.roles.create');
    }


    public function store(RoleRequest $request)
    {
    

        $role = Role::create([
            'role_ar' => $request->role_ar,
            'role_en' => $request->role_en,
            'permissions' => json_encode($request->permissions),
        ]);
        if(! $role){
            return redirect()->back()->withErrors(['error', 'Role not created']);
        }
       
        return redirect()->route('dashboard.roles.index')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        if($id == 1){
            return redirect()->back()->with('error', 'You can not delete this role');
        }
        $role = Role::findOrFail($id);
       
        if(! $role){
            return redirect()->back()->withErrors(['error', 'Role not found']);
        }
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        if(! $role){
            return redirect()->back()->withErrors(['error', 'Role not found']);
        }
       $updatedRole = $role->update([
            'role_ar' => $request->role_ar,
            'role_en' => $request->role_en,
            'permissions' => json_encode($request->permissions),
        ]);
        if(! $updatedRole){
            return redirect()->back()->withErrors(['error', 'Role not updated']);
        }
        return redirect()->route('dashboard.roles.index')->with('success', 'Role updated successfully');

       
    }

    public function destroy($id)
    {
        if($id == 1){
            return redirect()->back()->with('error', 'You can not delete this role');
        }
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('dashboard.roles.index')->with('success', 'Role deleted successfully');
    }
}
