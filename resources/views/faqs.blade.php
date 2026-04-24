{{-- @extends('layout.app')
@section('title', 'Educircle - FAQs')

@section('content')
<section class="header-title head-opacity" style="padding-bottom: 30px; background: #f4f8fb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="mb-4">Frequently Asked Questions</h1>
                <p class="h-light">Find answers about Educircle's programs, admissions, support, and more.</p>
            </div>
        </div>
    </div>
</section>

<section class="faq-section py-5">
    <div class="container">
        <div class="accordion" id="faqAccordion">

            <!-- Courses & Programs -->
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="coursesHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#coursesCollapse" aria-expanded="true" aria-controls="coursesCollapse">
                        <i class="fas fa-book-open me-2 text-primary"></i> Courses & Programs
                    </button>
                </h2>
                <div id="coursesCollapse" class="accordion-collapse collapse show" aria-labelledby="coursesHeading" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Educircle offers a wide range of programs including academic courses, skill development bootcamps, and professional certifications. You can explore and enroll through our website anytime.
                    </div>
                </div>
            </div>

            <!-- Admission & Enrollment -->
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="admissionHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#admissionCollapse" aria-expanded="false" aria-controls="admissionCollapse">
                        <i class="fas fa-user-check me-2 text-success"></i> Admission & Enrollment
                    </button>
                </h2>
                <div id="admissionCollapse" class="accordion-collapse collapse" aria-labelledby="admissionHeading" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        To enroll, simply create an account, browse available courses, and register online. Our admissions are open year-round depending on the program availability.
                    </div>
                </div>
            </div>

            <!-- Campus & Facilities -->
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="campusHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#campusCollapse" aria-expanded="false" aria-controls="campusCollapse">
                        <i class="fas fa-building me-2 text-warning"></i> Campus & Facilities
                    </button>
                </h2>
                <div id="campusCollapse" class="accordion-collapse collapse" aria-labelledby="campusHeading" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Educircle offers modern infrastructure, online learning labs, mentorship lounges, and support centers. We also have partnerships for internship and placement support.
                    </div>
                </div>
            </div>

            <!-- Student Life & Support -->
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="studentLifeHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#studentLifeCollapse" aria-expanded="false" aria-controls="studentLifeCollapse">
                        <i class="fas fa-users me-2 text-danger"></i> Student Life & Support
                    </button>
                </h2>
                <div id="studentLifeCollapse" class="accordion-collapse collapse" aria-labelledby="studentLifeHeading" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Our students have access to mentorship, discussion forums, career counseling, and regular virtual events to help them succeed academically and professionally.
                    </div>
                </div>
            </div>

            <!-- General Information -->
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="generalHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse" aria-expanded="false" aria-controls="generalCollapse">
                        <i class="fas fa-info-circle me-2 text-secondary"></i> General Information
                    </button>
                </h2>
                <div id="generalCollapse" class="accordion-collapse collapse" aria-labelledby="generalHeading" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        For any general queries, visit our Contact Us page. You can also email us or use live chat for quick assistance.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection --}}
@extends('layout.app')
@section('title', 'Educircle - FAQs')

@section('content')
<section class="header-title head-opacity" style="padding-bottom: 30px; background: #f4f8fb;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="mb-4">Frequently Asked Questions</h1>
                <p class="h-light">Find answers about Educircle's programs, admissions, support, and more.</p>
            </div>
        </div>
    </div>
</section>

<section class="faq-section py-5">
    <div class="container">
        
        <div class="mb-4">
            <h5><i class="fas fa-book-open me-2 text-primary"></i>Courses & Programs</h5>
            <p>Educircle offers a wide range of programs including academic courses, skill development bootcamps, and professional certifications. You can explore and enroll through our website anytime.</p>
        </div>

        <div class="mb-4">
            <h5><i class="fas fa-user-check me-2 text-success"></i>Admission & Enrollment</h5>
            <p>To enroll, simply create an account, browse available courses, and register online. Our admissions are open year-round depending on the program availability.</p>
        </div>

        <div class="mb-4">
            <h5><i class="fas fa-building me-2 text-warning"></i>Campus & Facilities</h5>
            <p>Educircle offers modern infrastructure, online learning labs, mentorship lounges, and support centers. We also have partnerships for internship and placement support.</p>
        </div>

        <div class="mb-4">
            <h5><i class="fas fa-users me-2 text-danger"></i>Student Life & Support</h5>
            <p>Our students have access to mentorship, discussion forums, career counseling, and regular virtual events to help them succeed academically and professionally.</p>
        </div>

        <div class="mb-4">
            <h5><i class="fas fa-info-circle me-2 text-secondary"></i>General Information</h5>
            <p>For any general queries, visit our Contact Us page. You can also email us or use live chat for quick assistance.</p>
        </div>

    </div>
</section>
@endsection
