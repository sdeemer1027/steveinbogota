@extends('layouts.admin')

@section('content')

<h1>Permissions</h1>

<a href="{{ route('admin.permissions.create') }}">Create Permission</a>

<table border="1" cellpadding="10">
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

@endsection
