<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the dashboard
            return redirect()->intended('/client/dashboard');
        }

        // Redirect back with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
 
}
