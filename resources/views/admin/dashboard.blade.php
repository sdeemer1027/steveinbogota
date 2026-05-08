
@extends('layouts.admin')

@section('content')

<h1 class="mb-4">Dashboard</h1>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5>Total Users</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5>Total Roles</h5>
                <h2>{{ $roleCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5>Total Permissions</h5>
                <h2>{{ $permissionCount }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-sm">
    <div class="card-body">

        <h5>Quick Actions</h5>

        <a href="{{ route('admin.users.index') }}" class="btn btn-primary me-2">
            Manage Users
        </a>

        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary me-2">
            Manage Roles
        </a>

        <a href="{{ route('admin.permissions.index') }}" class="btn btn-success">
            Manage Permissions
        </a>

    </div>
</div>

@endsection