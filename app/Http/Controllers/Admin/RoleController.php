<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role',['only'=>['index']]);
        $this->middleware('permission:create role',['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:update role',['only'=>['update','edit']]);
        $this->middleware('permission:delete role',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.users.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:roles,name',
        ];
        $customMessages = [
            'name.required' => 'Need a role name.',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            Role::create([
                'name'=>$request->name
            ]);  
        }
        Session::flash('success', 'Role created successfully.');
        return redirect('roles');
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
    public function edit(Role $role)
    {
        return view('admin.users.roles.edit',['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'name' => 'string|unique:roles,name',
        ];
        $customMessages = [
            'name.string' => 'Role name has a string.',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
           $role->update([
                'name'=>$request->name
            ]);  
        }
        Session::flash('success', 'Role updated successfully.');
        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        Session::flash('success', 'Role deleted successfully.');
        return redirect('roles');
    }
    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

       
        return view('admin.users.roles.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $rules = [
            'permission' => 'required',
        ];
        $customMessages = [
            'permission.required' => 'Permission is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $role = Role::findOrFail($roleId);
            $role->syncPermissions($request->permission);
        }
        Session::flash('success', 'Permissions added to role.');
        return redirect()->back();
    }
}