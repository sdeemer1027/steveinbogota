<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Display a member profile.
     */
    public function show(User $user): View
    {
        $user->load('profile', 'roles');

        return view('members.show', compact('user'));
    }
}