<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
 
  $user = auth()->user();


        return view('dashboard', compact('user'));
    }
}