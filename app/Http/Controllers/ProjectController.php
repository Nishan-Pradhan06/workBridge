<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\JobPost;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPosts = JobPost::all();
        $projects = Project::with('jobPost')->get();
        return view('features.projects.new_project', compact('projects', 'jobPosts'));
    }
    public function showProjectFreelancer()
    {
        $jobPosts = JobPost::all();
        $projects = Project::with('jobPost')->get();
        return view('users.freelancers.view_projects', compact('projects', 'jobPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $jobPosts = JobPost::select('id', 'title', 'date', 'status')->get();
    //     return view('features.projects.new_project', compact('jobPosts'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Create a new project instance and save the data
        $project = new Project();
        $project->job_post_id = $request->job_post_id; // Correctly retrieve job_post_id from the request
        $project->title = $request->title;
        $project->date = $request->date;
        $project->status = $request->status;
        $project->save();
        dd($project);
        return redirect()->back()->with('success', 'Project Created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $projects = Project::all();
        // dd($projects);
        return view('features.projects.show_project', compact('projects'));
    }
    public function setPending(Project $project)
    {
        $project->update(['status' => 'pending']);
        return redirect()->back()->with('status', 'Project status updated to Pending.');
    }

    public function setInProgress(Project $project)
    {
        $project->update(['status' => 'in_progress']);
        return redirect()->back()->with('status', 'Project status updated to In Progress.');
    }

    public function setCompleted(Project $project)
    {
        $project->update(['status' => 'completed']);
        return redirect()->back()->with('status', 'Project status updated to Completed.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $jobPosts = JobPost::select('id', 'title')->get();
        return view('projects.edit', compact('project', 'jobPosts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
