<?php
namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Course;
use App\Models\State;
use App\Models\University;
use App\Models\Scholarship;
use App\Models\UniversityCourse;
use Illuminate\Http\Request;

class CourseFinderController extends Controller
{
    public function courseFinder(Request $request)
    {

        //$country           = Countries::pluck('name', 'id')->toArray();
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        $courses = Course::all()->groupBy('course_type');
        $countryId = $request->country ?? 2; // Default to Australia

        $universities = University::where('country_id', $countryId)->orderBy('university_name')->get();
        $states = State::where('country_id', $countryId)->pluck('name', 'id');

        $query = UniversityCourse::with(['course', 'university.country']);

        // Always filter by the selected or default country
        $query->whereHas('university', function ($q) use ($countryId) {
            $q->where('country_id', $countryId);
        });

        if ($request->filled('universities')) {
            $query->whereIn('university_id', (array) $request->universities);
        }

        if ($request->filled('state')) {
            $query->whereHas('university', function($q) use ($request) {
                $q->whereIn('state_id', (array) $request->state);
            });
        }

        if ($request->filled('course_fee')) {
            $query->where('course_fee', '<=', $request->course_fee);
        }

        if ($request->filled('program')) {
            $query->where('course_id', $request->program);
        }

        if ($request->filled('intake')) {
            $query->whereJsonContains('semester', $request->intake);
        }

        if ($request->filled('programLevelType')) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('course_type', $request->programLevelType);
            });
        }

        if ($request->filled('study_area')) {
            $areas = (array) $request->study_area;
            $query->whereHas('course', function ($q) use ($areas) {
                $q->where(function ($inner) use ($areas) {
                    foreach ($areas as $area) {
                        $inner->orWhereRaw('JSON_CONTAINS(`study_area`, ?)', [json_encode($area)]);
                    }
                });
            });
        }

        if ($request->filled('query')) {
            $search = $request->query('query');

            $query->where(function ($q) use ($search) {
                $q->whereHas('course', function ($c) use ($search) {
                    $c->where('course_name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('university', function ($u) use ($search) {
                        $u->where('university_name', 'like', '%' . $search . '%');
                    });
            });
        }

        $universitycourses = $query->get();

        if ($request->ajax()) {
            return view('coursefinder.filter', compact('universitycourses'));
        }
        return view('coursefinder.course_finder', compact('country', 'courses', 'universities', 'universitycourses', 'states'));
    }
    public function show($slug)
    {
        $university = University::with(['country', 'state'])->where('slug', $slug)->firstOrFail();
        
        // 1. Fetch courses marked explicitly as "Top Course"
        $universitycourses = UniversityCourse::with(['course', 'university'])
            ->where('university_id', $university->id)
            ->where('is_top_course', 1)
            ->limit(6)
            ->get();

        // 2. Fallback: If NO courses are marked as Top Course, show the first 6 as default
        if ($universitycourses->isEmpty()) {
            $universitycourses = UniversityCourse::with(['course', 'university'])
                ->where('university_id', $university->id)
                ->limit(6)
                ->get();
        }

        return view('coursefinder.index', compact('university', 'universitycourses'));
    }

    public function courseDetails($university_slug, $id)
    {
        $university = University::with(['country', 'state'])->where('slug', $university_slug)->firstOrFail();
        $university_course = UniversityCourse::with(['course', 'university.country'])
            ->where('university_id', $university->id)
            ->findOrFail($id);
            
        $scholarships = Scholarship::where('university_id', $university->id)
            ->limit(3)
            ->get();

        $scholarshipCourseIds = $scholarships->pluck('course_id')->filter()->unique();

        $universitycourses = UniversityCourse::with(['course', 'university'])
            ->where('university_id', $university->id)
            ->whereIn('course_id', $scholarshipCourseIds)
            ->where('id', '!=', $id)
            ->get();

        // If we don't have enough courses from scholarships, fill with others
        if ($universitycourses->count() < 3) {
            $extraCourses = UniversityCourse::with(['course', 'university'])
                ->where('university_id', $university->id)
                ->where('id', '!=', $id)
                ->whereNotIn('id', $universitycourses->pluck('id'))
                ->limit(3 - $universitycourses->count())
                ->get();
            $universitycourses = $universitycourses->concat($extraCourses);
        }

        // Fetch Global Popular Scholarships for the premium section
        $popularScholarships = UniversityCourse::where('is_popular', 1)
            ->with(['course', 'university.state', 'university.country'])
            ->limit(3)
            ->get();

        return view('coursefinder.course_details', compact('university', 'university_course', 'universitycourses', 'scholarships', 'popularScholarships'));
    }

    // Student Course Finder
    public function studentcourseFinder(Request $request)
    {

        //$country           = Countries::pluck('name', 'id')->toArray();
        $country = Countries::where('status', 1)->pluck('name', 'id')->toArray();
        $courses = Course::all()->groupBy('course_type');
        $countryId = $request->country ?? 2; // Default to Australia

        $universities = University::where('country_id', $countryId)->orderBy('university_name')->get();
        $states = State::where('country_id', $countryId)->pluck('name', 'id');

        $query = UniversityCourse::with(['course', 'university.country']);

        // Always filter by the selected or default country
        $query->whereHas('university', function ($q) use ($countryId) {
            $q->where('country_id', $countryId);
        });

        if ($request->filled('universities')) {
            $query->whereIn('university_id', (array) $request->universities);
        }

        if ($request->filled('state')) {
            $query->whereHas('university', function($q) use ($request) {
                $q->whereIn('state_id', (array) $request->state);
            });
        }

        if ($request->filled('course_fee')) {
            $query->where('course_fee', '<=', $request->course_fee);
        }

        if ($request->filled('program')) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('course_name', $request->program);
            });
        }

        if ($request->filled('intake')) {
            $query->whereJsonContains('semester', $request->intake);
        }

        if ($request->filled('programLevelType')) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('course_type', $request->programLevelType);
            });
        }

        if ($request->filled('study_area')) {
            $areas = (array) $request->study_area;
            $query->whereHas('course', function ($q) use ($areas) {
                $q->where(function ($inner) use ($areas) {
                    foreach ($areas as $area) {
                        $inner->orWhereRaw('JSON_CONTAINS(`study_area`, ?)', [json_encode($area)]);
                    }
                });
            });
        }

        if ($request->filled('query')) {
            $search = $request->query('query');

            $query->where(function ($q) use ($search) {
                $q->whereHas('course', function ($subQuery) use ($search) {
                    $subQuery->where('course_name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('university', function ($subQuery) use ($search) {
                        $subQuery->where('university_name', 'like', '%' . $search . '%');
                    });
            });
        }

        $universitycourses = $query->get();

        if ($request->ajax()) {
            return view('student.courseFinder.course_filter', compact('universitycourses'));
        }
        return view('student.courseFinder.coursefinder', compact('country', 'courses', 'universities', 'universitycourses', 'states'));
    }

    public function studentshow($slug)
    {
        $university = University::with('country')->where('slug', $slug)->firstOrFail();
        $universitycourses = UniversityCourse::with(['course', 'university'])
            ->where('university_id', $university->id)
            ->get();

        return view('student.courseFinder.courses', compact('university', 'universitycourses'));
    }

    public function autocomplete(Request $request)
    {
        $search = $request->get('query');
        if (!$search) {
            return response()->json([]);
        }

        $results = [];

        // Search University names
        $universities = University::where('university_name', 'like', '%' . $search . '%')
            ->limit(3)
            ->get(['university_name', 'slug']);

        foreach ($universities as $uni) {
            $results[] = [
                'label' => $uni->university_name,
                'type' => 'University',
                'url' => route('courseFinder.filter', ['query' => $uni->university_name])
            ];
        }

        // Search Course names efficiently at the database level
        $courseNames = Course::where('course_name', 'like', '%' . $search . '%')
            ->distinct()
            ->limit(5)
            ->pluck('course_name');

        foreach ($courseNames as $name) {
            $results[] = [
                'label' => $name,
                'type' => 'Course',
                'url' => route('courseFinder.filter', ['query' => $name])
            ];
        }

        return response()->json($results);
    }
}
