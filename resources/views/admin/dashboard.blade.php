@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>

    <p>Welcome to the admin panel.</p>


<div class="container mt-5">

    <button class="btn btn-primary">
        <i class="bi bi-gear"></i> UI Test Button
    </button>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("DOM ready (no jQuery dependency here)");
    });
</script>

@endsection