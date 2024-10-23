<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client extends Controller
{
    function Dashboard()
    {
        return view('clients.clients');
    }

    function ContractsPage()
    {
        return view('clients.contracts');
    }
}
