<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\JobProposal;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Architecture\Storage\ObjectsStorage;

class JobProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobPost $job)
    {
        return view('features.proposal.submit_proposal', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobPost $job)
    {

        $jobProposal = new JobProposal(); //new objects
        $jobProposal->job_id = $job->id;
        $jobProposal->user_id = Auth::id();
        $jobProposal->due_date = $request->due_date;
        $jobProposal->amount = $request->amount;
        $jobProposal->project_duration = $request->project_duration;
        $jobProposal->cover_letter = $request->cover_letter;
        $jobProposal->save();

        return redirect()->back()->with('success', 'Proposal submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show($jobId)
    // {
    //         $jobProposals = JobProposal::where('job_id', $jobId)->get();
    //         return view('features.proposal.proposal_list', compact('jobProposals'));

    // }
    public function show($jobId)
    {
        try {
            $jobProposals = JobProposal::where('job_id', $jobId)->get();
            $jobPost = JobPost::find($jobId); // Get the specific job details
            // $jobProposals = JobProposal::where('job_id', $jobId)->with(['user', 'profile'])->get();

            // Pass both the job and its proposals to the view
            return view('features.proposal.proposal_list', compact('jobProposals', 'jobPost'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load job proposals');
        }
    }
    // public function show($jobId)
    // {
    //     try {
    //         $jobProposals = JobProposal::where('job_id', $jobId)->get();
    //         $jobPost = JobPost::find($jobId);

    //         // Fetch profiles for each proposal
    //         $proposalsWithProfiles = $jobProposals->map(function ($proposal) {
    //             // Assuming each proposal has a user_id or freelancer_id
    //             $profile = Profile::where('user_id', $proposal->user_id)->first();
    //             $proposal->profile = $profile;
    //             return $proposal;
    //         });

    //         return view('features.proposal.proposal_list', [
    //             'jobProposals' => $proposalsWithProfiles,
    //             'jobPost' => $jobPost
    //         ]);
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to load job proposals');
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $jobProposal = JobProposal::find($id);
            if (!$jobProposal) {
                return redirect()->back()->with('error', 'Proposal not found');
            }
        } catch (\Exception $e) {
            return view('features.proposal.edit_proposal', compact('jobProposal'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $jobProposal = JobProposal::find($id);
            $jobProposal->due_date = $request->due_date;
            $jobProposal->amount = $request->amount;
            $jobProposal->project_duration = $request->project_duration;
            $jobProposal->cover_letter = $request->cover_letter;
            $jobProposal->update();

            return redirect()->back()->with('success', 'Proposal update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Proposal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jobProposal = JobProposal::find($id);
            if (!$jobProposal) {
                return redirect()->back()->with('error', 'Proposal not found');
            } else {
                $jobProposal->delete();
                return redirect()->back()->with('sucess', 'JobProposal delete Sucessfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete job Proposal');
        }
    }
}
