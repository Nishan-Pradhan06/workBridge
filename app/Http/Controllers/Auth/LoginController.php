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

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard
            $user = Auth::user();
            if ($user->role === 'client') {
                // return redirect()->intended('/client/dashboard');
                return redirect()->route('client.dashboard', ['id' => Auth::id()]); //returning to route with id
            } elseif ($user->role === 'freelancer') {
                // return redirect()->intended('/find-job');
                return redirect()->route('freelancer.dashboard',['id'=>Auth::id()]);
            }
        }

        // Redirect back with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
