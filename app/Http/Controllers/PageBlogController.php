<?php
namespace App\Http\Controllers;

use App\Models\Blog;

class PageBlogController extends Controller
{
    public function blog()
    {

        $blogs = Blog::orderBy('blog_date', 'desc')->get();
        return view('blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('title_slug', $slug)->firstOrFail();
        return view('blog_details', compact('blog'));
    }
}
