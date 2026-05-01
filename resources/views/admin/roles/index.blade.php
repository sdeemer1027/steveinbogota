@extends('layouts.admin')

@section('content')

<h1>Roles</h1>

<a href="{{ route('admin.roles.create') }}">Create New Role</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>

    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

