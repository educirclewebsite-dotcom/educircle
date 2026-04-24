<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{

    public function index()
    {

        return view('admin.student_course.index');
    }

    public function create()
    {
        return view('admin.student_course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name'  => 'required|string|max:255',
            'course_type'  => 'required|in:UG,PG',
        ]);

        $course               = new Course();
        $course->course_name  = $request->course_name;
        $course->course_type  = $request->course_type;
        $course->study_area   = $request->input('study_area', []);
        $course->save();
        session()->flash('success_msg', 'Course Add successfully!');
        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.student_course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name'  => 'required|string|max:255',
            'course_type'  => 'required|in:UG,PG',
        ]);

        $course               = Course::findOrFail($id);
        $course->course_name  = $request->course_name;
        $course->course_type  = $request->course_type;
        $course->study_area   = $request->input('study_area', []);
        $course->save();
        session()->flash('success_msg', "Course Update Successfully!");
        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['success' => true], 200);
    }

    public function getData()
    {

        $query = Course::select(['id', 'course_name','course_type']);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('course.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                     <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })->make(true);
    }
}
