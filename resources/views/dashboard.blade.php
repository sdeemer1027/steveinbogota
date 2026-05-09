@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">User Dashboard</h2>
        <span class="badge bg-primary">STANDARD USER</span>
    </div>
{{$user}}
    <!-- Cards -->
    <div class="row g-3 mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>My Account Status</h6>
                    <h4 class="text-success">Active</h4>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Role</h6>
                    <h4>User</h4>
                </div>
            </div>
        </div>

    </div>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-header">
            Recent Activity
        </div>

        <div class="card-body p-0">

            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Logged In</td>
                        <td>Today</td>
                    </tr>
                    <tr>
                        <td>Profile Updated</td>
                        <td>Yesterday</td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>


</div>

@endsection