<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user-role.user.index',['users' => $users, 'roles' =>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:12',
            'user_role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles($request->user_role);

        Session::flash('success', 'New user add successfully.');

        return response()->json(['status'=>200]);
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
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $user->roles = $user->getRoleNames();

        // dd($user);
        return response()->json(['status' => 200, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            // 'password' => 'min:6|max:12',
            // 'user_role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password))
        {
            $data += [
                'password' => $request->password,
            ];
        }
        $user->update($data);
        $user->syncRoles($request->user_role);

        Session::flash('success', 'User Updated successfully.');

        return response()->json(['status'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        $user->delete();
        Session::flash('success','User Deleted successfully!!');

        return redirect()->back();
    }
}
