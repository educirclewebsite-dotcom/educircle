<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Passport;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ViewAdmissionController extends Controller
{
    public function show()
    {
        $userId = Auth::id();

        $student = Student::with(['user', 'passport', 'documents', 'studentPayments'])
            ->where('user_id', $userId)
            ->first();

        if (! $student) {
            return view('student.admission.view', [
                'student'   => null,
                'passport'  => null,
                'documents' => [],
                'course'    => null,
            ]);
        }

        $passport     = $student->passport;
        $documentsRaw = $student->documents;

        $documents = [];
        foreach ($documentsRaw as $doc) {
            $documents[$doc->document_name] = basename($doc->document_path);
        }

        $course = Course::where('course_name', $student->course_preference)->first();

        return view('student.admission.view', compact('student', 'passport', 'documents', 'course'));
    }

}
