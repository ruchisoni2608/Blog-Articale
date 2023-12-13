<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request, string $id)
{
   //  dd($request->all());
//  dd($request->hasFile('profile_photo'));
    
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'bio' => 'required',
       // 'profile_photo' => 'image|mimes:jpeg,jpg,png|max:2048', // Add your validation rules
        // Add more validation rules as needed
    ]);

    $imagePath = $user->profile_photo;
//dd($request->all());
    // Handle profile photo upload if a new file is provided
    if ($request->hasFile('file')) {
        // Delete old profile photo if it exists
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Store the new profile photo
        $imagePath = $request->file('file')->store('images', 'public');
        //dd($imagePath);
    }

    $user->update([
        'name' => $request->name,
        'designation' => $request->designation,
        'bio' => $request->bio,
        'website' => $request->website,
        'profile_photo' => $imagePath,
    ]);
//dd($user);
    return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
}

//      public function update(Request $request, string $id)
// {
//     $user = User::findOrFail($id);

//     $request->validate([
//         'name' => 'required',
//         'designation' => 'required',
//         'bio' => 'required',
//         // Add more validation rules as needed
//     ]);

//     $imagePath = $user->profile_photo;

//     // Handle profile photo upload if a new file is provided
//     if ($request->hasFile('profile_photo')) {
//         // Delete old profile photo if it exists
//         if ($user->profile_photo) {
//             Storage::disk('public')->delete($user->profile_photo);
//         }

//         // Store the new profile photo
//         $imagePath = $request->file('profile_photo')->store('images', 'public');
//     }

//     $user->update([
//         'name' => $request->name,
//         'designation' => $request->designation,
//         'bio' => $request->bio,
//         'website' => $request->website,
//         'profile_photo' => $imagePath,
//     ]);

//     return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
// }

    
      //dd($request->all());
 //  dd($request->hasFile('profile_photo'));
      // dd($name,$designation,$website); 

//     public function update(Request $request, string $id)
// {
//     $user = User::findOrFail($id); // Assuming your User model is named "User"

//     $request->validate([
//         'name' => 'required',
//         'designation' => 'required',
//         'bio' => 'required',
//         // Add more validation rules as needed
//     ]);
//       if ($request->hasFile('profile_photo') ){
//         $imagePath = request('profile_photo')->store('images', 'public');
//     } else {
//         $imagePath = $user->profile_photo;
//     }

     
//     $user->update([
//         'name' => $request->name,
//         'designation' => $request->designation,
//         'bio' => $request->bio,
//         'website' => $request->website,
//         'profile_photo' => $imagePath,
//     ]);
//     return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
  
//     // if ($request->hasFile('profile_photo')) {
//     //     // Handle profile photo upload
//     //     $imagePath = $request->file('profile_photo')->store('images', 'public');

//     //     if ($user->profile_photo) {
//     //         Storage::disk('public')->delete('images/' . $user->profile_photo);
//     //     }

//     //     $user->profile_photo = basename($imagePath);
//     // }

  
//       //  $user->update($request->only(['name', 'designation', 'bio', 'website']));

//           }

    
    // public function update(Request $request, string $id)
    // {
    //     dd($request->all());
      
    //      $request->validate([
          
    //     'name' => 'required',
    //     'designation' => 'required',
    //     'bio' => 'required',
    //     //     'website' => 'nullable',
    //     //       'profile_photo' => 'nullable|image|max:2048', 
    //     //     // Add more validation rules as needed
    //     ]);
    //       if ($request->hasFile('profile_photo')) {
    //         // Handle profile photo upload
    //         $imagePath = $request->file('profile_photo')->store('images', 'public');

    //         if ($user->profile_photo) {
    //             Storage::disk('public')->delete('images/' . $user->profile_photo);
    //         }

    //         $user->profile_photo = basename($imagePath);
    //     }

    //     $user->update($request->only(['name', 'designation', 'bio', 'website']));

    //     return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
   
    // }
    /**
     * Display the specified resource.
     */
     public function show(string $id)
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
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


    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
