<?php

namespace App\Http\Controllers;

use App\Models\MemberProfile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $profile = $user->profile;

        return view('profile.edit', compact('user', 'profile'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            /*
            |--------------------------------------------------------------------------
            | Users Table
            |--------------------------------------------------------------------------
            */
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],

            /*
            |--------------------------------------------------------------------------
            | Profile Photo
            |--------------------------------------------------------------------------
            */
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            /*
            |--------------------------------------------------------------------------
            | Member Profile Table
            |--------------------------------------------------------------------------
            */
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'bio' => ['nullable', 'string'],
        ]);

        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Update Users Table
        |--------------------------------------------------------------------------
        */

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        /*
        |--------------------------------------------------------------------------
        | Reset Email Verification if Changed
        |--------------------------------------------------------------------------
        */

        if ($user->email !== $request->email) {
            $data['email_verified_at'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Handle Profile Photo Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }

            // Store new photo
            $path = $request->file('profile_photo')
                ->store('profile-photos', 'public');

            $data['profile_photo'] = $path;
        }

        // Save user auth data
        $user->update($data);

        /*
        |--------------------------------------------------------------------------
        | Update or Create Member Profile
        |--------------------------------------------------------------------------
        */

        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'birthdate' => $request->birthdate,
                'bio' => $request->bio,
            ]
        );

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Delete Profile Photo
        |--------------------------------------------------------------------------
        */

        if ($user->profile_photo) {
            Storage::disk('public')->delete(
                $user->profile_photo
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Logout + Delete Account
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}