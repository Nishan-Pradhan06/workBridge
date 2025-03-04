<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        // If user is already logged in, redirect them based on their role
        if (Auth::check()) {
            $user = Auth::user();
            return $this->redirectUser($user);
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|max:255', 
            'password' => 'required|string',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            // Login successful
            $user = Auth::user();
            return $this->redirectUser($user)
                ->with('success', 'Login successful! Welcome back.');
        }

        // Login failed
        return back()->with('error', 'Invalid credentials.')->withInput();
    }

    protected function redirectUser($user)
    {
        // Check if the user has a profile
        $profileExists = Profile::where('user_id', $user->id)->exists();

        if ($user->role === 'client') {
            return redirect()->route('client.dashboard', ['id' => $user->id]);
        } elseif ($user->role === 'freelancer') {
            if ($profileExists) {
                return redirect()->route('freelancer.dashboard', ['id' => $user->id]);
            }
            return redirect()->route('freelancer.profilesetup', ['id' => $user->id]);
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard', ['id' => $user->id]);
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}