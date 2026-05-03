<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
       $users = User::with('roles')->get();
       $roles = \App\Models\Role::all();

        return view('admin.users.index', compact('users','roles'));
    }


    public function edit(User $user)
{
    $roles = Role::all();

    return view('admin.users.edit', compact('user', 'roles'));
}

   public function updateRoles(Request $request, User $user)
{
   $user->roles()->sync($request->roles ?? []);


    return response()->json([
      'message' => 'Roles updated successfully',
      'user_id' => $user->id,
      'roles' => $user->roles->pluck('name')
    ]);

//return response()->json([
//    'success' => true,
//    'message' => 'Roles updated successfully',
//    'roles' => $user->roles()->pluck('name')
//]);

}

   public function getRoles(User $user)
{
    return response()->json([
        'roles' => $user->roles->pluck('id')
    ]);
}


}