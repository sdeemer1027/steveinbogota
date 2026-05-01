@extends('layouts.admin')

@section('content')

<h1>Users</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
                <td>
                   <a href="{{ route('admin.users.edit', $user->id) }}">Edit Roles</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

