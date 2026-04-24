<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Countries;
use App\Models\Course;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentsDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {

        return view('admin.student.index');
    }
    /**
     * Show the form for creating or editing a student profile.
     */
    public function create()
    {
       //$country = Countries::pluck('name', 'id')->toArray();
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        $states  = State::pluck('name', 'id')->toArray();
        $courses = Course::pluck('course_name', 'id')->toArray();
        $courses = Course::all()->groupBy('course_type');

        return view('admin.student.create', compact('country', 'states', 'courses'));
    }

    /**
     * Store a newly created student and passport info in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required',
            'last_name'         => 'required',
            'email'             => 'required',
            'password'          => 'required|string|min:6',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'city'              => 'required',
            'country'           => 'required',
            'status'            => 'nullable',
            'course_type'       => 'required',
            'course_preference' => 'required',
            'mobile_no'         => 'required',
            'graduation_level'  => 'required',
            'documents.*'       => 'nullable',
        ]);
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user->assignRole('student');

            $student                    = new Student();
            $student->user_id           = $user->id;
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
            $student->status            = $request->status;
            $student->save();

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $key => $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename  = $key . '_' . time() . '.' . $extension;

                    $path = $file->storeAs('documents', $filename, 'public');
                    StudentsDocument::create([
                        'student_id'    => $student->id,
                        'document_name' => $key,
                        'document_path' => 'storage/' . $path,
                    ]);
                }
            }
            session()->flash('success_msg', "Student Created Successfully!");
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $student   = Student::with(['user', 'passport', 'documents'])->findOrFail($id);
            $documents = $student ? StudentsDocument::where('student_id', $student->id)->first() : null;
            $country   = Countries::pluck('name', 'id')->toArray();
            $states    = State::pluck('name', 'id')->toArray();
            $courses   = Course::all()->groupBy('course_type');

            return view('admin.student.edit', compact('student', 'documents', 'country', 'states', 'courses'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
            'last_name'         => 'required',
            'email'             => 'required',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'city'              => 'required',
            'status'            => 'required|in:new,admission,in process',
            'country'           => 'required',
            'course_type'       => 'required',
            'course_preference' => 'required',
            'mobile_no'         => 'required',
            'graduation_level'  => 'required',
            'documents.*'       => 'nullable',
        ]);

        try {
            $student = Student::findOrFail($id);

            $user        = User::findOrFail($student->user_id);
            $user->name  = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            $student->name      = $request->name;
            $student->last_name = $request->last_name;

            $student->gender            = $request->gender;
            $student->marital_status    = $request->marital_status;
            $student->city              = $request->city;
            $student->country           = $request->country;
            $student->status            = $request->status ?? 'new';
            $student->course_type       = $request->course_type;
            $student->course_preference = $request->course_preference;
            $student->mobile_no         = $request->mobile_no;
            $student->whatsapp_no       = $request->whatsapp_no;
            $student->graduation_level  = $request->graduation_level;
            $student->save();

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $key => $file) {
                    if ($file) {
                        $path = $file->store('documents', 'public');

                        StudentsDocument::create([
                            'student_id'    => $student->id,
                            'document_name' => $key,
                            'document_path' => 'storage/' . $path,
                        ]);
                    }
                }
            }

            session()->flash('success_msg', "Student Update Successfully!");
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {

        try {
            $student = Student::findOrFail($id);

            StudentsDocument::where('student_id', $student->id)->delete();

            $user = User::find($student->user_id);
            $student->delete();
            $user->delete();

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function getData(Request $request)
    {
        $query = Student::join('users', 'users.id', 'students.user_id')
        // ->where('students.status', $request->status)
            ->leftJoin('countries', 'countries.id', 'students.country')
            ->select('students.id', 'students.name', 'students.course_preference', 'countries.name as country', 'users.email');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('student.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                     <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })->make(true);
    }

    // -------------------------------------------------Applications ---------------------------------------------------------------

    public function application_index()
    {

        return view('admin.student.application_index');
    }

    public function application_getData()
    {
        $statusLabels = [
            0 => 'Started',
            1 => 'In Progress',
            2 => 'Submitted',
            3 => 'Offer Received',
            4 => 'Offer Accepted',
            5 => 'Pre Departure',
            6 => 'Completed',
        ];

        $query = Application::select([
            'applications.id',
            'applications.status',
            'applications.created_at',
            'users.name as user_name',
            'courses.course_name',
            'universities.university_name',
        ])
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->join('university_courses', 'applications.university_course_id', '=', 'university_courses.id')
            ->join('courses', 'university_courses.course_id', '=', 'courses.id')
            ->join('universities', 'university_courses.university_id', '=', 'universities.id');

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->format('d M Y');
            })
            ->addColumn('status', function ($row) use ($statusLabels) {
                $label = $statusLabels[$row->status] ?? 'Unknown';

                // You can style badges by status stage
                $badgeClass = match ($row->status) {
                    0       => 'bg-secondary',
                    1       => 'bg-warning text-dark',
                    2       => 'bg-primary',
                    3       => 'bg-info text-dark',
                    4       => 'bg-success',
                    5       => 'bg-dark',
                    6       => 'bg-success',
                    default => 'bg-secondary',
                };

                return '<span class="badge ' . $badgeClass . '">' . $label . '</span>';
            })
            ->addColumn('action', function ($row) {
                return '
                <a href="' . route('application.view', $row->id) . '" class="btn btn-primary btn-sm" title="View">
                    <i class="mdi mdi-eye d-block font-size-16"></i>
                </a>
                <a onclick="deleteIt(' . $row->id . ')" class="btn btn-danger btn-sm" title="Delete">
                    <i class="mdi mdi-trash-can text-white d-block font-size-16"></i>
                </a>
            ';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function application_show(string $id)
    {
        $application = Application::with([
            'user',
            'universityCourse.course',
            'universityCourse.university',
        ])->findOrFail($id);

        return view('admin.student.view_application', compact('application'));
    }

    public function updateStage(Request $request, $id)
    {
        $request->validate([
            'status' => 'integer|min:3|max:6',
        ]);

        $application         = Application::findOrFail($id);
        $application->status = $request->input('status');
        $application->save();
        session()->flash('success_msg', "Application Stage Updated Successfully!");
        return redirect()->back();
    }
    public function application_destroy(string $id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->delete();

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
