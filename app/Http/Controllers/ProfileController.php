<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function UserProfileDetailsForm()
    {
        return view('users.freelancers.on_boarding');
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
        // Validate request (optional, can uncomment if needed)
        // $request->validate([
        //     'profilePic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'location' => 'required|string|max:255',
        //     'bio' => 'nullable|string',
        //     'skills' => 'nullable|string',
        //     'skillLevel' => 'required|string|in:beginner,intermediate,expert',
        //     'jobTitle' => 'nullable|string|max:255',
        //     'jobDesc' => 'nullable|string',
        //     'portfolio' => 'nullable|url',
        //     'hoursPerWeek' => 'nullable|integer|min:0',
        //     'certificationFiles.*' => 'nullable|mimes:pdf,jpg,png|max:2048',
        // ]);

        // Create new profile for freelancer
        $profile = new Profile();
        $profile->user_id = Auth::user()->id;
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->skills = $request->skills;
        $profile->skill_level = $request->skillLevel;
        $profile->job_title = $request->jobTitle;
        $profile->job_description = $request->jobDesc;
        $profile->portfolio_link = $request->portfolio;
        $profile->hours_per_week = $request->hoursPerWeek;

        // Save profile picture if exists
        if ($request->hasFile('profilePic')) {
            $path = $request->file('profilePic')->store('profiles', 'public');
            $profile->profile_picture = $path;
        }

        // Save certifications if any
        if ($request->hasFile('certificationFiles')) {
            $profile->certification_files = json_encode(
                array_map(fn($file) => $file->store('certifications', 'public'), $request->file('certificationFiles'))
            );
        }

        // Save profile data
        $profile->save();

        // Redirect to freelancer dashboard after profile setup
        return redirect()->route('freelancer.dashboard', ['id' => Auth::user()->id])
            ->with('success', 'Profile created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
