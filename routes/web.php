<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Vip\VipController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\MemberController;






/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function () {

    if (auth()->check()) {

        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('vip')) {
            return redirect()->route('vip.dashboard');
        }

        if ($user->hasRole('user')) {
            return redirect()->route('dashboard');
        }
    }

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');



/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/members/{user}', [MemberController::class, 'show'])
        ->name('members.show');
});



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL (RBAC CONTROLLED)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {

        /*
        |-------------------------
        | Dashboard
        |-------------------------
        */
        Route::get('/', [AdminController::class, 'dashboard'])
            ->middleware('permission:view-admin-dashboard')
            ->name('dashboard');

        /*
        |-------------------------
        | USERS
        |-------------------------
        */
        Route::get('/users', [UserController::class, 'index'])
            ->middleware('permission:view-users')
            ->name('users.index');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->middleware('permission:edit-users')
            ->name('users.edit');

        Route::get('/users/{user}/roles', [UserController::class, 'getRoles'])
            ->middleware('permission:manage-user-roles')
            ->name('users.roles.show');

        Route::post('/users/{user}/roles', [UserController::class, 'updateRoles'])
            ->middleware('permission:manage-user-roles')
            ->name('users.roles.update');

        /*
        |-------------------------
        | ROLES
        |-------------------------
        */
        Route::get('/roles', [RoleController::class, 'index'])
            ->middleware('permission:view-roles')
            ->name('roles.index');

        Route::get('/roles/create', [RoleController::class, 'create'])
            ->middleware('permission:create-roles')
            ->name('roles.create');

        Route::post('/roles', [RoleController::class, 'store'])
            ->middleware('permission:create-roles')
            ->name('roles.store');

        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
            ->middleware('permission:edit-roles')
            ->name('roles.edit');

        Route::post('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])
            ->middleware('permission:manage-role-permissions')
            ->name('roles.permissions.update');

        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
            ->middleware('permission:delete-roles')
            ->name('roles.destroy');

        /*
        |-------------------------
        | PERMISSIONS
        |-------------------------
        */
        Route::get('/permissions', [PermissionController::class, 'index'])
            ->middleware('permission:view-permissions')
            ->name('permissions.index');

        Route::get('/permissions/create', [PermissionController::class, 'create'])
            ->middleware('permission:create-permissions')
            ->name('permissions.create');

        Route::post('/permissions', [PermissionController::class, 'store'])
            ->middleware('permission:create-permissions')
            ->name('permissions.store');
    });


/*
Route::middleware(['auth', 'permission:access-vip-dashboard'])
    ->prefix('vip')
    ->name('vip.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('vip.dashboard');
        })->name('dashboard');

        Route::get('/content', function () {
            return view('vip.content');
        })->name('content');

    });
  */
  /*
  Route::middleware(['auth', 'role:vip'])
    ->prefix('vip')
    ->name('vip.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('vip.dashboard');
        })->name('dashboard');

        Route::get('/content', function () {
            return view('vip.content');
        })->name('content');

    });  
*/

    Route::middleware(['auth', 'role:vip'])
    ->prefix('vip')
    ->name('vip.')
    ->group(function () {

        Route::get('/dashboard', [VipController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/content', [VipController::class, 'content'])
            ->name('content');

    });



Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified', 'role:user'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';