<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Student;
use App\Models\StudentsDocument;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $userId    = Auth::id();
        $student   = Student::where('user_id', $userId)->first();
        $documents = $student ? StudentsDocument::where('student_id', $student->id)->first() : null;

        $applications = Application::with([
            'user',
            'universityCourse.course',
            'universityCourse.university',
        ])->where('user_id', $userId)->get();
        $progress = 0;
        // 1. Basic Profile Fields
        $basicFields = [
            $student?->mobile_no,
            $student?->country,
            $student?->course_preference,
            $student?->city,
        ];
        if (collect($basicFields)->filter()->count() === count($basicFields)) {
            $progress += 50;
        }
        $documents = $student
            ? StudentsDocument::where('student_id', $student->id)->pluck('document_path', 'document_name')
            : collect();

        if (
            ($documents->has('ug_certificate') && $documents['ug_certificate']) ||
            ($documents->has('ug_marksheets') && $documents['ug_marksheets'])
        ) {
            $progress += 50;
        }
        return view('student.dashboard', compact('student', 'documents', 'applications', 'progress'));
    }

}
