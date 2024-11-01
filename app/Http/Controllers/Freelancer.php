<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Freelancer extends Controller
{
    function index ()
    {
        return view('users.index');
    }
    function profile()
    {
        return view('users.freelancers.profile');
    }

    function contactInfo()
    {
        return view('users.freelancers.setting');
    }

    function createProfile()
    {
        return view('auth.create-freelancer-profile');
    }
}
