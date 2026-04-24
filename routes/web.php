<?php

use App\Http\Controllers\CourseFinderController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\PageBlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Student\ApplicationController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\ViewAdmissionController;
use App\Http\Controllers\Admin\LeadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link done.';
});
// Route::get('/', function () {
//     return view('home');
// });

//Website
Route::post('/verify-otp', [SignupController::class, 'verifyOtp'])->name('verify.Otp');
Route::get('/signup', [SignupController::class, 'show'])->name('signup');
Route::post('/signup/register', [SignupController::class, 'store'])->name('signup.store');

Route::post('/send-otp', [SignupController::class, 'sendOtp'])->name('send.Otp');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::post('/lead/store', [LeadController::class, 'store'])->name('lead_store');

// Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/blog', [PageBlogController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageBlogController::class, 'show'])->name('blog.details');

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/scholarship', [PageController::class, 'scholarship'])->name('scholarship');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/course-program', function () {
    return view('course_program');
})->name('course.program');
Route::get('/application-visa-guidance', function () {
    return view('application_visaguidance');
})->name('application.visa');
Route::get('/study-australia', function () {
    return view('study_australia');
})->name('study.australia');

Route::get('/universities', [PageController::class, 'universities'])
    ->name('universities');

// Ajax Course Search
Route::get('/ajax/course-search', [PageController::class, 'searchCourses'])->name('ajax.course.search');

//student
Auth::routes();
require_once __DIR__ . '/admin/admin.php';

Route::group(['middleware' => ['role:student', 'auth'], 'prefix' => 'student'], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('student.dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    // Route::post('/profile', [StudentController::class, 'store'])->name('student.profile.store');
    // Route::get('/profile', [StudentController::class, 'index'])->name('profile.index');
    Route::post('save-step1', [StudentController::class, 'saveStep1'])->name('student.profile.saveStep1');
    Route::post('save-step2', [StudentController::class, 'saveStep2'])->name('student.profile.saveStep2');
    Route::post('save-step3', [StudentController::class, 'saveStep3'])->name('student.profile.saveStep3');

    Route::get('/course-finder', [CourseFinderController::class, 'studentcourseFinder'])->name('student.courseFinder.filter');
    Route::get('/university/{slug}', [CourseFinderController::class, 'studentshow'])->name('course.show');
    Route::post('/apply-course', [ApplicationController::class, 'store'])->name('student.course.apply');
    Route::get('/my-applications', [ApplicationController::class, 'index'])->name('student.applications');

    //student-Change Profile
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');

    Route::get('/', [FrontendHomeController::class, 'index'])->name('student.home');

    //student-Admission
    Route::get('/admission/view', [ViewAdmissionController::class, 'show'])->name('student.admission.view');

    Route::get('/application/{id}', [ApplicationController::class, 'view'])->name('student.application.view');
});

// Route::get('/coursefinder', [CourseFinderController::class, 'courseFinder'])->name('coursefinder.filter');

Route::get('/course-finder', [CourseFinderController::class, 'courseFinder'])->name('courseFinder.filter');

Route::get('/university/{slug}', [CourseFinderController::class, 'show'])->name('university.show');

Route::get('/course/{university_slug}/{course_id}', [CourseFinderController::class, 'courseDetails'])->name('course.details');

Route::get('/course-finder/autocomplete', [CourseFinderController::class, 'autocomplete'])->name('courseFinder.autocomplete');

Route::get('/scholarships', [PageController::class, 'scholarship'])->name('scholarships');

Route::get('/scholarship/{slug}', [PageController::class, 'show'])->name('scholarship.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
