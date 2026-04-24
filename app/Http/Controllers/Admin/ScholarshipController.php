<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Course;
use App\Models\Scholarship;
use App\Models\University;
use App\Models\UniversityCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ScholarshipController extends Controller
{
    public function index()
    {
        $universitycourses = UniversityCourse::with('university', 'course')->get();
        return view('admin.scholarship.index', compact('universitycourses'));
    }

    public function create()
    {
        $universitycourses = UniversityCourse::with('university', 'course')->get();
        return view('admin.scholarship.create', compact('universitycourses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'nullable',
            'eligibility'   => 'nullable',
            'amount'        => 'nullable',
            'university_id' => 'nullable',
            'course_id'     => 'nullable',
        ]);

        $scholarship                = new Scholarship();
        $scholarship->title         = $request->title;
        $scholarship->slug          = Str::slug($request->title);
        $scholarship->description   = $request->description;
        $scholarship->eligibility   = $request->eligibility;
        $scholarship->amount        = $request->amount;
        $scholarship->application_link = $request->application_link;

        $scholarship->university_id = $request->university_id;
        $scholarship->course_id     = $request->course_id;
        $scholarship->save();

        return redirect()->route('scholarship.index')->with('success_msg', 'Scholarship created successfully!');
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);


        $universitycourses = UniversityCourse::with('university', 'course')->get();

        return view('admin.scholarship.edit', compact('scholarship', 'universitycourses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'eligibility'   => 'nullable|string',
            'amount'        => 'nullable|string',
            'university_id' => 'required|exists:university_courses,id',
            'course_id'     => 'required|exists:university_courses,id',
        ]);

        $scholarship                  = Scholarship::findOrFail($id);
        $scholarship->title           = $request->title;
        $scholarship->slug            = Str::slug($request->title);
        $scholarship->description     = $request->description;
        $scholarship->eligibility     = $request->eligibility;
        $scholarship->amount          = $request->amount;
        $scholarship->application_link = $request->application_link;

        $scholarship->university_id   = $request->university_id;
        $scholarship->course_id       = $request->course_id;

        $scholarship->save();

        return redirect()->route('scholarship.index')
            ->with('success_msg', 'Scholarship updated successfully.');
    }


 public function destroy($id)
{
    try {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();

        return response()->json(['success' => true], 200);

    } catch (\Illuminate\Database\QueryException $e) {
        // Foreign key restriction error
        return response()->json([
            'success' => false,
            'message' => 'This scholarship is linked to other records and cannot be deleted.'
        ], 409);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong.'
        ], 500);
    }
}


 public function getData(Request $request)
{
    $query = Scholarship::with([
        'universityCourse.university',
        'courseDetail.course'
    ]);

    return DataTables::of($query)
        ->addIndexColumn()

        ->addColumn('university_name', function ($row) {
            return $row->universityCourse->university->university_name ?? '-';
        })

        ->addColumn('course_name', function ($row) {
            return $row->courseDetail->course->course_name ?? '-';
        })

        ->addColumn('title', function ($row) {
            return $row->title;
        })

        ->addColumn('amount', function ($row) {
            return $row->amount ?? '-';
        })

        ->addColumn('action', function ($row) {
            return '
                <a href="' . route('scholarship.edit', $row->id) . '" class="btn btn-info btn-sm" title="Edit">
                    <i class="mdi mdi-pencil"></i>
                </a>
                <a onclick="deleteIt(' . $row->id . ')" class="btn btn-danger btn-sm" title="Delete">
                    <i class="mdi mdi-trash-can"></i>
                </a>';
        })

        ->rawColumns(['action'])
        ->make(true);
}


    /**
     * Public view of scholarships.
     */
}
