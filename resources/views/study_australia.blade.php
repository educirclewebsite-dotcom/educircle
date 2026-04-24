@extends('layout.app')
@section('title', 'Study in Australia')
@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
@endpush
@section('content')
    <section class="sec-pad r-bg-x other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <h2 class="mb15 fw-bold text-dark">
                                    Study in <span class="text-success">Australia</span>
                                </h2>

                                <p class="lh-base">
                                    Your pathway to world-class education, global career opportunities, and a safe, modern
                                    lifestyle.
                                </p>

                                <p class="lh-base mt-2">
                                    Australia is one of the most preferred destinations for international students. With
                                    industry-focused universities, strong post-study work rights, and a high standard of
                                    living,
                                    it offers the perfect environment for academic and personal growth.
                                </p>
                            </div>


                            <div class="col-lg-6 text-center">
                                <div class="image-rounded">
                                    <img src="{{ asset('theme/images/home_images23.jpg') }}" alt="Study in Australia"
                                        class="img-fluid">
                                </div>
                            </div>


                        </div>

                    </div>
                </div>



                <div class="col-lg-12 mt40">
                    <h3 class="mb-4 fw-bold text-dark">1. Why Study in Australia?</h3>

                    <div class="row g-3">

                        <!-- Box 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-university text-success me-2"></i>
                                    World-Ranked Universities
                                </h5>
                                <p class="small ms-2">
                                    Australia has some of the top universities globally, recognised for quality teaching,
                                    research
                                    excellence, and industry connections.
                                </p>
                            </div>
                        </div>

                        <!-- Box 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-briefcase text-success me-2"></i>
                                    Practical, Career-Focused Education
                                </h5>
                                <p class="small ms-2">
                                    Courses are designed with real-world experience, internships, labs, and industry
                                    projects —
                                    helping you graduate job-ready.
                                </p>
                            </div>
                        </div>

                        <!-- Box 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-users text-success me-2"></i>
                                    Safe, Multicultural Environment
                                </h5>
                                <p class="small ms-2">
                                    Students from all over the world choose Australia because it is friendly, safe, and
                                    welcoming.
                                </p>
                            </div>
                        </div>

                        <!-- Box 4 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-chart-line text-success me-2"></i>
                                    High Graduate Employability
                                </h5>
                                <p class="small ms-2">
                                    Australian degrees are globally accepted. Employers value graduates who gain hands-on
                                    experience
                                    during their studies.
                                </p>
                            </div>
                        </div>

                        <!-- Box 5 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-briefcase-medical text-success me-2"></i>
                                    Flexible Work Rights for Students
                                </h5>
                                <p class="small ms-2">
                                    International students can work part-time during studies, offering valuable work
                                    experience and
                                    financial support.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 mt40">
                    <h3 class="mb-4 fw-bold text-dark">2. Post-Study Work (PSW) Visa Benefits</h3>

                    <div class="row g-3">

                        <!-- Intro Text -->
                        <div class="col-lg-12">
                            <div class="info-box r-bg-c p-3 rounded-4">
                                <p class="mb-0">
                                    Australia offers generous Post-Study Work visas for international graduates.
                                </p>
                            </div>
                        </div>

                        <!-- PSW Duration Title -->
                        <div class="col-lg-12 mt2">
                            <h5 class="fw-bold text-dark mb-2">
                                <i class="fas fa-clock text-success me-2"></i>
                                Typical PSW Duration
                            </h5>
                        </div>

                        <!-- Duration Cards -->
                        <div class="col-md-6 col-lg-3">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h6 class="fw-bold text-dark">Bachelor’s Degree</h6>
                                <p class="small ms-2 mb-0">2 years</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h6 class="fw-bold text-dark">Master’s Degree</h6>
                                <p class="small ms-2 mb-0">3 years</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h6 class="fw-bold text-dark">Master’s (Extended)</h6>
                                <p class="small ms-2 mb-0">3–4 years</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h6 class="fw-bold text-dark">Doctoral Degree (PhD)</h6>
                                <p class="small ms-2 mb-0">4 years</p>
                            </div>
                        </div>

                        <!-- Additional Benefits Title -->
                        <div class="col-lg-12 mt-4">
                            <h5 class="fw-bold text-dark mb-2">
                                <i class="fas fa-gift text-success me-2"></i>
                                Additional Benefits
                            </h5>
                        </div>

                        <!-- Additional Benefits List -->
                        <div class="col-lg-12">
                            <ul class="list-unstyled ms-2">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Gain full-time work experience in Australia</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Improve chances of securing skilled migration pathways</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Build international industry connections</span>
                                </li>

                                <li class="mb-1 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Opportunity to work in your field of study</span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12 mt40">
                    <h3 class="mb-4 fw-bold text-dark">3. Intakes in Australia</h3>

                    <div class="row g-3">

                        <!-- Intro -->
                        <div class="col-lg-12">
                            <div class="info-box r-bg-c p-3 rounded-4">
                                <p class="mb-0">Australia has two major intakes:</p>
                            </div>
                        </div>

                        <!-- Intake 1 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-calendar-check text-success me-2"></i>
                                    February / March Intake (Main)
                                </h5>
                                <p class="small ms-2 mb-0">
                                    Largest intake, most courses available, high demand for admissions.
                                </p>
                            </div>
                        </div>

                        <!-- Intake 2 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-calendar-day text-success me-2"></i>
                                    July Intake (Mid-year)
                                </h5>
                                <p class="small ms-2 mb-0">
                                    Many popular courses open, good for students finishing school in June.
                                </p>
                            </div>
                        </div>

                        <!-- Intake 3 -->
                        <div class="col-md-6 col-lg-4">
                            <div class="info-box r-bg-c p-3 rounded-4 h-100">
                                <h5 class="fw-bold mb-2 text-dark">
                                    <i class="fas fa-calendar-alt text-success me-2"></i>
                                    November / October Intake (Limited)
                                </h5>
                                <p class="small ms-2 mb-0">
                                    Available for specific universities and programs, best for fast-track entry.
                                </p>
                            </div>
                        </div>

                        <!-- Final Note -->
                        <div class="col-lg-12 mt2">
                            <div class="info-box r-bg-c p-3 rounded-4">
                                <p class="mb-0">
                                    Educircle.io helps students plan documents and applications for each intake.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row mt40">

                    <!-- Cost of Living -->
                    <div class="col-lg-6 mb-4">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                            <h3 class="mb-3 fw-bold text-dark">
                                4. Cost of Living in Australia
                            </h3>

                            <p>Approximate monthly expenses for international students:</p>

                            <ul class="list-unstyled ms-2 mt-3">

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-home text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Accommodation:</strong>
                                        Shared apartment: AUD 180–300/week, Student housing: AUD 250–350/week
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-shopping-basket text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Food & Groceries:</strong>
                                        AUD 80–150/week
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-bus text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Transport:</strong>
                                        AUD 20–50/week (discounted student fares available)
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-1">
                                    {{-- <i class="fas fa-wallet text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Other Costs:</strong>
                                        SIM, utilities, insurance, personal expenses: AUD 100–200/week
                                    </span>
                                </li>

                            </ul>

                            <p class="mt-3">
                                <strong>Average Total Monthly Cost:</strong>
                                AUD 1,500–2,200 (varies by city and lifestyle)
                            </p>

                        </div>
                    </div>

                    <!-- Top Student Cities -->
                    <div class="col-lg-6 mb-4">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                            <h3 class="mb-3 fw-bold text-dark">
                                5. Top Student Cities in Australia
                            </h3>

                            <ul class="list-unstyled ms-2">

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-city text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Sydney:</strong>
                                        Large job market, home to UTS, Macquarie, UNSW, USyd, fast-paced, multicultural,
                                        high opportunity.
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-city text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Melbourne:</strong>
                                        Ranked among the most liveable cities, home to RMIT, Deakin, Monash, La Trobe, safe,
                                        diverse, excellent student support.
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-city text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Brisbane:</strong>
                                        Affordable lifestyle, home to Griffith, QUT, University of Queensland, warm climate
                                        and friendly environment.
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    {{-- <i class="fas fa-city text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Adelaide:</strong>
                                        Lower cost of living, home to UniSA and University of Adelaide.
                                    </span>
                                </li>

                                <li class="d-flex align-items-start mb-1">
                                    {{-- <i class="fas fa-city text-success me-2 fs-5"></i> --}}
                                    <span>
                                        <strong>Perth:</strong>
                                        Growing tech and mining hub, home to Curtin and University of Western Australia.
                                    </span>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">6. Job Prospects in Australia</h3>

                        <p>Australia offers strong employment opportunities in:</p>

                        <ul class="list-unstyled ms-2 mt-3">

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>IT & Computer Science (Data, Cybersecurity, AI, Cloud)</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Business & Accounting</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Engineering (All streams)</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Health Sciences & Nursing</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Construction & Architecture</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Hospitality & Tourism</span>
                            </li>

                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Education & Social Sciences</span>
                            </li>

                        </ul>

                        <p class="mt-3">
                            <strong>Student Work Rights:</strong>
                            Part-time work during studies (48 hours per fortnight), full-time work during breaks and
                            post-graduation.
                        </p>

                        <p class="mt-2">
                            <strong>PSW Opportunities:</strong>
                            Graduates often find full-time roles through internships, graduate programs, industry
                            networking,
                            and skilled occupation demand.
                        </p>

                    </div>
                </div>


                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">7. Major Universities in Australia</h3>

                        <p>Australia is home to globally recognised institutions, including:</p>

                        <div class="row g-3 mt-3">

                            <!-- University List in Cards -->

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of Technology Sydney (UTS)</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Macquarie University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>RMIT University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Deakin University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>La Trobe University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Griffith University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Western Sydney University (WSU)</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of Wollongong (UOW)</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Monash University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of Melbourne</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of Queensland</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Curtin University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of Adelaide</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>Swinburne University</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box r-bg-c p-3 rounded-3 h-100 d-flex align-items-center">
                                    <i class="fas fa-university text-success me-2 fs-5"></i>
                                    <span>University of South Australia</span>
                                </div>
                            </div>

                        </div>

                        <p class="mt-4">
                            <strong>Educircle.io helps students apply to more than 30+ institutions across
                                Australia.</strong>
                        </p>

                    </div>
                </div>


                <div class="col-lg-12 mt40">
                    <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                        <h3 class="mb-3 fw-bold text-dark">8. Scholarships for International Students</h3>

                        <p>
                            Australian universities offer a wide range of merit-based scholarships, typically ranging from
                            10% to 30% tuition fee reductions, and sometimes higher for exceptional students.
                        </p>

                        <p class="fw-bold mt-3">Scholarships are based on:</p>

                        <ul class="list-unstyled ms-2 mt-2">

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Academic performance</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>English scores</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>University/college choice</span>
                            </li>

                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Course type</span>
                            </li>

                            <li class="mb-3 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                <span>Application timing</span>
                            </li>

                        </ul>

                        <p class="mt-3">
                            Educircle.io assists students in identifying and applying for the best scholarships available.
                        </p>

                        {{-- <p class="mt-2">
                            <a href="#">
                                Click here
                            </a>
                            to view the complete Scholarship Matrix (UTS, Macquarie, Griffith, La Trobe, RMIT, Deakin, WSU,
                            UOW)
                        </p> --}}

                    </div>
                </div>

    </section>
@endsection
@push('footerscript')
@endpush
