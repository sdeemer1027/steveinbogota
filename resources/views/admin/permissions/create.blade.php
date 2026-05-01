@extends('layouts.admin')

@section('content')

<h1>Create Permission</h1>

<form method="POST" action="{{ route('admin.permissions.store') }}">
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

    <button type="submit">Create</button>
</form>

@endsection