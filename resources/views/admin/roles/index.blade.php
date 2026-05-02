@extends('layouts.admin')

@section('content')

<h1 class="mb-4">Role Management</h1>

<a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">
    Create New Role
</a>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>

                        <td>
                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit Permissions
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection