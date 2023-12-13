<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogcategories;

class BlogcategoryController extends Controller
{
    public function index()
    {
        $blogcategories = Blogcategories::all();
        return view('blogcategories.index', compact('blogcategories'));
    }

    public function create()
    {
        return view('blogcategories.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:0,1',
            'description'=>'required',
        ]);

        Blogcategories::create([
            'name' => $request->input('name'),
            'status' =>$request->input('status',0),
            'description'=>$request->input('description'),
        ]);

        return redirect()->route('blogcategories.index')->with('success', 'Blogcategories created successfully');
    }

    public function show(Blogcategories $blogcategory)
    {
        return view('blogcategories.show', compact('blogcategory'));
    }

    public function edit(Blogcategories $blogcategory)
    {
        return view('blogcategories.edit', compact('blogcategory'));
    }

    public function update(Request $request,Blogcategories $blogcategory)
    {
     // dd($request->all());
        $request->validate([
            'name' => 'required', 
            //'status' => 'required|in:0,1',
            'description'=>'required',
        ]);

        $blogcategory->update([
            'name' => $request->input('name'),
            'status' => $request->input('status',0),
          
            'description'=>$request->input('description'),
        ]);

        return redirect()->route('blogcategories.index')->with('success', 'Blogcategories updated successfully');
    }

    public function destroy(Blogcategories $blogcategory)
    {
        $blogcategory->delete();
        
        return redirect()->route('blogcategories.index')->with('success', 'Blogcategories deleted successfully');
    }
}
