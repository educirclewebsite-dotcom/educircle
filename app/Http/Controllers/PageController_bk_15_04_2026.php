<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Scholarship;
use App\Models\State;
use App\Models\University;
use App\Models\UniversityCourse;
use App\Models\PartnerLogo;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function scholarship(\Illuminate\Http\Request $request)
    {
        $query = UniversityCourse::with([
            'university.country',
            'course',
        ]);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('university', function ($sq) use ($search) {
                    $sq->where('university_name', 'LIKE', "%{$search}%")
                        ->orWhereHas('state', function ($ssq) use ($search) {
                            $ssq->where('name', 'LIKE', "%{$search}%");
                        })
                        ->orWhereHas('country', function ($scq) use ($search) {
                            $scq->where('name', 'LIKE', "%{$search}%");
                        });
                })->orWhereHas('course', function ($sq) use ($search) {
                    $sq->where('course_name', 'LIKE', "%{$search}%");
                });
            });
        }

        if ($request->has('university_id') && $request->university_id != '') { // Legacy support or single select
            $query->whereHas('university', function ($q) use ($request) {
                $q->where('id', $request->university_id);
            });
        }

        // New Filters
        if ($request->has('programLevelType') && $request->programLevelType != '') {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('course_type', $request->programLevelType);
            });
        }

        if ($request->has('universities') && is_array($request->universities)) {
            $query->whereIn('university_id', $request->universities);
        }

        if ($request->has('state') && is_array($request->state)) {
            $query->whereHas('university', function ($q) use ($request) {
                $q->whereIn('state_id', $request->state);
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

        $scholarships = $query->latest()->get()->unique('university_id');

        $popularScholarships = UniversityCourse::with([
            'university.country',
            'course',
        ])->where('is_popular', 1)->latest()->get()->unique('university_id')->take(3);

        $states = State::where('country_id', 2)->orderBy('name')->pluck('name', 'id')->toArray();
        $courses = Course::orderBy('course_name')->get();
        $universities = University::orderBy('university_name')->get();

        return view('scholarship', compact('scholarships', 'states', 'courses', 'universities', 'popularScholarships'));
    }

    public function show($slug)
    {
        $scholarship = Scholarship::with([
            'universityCourse.university.country',
            'courseInfo.course',
        ])->where('slug', $slug)->firstOrFail();

        return view('view', compact('scholarship'));
    }
    public function index()
    {
        $blogs = Blog::orderBy('blog_date', 'desc')->take(3)->get();
        $googleReviews = \App\Models\GoogleReview::latest()->get();

        $popularCourses = UniversityCourse::with(['course', 'university.country'])
            ->where('is_popular', 1)
            ->latest()
            ->take(6)
            ->get();

        // Get active partner logos
        $partnerLogos = PartnerLogo::getActive();

        return view('home', compact('blogs', 'googleReviews', 'popularCourses', 'partnerLogos'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function courseprogram()
    {
        return view('course_program');
    }

    public function universitypartner()
    {
        return view('university_partner');
    }

    public function australia()
    {
        return view('study_australia');
    }

    public function universities(\Illuminate\Http\Request $request)
    {
        $query = University::with(['country', 'courses', 'state']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('university_name', 'LIKE', "%{$search}%")
                    ->orWhereHas('country', function ($sq) use ($search) {
                        $sq->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('state', function ($sq) use ($search) {
                        $sq->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('courses.course', function ($sq) use ($search) {
                        $sq->where('course_name', 'LIKE', "%{$search}%");
                    });
            });
        }

        // New Filters
        if ($request->has('states') && is_array($request->states)) {
            $query->whereIn('state_id', $request->states);
        }

        if ($request->has('region_types') && is_array($request->region_types)) {
            $query->whereIn('region_type', $request->region_types);
        }

        if ($request->has('ranking') && $request->ranking != '') {
            $rank = (int) str_replace('Top ', '', $request->ranking);
            if ($rank > 0) {
                $query->where('rank', '<=', $rank);
            }
        }

        if ($request->has('intakes') && is_array($request->intakes)) {
            $intakeMap = ['Feb' => 1, 'July' => 2];
            $intakeValues = [];
            foreach ($request->intakes as $intake) {
                if (isset($intakeMap[$intake])) {
                    $intakeValues[] = $intakeMap[$intake];
                }
            }

            if (!empty($intakeValues)) {
                $query->whereHas('courses', function ($q) use ($intakeValues) {
                    $q->where(function ($sq) use ($intakeValues) {
                        foreach ($intakeValues as $val) {
                            $sq->orWhereJsonContains('semester', (int)$val);
                        }
                    });
                });
            }
        }

        $universities = $query->orderBy('university_name')->get();

        $popularUniversities = University::where('is_popular', 1)
            ->with(['country'])
            ->latest()
            ->take(3)
            ->get();

        // Data for filters
        $states = State::where('country_id', 2)->orderBy('name')->pluck('name', 'id')->toArray(); // Australia states
        $regionTypes = ['Regional', 'Non-Regional'];
        $intakeOptions = ['Feb', 'July'];

        return view('universities', compact('universities', 'popularUniversities', 'states', 'regionTypes', 'intakeOptions'));
    }
    public function contact()
    {
        $googleReviews = \App\Models\GoogleReview::latest()->get();
       
        return view('contact', compact('googleReviews'));
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function searchCourses(\Illuminate\Http\Request $request)
    {
        $search = $request->term;
        $courses = Course::where('course_name', 'LIKE', "%{$search}%")
            ->select('course_name as text') // Select only the name as text
            ->distinct() // Ensure unique course names
            ->limit(10)
            ->get();

        return response()->json(['results' => $courses]);
    }
}
