@extends('layouts.admin')

@section('content')

<h1 class="mb-4">User Management</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>

                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit Roles
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection