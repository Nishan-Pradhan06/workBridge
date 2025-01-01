<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and suspended
        if (Auth::check() && Auth::user()->status === 'suspended') {
            // Log out the user and redirect with a message
            // Auth::logout();

            // return redirect()->route('login')->withErrors([
            //     'account_suspended' => 'Your account is suspended. Please contact support for assistance.',
            // ]);
            if ($request->is('dashboard') || $request->is('profile')) {
                return redirect()->route('suspended.page')->withErrors([
                    'account_suspended' => 'Your account is suspended. You can still log in, but cannot use the features.',
                ]);
            }
        }
        return $next($request);
    }
}
