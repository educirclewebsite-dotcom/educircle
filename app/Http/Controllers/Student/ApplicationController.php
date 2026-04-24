<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Student;
use App\Models\StudentsDocument;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $user         = auth()->user();
        $applications = Application::with(['course.university'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('student.applications', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'university_course_id' => 'required|exists:university_courses,id',
        ]);

        $user    = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        if (! $student) {
            return redirect()->route('student.profile')->with('error_msg', 'Please complete your student profile before applying.');
        }

        $requiredFields = [
            $student->name,
            $student->last_name,
            $student->gender,
            $student->marital_status,
            $student->city,
            $student->country,
            $student->course_type,
            $student->course_preference,
            $student->mobile_no,
            $student->graduation_level,
        ];

        $isProfileComplete = collect($requiredFields)->filter()->count() === count($requiredFields);

        if (! $isProfileComplete) {
            return redirect()->route('student.profile')->with('error_msg', 'Please complete your profile to apply for a course.');
        }

        $documents = StudentsDocument::where('student_id', $student->id)->pluck('document_path', 'document_name');

        $hasRequiredDocs = ($documents->has('ug_certificate') && $documents['ug_certificate']) ||
            ($documents->has('ug_marksheets') && $documents['ug_marksheets']);

        if (! $hasRequiredDocs) {
            return redirect()->route('student.profile')->with('error_msg', 'Please upload either your UG Certificate or UG Marksheets to apply.');
        }

        $alreadyApplied = Application::where('user_id', $user->id)
            ->where('university_course_id', $request->university_course_id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->route('student.applications')->with('success_msg', 'You have already applied to this course.');
        }

        Application::create([
            'user_id'              => $user->id,
            'university_course_id' => $request->university_course_id,
        ]);

        return redirect()->route('student.applications')->with('success_msg', 'Successfully applied to the course!');
    }

    public function view($id)
    {
        $application = Application::with([
            'user',
            'universityCourse.course',
            'universityCourse.university',
        ])->findOrFail($id);

        $stages = [
            'Application Started',
            'Application In Progress',
            'Application Submitted',
            'Offer Received',
            'Offer Accepted',
            'Pre Departure',
            'Completed',
        ];

        $statusLabels = [
            0 => 'Started',
            1 => 'In Progress',
            2 => 'Submitted',
            3 => 'Offer Received',
            4 => 'Offer Accepted',
            5 => 'Pre Departure',
            6 => 'Completed',
        ];

        return view('student.view_application', compact('application', 'stages', 'statusLabels'));
    }

}
