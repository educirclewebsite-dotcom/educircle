<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('blog_date', 'desc')->take(3)->get();
        return view('home', compact('blogs'));

    }
}
