<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleReview;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class GoogleReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.google_reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.google_reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'reviews' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('photo')) {
            $path = public_path('uploads/google_reviews');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move($path, $imageName);
            $input['photo'] = 'uploads/google_reviews/' . $imageName;
        }

        GoogleReview::create($input);

        return redirect()->route('google-reviews.index')
            ->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = GoogleReview::findOrFail($id);
        return view('admin.google_reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'reviews' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $review = GoogleReview::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($review->photo && file_exists(public_path($review->photo))) {
                unlink(public_path($review->photo));
            }

            $imageName = time() . '.' . $request->photo->extension();
            $path = public_path('uploads/google_reviews');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $request->photo->move($path, $imageName);
            $input['photo'] = 'uploads/google_reviews/' . $imageName;
        } else {
            unset($input['photo']);
        }

        $review->update($input);

        return redirect()->route('google-reviews.index')
            ->with('success', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = GoogleReview::findOrFail($id);
        if ($review->photo && file_exists(public_path($review->photo))) {
            unlink(public_path($review->photo));
        }
        $review->delete();
        return response()->json(['success' => true]);
    }

    public function getData(Request $request)
    {
        $query = GoogleReview::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('photo', function ($row) {
                if ($row->photo) {
                    return '<img src="' . asset($row->photo) . '" alt="photo" width="50" height="50" class="rounded">';
                }
                return '<img src="https://ui-avatars.com/api/?name=' . urlencode($row->name) . '&background=random&color=fff" alt="default" width="50" height="50" class="rounded">';
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('google-reviews.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                $btn .= ' <a href="javascript:void(0)" onclick="deleteReview(' . $row->id . ')" class="btn btn-danger btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['photo', 'action'])
            ->make(true);
    }
}
