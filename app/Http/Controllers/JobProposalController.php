<?php

namespace App\Http\Controllers;

use App\Models\JobProposal;
use Illuminate\Http\Request;
use PHPUnit\Architecture\Storage\ObjectsStorage;

class JobProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('features.proposal.submit_proposal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $jobProposal = new JobProposal(); //new objects
            $jobProposal->due_date = $request->due_date;
            $jobProposal->amount = $request->amount;
            $jobProposal->project_duration = $request->project_duration;
            $jobProposal->cover_letter = $request->cover_letter;
            $jobProposal->save();

            return redirect()->back()->with('success', 'Proposal submitted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit Proposal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JobProposal $jobProposal)
    {
        try {
            $jobProposal = JobProposal::all();
            return view('features.proposal.proposal_list', compact('jobProposal'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to fetch proposal');
        }
    }

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
            }
            else {
                $jobProposal->delete();
                return redirect()->back()->with('sucess','JobProposal delete Sucessfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete job Proposal');
        }
    }
}
