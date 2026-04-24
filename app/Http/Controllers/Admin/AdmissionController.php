<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Course;
use App\Models\Passport;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentPayment;
use App\Models\StudentsDocument;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.admission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function edit($id)
    {
        try {
            $student   = Student::with(['user', 'passport', 'documents'])->findOrFail($id);
            $passport  = Passport::where('student_id', $student->id)->first();
            $documents = StudentsDocument::where('student_id', $student->id)->get();

            //$country = Countries::pluck('name', 'id')->toArray();
            $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
            $states  = State::pluck('name', 'id')->toArray();
            $courses = Course::all()->groupBy('course_type');
            return view('admin.admission.edit', compact('student', 'passport', 'documents', 'country', 'states', 'courses'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'city'              => 'required',
            'status'            => 'required|in:admission',
            'country'           => 'required',
            'course_type'       => 'required',
            'course_preference' => 'required',
            'mobile_no'         => 'required',
            'graduation_level'  => 'required',
            'documents.*'       => 'nullable',

        ]);
        try {
            $student = Student::findOrFail($id);

            $student->name              = $request->name;
            $student->last_name         = $request->last_name;
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
            return redirect()->route('admission.index');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'     => 'required|exists:students,id',
            'amount'         => 'required|numeric|min:1',
            'payment_date'   => 'required|date',
            'payment_method' => 'required|string|max:50',
            'remarks'        => 'nullable|string|max:255',

        ]);

        $payment                 = new StudentPayment();
        $payment->student_id     = $request->student_id;
        $payment->amount         = $request->amount;
        $payment->payment_date   = date('Y-m-d', strtotime($request->payment_date));
        $payment->payment_method = $request->payment_method;
        $payment->remarks        = $request->remarks;
        $payment->save();
        session()->flash('success_msg', "Payment Added Successfully!");
        return redirect()->back();
    }

    public function storeCoursePricing(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|exists:students,id',
            'final_price' => 'required|numeric|min:0',
            'offer_price' => 'required|numeric|min:0',
        ]);

        $student = Student::findOrFail($request->student_id);
        // $student->course_price = $request->course_price;
        $student->final_price = $request->final_price;
        $student->offer_price = $request->offer_price;
        $student->save();
        session()->flash('success_msg', "Offer Added Successfully!");
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $student = Student::with(['user', 'documents', 'studentPayments'])
            ->findOrFail($id);

        $documentsRaw = $student->documents;

        $documents = [];
        foreach ($documentsRaw as $doc) {
            $documents[$doc->document_name] = basename($doc->document_path);
        }

        $course = Course::where('course_name', $student->course_preference)->first();

        return view('admin.admission.view', compact('student', 'documents', 'course'));
    }

    public function editPayment($id)
    {
        $payment = StudentPayment::findOrFail($id);
        $student = Student::findOrFail($payment->student_id);

        return view('admin.admission.edit_payment', compact('payment', 'student'));
    }

    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string|max:50',
            'payment_date'   => 'required|date',
            'amount'         => 'required|numeric|min:1',
            'remarks'        => 'nullable|string|max:255',
        ]);

        $payment                 = StudentPayment::findOrFail($id);
        $payment->payment_method = $request->payment_method;
        $payment->payment_date   = date('Y-m-d', strtotime($request->payment_date));
        $payment->amount         = $request->amount;
        $payment->remarks        = $request->remarks;
        $payment->save();
        session()->flash('success_msg', "Payment Update Successfully!");
        return redirect()->route('admission.view', $payment->student_id);
    }
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json(['success' => true], 200);
    }

    public function getData(Request $request)
    {
        $query = Student::join('users', 'users.id', 'students.user_id')
            ->where('students.status', 'admission')
            ->leftJoin('countries', 'countries.id', 'students.country')
            ->select('students.id', 'students.name', 'students.course_preference', 'countries.name as country', 'users.email');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($datatables) {

                return '<a href="' . route('admission.view', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-eye d-block font-size-16"></i></a>
                <a href="' . route('admission.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                     <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })->make(true);
    }
}
