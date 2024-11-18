<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.signup-as-client');
    }

    public function clientRegister(Request $request)
    {
        // dd($request->all());

        // Validate the request data
        // $request->validate([
        //     'clientName' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     // 'phone' => 'required|string|regex:/^[0-9]{10,15}$/',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // dd($request->clientName, $request->email, $request->phone, $request->password, $request->role);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
