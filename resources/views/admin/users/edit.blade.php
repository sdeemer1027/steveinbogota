@extends('layouts.admin')

@section('content')

<h1>Edit User Roles</h1>

<h3>{{ $user->name }}</h3>
<p>{{ $user->email }}</p>

<form method="POST" action="{{ route('admin.users.roles.update', $user->id) }}">
    @csrf

    @foreach($roles as $role)
        <div>
            <label>
                <input
                    type="checkbox"
                    name="roles[]"
                    value="{{ $role->id }}"
                    {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                >
                {{ $role->name }}
            </label>
        </div>
    @endforeach

    <br>

    <button type="submit">Save Roles</button>
</form>

@endsection
