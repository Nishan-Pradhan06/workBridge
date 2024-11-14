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
        return view('users.freelancers.contact_info');
    }
    function billingAndPayment()
    {
        return view('users.freelancers.billing_and_payment');
    }

    function createProfile()
    {
        return view('auth.create-freelancer-profile');
    }
}
