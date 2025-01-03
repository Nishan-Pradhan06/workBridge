<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\JobProposal;
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

        // Fetch the jobs that belong to the client (this assumes 'client_id' exists in the job posts)
        $jobPosts = JobPost::where('client_id', $user->id)->get();

        // Fetch proposals related to these job posts and filter by pending status
        $pendingProposals = JobProposal::whereIn('job_id', $jobPosts->pluck('id'))
            ->where('status', 'pending')->orderBy('amount', 'asc')  // Assuming 'status' is a column in JobProposal && Sort by amount in ascending order
            ->get();  // Fetch the proposals
        // dd($pendingProposals);
        // Count the pending proposals
        $pendingProposalsCount = $pendingProposals->count();
        return view('users.clients.dashboard', compact('user', 'pendingProposals', 'pendingProposalsCount'));
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
