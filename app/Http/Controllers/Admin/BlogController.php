<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{

    public function index()
    {

        return view('admin.blog.index');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_date'         => 'required|date_format:d-m-Y',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:255',
        ]);

        $blog                    = new Blog();
        $blog->title             = $request->title;
        $blog->title_slug        = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->full_description  = $request->full_description;
        $blog->blog_date         = Carbon::createFromFormat('d-m-Y', $request->blog_date)->format('Y-m-d');
        $blog->meta_title        = $request->meta_title;
        $blog->meta_description  = $request->meta_description;

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blog_images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        session()->flash('success_msg', "Blog create Successfully!");
        return redirect()->route('blog.index');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description'  => 'required|string',
            'meta_title'        => 'required|string|max:255',
            'meta_description'  => 'nullable|string',
            'blog_date'         => 'required|date_format:d-m-Y',

            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $blog = Blog::findOrFail($id);

        $blog->title             = $request->title;
        $blog->title_slug        = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->full_description  = $request->full_description;
        $blog->meta_title        = $request->meta_title;
        $blog->meta_description  = $request->meta_description;
        $blog->blog_date         = Carbon::createFromFormat('d-m-Y', $request->blog_date)->format('Y-m-d');

        if ($request->hasFile('image')) {

            if ($blog->image && file_exists(public_path('uploads/blog_images/' . $blog->image))) {
                unlink(public_path('uploads/blog_images/' . $blog->image));
            }

            $image     = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blog_images/'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        session()->flash('success_msg', "Blog Update Successfully!");
        return redirect()->route('blog.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('uploads/blog_images/' . $blog->image))) {
            unlink(public_path('uploads/blog_images/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('blog.index');
    }

    public function getData()
    {
        $query = Blog::select(['id', 'title', 'image', 'blog_date']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $path = asset('uploads/blog_images/' . $row->image);

                return '<img src="' . $path . '"
                        style="width:70px; height:70px; object-fit:cover; border-radius:5px;">';
            })
            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('blog.edit', $row->id) . '" class="btn btn-info btn-sm" title="Edit Detail">
                  <i class="mdi mdi-pencil"></i>
                </a>
                <button onclick="deleteIt(' . $row->id . ')" class="btn btn-danger btn-sm" title="Delete">
                    <i class="mdi mdi-trash-can"></i>
                </button>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
