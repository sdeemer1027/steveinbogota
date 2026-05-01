@extends('layouts.admin')

@section('content')

<h1>Create Role</h1>

<form method="POST" action="{{ route('admin.roles.store') }}">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <button type="submit">Create Role</button>
</form>

@endsection

