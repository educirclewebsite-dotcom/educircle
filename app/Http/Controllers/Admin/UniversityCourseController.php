<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Course;
use App\Models\State;
use App\Models\University;
use App\Models\UniversityCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UniversityCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::orderBy('university_name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('admin.university_courses.index', compact('universities', 'courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$country    = Countries::pluck('name', 'id')->toArray();
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        $states = State::pluck('name', 'id')->toArray();
        $courses = Course::all()->groupBy('course_name');
        $universities = University::orderBy('university_name')->get();

        return view('admin.university_courses.create', compact('country', 'states', 'courses', 'universities'));
    }

    public function searchCourses(Request $request)
    {
        $search = $request->term;
        $courses = Course::where('course_name', 'LIKE', "%{$search}%")
            ->select('id', 'course_name as text')
            ->limit(20)
            ->get();
        return response()->json(['results' => $courses]);
    }

    public function searchUniversities(Request $request)
    {
        $search = $request->term;
        $universities = University::where('university_name', 'LIKE', "%{$search}%")
            ->select('id', 'university_name as text')
            ->limit(20)
            ->get();
        return response()->json(['results' => $universities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|array',
            'university_id' => 'required|array',
            'duration_months' => 'required|array',
            'course_fee' => 'required|array',
            'semester' => 'required|array',
            'scholarship' => 'array',
            'course_link' => 'array',

        ]);

        foreach ($request->course_id as $index => $courseId) {
            $universityCourse = new UniversityCourse();
            $universityCourse->course_id = $courseId;
            $universityCourse->university_id = $request->university_id[$index];
            $universityCourse->duration_months = $request->duration_months[$index];
            //$universityCourse->course_fee = $request->course_fee[$index];
            $courseFee = $request->course_fee[$index];
            // Remove commas and ensure numeric value
            $universityCourse->course_fee = (float) str_replace(',', '', $courseFee);
            //$universityCourse->semester        = json_encode($request->semester[$index]);
            $universityCourse->semester = json_encode($request->semester[$index] ?? []);
            $universityCourse->scholarship = $request->scholarship[$index] ?? null;
            $universityCourse->course_link = $request->course_link[$index] ?? null;
            $universityCourse->is_popular = $request->is_popular[$index] ?? 0;
            $universityCourse->is_top_course = $request->is_top_course[$index] ?? 0;
            $universityCourse->save();
        }

        session()->flash('success_msg', 'University courses added successfully!');
        return redirect()->route('university_course.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $universityCourse = UniversityCourse::findOrFail($id);
        $universities = University::all();
        $courses = Course::all()->groupBy('type');
        $universityCourse->semester = json_decode($universityCourse->semester, true);

        return view('admin.university_courses.edit', compact('universityCourse', 'universities', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'university_id' => 'required|exists:universities,id',
            'course_fee' => 'required|numeric',
            'duration_months' => 'required|integer',
            'semester' => 'required|array',
            'scholarship' => 'nullable|string',
            'course_link' => 'nullable|url',
            'is_popular' => 'nullable|boolean',
            'is_top_course' => 'nullable|boolean',

        ]);

        $universityCourse = UniversityCourse::findOrFail($id);

        $universityCourse->course_id = $request->course_id;
        $universityCourse->university_id = $request->university_id;
        //$universityCourse->course_fee = $request->course_fee;
        // Remove commas and ensure numeric value
        $universityCourse->course_fee = (float) str_replace(',', '', $request->course_fee);
        $universityCourse->duration_months = $request->duration_months;
        $universityCourse->semester = json_encode($request->semester);
        $universityCourse->scholarship = $request->scholarship;
        $universityCourse->course_link = $request->course_link ?? null;
        $universityCourse->is_popular = $request->is_popular ? 1 : 0;
        $universityCourse->is_top_course = $request->is_top_course ? 1 : 0;

        $universityCourse->save();

        return redirect()->route('university_course.index')->with('success_msg', 'University Course updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = UniversityCourse::findOrFail($id);
        $course->delete();

        return response()->json(['status' => 'success']);
    }

    /**
     * Data for DataTable with optional filters.
     */

    public function getData(Request $request)
    {

        $query = UniversityCourse::select([
            'university_courses.id',
            'courses.course_name',
            'universities.university_name',
            'university_courses.duration_months',
            'university_courses.course_fee',
            'university_courses.semester',
            'university_courses.scholarship',
            'university_courses.is_top_course',
        ])
            ->join('courses', 'university_courses.course_id', '=', 'courses.id')
            ->join('universities', 'university_courses.university_id', '=', 'universities.id');

        if ($request->filled('course_id')) {
            $query->where('university_courses.course_id', $request->course_id);
        }

        if ($request->filled('university_id')) {
            $query->where('university_courses.university_id', $request->university_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('semester', function ($row) {

                $map = [
                    1 => 'Sem 1 (Feb)',
                    2 => 'Sem 2 (July)',
                    3 => 'Sem 3 (Nov)',
                ];

                $sem = json_decode($row->semester, true);

                if (!is_array($sem)) {
                    $sem = [$sem];
                }

                $result = [];
                foreach ($sem as $s) {
                    $result[] = $map[$s] ?? $s;
                }

                return implode(', ', $result);
            })

            ->addColumn('scholarship', function ($row) {
                return $row->scholarship ?? '-';
            })
            ->addColumn('is_top_course', function ($row) {
                return $row->is_top_course ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>';
            })
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('university_course.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                     <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })
            ->rawColumns(['is_top_course', 'action'])
            ->make(true);
    }
}
