<?php

namespace App\Http\Controllers\Vip;

use App\Http\Controllers\Controller;
use App\Models\User;

class VipController extends Controller
{
    public function dashboard()
    {
        $vipUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'vip');
        })->get();

                $user = auth()->user();


        return view('vip.dashboard', compact('vipUsers','user'));
    }

    public function content()
    {
        return view('vip.content');
    }
}