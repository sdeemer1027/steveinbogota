@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">VIP Dashboard</h2>
        <span class="badge bg-warning text-dark">VIP ACCESS</span>
    </div>

    <!-- Cards Row -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total VIP Users</h6>
                    <h3>3</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Premium Features</h6>
                    <h3>Active</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>System Status</h6>
                    <h3 class="text-success">Online</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- VIP Table -->
    <div class="card shadow-sm">
        <div class="card-header">
            VIP Activity
        </div>

        <div class="card-body p-0">

            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>VIP User 1</td>
                        <td>vip1@example.com</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>VIP User 2</td>
                        <td>vip2@example.com</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>VIP User 3</td>
                        <td>vip3@example.com</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection