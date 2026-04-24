<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\UniversityCourseController;
use App\Http\Controllers\Admin\PartnerLogoController;

Route::group(['middleware' => ['role:admin', 'auth'], 'prefix' => 'admin'], function () {

  // Dashboard
  Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

  // Profile
  Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
  Route::post('/admin/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
  Route::post('/admin/profile/update-password', [ProfileController::class, 'updatePassword'])->name('admin.profile.update_password');

  // Student
  Route::get('student/data', [StudentController::class, 'getData'])->name('student.getData');
  Route::resource('student', StudentController::class);
  Route::get('/applications', [StudentController::class, 'application_index'])->name('application.index');
  Route::get('application', [StudentController::class, 'application_getData'])->name('application.getData');
  Route::get('application/view/{id}', [StudentController::class, 'application_show'])->name('application.view');
  Route::post('admin/application/{id}/update-stage', [StudentController::class, 'updateStage'])->name('application.updateStage');
  Route::delete('application/{id}', [StudentController::class, 'application_destroy'])->name('application.destroy');


  // In-Process Students
  // Route::get('/admin/student/in-process', [StudentController::class, 'inProcessIndex'])->name('admin.student.in_process');
  // Route::get('/admin/student/in-process/{id}/edit', [StudentController::class, 'inProcessedit'])->name('admin.student.in_process.edit');
  // Route::put('/admin/student/in-process/{id}/update', [StudentController::class, 'inProcessupdate'])->name('admin.student.in_process.update');
  // Admission
  Route::get('/admissions/data', [AdmissionController::class, 'getData'])->name('admission.getData');
  Route::resource('admission', AdmissionController::class);

  Route::get('/fees/create/{student}', [AdmissionController::class, 'show'])->name('admission.view');
  Route::post('payment/store', [AdmissionController::class, 'store'])->name('payment.store');
  Route::get('payments/{id}/edit', [AdmissionController::class, 'editPayment'])->name('payments.edit');
  Route::put('payments/{id}', [AdmissionController::class, 'updatePayment'])->name('payments.update');
  Route::post('/store-course-pricing', [AdmissionController::class, 'storeCoursePricing'])->name('admission.storeCoursePricing');
  // Course
  Route::get('courses/data', [CourseController::class, 'getData'])->name('courses.getData');
  Route::resource('course', CourseController::class);


  // Blog
  Route::get('blog/data', [BlogController::class, 'getData'])->name('blog.getData');
  Route::resource('blog', BlogController::class);

  //Universities
  Route::get('university/data', [UniversityController::class, 'getData'])->name('university.getData');
  Route::resource('university', UniversityController::class);

  //Universities_Course
  Route::get('university_course/getData', [UniversityCourseController::class, 'getData'])->name('university_course.getData');
  Route::get('university_course/search-courses', [UniversityCourseController::class, 'searchCourses'])->name('university_course.searchCourses');
  Route::get('university_course/search-universities', [UniversityCourseController::class, 'searchUniversities'])->name('university_course.searchUniversities');

  Route::resource('university_course', UniversityCourseController::class);
  Route::get('scholarship/data', [ScholarshipController::class, 'getData'])->name('scholarship.getData');

  Route::resource('scholarship', ScholarshipController::class);

  //Lead Routes (Admin)
  Route::get('leads/data', [LeadController::class, 'getData'])->name('lead.getData');
  Route::resource('lead', LeadController::class);
  Route::get('admin/leads/export', [LeadController::class, 'exportExcel'])->name('leads.export');

  // Partner Logos
  Route::resource('partner-logos', PartnerLogoController::class);

  // Google Reviews
  Route::get('google-reviews/data', [App\Http\Controllers\Admin\GoogleReviewController::class, 'getData'])->name('google-reviews.getData');
  Route::resource('google-reviews', App\Http\Controllers\Admin\GoogleReviewController::class);
});

//Public Lead Routes
Route::post('/contact/store', [LeadController::class, 'store'])->name('lead_store');
Route::get('/contact', [LeadController::class, 'showForm'])->name('contact');
