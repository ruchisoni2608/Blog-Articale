<?php

namespace App\Http\Controllers;

use App\Models\FAQcategory;
use Illuminate\Http\Request;


class FAQcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqcategory=FAQcategory::all();
        return view('faqscategory.index', compact('faqcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('faqscategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'category' => 'required',
           
        ]);

        FAQcategory::create($validatedData);

        return redirect()->route('faqscategory.index')->with('success', 'FAQ created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQcategory $fAQcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faqcategory = FAQcategory::findOrFail($id);
        return view('faqscategory.edit', compact('faqcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            
        ]);

        $faqcategory = FAQcategory::findOrFail($id);
        $faqcategory->update($validatedData);

        return redirect()->route('faqscategory.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy($id)
    {
        $faqcategory = FAQcategory::findOrFail($id);
        

        $faqcategory->delete();
          return redirect()->route('faqscategory.index')->with('success', 'FAQ updated successfully');
       
    }
}
