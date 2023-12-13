<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogarticles;
use App\Models\Blogcategories;

class BlogarticleController extends Controller
{
    public function index()
    {
        $blogarticles = Blogarticles::all();
        $blogcategories = Blogcategories::all();
        return view('blogarticles.index', compact('blogarticles','blogcategories'));
    }

    public function create()
    {
        $blogcategories = Blogcategories::all();
        return view('blogarticles.create', compact('blogcategories'));
    }


public function test(){
     $blogcategories = Blogcategories::all();
    return view('blogarticles.test', compact('blogcategories'));
}

// public function store(Request $request)
// {
//   //dd($request->all());
//     $request->validate([
//         'title' => 'required|max:255',
//         'content' => 'required',
//         'category_id' => 'required',        
//         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
//     ]);

//     $blogarticles = new Blogarticles;
//     $blogarticles->title = $request->title;
//     $blogarticles->content = $request->content;
//     $blogarticles->status = $request->has('status') ? 1 : 0; // Set status based on switch toggle

//     // Handle image upload
//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $filename = $image->getClientOriginalName();
//         $image->move(public_path('images'), $filename);
//         $blogarticles->image = $filename; // Store the filename in the "image" column
//     }


//         $blogarticles->save();


//     // Attach the selected category to the blog article
//     $category_id = $request->input('category_id');
//     $blogarticle->blogcategories()->attach($category_id);


//     return redirect()->route('blogarticles.index')->with('success', 'Blog article created successfully');
// }

public function store(Request $request)
{
  //dd($request->all());
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
       'category_id' => 'required', // Ensure the selected category exists in the blogcategories table
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
    ]);

    $blogarticle = new Blogarticles;
    $blogarticle->title = $request->input('title');
    $blogarticle->content = $request->input('content');
    $blogarticle->status = $request->has('status') ? 1 : 0; // Set status based on switch toggle

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);
        $blogarticle->image = $filename; // Store the filename in the "image" column
    }

  
    // $category_ids = $request->input('category_id', []);
    // $blogarticle->category_ids = $category_ids; // Assign the selected category IDs as an array

   
            
        $blogarticle->category_id = $request->input('category_id'); // Assign the category_id

        $blogarticle->save();

        
    return redirect()->route('blogarticles.index')->with('success', 'Blog article created successfully');
}





    public function show(Blogarticles $blogarticle)
    {
        return view('blogarticles.show', compact('blogarticle'));
    }

    public function edit(Blogarticles $blogarticle)
    {
        $blogcategories = Blogcategories::all();
        return view('blogarticles.edit', compact('blogarticle', 'blogcategories'));
    }

    public function update(Request $request,$id)
    {
         $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        //'category_id' => 'required', // Ensure the selected category exists in the blogcategories table
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image upload
    ]);

      // Find the blog article by its ID
    $blogarticle = Blogarticles::findOrFail($id);

    $blogarticle->title = $request->input('title');
    $blogarticle->content = $request->input('content');
    $blogarticle->status = $request->has('status') ? 1 : 0; // Set status based on switch toggle

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);
        $blogarticle->image = $filename; // Store the filename in the "image" column
    }

            
        $blogarticle->category_id = $request->input('category_id'); // Assign the category_id

        $blogarticle->save();

        
        return redirect()->route('blogarticles.index')->with('success', 'Blogarticles updated successfully');
    }

    public function destroy(Blogarticles $blogarticle)
    {
        $blogarticle->delete();

        return redirect()->route('blogarticles.index')->with('success', 'Blogarticles deleted successfully');
        
    }
}
