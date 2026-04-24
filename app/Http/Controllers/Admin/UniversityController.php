<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\University;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UniversityController extends Controller
{
    public function index()
    {
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        return view('admin.universities.index', compact('country'));
    }

    public function create()
    {
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        // Fetch states for Australia only
        $australia = Countries::where('name', 'Australia')->first();
        $states = $australia ? State::where('country_id', $australia->id)->pluck('name', 'id')->toArray() : [];

        return view('admin.universities.create', compact('country', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'university_name' => 'required|string',
            'estd' => 'required|string',
            'rank' => 'required|string',
            'banner_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'logo_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'university_link' => 'nullable|url',
            'region_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $university = new University();
        $university->country_id = $request->country_id;
        $university->state_id = $request->state_id; // Save state_id
        $university->university_name = $request->university_name;
        $university->slug = Str::slug($request->university_name);
        $university->estd = $request->estd;
        $university->rank = $request->rank;
        $university->university_link = $request->university_link;
        $university->description = $request->description;
        $university->is_popular = $request->has('is_popular') ? 1 : 0;
        $university->region_type = $request->region_type;

        if ($request->hasFile('banner_img')) {
            $banner = $request->file('banner_img');
            $bannerName = time() . '_banner_' . uniqid() . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/banners'), $bannerName);
            $university->banner_img = 'uploads/banners/' . $bannerName;
        }

        if ($request->hasFile('logo_img')) {
            $logo = $request->file('logo_img');
            $logoName = time() . '_logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logos'), $logoName);
            $university->logo_img = 'uploads/logos/' . $logoName;
        }

        $university->save();

        session()->flash('success_msg', 'University added successfully!');
        return redirect()->route('university.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $university = University::findOrFail($id);
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        // Fetch states for Australia only
        $australia = Countries::where('name', 'Australia')->first();
        $states = $australia ? State::where('country_id', $australia->id)->pluck('name', 'id')->toArray() : [];

        return view('admin.universities.edit', compact('university', 'country', 'states'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'university_name' => 'required|string',
            'estd' => 'required|string',
            'rank' => 'required|string',
            'banner_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'logo_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'university_link' => 'nullable|url',
            'region_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $university = University::findOrFail($id);
        $university->country_id = $request->country_id;
        $university->state_id = $request->state_id;

        if ($university->university_name !== $request->university_name) {
            $university->slug = Str::slug($request->university_name);
        }

        $university->university_name = $request->university_name;
        $university->estd = $request->estd;
        $university->rank = $request->rank;
        $university->university_link = $request->university_link;
        $university->description = $request->description;
        $university->is_popular = $request->has('is_popular') ? 1 : 0;
        $university->region_type = $request->region_type;

        if ($request->hasFile('banner_img')) {
            $banner = $request->file('banner_img');
            $bannerName = time() . '_banner_' . uniqid() . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/banners'), $bannerName);
            $university->banner_img = 'uploads/banners/' . $bannerName;
        }

        if ($request->hasFile('logo_img')) {
            $logo = $request->file('logo_img');
            $logoName = time() . '_logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logos'), $logoName);
            $university->logo_img = 'uploads/logos/' . $logoName;
        }

        $university->save();

        session()->flash('success_msg', 'University updated successfully!');
        return redirect()->route('university.index');
    }

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return response()->json(['success' => true], 200);
    }

    public function getData(Request $request)
    {
        $query = University::with('country')->select(['id', 'country_id', 'university_name', 'slug']);

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('country_id', function ($row) {
                return $row->country->name ?? '-';
            })
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('university.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                        <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })
            ->make(true);
    }
}
