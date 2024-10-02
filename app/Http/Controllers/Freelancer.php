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
        return view('users.profile');
    }

    function setting()
    {
        return view('users.setting');
    }
}
