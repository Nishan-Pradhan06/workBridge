<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('features.job.job-post');
    }

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
        // dd($request->all()); check the data is 
        try {
            $jobPost = new JobPost(); //naya object banako
            $jobPost->title = $request->title;
            $jobPost->description = $request->des;
            $jobPost->budget = $request->budget;
            $jobPost->skills = $request->skill;
            $jobPost->deadline = $request->duration;
            $jobPost->save();
            ///database  bata aako ------- form bata aako nam

            return redirect()->back()->with('success', 'Job posted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to post job');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        try {
            if (!$jobPost) {
                return view('<h1>no job available</h1>');
            }
            $jobPost = JobPost::OrderBY('created_at', 'desc')->get(); //orderby descending order ma list hunxa
            return view('features.job.all-jobs', compact('jobPost'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load jobs');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $jobPost = JobPost::find($id);
            if (!$jobPost) {
                return redirect()->back()->with('error', 'Job not found');
            } else {
                return view('features.job.edit-job', compact('jobPost'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to edit job');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $jobPost = JobPost::find($id);
            $jobPost->title = $request->title;
            $jobPost->description = $request->des;
            $jobPost->budget = $request->budget;
            $jobPost->skills = $request->skill;
            $jobPost->deadline = $request->duration;
            $jobPost->update();
            ///database  bata aako ------- form bata aako nam

            return redirect()->back()->with('success', 'Job updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update job');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jobPost = JobPost::find($id);
            if (!$jobPost) {
                return redirect()->back()->with('error', 'Job not found');
            } else {
                $jobPost->delete();
                return redirect()->back()->with('success', 'Job deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete job post!');
        }
    }
}
