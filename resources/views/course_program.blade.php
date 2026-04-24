@extends('layout.app')
@section('title', 'Courses & Programs ')
@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
@endpush
@section('content')
    <section class="sec-pad r-bg-x mt-2 other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="port-head-sec r-bg-x">
                        <div class="container">
                            <div class="row vcenter">
                                <div class="col-lg-6">
                                    <div class="page-headings">
                                        <h2 class="mb15"><span>Explore</span> Courses & Programs for
                                            Your Future</h2>
                                        <p>Choosing the right course is the first and most important step in your study
                                            abroad journey. At Educircle.io, we help you explore thousands of programs
                                            offered by top Australian and global universities — matched to your interests,
                                            academic background, and career goals.</p>
                                        <p class="mt15">Whether you’re looking for business, IT, engineering, health,
                                            science, arts, or
                                            vocational pathways, we guide you with clear options and real information so
                                            you can make confident decisions.</p><br>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sol-img m-mt30" data-aos="fade-in" data-aos-delay="400"><img
                                            src="{{ asset('theme/images/course_program_study.png') }}" alt="our-staff"
                                            class="img-fluid"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="col-lg-12 m-mt30">
                    <div class="pera-block ml25">
                        <h3>Why Choosing the Right Course Matters</h3>
                        <p>Many students choose courses based on trends or limited information. At
                            Educircle.io, we help you make smart choices by looking at:</p>
                        <p class="mt15"><strong>•</strong> Your skills and interests</p>
                        <p class="mt15"><strong>•</strong> Industry demand in Australia</p>
                        <p class="mt15"><strong>•</strong> Migration relevance (where applicable)</p>
                        <p class="mt15"><strong>•</strong> Scholarship opportunities</p>
                        <p class="mt15"><strong>•</strong> Your budget and financial planning</p>
                        <p>This ensures the course you choose supports real career growth, strong
                            employability, and long-term success.
                        </p><br>
                    </div>
                </div> --}}
                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">
                            Why Choosing the Right Course Matters
                        </h3>

                        <p class="mb-4 lh-base">
                            Many students choose courses based on trends or limited information. At
                            Educircle.io, we help you make smart choices by looking at:
                        </p>

                        <ul class="list-unstyled ms-2">

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Your skills and interests</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Industry demand in Australia</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Migration relevance (where applicable)</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Scholarship opportunities</span>
                            </li>

                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Your budget and financial planning</span>
                            </li>

                        </ul>

                        <p class="mt-3 lh-base">
                            This ensures the course you choose supports real career growth, strong employability,
                            and long-term success.
                        </p>

                    </div>
                </div>
                <div class="col-lg-12 mt5">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">
                            Our Guidance Helps You Choose the Best-Fit Program
                        </h3>

                        <p class="mb-4 lh-base">
                            With our expertise in Australian education and visa requirements, we guide you through every
                            step so you clearly understand:
                        </p>

                        <ul class="list-unstyled ms-2">

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Best universities for your chosen field</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Entry requirements</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Tuition fees and available scholarships</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>English language requirements</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Course duration and structure</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Job outcomes and starting salaries</span>
                            </li>

                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>PR or post-study work pathways (where applicable)</span>
                            </li>

                        </ul>

                        <p class="mt-3 lh-base">
                            Everything is explained clearly and simply — no confusion, no complex jargon.
                        </p>

                    </div>
                </div>


                <div class="col-lg-12 mt40">
                    <h3 class="mb-4 fw-bold text-dark">Study Areas You Can Explore</h3>

                    <div class="row g-3">

                        <!-- Business -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-briefcase text-success me-2"></i>
                                    Business & Management
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Accounting</li>
                                    <li>MBA</li>
                                    <li>Marketing</li>
                                    <li>Human Resources</li>
                                    <li>Project Management</li>
                                    <li>Business Analytics</li>
                                </ul>
                            </div>
                        </div>

                        <!-- IT -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-laptop-code text-success me-2"></i>
                                    IT & Computer Science
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Software Engineering</li>
                                    <li>Cybersecurity</li>
                                    <li>Data Science</li>
                                    <li>Artificial Intelligence</li>
                                    <li>Cloud Computing</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Engineering -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-cogs text-success me-2"></i>
                                    Engineering & Technology
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Civil Engineering</li>
                                    <li>Mechanical</li>
                                    <li>Electrical</li>
                                    <li>Robotics</li>
                                    <li>Telecommunications</li>
                                    <li>Construction Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <!-- Health -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-heartbeat text-success me-2"></i>
                                    Health & Medical Sciences
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Nursing</li>
                                    <li>Public Health</li>
                                    <li>Biomedical Science</li>
                                    <li>Psychology</li>
                                    <li>Medical Science</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Sciences -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-flask text-success me-2"></i>
                                    Sciences
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Biotechnology</li>
                                    <li>Chemistry</li>
                                    <li>Physics</li>
                                    <li>Environmental Science</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Arts -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-palette text-success me-2"></i>
                                    Arts, Humanities & Social Sciences
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Design</li>
                                    <li>Journalism</li>
                                    <li>International Relations</li>
                                    <li>Sociology</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hospitality -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-utensils text-success me-2"></i>
                                    Hospitality, Tourism & Culinary
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Hotel Management</li>
                                    <li>Tourism Operations</li>
                                    <li>Commercial Cookery</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Law -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-balance-scale text-success me-2"></i>
                                    Law, Education & Social Work
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Teaching</li>
                                    <li>Social Work</li>
                                    <li>Legal Studies</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Pathways -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-road text-success me-2"></i>
                                    Pathway & Foundation Programs
                                </h5>
                                <ul class="list-unstyled ms-2 small">
                                    <li>Diplomas</li>
                                    <li>Foundation Studies</li>
                                    <li>Packaged Pathway Programs</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row mt40">

                    <!-- Program Levels Block -->
                    <div class="col-lg-6 mb-4">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                            <h3 class="mb-3 fw-bold text-dark">
                                Program Levels Available
                            </h3>

                            <ul class="list-unstyled ms-2">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Diplomas & Advanced Diplomas</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Bachelor Degrees</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Bachelor (Honours)</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Graduate Certificates</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Graduate Diplomas</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Master Degrees (Coursework & Extension)</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>PhD & Research Programs</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>English Language Courses</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Foundation / Pre-University Programs</span>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <!-- Career Outcomes Block -->
                    <div class="col-lg-6 mb-4">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                            <h3 class="mb-3 fw-bold text-dark">
                                Career Outcomes & Industry Demand
                            </h3>

                            <ul class="list-unstyled ms-2">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Job roles after graduation</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Estimated starting salaries</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Industry growth in Australia</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Skills shortages</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Companies hiring graduates</span>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>


                <div class="col-lg-12 mt40">
                    <h3 class="mb-4 fw-bold text-dark">How Educircle.io Helps You Select the Right Course</h3>

                    <div class="row g-3">

                        <!-- Step 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-user-check text-success me-2"></i>
                                    1. Profile Evaluation
                                </h5>
                                <p class="small ms-2">
                                    We assess your academics, skills, interests, goals, and budget to understand your unique
                                    profile.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-list-ul text-success me-2"></i>
                                    2. Course Shortlisting
                                </h5>
                                <p class="small ms-2">
                                    We prepare a personalised shortlist of top courses and universities based on your goals.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-file-alt text-success me-2"></i>
                                    3. Requirements Explanation
                                </h5>
                                <p class="small ms-2">
                                    We explain academic requirements, English test scores, prerequisites, and all required
                                    documents.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-edit text-success me-2"></i>
                                    4. Application Preparation
                                </h5>
                                <p class="small ms-2">
                                    We help prepare applications, forms, SOP, GTE responses, and submit them correctly.
                                </p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-award text-success me-2"></i>
                                    5. Scholarship Matching
                                </h5>
                                <p class="small ms-2">
                                    We find scholarships, fee reductions, bursaries, and financial benefits you qualify for.
                                </p>
                            </div>
                        </div>

                        <!-- Step 6 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-passport text-success me-2"></i>
                                    6. Visa Guidance
                                </h5>
                                <p class="small ms-2">
                                    We support with GTE, interview preparation, financial documents, and full visa
                                    assistance.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">
                            Top Courses in Demand (2025 & Beyond)
                        </h3>

                        <p class="mb-4 lh-base">
                            These programs are among the most popular and high-demand courses in Australia, offering strong
                            career outcomes and excellent job growth:
                        </p>

                        <ul class="list-unstyled ms-2">

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Master of IT / Data Science</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Master of Business Analytics</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Master of Nursing / Public Health</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Bachelor of Cybersecurity</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Master of Construction Management</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Bachelor of Business (Accounting / Management)</span>
                            </li>

                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Master of Engineering (Telecom / Civil / Mechanical)</span>
                            </li>

                        </ul>

                        <p class="mt-3 lh-base">
                            These programs provide excellent opportunities for career growth, industry relevance, and future
                            employability in Australia and globally.
                        </p>

                    </div>
                </div>



            </div>
        </div>
    </section>
    <section class="home-cta-block r-bg-x mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="sec-heading pera-block">
                        <h3>Ready to find the right course?</h3>
                        <p>Explore programs or speak to our expert counsellors for personalised recommendations.</p>

                        <div class="btn-sets mt40 d-flex justify-content-center gap-3 flex-wrap">
                            <a href="{{ route('courseFinder.filter') }}" class="ree-btn ree-btn-grdt1 mr20">Find
                                Courses<i class="fas fa-arrow-right fa-btn"></i></a>
                            <a href="#" class="ree-btn ree-btn-grdt2">Get Free Counselling<i
                                    class="fas fa-arrow-right fa-btn"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('footerscript')
@endpush
