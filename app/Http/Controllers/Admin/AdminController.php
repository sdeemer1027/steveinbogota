<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $roleCount = Role::count();
        $permissionCount = Permission::count();

        return view('admin.dashboard', compact(
            'userCount',
            'roleCount',
            'permissionCount'
        ));
    }
}