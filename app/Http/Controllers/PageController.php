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

    function signup()
    {
        return view('auth.signup');
    }
    function signupAsClient(){
        return view('auth.signup-as-client');

    }

    function getStarted()
    {
        return view('auth.get-started');
    }
}