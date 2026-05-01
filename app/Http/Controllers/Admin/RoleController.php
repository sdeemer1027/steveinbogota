<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permission;
//use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.roles.index');
    }
    public function edit(Role $role)
    {
    $permissions = Permission::all();

    return view('admin.roles.edit', compact('role', 'permissions'));
    }
public function updatePermissions(Request $request, Role $role)
{
    $role->permissions()->sync($request->permissions ?? []);

    return redirect()->route('admin.roles.index');
}



}