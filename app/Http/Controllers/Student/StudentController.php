<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Course;
use App\Models\Passport;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentsDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function profile()
    {
        $userId    = Auth::id();
        $student   = Student::where('user_id', $userId)->first();
        $passport  = $student ? Passport::where('student_id', $student->id)->first() : null;
        $documents = $student
            ? StudentsDocument::where('student_id', $student->id)->pluck('document_path', 'document_name')
            : collect();

        $country   = Countries::all();
        $states    = State::all();
        $courses   = Course::all()->groupBy('course_type');

        $progress = 0;

        $basicFields = [
            $student?->mobile_no,
            $student?->country,
            $student?->course_preference,
            $student?->city,
        ];

        if (collect($basicFields)->filter()->count() === count($basicFields)) {
            $progress += 50;
        }

        if (
            ($documents->has('ug_certificate') && $documents['ug_certificate']) ||
            ($documents->has('ug_marksheets') && $documents['ug_marksheets'])
        ) {
            $progress += 50;
        }

        return view('student.profile', compact('country', 'states', 'student', 'passport', 'documents', 'courses', 'progress'));
    }


    public function saveStep1(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'city'              => 'required|string|max:255',
            'country'           => 'required',
            'course_type'       => 'required',
            'course_preference' => 'required',
            'mobile_no'         => 'required|digits_between:7,15',
            'graduation_level'  => 'required',
        ]);

        $user    = auth()->user();
        $student = Student::firstOrNew(['user_id' => $user->id]);

        $student->status            = $student->exists ? $student->status : 'new';
        $student->name              = $request->name;
        $student->last_name         = $request->last_name;
        $student->gender            = $request->gender;
        $student->marital_status    = $request->marital_status;
        $student->city              = $request->city;
        $student->country           = $request->country;
        $student->course_type       = $request->course_type;
        $student->course_preference = $request->course_preference;
        $student->mobile_no         = $request->mobile_no;
        $student->whatsapp_no       = $request->whatsapp_no;
        $student->graduation_level  = $request->graduation_level;

        $student->save();

        return response()->json(['message' => 'Profile saved successfully']);
    }

    public function saveStep2(Request $request)
    {
        $user    = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        if (! $student) {
            return response()->json(['message' => 'Student profile not found'], 404);
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $key => $file) {

                $filename = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path     = $file->storeAs('documents', $filename, 'public');

                StudentsDocument::updateOrCreate(
                    ['student_id' => $student->id, 'document_name' => $key],
                    ['document_path' => 'storage/' . $path]
                );
            }
        }

        return response()->json(['message' => 'Documents saved successfully']);
    }
    public function saveStep3(Request $request)
    {

        $request->validate([
            'accept_declaration' => 'required',
        ]);
        return response()->json([
            'message' => 'Acknowledgement submitted successfully'
        ]);
    }
}
