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
            // Login successful
            $user = Auth::user();
            if ($user->role === 'client') {
                return redirect()->route('client.dashboard', ['id' => $user->id])
                    ->with('success', 'Login successful! Welcome back, Client.');
            } elseif ($user->role === 'freelancer') {
                // return redirect()->route('freelancer.dashboard', ['id' => $user->id])
                //     ->with('success', 'Login successful! Welcome back, Freelancer.');
                return redirect()->route('freelancer.profilesetup', ['id' => $user->id])
                    ->with('success', 'Login successful! Welcome back, Freelancer.');
            }
            return redirect('/')->with('success', 'Login successful!');
        }

        // Login failed
        return back()->with('error', 'Invalid credentials.')->withInput();
    }
}
