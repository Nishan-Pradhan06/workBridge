<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function showMileStonePage()
    {
        return view('features.projects.milestone');
    }

    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'milestone_title' => 'required|string|max:255',
            'milestone_des' => 'required|string',
            'status' => 'nullable|string|in:Todo,In Progress,Done', // Validate the status if provided
        ]);

        // Create a new Milestone instance
        // dd($request->all());
        $milestone = new Milestone();
        $milestone->title = $request->milestone_title;
        $milestone->description = $request->milestone_des;
        $milestone->status = $request->status ?? 'Todo';
        $milestone->save();
    }

    public function update(Request $request, Milestone $milestone)
    {
    //     $request->validate([
    //         'status' => 'required|in:Todo,In Progress,Done',
    //     ]);

    //     $milestone->update($request->only(['status']));
    //     return response()->json(['message' => 'Milestone updated successfully']);
    }
}