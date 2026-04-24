<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $newStudents = Student::where('status', 'new')->count();
        $leadsCount  = Lead::count();
        $leads       = Lead::latest()->paginate(5);

        $applications = Application::with([
            'user',
            'universityCourse.course',
            'universityCourse.university',
        ]);
        $completedApplications = Application::where('status', 6)->count();
        $inprocessStudents     = Application::whereIn('status', [0, 1, 2, 3, 4, 5])
            ->orWhereNull('status')
            ->count();

        return view('admin.dashboard', compact('newStudents', 'leads', 'leadsCount', 'applications', 'completedApplications', 'inprocessStudents'));

    }
}
