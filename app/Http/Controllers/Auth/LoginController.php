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
            'email' => ['required', 'email'],
            'password' => [
                'required',
                
            ],
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



// class LoginController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     public function login(Request $request)
//     {
//         // Validate the request data
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         // Attempt to log in the user
//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             // Login successful
//             $user = Auth::user();

//             // Check if the user has a profile
//             $profileExists = Profile::where('user_id', $user->id)->exists();

//             if ($user->role === 'client') {
//                 return redirect()->route('client.dashboard', ['id' => $user->id])
//                     ->with('success', 'Login successful! Welcome back, Client.');
//             } elseif ($user->role === 'freelancer') {
//                 // If profile exists, redirect to freelancer dashboard
//                 if ($profileExists) {
//                     return redirect()->route('freelancer.dashboard', ['id' => $user->id])
//                         ->with('success', 'Login successful! Welcome back, Freelancer.');
//                 }
//                 // If no profile exists, redirect to profile setup page
//                 return redirect()->route('freelancer.profilesetup', ['id' => $user->id])
//                     ->with('success', 'Login successful! Please complete your profile setup.');
//             } elseif ($user->role === 'admin') {
//                 return redirect()->route('admin.dashboard', ['id' => $user->id])
//                     ->with('success', 'Login successful! Welcome back, Admin.');
//             }
//             return redirect('/')->with('success', 'Login successful!');
//         }

//         // Login failed
//         return back()->with('error', 'Invalid credentials.')->withInput();
//     }
// }
