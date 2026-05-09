@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow-sm mb-4">

                <div class="card-body text-center">

                    @if($user->profile_photo)
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            class="rounded-circle mb-3"
                            width="150"
                            height="150"
                        >
                    @else
                        <div class="mb-3">
                            No Photo
                        </div>
                    @endif

                    <h4>{{ $user->name }}</h4>

                    <p class="text-muted">
                        {{ ucfirst($user->roles->first()->name ?? 'User') }}
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">
                    Member Details
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>First Name</th>
                            <td>{{ $user->profile->first_name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Last Name</th>
                            <td>{{ $user->profile->last_name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <td>{{ $user->profile->phone ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $user->profile->address ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>City</th>
                            <td>{{ $user->profile->city ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>State</th>
                            <td>{{ $user->profile->state ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Country</th>
                            <td>{{ $user->profile->country ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Birthdate</th>
                            <td>{{ $user->profile->birthdate ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Bio</th>
                            <td>{{ $user->profile->bio ?? '-' }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection