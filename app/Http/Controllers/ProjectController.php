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
        // Validate the form input
        $validated = $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Create the project record in the database
        $project = Project::create([
            'job_post_id' => $validated['job_post_id'],
            'title' => $validated['title'],
            'date' => $validated['date'],
            'status' => $validated['status'],
        ]);
        // Redirect back with a success message
        return redirect()->route('features.projects.new_project')->with('success', 'Project created successfully.');
        dd($project);
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
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
