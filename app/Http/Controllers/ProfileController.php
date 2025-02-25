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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // |mimes:jpeg,png,jpg,gif|max:2048'
        // Validate the request data
        $request->validate([
            'profilePic' => 'nullable|image',
            'location' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'skillLevel' => 'required|string|in:beginner,intermediate,expert',
            'jobTitle' => 'nullable|string|max:255',
            'jobDesc' => 'nullable|string',
            'portfolio' => 'nullable|url',
            'hoursPerWeek' => 'nullable|integer|min:0',
            'certificationFiles.*' => 'nullable|mimes:pdf,jpg,png|max:2048',
        ]);

        // Create a new profile for the logged-in freelancer
        $profile = new Profile();
        $profile->user_id = Auth::id(); // Use Auth::id() as a cleaner alternative
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->skills = $request->skills;
        $profile->skill_level = $request->skillLevel;
        $profile->job_title = $request->jobTitle;
        $profile->job_description = $request->jobDesc;
        $profile->portfolio_link = $request->portfolio;
        $profile->hours_per_week = $request->hoursPerWeek;

        // Save profile picture if uploaded
        if ($request->hasFile('profilePic')) {
            $path = $request->file('profilePic')->store('profiles', 'public');
            $profile->profile_picture = $path;
        }

        // Save certification files if uploaded
        if ($request->hasFile('certificationFiles')) {
            $certifications = array_map(
                fn($file) => $file->store('certifications', 'public'),
                $request->file('certificationFiles')
            );
            $profile->certification_files = json_encode($certifications);
        }

        // Save the profile record to the database
        $profile->save();

        // Redirect to the freelancer dashboard or another route
        return redirect()->route('freelancer.dashboard', ['id' => Auth::id()])
            ->with('success', 'Profile created successfully.');
    }


    public function show()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('users.freelancers.profile', compact('profile'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found');
        } else {
            return view('users.freelancers.edit_profile', compact('profile'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $profile = Profile::find($id);
    //     $profile->user_id = Auth::id(); // Use Auth::id() as a cleaner alternative
    //     $profile->location = $request->location;
    //     $profile->bio = $request->bio;
    //     $profile->skills = $request->skills;
    //     $profile->skill_level = $request->skillLevel;
    //     $profile->job_title = $request->jobTitle;
    //     $profile->job_description = $request->jobDesc;
    //     $profile->portfolio_link = $request->portfolio;
    //     // $profile->hours_per_week = $request->hoursPerWeek;
    //     $profile->hours_per_week = preg_replace('/[^0-9]/', '', $request->hoursPerWeek);

    //     // Save profile picture if uploaded
    //     if ($request->hasFile('profilePic')) {
    //         $path = $request->file('profilePic')->store('profiles', 'public');
    //         $profile->profile_picture = $path;
    //     }

    //     // Save certification files if uploaded
    //     if ($request->hasFile('certificationFiles')) {
    //         $certifications = array_map(
    //             fn($file) => $file->store('certifications', 'public'),
    //             $request->file('certificationFiles')
    //         );
    //         $profile->certification_files = json_encode($certifications);
    //     }

    //     // Save the profile record to the database
    //     $profile->save();

    //     // Redirect to the freelancer dashboard or another route
    //     return
    //         redirect()->back()->with('success', 'Profile updated successfully');
    // }

    // public function update(Request $request, $id)
    // {
    //     // Find the user's profile
    //     $profile = Profile::findOrFail($id);

    //     // Ensure only the authenticated user can update their profile
    //     if (Auth::id() !== $profile->user_id) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     // Validate the request data
    //     // $request->validate([
    //     //     'profilePic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     //     'location' => 'required|string|max:255',
    //     //     'bio' => 'nullable|string',
    //     //     'skills' => 'nullable|string',
    //     //     'skillLevel' => 'required|string|in:beginner,intermediate,expert',
    //     //     'jobTitle' => 'nullable|string|max:255',
    //     //     'jobDesc' => 'nullable|string',
    //     //     'portfolio' => 'nullable|url',
    //     //     'hoursPerWeek' => 'nullable|integer|min:0',
    //     //     'certificationFiles.*' => 'nullable|mimes:pdf,jpg,png|max:2048',
    //     // ]);

    //     // Update profile details
    //     $profile->location = $request->location;
    //     $profile->bio = $request->bio;
    //     $profile->skills = $request->skills;
    //     $profile->skill_level = $request->skillLevel;
    //     $profile->job_title = $request->jobTitle;
    //     $profile->job_description = $request->jobDesc;
    //     $profile->portfolio_link = $request->portfolio;
    //     $profile->hours_per_week = preg_replace('/[^0-9]/', '', $request->hoursPerWeek);

    //     // Handle profile picture upload
    //     if ($request->hasFile('profilePic')) {
    //         // Delete old profile picture if it exists
    //         if ($request->hasFile('profilePic')) {
    //             $path = $request->file('profilePic')->store('profiles', 'public');
    //             $profile->profile_picture = $path;
    //         }

    //         // Handle certification files
    //         if ($request->hasFile('certificationFiles')) {
    //             $certifications = [];
    //             foreach ($request->file('certificationFiles') as $file) {
    //                 $certifications[] = $file->store('certifications', 'public');
    //             }

    //             // Merge with existing certifications if they exist
    //             $existingCertifications = json_decode($profile->certification_files, true) ?? [];
    //             $profile->certification_files = json_encode(array_merge($existingCertifications, $certifications));
    //         }

    //         // Save the updated profile
    //         $profile->save();

    //         return redirect()->back()->with('success', 'Profile updated successfully.');
    //         // return redirect()->back()->with('error', 'Profile not found');
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
