<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Client extends Controller
{
    public function show($id)
    {
        // Ensure the authenticated user exists
        $authUser = auth('web')->user();

        // Check if the authenticated user's ID matches the requested ID
        if (!$authUser || $authUser->id !== (int)$id) {
            abort(403, 'Unauthorized access');
        }

        // Fetch the user by ID (this ensures the user exists in the database)
        $user = User::findOrFail($id);

        return view('users.clients.dashboard', compact('user'));
    }

    function ContractsPage()
    {
        return view('users.clients.contracts');
    }
    function Info()
    {
        return view('users.clients.info');
    }
}
