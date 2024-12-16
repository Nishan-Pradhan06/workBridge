<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showProjectsTrackingPage()
    {
        return view('features.projects.tracking');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectModel $projectModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectModel $projectModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectModel $projectModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectModel $projectModel)
    {
        //
    }
}
