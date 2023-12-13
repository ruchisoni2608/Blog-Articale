<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



   // ...
// public function store(Request $request)
// {
//  $user = User::findOrFail($request->user_id); 
//     $request->validate([
//         'name' => 'required',
//         'designation' => 'required',
//         'bio' => 'required',
//         'website' => 'nullable',
//         'profile_photo' => 'nullable|image|max:2048', // Max size 2MB
//         // Add more validation rules as needed
//     ]);

//     // Handle profile photo upload if provided
//    if ($request->hasFile('profile_photo')) {
//         $imagePath = $request->file('profile_photo')->store('images', 'public');

//         // Delete the old profile photo, if it exists
//         if ($user->profile_photo) {
//             Storage::disk('public')->delete($user->profile_photo);
//         }

//         // Update the profile photo filename (without the images/ part)
//         $user->profile_photo = basename($imagePath);
//     }



//     // Update user profile fields
//     $user->update([
//         'name' => $request->name,
//         'designation' => $request->designation,
//         'bio' => $request->bio,
//         'website' => $request->website,
//         // Update other fields as needed
//     ]);

//     return redirect()->route('profile.show')->with('success', 'Profile created successfully.');
// }

    public function update(Request $request)
    {
    //   
        $user = Auth::user();
       // dd($user);
  // $user = User::findOrFail($request->user_id); 
//dd($user);

        $request->validate([
          
        'name' => 'required',
        'designation' => 'required',
            'bio' => 'required',
        //     'website' => 'nullable',
        //       'profile_photo' => 'nullable|image|max:2048', 
        //     // Add more validation rules as needed
        ]);
      
        // Handle profile photo upload if provided

        // if ($request->hasFile('profile_photo')) {
        //         $imagePath = $request->file('profile_photo')->store('images', 'public');

        //         // Delete the old profile photo, if it exists
        //         // if ($user->profile_photo) {
        //         //     Storage::disk('public')->delete('images/' .$user->profile_photo);
        //         // }

        //         // Update the profile photo filename (without the images/ part)
        //         $user->profile_photo = basename($imagePath);
        //     }

             // Handle dropzone image upload
            if ($request->hasFile('profile_photo')) {
                  
                    $filename = $image->getClientOriginalName();
                    $image->move(public_path('images'), $filename);

                    // Save image data to the images table
                    $user->profile_photo()->create([
                        'profile_photo' => $profile_photo,
                    ]);
               


        // Update user profile fields
        $user->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'bio' => $request->bio,
            'website' => $request->website,
             'profile_photo' => $request->profile_photo,
            // Update other fields as needed
        ]);
        dd("44");
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    
            }
        }
    public function removeImage(Request $request)
    {
        $filename = $request->filename;
        $user = Auth::user();

        // Delete the image from storage
        Storage::disk('public')->delete('images/' . $filename);

        // Update the user's profile_photo to null
        $user->update(['profile_photo' => null]);

        return response()->json(['message' => 'Profile image removed successfully']);
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


}