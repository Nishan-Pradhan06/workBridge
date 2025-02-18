<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = User::count();
        // Fetch users by roles
        // $clients = User::where('role', 'client')->get();
        // $freelancers = User::where('role', 'freelancer')->get();

        $search = $request->get('search'); // Get the search query
        $usersQuery = User::query()
            ->whereIn('role', ['client', 'freelancer'])->whereIn('status', ['active', 'suspended']);;

        // Apply search filter if search query exists
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }
        $users = $usersQuery->latest()->take(6)->get();
        // $users = User::whereIn('role', ['client', 'freelancer'])->latest()->take(6)->get();
        // Count users by roles
        $totalClients = User::where('role', 'client')->count();
        $suspendedUser = User::whereIn('role', ['client', 'freelancer'])->where('status', 'suspended')->count();
        $totalFreelancers = User::where('role', 'freelancer')->count();

        // Pass both user lists and counts to the view
        return view("users.admin.admin", compact('totalUsers', 'totalClients', 'totalFreelancers', 'users', 'suspendedUser'));
    }

    public function showUsersPage()
    {
        $users = User::whereIn('role', ['client', 'freelancer'])->paginate(8);
        return view("users.admin.users", compact('users'));
    }
    public function showPaymentsPage()
    {
        // $users = User::whereIn('role', ['client', 'freelancer'])->paginate(8);
        // return view("users.admin.users", compact('users'));
        $paymentDetails = Payment::all();
        // dd($paymentDetails);
        return view("users.admin.payments", compact('paymentDetails'));
    }

    // Suspended== user
    public function suspendUser(User $user)
    {
        $user->update(['status' => 'suspended']);
        return redirect()->back()->with('status', 'User suspended successfully');
    }

    // Activate user
    public function activateUser(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect()->back()->with('status', 'User activated successfully');
    }
}
