<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function login()
    {
        return view('auth.login');
    }

    function signupAsFreelancer()
    {
        return view('auth.signup-as-freelancer');
    }
    function signupAsClient(){
        return view('auth.signup-as-client');

    }

    function getStarted()
    {
        return view('auth.get-started');
    }
}