<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function clientProfile(){
        return view('client-profile');
    }

    public function freelancerProfile(){
        return view('users.freelancers.settingup_profile');
    }

    public function upload(Request $request)
    {
        // Validate the image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        // Store the image
        $path = $request->file('image')->store('uploads', 'public');

        // Optional: Save the path to the database
        $image = new Image();
        $image->path = $path;
        $image->save();

        return back()->with('success', 'Image uploaded successfully!')->with('path', $path);
    }
}
