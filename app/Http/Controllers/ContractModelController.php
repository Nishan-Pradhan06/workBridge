<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use App\Models\JobPost;
use App\Models\JobProposal;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showContractPage()
    {
        $userId = Auth::user()->id;
        $jobProposals = JobProposal::all();
        // $jobPosts=JobPost::where('user_id', $userId)->get();
        $jobPosts = JobPost::whereIn('id', $jobProposals->pluck('job_id'))->get();

        return view('features.contracts.contract',compact('jobProposals', 'jobPosts'));
    }

    // public function showContractPage($proposalId)
    // {
    //     // Retrieve the proposal by its ID
    //     $proposal = JobProposal::find($proposalId);
        
    //     if (!$proposal) {
    //         return redirect()->back()->with('error', 'Proposal not found');
    //     }

    //     // Retrieve freelancer profile data
    //     $freelancerProfile = Profile::where('user_id', $proposal->user_id)->first();

    //     // Pass the proposal and freelancer profile to the view
    //     return view('features.contracts.contract', compact('proposal', 'freelancerProfile'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractModel $contractModel)
    {
        //z
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContractModel $contractModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContractModel $contractModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractModel $contractModel)
    {
        //
    }
}
