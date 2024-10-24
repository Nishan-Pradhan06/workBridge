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
     * Display only non-deleted jobs.
     */
    public function showActiveJobs()
    {
        try {
            //only fetch jobs that are not soft deleted
            $jobPost = JobPost::whereNull('deleted_at')->OrderBY('created_at', 'desc')->get(); //orderby descending order ma list hunxa
            return view('users.freelancers.index', compact('jobPost'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load jobs');
        }
    }
    /**
     * Display all jobs, including soft-deleted ones.
     */
    public function showAllJobs()
    {
        try {
            // fetch all jobs, including soft deleted
            $jobPost = JobPost::withTrashed()->OrderBY('created_at', 'desc')->get(); //orderby descending order ma list hunxa
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
            $jobPost = JobPost::withTrashed()->find($id);/**withTrashed le softdelete gareko post jiob ni permanenlty delete hunca ya */
            if (!$jobPost) {
                return redirect()->back()->with('error', 'Job not found');
            } else {
                $jobPost->forceDelete();
                return redirect()->back()->with('success', 'Job deleted successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete job post!');
        }
    }

    /**
     * Removing posting /soft delete gareko.
     */
    public function softDelete($id)
    {
        try {
            $jobPost = JobPost::find($id);
            if (!$jobPost) {
                return redirect()->back()->with('error', 'Job not found');
            }
            $jobPost->delete();
            return redirect()->back()->with('success', 'Job soft deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to soft delete job post');
        }
    }
    // restore/ repost garne function soft deleted gareko post
    public function restore($id)
    {
        try {
            $jobPost = JobPost::withTrashed()->find($id);
            if (!$jobPost) {
                return redirect()->back()->with('error', 'Job not found');
            }
            $jobPost->restore(); //restore the soft deleted job
            return redirect()->back()->with('success', 'Job restore successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to restore job');
        }
    }
}
