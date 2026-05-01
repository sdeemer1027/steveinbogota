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

        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
{
    $roles = Role::all();

    return view('admin.users.edit', compact('user', 'roles'));
}

   public function updateRoles(Request $request, User $user)
{
    $user->roles()->sync($request->roles ?? []);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Roles updated successfully.');
}




}