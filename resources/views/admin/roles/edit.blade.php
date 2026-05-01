@extends('layouts.admin')

@section('content')

<h1>Edit Role Permissions</h1>

<h3>{{ $role->name }}</h3>

<form method="POST" action="{{ route('admin.roles.permissions.update', $role->id) }}">
    @csrf

    @foreach($permissions as $permission)
        <div>
            <label>
                <input type="checkbox"
                       name="permissions[]"
                       value="{{ $permission->id }}"
                       {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                {{ $permission->name }}
            </label>
        </div>
    @endforeach

    <br>

    <button type="submit">Save Permissions</button>
</form>

@endsection