<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // If already logged in as admin, send to dashboard
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // Otherwise proceed to login form or authenticate
        return $next($request);
    }
}
