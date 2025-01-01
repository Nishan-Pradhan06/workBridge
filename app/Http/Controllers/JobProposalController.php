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
    // public function index(JobPost $job)
    // {
    //     return view('features.proposal.submit_proposal', compact('job'));
    // }

    public function index(JobPost $job)
    {
        // Check if the authenticated user has already submitted a proposal for this job
        $hasSubmittedProposal = JobProposal::where('job_id', $job->id)
            ->where('user_id', Auth::id())
            ->exists();

        // Pass the flag to the view
        return view('features.proposal.submit_proposal', compact('job', 'hasSubmittedProposal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobPost $job)
    {

        // $jobProposal = new JobProposal(); //new objects
        // $jobProposal->job_id = $job->id;
        // $jobProposal->user_id = Auth::id();
        // $jobProposal->due_date = $request->due_date;
        // $jobProposal->amount = $request->amount;
        // $jobProposal->project_duration = $request->project_duration;
        // $jobProposal->cover_letter = $request->cover_letter;
        // $jobProposal->save();

        // return redirect()->back()->with('success', 'Proposal submitted successfully');
        try {
            // Check if a proposal already exists for this user and job
            $existingProposal = JobProposal::where('job_id', $job->id)
                ->where('user_id', Auth::id())
                ->first();

            if ($existingProposal) {
                // Redirect back with an error message if a proposal already exists
                return redirect()->back()->with('error', 'You have already submitted a proposal for this job.');
            }

            // Create a new proposal
            $jobProposal = new JobProposal();
            $jobProposal->job_id = $job->id;
            $jobProposal->user_id = Auth::id();
            $jobProposal->due_date = $request->due_date;
            $jobProposal->amount = $request->amount;
            $jobProposal->project_duration = $request->project_duration;
            $jobProposal->cover_letter = $request->cover_letter;
            $jobProposal->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Proposal submitted successfully');
        } catch (\Exception $e) {
            // Handle errors and redirect back with an error message
            return redirect()->back()->with('error', 'Failed to submit proposal.');
        }
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

    public function proposalPending(JobProposal $proposal)
    {
        $proposal->update(['status' => 'pending']);
        return redirect()->back()->with('status', 'Pending successfully');
    }
    public function acceptProposal($id)
    {
        try {
            $proposal = JobProposal::find($id);

            if (!$proposal) {
                return redirect()->back()->with('error', 'Proposal not found.');
            }

            // Accept the selected proposal
            $proposal->status = 'accepted';
            $proposal->save();

            // Reject other proposals for the same job
            JobProposal::where('job_id', $proposal->job_id)
                ->where('id', '!=', $id) // Exclude the accepted proposal
                ->update(['status' => 'rejected']);

            // Optionally, trigger a project start logic
            // $this->startProject($proposal);

            return redirect()->back()->with('success', 'Proposal accepted. Other proposals rejected.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to accept proposal.');
        }
    }

    public function rejectProposal($id)
    {
        try {
            $proposal = JobProposal::find($id);

            if (!$proposal) {
                return redirect()->back()->with('error', 'Proposal not found.');
            }

            // Update status to rejected
            $proposal->status = 'rejected';
            $proposal->save();

            return redirect()->back()->with('success', 'Proposal rejected successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to reject proposal.');
        }
    }
    // private function startProject(JobProposal $proposal)
    // {
    //     // Example: Create a new project using the proposal details
    //     Project::create([
    //         'job_id' => $proposal->job_id,
    //         'freelancer_id' => $proposal->user_id,
    //         'start_date' => now(),
    //         'status' => 'in_progress',
    //     ]);
    // }

    public function showProposalStatus()
    {

        $ProposalList = JobProposal::where('user_id', Auth::id())->get();  // Fetch proposals for the logged-in user
        $jobPost = JobPost::all();  // Fetch job posts  

        $ProposalStatus = [
            'jobDetails' => $jobPost,
            'proposals' => $ProposalList,
        ];
        // dd($ProposalStatus);
        return view('features.proposal.proposal_status', compact('ProposalStatus'));
        // $ProposalStatus = JobProposal::where('job_id', $jobId)->with('user_id', Auth::id())->get();
        // $jobPost = JobPost::find($jobId);
        // return view('features.proposal.proposal_status', compact('ProposalStatus', 'jobPost'));

        // Get the proposal status for the specific job and logged-in user
        // $ProposalStatus = JobProposal::where('job_id')
        //     ->where('user_id', Auth::id()) // Ensure filtering by the logged-in user
        //     ->get();
        // $ProposalList = JobProposal::all();
        // $jobPost = JobPost::all();

        // $ProposalStatus = [
        //     'jobDetails' => $jobPost,
        //     'proposals' => $ProposalList,
        // ];

        // return view('features.proposal.proposal_status', compact('ProposalStatus'));




        // Fetch the job post details
        // $jobPost = JobPost::all();

        // Return the view with the filtered data
    }
    // public function showProposalStatus($jobId)
    // {
    //     // Fetch the job post details
    //     $jobPost = JobPost::find($jobId);

    //     // Return an error page or redirect if the job post is not found
    //     if (!$jobPost) {
    //         return redirect()->back()->with('error', 'Job post not found.');
    //     }

    //     // Get the proposal status for the specific job and logged-in user
    //     $ProposalStatus = JobProposal::where('job_id', $jobId)
    //         ->where('user_id', Auth::id()) // Ensure filtering by the logged-in user
    //         ->get();

    //     // Return the view with the filtered data
    //     return view('features.proposal.proposal_status', compact('ProposalStatus', 'jobPost'));
    // }

}
