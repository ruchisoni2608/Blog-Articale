<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;
use App\Models\FAQcategory;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
    $faqcategories = FAQcategory::all();
    
        return view('faqs.index', compact('faqs','faqcategories'));

    }

    public function create()
    {
        $action = 'create'; 
        $faqcategories = FAQcategory::all();
        return view('faqs.create', compact('action','faqcategories'));
    }

    public function store(Request $request)
    {
     //  dd($request->all());
      
         $request->validate([
            'category' => 'required',
            'title' => 'required',
            'answer' => 'required',
    ]);

        $faq = new FAQ;
        $faq->title = $request->input('title');
        $faq->answer = $request->input('answer');
        $faq->category = $request->input('category'); // Assign the category_id

        $faq->save();

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully');
    }

    public function edit($id)
    {
        $action = 'edit'; 
        $faq = FAQ::findOrFail($id);
         $faqcategories = FAQcategory::all();
        return view('faqs.edit', compact('action','faq','faqcategories'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'category' => 'required',
            'title' => 'required',
            'answer' => 'required',
    ]);

        $faq = FAQ::findOrFail($id);
        $faq->title = $request->input('title');
        $faq->answer = $request->input('answer');
        $faq->category = $request->input('category'); // Assign the category_id

        $faq->save();

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy($id)
    {
         $faq = FAQ::findOrFail($id);
         $faq->delete();

       return redirect()->route('faqs.index')->with('success', 'FAQ Deleted successfully');
 

    }

    
    

}