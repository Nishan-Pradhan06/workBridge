<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Freelancer extends Controller
{
    function index ()
    {
        return view('users.index');
    }
    // function profile()
    // {
    //     return view('users.freelancers.profile');
    // }

    function contactInfo()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id',$user->id)->first();
        return view('users.freelancers.contact_info',compact('profile'));
    }
    function billingAndPayment()
    {
        return view('users.freelancers.billing_and_payment');
    }
    function PasswordAndSecurity()
    {
        $user = Auth::user();
        return view('users.freelancers.password_and_security', compact('user'));
        // return view('users.freelancers.password_and_security');
    }

    function createProfile()
    {
        return view('auth.create-freelancer-profile');
    }
}
