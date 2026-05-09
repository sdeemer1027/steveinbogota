@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">My Profile</h4>
                </div>

                <div class="card-body">

                    @if(session('status') === 'profile-updated')
                        <div class="alert alert-success">
                            Profile updated successfully.
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('profile.update') }}"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        {{-- Profile Photo --}}
                        <div class="mb-4">

                            <label class="form-label">Profile Photo</label>

                            @if($user->profile_photo)
                                <div class="mb-3">
                                    <img
                                        src="{{ asset('storage/' . $user->profile_photo) }}"
                                        width="120"
                                        class="rounded-circle border"
                                    >
                                </div>
                            @endif

                            <input
                                type="file"
                                name="profile_photo"
                                class="form-control"
                            >

                            @error('profile_photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Account Name --}}
                        <div class="mb-3">
                            <label>Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $user->name) }}"
                            >
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $user->email) }}"
                            >
                        </div>

                        {{-- First / Last Name --}}
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label>First Name</label>

                                <input
                                    type="text"
                                    name="first_name"
                                    class="form-control"
                                    value="{{ old('first_name', $profile->first_name ?? '') }}"
                                >
                            </div>

                            <div class="col-md-6">
                                <label>Last Name</label>

                                <input
                                    type="text"
                                    name="last_name"
                                    class="form-control"
                                    value="{{ old('last_name', $profile->last_name ?? '') }}"
                                >
                            </div>

                        </div>

                        {{-- Phone --}}
                        <div class="mb-3">
                            <label>Phone</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone', $profile->phone ?? '') }}"
                            >
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label>Address</label>

                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                value="{{ old('address', $profile->address ?? '') }}"
                            >
                        </div>

                        {{-- City / State / Country --}}
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label>City</label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    value="{{ old('city', $profile->city ?? '') }}"
                                >
                            </div>

                            <div class="col-md-4">
                                <label>State</label>

                                <input
                                    type="text"
                                    name="state"
                                    class="form-control"
                                    value="{{ old('state', $profile->state ?? '') }}"
                                >
                            </div>

                            <div class="col-md-4">
                                <label>Country</label>

                                <input
                                    type="text"
                                    name="country"
                                    class="form-control"
                                    value="{{ old('country', $profile->country ?? '') }}"
                                >
                            </div>

                        </div>

                        {{-- Birthdate --}}
                        <div class="mb-3">
                            <label>Birthdate</label>

                            <input
                                type="date"
                                name="birthdate"
                                class="form-control"
                                value="{{ old('birthdate', $profile->birthdate ?? '') }}"
                            >
                        </div>

                        {{-- Bio --}}
                        <div class="mb-4">
                            <label>Bio</label>

                            <textarea
                                name="bio"
                                rows="4"
                                class="form-control"
                            >{{ old('bio', $profile->bio ?? '') }}</textarea>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">
                            Save Profile
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection