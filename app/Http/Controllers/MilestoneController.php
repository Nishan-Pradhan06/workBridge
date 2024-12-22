<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'status' => 'nullable|string|in:Todo,In Progress,Done|default:todo', // Validate the status if provided
        ]);

        // Create a new Milestone instance

        $milestone = new Milestone();
        $milestone->title = $request->milestone_title;
        $milestone->description = $request->milestone_des;
        $milestone->status = $request->status ?? 'Todo';
        $milestone->save();
        // dd($request->all());
        // if ($request->wantsJson()) {
        //     return response()->json(['message' => 'Milestone added successfully', 'milestone' => $milestone], 201);
        // }

        return redirect()->back()->with(
            'success',
            'Milestone added successfully'
        );
    }

    public function update(Request $request, Milestone $milestone)
    {
        //     $request->validate([
        //         'status' => 'required|in:Todo,In Progress,Done',
        //     ]);

        //     $milestone->update($request->only(['status']));
        //     return response()->json(['message' => 'Milestone updated successfully']);
    }
    // public function show()
    // {
    //     $milestones = Milestone::OrderBY('created_at', 'desc')->where('client_id', Auth::user()->id)->get();
    //     dd($milestones);
    //     return view('features.projects.milestone', compact('milestones'));
    //     // return response()->json($milestone);
    // }
    public function show()
    {
        $milestones = Milestone::all();
        // $milestones = Milestone::where('client_id', Auth::user()->id)
        // ->orderBy('created_at', 'desc')
        // ->get();

        return view('features.projects.milestone', compact('milestones'));
    }
}
