@extends('layouts.admin')

@section('content')

<h1 class="mb-4">Permission Management</h1>

<a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">
    Create Permission
</a>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection