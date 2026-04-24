@extends('layout.app')
@section('title', 'Application & Visa Guidance')
@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
@endpush
@section('content')
    <section class="sec-pad r-bg-x mt-2 other-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt40">
                    <div class="row align-items-center info-box r-bg-c p-4 p-md-5 rounded-4">


                        <div class="col-lg-6">
                            <h2 class="mb15 fw-bold text-dark">
                                <span class="text-success">End-to-End</span> Support for Your Study Abroad Journey
                            </h2>

                            <p class="lh-base">
                                Studying in Australia becomes much simpler when you have the right guidance.
                                At Educircle.io, we help you at every step—starting from choosing the right
                                course to preparing a strong visa application.
                            </p>

                            <p class="lh-base mt-2">
                                Our process is transparent, accurate, and designed to give students and
                                parents complete confidence.
                            </p>
                        </div>


                        <div class="col-lg-6 text-center">
                            <div class="image-rounded">
                                <img src="{{ asset('theme/images/study_abroad.jpg') }}" alt="Study Abroad">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt40">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                            <h3 class="mb-3 fw-bold text-dark">1. Course & University Shortlisting</h3>

                            <p>
                                Choosing the right program is the most important step. We help you shortlist options
                                based on:
                            </p>

                            <ul class="list-unstyled ms-2 mt-3">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Your academic background</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Future career goals</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Budget and financial planning</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Preferred city and lifestyle</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>University rankings and industry links</span>
                                </li>

                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Internship and job opportunities</span>
                                </li>

                            </ul>

                            <p class="mt-3">
                                You will receive a personalised list of recommended universities, courses, scholarships,
                                and pathways so that you can make an informed decision.
                            </p>

                        </div>
                    </div>


                    <div class="col-lg-12 mt40">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                            <h3 class="mb-3 fw-bold text-dark">2. Application Submission & Management</h3>

                            <p>
                                Once your courses are selected, we manage the entire application process:
                            </p>

                            <ul class="list-unstyled ms-2 mt-3">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Creating your university portal/application</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Uploading documents correctly</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Guiding you on SOPs, CVs, LORs, and portfolios</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Tracking application progress</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Maintaining communication with universities</span>
                                </li>

                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Handling offer letters, conditions, and responses</span>
                                </li>

                            </ul>

                            <p class="mt-3">
                                Our team ensures your applications are accurate, complete, and submitted on time.
                            </p>

                        </div>
                    </div>


                    <div class="row mt40">

                        <!-- LEFT COLUMN — Section 3 -->
                        <div class="col-lg-6 mb-4">
                            <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                                <h3 class="mb-3 fw-bold text-dark">3. GS / GTE & University Interview Support</h3>

                                <p>
                                    Australia requires strong Genuine Student (GS) and Genuine Temporary Entrant (GTE)
                                    evidence.
                                    We support you with:
                                </p>

                                <ul class="list-unstyled ms-2 mt-3">

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>GS/GTE writing guidance</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Strengthening your statement based on your profile</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Mock interviews (if required by universities)</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Checking financial and academic consistency</span>
                                    </li>

                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Ensuring your documents support your study intent</span>
                                    </li>

                                </ul>

                                <p class="mt-3">
                                    Our GS/GTE guidance is based on real experience with hundreds of successful cases.
                                </p>

                            </div>
                        </div>

                        <!-- RIGHT COLUMN — Section 4 -->
                        <div class="col-lg-6 mb-4">
                            <div class="info-box r-bg-c p-4 p-md-5 rounded-4 h-100">

                                <h3 class="mb-3 fw-bold text-dark">4. Student Visa Document Preparation</h3>

                                <p>We help you prepare all required visa documents, including:</p>

                                <ul class="list-unstyled ms-2 mt-3">

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Passport</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>COE (Confirmation of Enrolment)</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>GS/GTE statement</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Academic documents</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>English test results</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Financial documents (funds, savings, loan, etc.)</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Health insurance (OSHC) guidance</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Family information forms</span>
                                    </li>

                                    <li class="mb-2 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>SOP/intent letter</span>
                                    </li>

                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                        <span>Work experience documents (if applicable)</span>
                                    </li>

                                </ul>

                                <p class="mt-3">
                                    We ensure your documents are organised, accurate, and ready for a smooth visa
                                    process.
                                </p>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 mt40">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                            <h3 class="mb-3 fw-bold text-dark">5. Visa Application Submission & Processing Times</h3>

                            <p>We assist you throughout the visa submission process:</p>

                            <ul class="list-unstyled ms-2 mt-3">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Completing the visa application form</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Uploading documents correctly</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Reviewing your final application before submission</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Tracking visa updates</span>
                                </li>

                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Scheduling medicals and biometrics (if required)</span>
                                </li>

                            </ul>

                            <p class="fw-bold mt-4">Typical Processing Times (Approx.):</p>

                            <ul class="list-unstyled ms-2 mt-2">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-clock text-success me-2 fs-5"></i>
                                    <span>Fastest approvals: 1–2 weeks</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-clock text-success me-2 fs-5"></i>
                                    <span>Average approvals: 2–4 weeks</span>
                                </li>

                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-clock text-success me-2 fs-5"></i>
                                    <span>Complex cases: 4–8+ weeks</span>
                                </li>

                            </ul>

                            <p class="mt-3">
                                We always update you on the latest timelines and expected processing speed.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-12 mt40">
                        <div class="info-box r-bg-c p-4 p-md-5 rounded-4">

                            <h3 class="mb-3 fw-bold text-dark">6. How Educircle Helps</h3>

                            <p>
                                Educircle.io offers complete support from start to finish:
                            </p>

                            <ul class="list-unstyled ms-2 mt-3">

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Expert counselling based on real Australian experience</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Honest, transparent course recommendations</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Professionally handled applications</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Accurate GS/GTE support</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Clean, organised visa files</span>
                                </li>

                                <li class="mb-2 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Faster communication with universities</span>
                                </li>

                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-2 fs-5"></i>
                                    <span>Guidance on scholarships, accommodation, and pre-departure</span>
                                </li>

                            </ul>

                            <p class="mt-3">
                                Our focus is to make your study abroad experience simple, stress-free, and successful.
                            </p>

                        </div>
                    </div>

                </div>
            </div>
    </section>
@endsection
@push('footerscript')
@endpush
