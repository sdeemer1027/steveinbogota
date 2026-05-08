<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVip
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !$user->roles()->where('name', 'vip')->exists()) {
            abort(403, 'VIP access only');
        }

        return $next($request);
    }
}