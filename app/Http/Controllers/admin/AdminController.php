<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        // Fetch users by roles
        // $clients = User::where('role', 'client')->get();
        // $freelancers = User::where('role', 'freelancer')->get();
        $users = User::whereIn('role', ['client', 'freelancer'])->latest()->take(6)->get();
        // Count users by roles
        $totalClients = User::where('role', 'client')->count();
        $totalFreelancers = User::where('role', 'freelancer')->count();

        // Pass both user lists and counts to the view
        return view("users.admin.admin", compact('totalUsers', 'totalClients', 'totalFreelancers', 'users'));
    }

    public function showUsersPage()
    {
        $users = User::whereIn('role', ['client', 'freelancer'])->paginate(8);
        return view("users.admin.users", compact('users'));
    }
}
