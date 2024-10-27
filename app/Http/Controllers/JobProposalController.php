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
        $jobProposal= new JobProposal(); //new objects
        $jobProposal->title = $request->title;
        $jobProposal->description = $request->description;
    }

    /**
     * Display the specified resource.
     */
    public function show(JobProposal $jobProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobProposal $jobProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobProposal $jobProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobProposal $jobProposal)
    {
        //
    }
}
