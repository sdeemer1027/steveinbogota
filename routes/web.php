<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

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
| ADMIN PANEL (ALL ADMIN ROUTES)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // -------------------------
        // Dashboard
        // -------------------------
        Route::get('/', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        // -------------------------
        // USERS
        // -------------------------
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');

        // GET roles for modal (AJAX)

        Route::get('/users/{user}/roles', [UserController::class, 'getRoles'])
        ->name('users.roles.show');



        // UPDATE roles (AJAX POST)
        Route::post('/users/{user}/roles', [UserController::class, 'updateRoles'])
            ->name('users.roles.update');

        // -------------------------
        // ROLES
        // -------------------------
        Route::get('/roles', [RoleController::class, 'index'])
            ->name('roles.index');

        Route::get('/roles/create', [RoleController::class, 'create'])
            ->name('roles.create');

        Route::post('/roles', [RoleController::class, 'store'])
            ->name('roles.store');

        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
            ->name('roles.edit');

        Route::post('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])
            ->name('roles.permissions.update');

        // -------------------------
        // PERMISSIONS
        // -------------------------
        Route::get('/permissions', [PermissionController::class, 'index'])
            ->name('permissions.index');

        Route::get('/permissions/create', [PermissionController::class, 'create'])
            ->name('permissions.create');

        Route::post('/permissions', [PermissionController::class, 'store'])
            ->name('permissions.store');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';