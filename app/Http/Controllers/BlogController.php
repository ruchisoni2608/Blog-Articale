<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogcategories;
use App\Models\Blogarticles;


class BlogController extends Controller
{
    
    public function index()
    {
        $blogcategories = Blogcategories::all();
        return view('blog.index', compact('blogcategories'));
    }
    
    public function articlesByCategory(Request $request, $categoryId)
    {
        $articles = Blogarticles::where('category_id', $categoryId)->get();
        
        // You can pass the retrieved articles to your view or process them as needed
        return view('blog.articles', compact('articles'));
    }


    
}
