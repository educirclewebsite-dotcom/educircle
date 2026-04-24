@extends('new_layout.app')

@push('header_script')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme2/assets/libs/toastr/build/toastr.min.css') }}">
    <style>
        /* Backend Specific Tweaks */
        .blog-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container h-100 d-flex flex-column justify-content-center">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="hero-title text-white mb-4">Study Abroad<br>with educircle.io</h1>

                    <ul class="list-unstyled text-white mb-5 hero-bullets hero-bullets-list">
                        <li><i class="fas fa-circle hero-bullet-icon"></i> <span>Explore
                                top courses, universities, and scholarships with real guidance from Australian education
                                experts.</span></li>
                        <li><i class="fas fa-circle hero-bullet-icon"></i> <span>Get
                                personalised support for course selection, application, and visas - all in one
                                place.</span></li>
                        <li><i class="fas fa-circle hero-bullet-icon"></i> <span>Study
                                smarter. Apply better. Build your Future With educircle.io</span></li>
                    </ul>

                    <!-- Email CTA Form -->
                    <form class="email-cta-box d-flex align-items-center mb-5 email-cta-container" onsubmit="return false;">
                        <input type="email" id="userEmail"
                            class="form-control border-0 bg-transparent shadow-none email-cta-input"
                            placeholder="Enter your email to get started" required>
                        <button type="button" id="beginButton" class="btn btn-cta-green m-0 text-nowrap">Let's
                            Begin</button>
                    </form>
                </div>
            </div>

            <!-- Bottom Stats Row -->
            <div class="row mt-auto">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-circle-v2">
                            <i class="fas fa-university"></i>
                        </div>
                        <div>
                            <span class="stat-number-v2">100+</span>
                            <span class="stat-label-v2">Universities</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="d-flex align-items-center">
                        <div class="stat-circle-v2">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div>
                            <span class="stat-number-v2">10,000+</span>
                            <span class="stat-label-v2">Happy Students</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-circle-v2">
                            <i class="fas fa-passport"></i>
                        </div>
                        <div>
                            <span class="stat-number-v2">98%</span>
                            <span class="stat-label-v2">Visa Success Rate</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- Process/Steps Section -->
    <section class="section-padding pb-5 bg-alice-blue-custom position-relative overflow-hidden">
        <div class="container">
            <div class="row">
                <!-- Left Column: Counselor Image -->
                <div class="col-lg-5 text-center mb-5 mb-lg-0">
                    <div class="counselor-img-container">

                        <img src="{{ asset('home_new/images/counselor_new.png') }}" alt="Counselor"
                            class="img-fluid position-relative" style="max-height: 500px;">
                    </div>
                    <h3 class="mt-4 text-accent font-weight-bold">Talking to your counsellor<br><span
                            class="text-secondary h6">is a few steps away</span></h3>
                </div>

                <!-- Right Column: Vertical Timeline -->
                <div class="col-lg-7 pl-lg-5">
                    <form id="timelineForm" class="timeline-new" novalidate>

                        <!-- Hidden Inputs for Validation -->
                        <input type="text" name="intake" id="inputIntake" style="position: absolute; left: -9999px;">
                        <input type="text" name="english" id="inputEnglish" style="position: absolute; left: -9999px;">

                        <!-- Step 1 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="mb-3 text-dark-blue">Do you have a course in mind?</h4>
                                <div class="form-group position-relative">
                                    <input type="text" name="course" id="courseSearchInput"
                                        class="form-control form-input-premium shadow-sm" placeholder="Search course"
                                        autocomplete="off" required>
                                    <ul id="courseSuggestions" class="list-group position-absolute w-100 shadow-sm"
                                        style="display:none; z-index: 1000; max-height: 300px; overflow-y: auto;"></ul>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="mb-3 text-dark-blue">Select the intake you are aiming for</h4>
                                <div class="d-flex flex-wrap" id="intakeSelection">
                                    <button type="button" class="btn btn-pill-white intake-btn mr-3 mb-2"
                                        data-value="July 2026">July 2026</button>
                                    <button type="button" class="btn btn-pill-white intake-btn mr-3 mb-2"
                                        data-value="Nov 2026">Nov
                                        2026</button>
                                    <button type="button" class="btn btn-pill-white intake-btn mr-3 mb-2"
                                        data-value="Jan 2027">Jan
                                        2027</button>
                                </div>
                                <div id="intakeError" class="text-danger small mt-1 pl-1"></div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4 class="mb-3 text-dark-blue">Have you given any English proficiency tests?</h4>
                                <div class="d-flex flex-wrap mb-4" id="englishSelection">
                                    <button type="button" class="btn btn-pill-white english-btn mr-3 mb-2"
                                        data-value="Yes">Yes</button>
                                    <button type="button" class="btn btn-pill-white english-btn mr-3 mb-2"
                                        data-value="No">No</button>
                                    <button type="button" class="btn btn-pill-white english-btn mr-3 mb-2"
                                        data-value="Not Sure">Not
                                        Sure</button>
                                </div>
                                <div id="englishError" class="text-danger small mt-1 pl-1"></div>

                                <button type="submit" id="btnTimelineSubmit"
                                    class="btn btn-submit-success px-5 py-2 border-0">Submit <i
                                        class="fas fa-arrow-right ml-2"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-section" class="section-padding">
        <div class="container">
            <div class="row align-items-start">
                <!-- Left Text Column -->
                <div class="col-lg-7 mb-5 mb-lg-0 pr-lg-5">
                    <h4 class="text-accent mb-2 text-nowrap">Leading Overseas <span class="text-dark-blue">Education
                            Consultants</span></h4>
                    <h2 class="about-title mb-3">
                        Your Trusted Experts for<br>
                        Australian & Global Education
                    </h2>
                    <h5 class="text-secondary-blue mb-4">Personalised Study Abroad & Visa Support for Every
                        Student</h5>

                    <p class="about-text text-dark">Educircle.io is an Australian-led international education
                        platform helping students choose the right course, university, and country for their future.
                        With years of hands-on experience working with Australian universities, admissions teams,
                        and visa processes, we provide clear and honest guidance for students, parents, schools, and
                        counsellors. From course selection to application submission, offer acceptance, GTE/GS
                        support, and visa filing — we assist you at every step. Thousands of students have trusted
                        Educircle.io for transparent advice, faster processing, and a smooth transition into their
                        international academic journey. Let's build your future with real guidance and reliable
                        support.</p>
                </div>

                <!-- Right Image Column -->
                <div class="col-lg-5">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('home_new/images/new_image.jpg') }}" alt="Sydney Opera House"
                            class="img-fluid about-main-img">
                        <div class="about-overlay-btn-container">
                            <a href="{{ route('about') }}" class="btn btn-about-overlay">Know more about us <i
                                    class="fas fa-arrow-right ml-2 text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certifications Bar -->
            <div class="row">
                <div class="col-12">
                    <div class="cert-bar-container p-4">
                        <div class="row text-center align-items-center justify-content-center">
                            <!-- Item 1 -->
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="{{ asset('home_new/images/certifications/cert_check_new.png') }}"
                                    alt="QEAC Certified" class="img-fluid mb-2" style="max-height: 60px;">
                                <p class="small font-weight-bold mb-0 lh-1">QEAC Certified<br>Education Agent</p>
                            </div>
                            <!-- Item 2 -->
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="{{ asset('home_new/images/certifications/cert_british_council.png') }}"
                                    alt="Recognized by British Council" class="img-fluid mb-2" style="max-height: 60px;">
                                <p class="small font-weight-bold mb-0 lh-1">Recognized by<br>British Council</p>
                            </div>
                            <!-- Item 3 -->
                            <div class="col-6 col-md-4 mb-3 mb-md-0">
                                <img src="{{ asset('home_new/images/certifications/cert_ieaa_new.png') }}"
                                    alt="Member of IEAA" class="img-fluid mb-2" style="max-height: 60px;">
                                <p class="small font-weight-bold mb-0 lh-1">Member of IEAA (International<br>Education
                                    Association of Australia)</p>
                            </div>
                            <!-- Item 4 -->
                            <div class="col-6 col-md-2 mb-3 mb-md-0">
                                <img src="{{ asset('home_new/images/certifications/cert_award.png') }}"
                                    alt="Student Choice Award Winner" class="img-fluid mb-2" style="max-height: 60px;">
                                <p class="small font-weight-bold mb-0 lh-1">Student Choice<br>Award Winner</p>
                            </div>
                            <!-- Item 5 -->
                            <div class="col-6 col-md-2">
                                <img src="{{ asset('home_new/images/certifications/cert_partnerships.png') }}"
                                    alt="Top University Partnerships" class="img-fluid mb-2" style="max-height: 60px;">
                                <p class="small font-weight-bold mb-0 lh-1">Top University<br>Partnerships</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title border-0 mb-2"><span class="text-accent">Educircle</span> <span
                        class="text-dark-blue">Services</span></h2>
                <h4 class="mb-0 font-weight-bold" style="font-size: 1.1rem; color: #002244;">Everything you need for
                    your
                    study abroad journey in one place.</h4>
            </div>

            <div class="row">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/study_abroad.png') }}"
                                alt="Study Abroad Counseling" class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Study Abroad Counselling</h5>
                        <p class="text-muted small mb-0">Clear and personalised guidance to choose the right course,
                            university, and country — based on your background, goals, and budget.</p>
                    </div>
                </div>
                <!-- Service 2 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/application_assistance.png') }}"
                                alt="Application Assistance" class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Application Assistance</h5>
                        <p class="text-muted small mb-0">Complete support with university applications, document
                            preparation, SOP/GS answers, LORs, and submitting applications on time.</p>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/visa_support.png') }}" alt="Visa Support"
                                class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Visa Support</h5>
                        <p class="text-muted small mb-0">Specialised assistance for Australian and global student visas,
                            including GTE/GS guidance, document checks, and visa lodgement help.</p>
                    </div>
                </div>
                <!-- Service 4 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/career_counseling.png') }}" alt="Career Counseling"
                                class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Career Counseling</h5>
                        <p class="text-muted small mb-0">Understand future job opportunities, industry trends, and
                            career pathways so you can choose the right course for long-term success.</p>
                    </div>
                </div>
                <!-- Service 5 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/university_partners.png') }}"
                                alt="Top University Partnerships" class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Top University Partnerships</h5>
                        <p class="text-muted small mb-0">Access to 100+ trusted universities and colleges across
                            Australia and other major countries, with updated course details and scholarship options.
                        </p>
                    </div>
                </div>
                <!-- Service 6 -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="service-card text-center text-md-left">
                        <div class="icon-box mx-auto mx-md-0">
                            <img src="{{ asset('home_new/images/services/post_admission.png') }}"
                                alt="Post-Admission Support" class="img-fluid" style="height: 50px;">
                        </div>
                        <h5>Post-Admission Support</h5>
                        <p class="text-muted small mb-0">Help with accommodation search, airport pickup guidance, health
                            insurance, pre-departure support, and settlement assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Universities Section -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title border-0 mb-0"><span class="text-accent">Partner</span> <span
                        class="text-dark-blue">Universities</span></h2>
            </div>

            <div class="partner-slider-container">
                <div class="partner-slider owl-carousel owl-theme">
                    @forelse($partnerLogos as $logo)
                        <div class="partner-logo-item">
                            <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->alt_text }}">
                        </div>
                    @empty
                        <div class="partner-logo-item">
                            <p class="text-center text-muted">No partner logos available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title mb-2"><span class="text-accent">Know More About</span> <span
                        class="text-dark-blue">Popular Courses</span></h2>
                <p class="text-muted" style="font-size: 1.1rem;">Get specific details of the most popular courses in
                    with
                    best consultancy for abroad education.</p>

            </div>

            <div class="row">
                @forelse($popularCourses as $course)
                    <div class="col-lg-4 mb-4">
                        <div class="course-card popular-card bg-white p-3 h-100 position-relative">
                            <span class="popular-badge-card"><i class="fas fa-fire mr-1"></i>Most Popular</span>
                            <div class="card-header-new">
                                <div class="uni-info-new">
                                    <h5><a href="{{ route('course.details', ['university_slug' => $course->university->slug, 'course_id' => $course->id]) }}"
                                            class="text-decoration-none text-dark">{{ $course->course->course_name ?? '' }}</a>
                                    </h5>
                                    <p class="text-muted small mb-1">{{ $course->university->university_name ?? '-' }}
                                    </p>
                                    @if ($course->university->rank)
                                        <span class="uni-rank-new">{{ strpos($course->university->rank, '#') === 0 ? '' : '#' }}{{ $course->university->rank }} Rank</span>
                                    @endif
                                </div>
                                <div class="logo-placeholder-box">
                                    @php
                                        $logo = !empty($course->university?->logo_img)
                                            ? ltrim(str_replace('public/', '', $course->university->logo_img), '/')
                                            : '';
                                        $banner = !empty($course->university?->banner_img)
                                            ? ltrim(str_replace('public/', '', $course->university->banner_img), '/')
                                            : '';

                                        $finalImg = 'theme/images/banner/banner.png';
                                        if (!empty($banner) && file_exists(public_path($banner))) {
                                            $finalImg = $banner;
                                        } elseif (!empty($logo) && file_exists(public_path($logo))) {
                                            $finalImg = $logo;
                                        }

                                        $defaultBanner = 'theme/images/banner/banner.png';
                                    @endphp
                                    <img src="{{ asset($finalImg) }}" alt="{{ $course->university->university_name }}"
                                        onerror="this.onerror=null; this.src='{{ asset($defaultBanner) }}';">
                                </div>
                            </div>

                            <div class="metadata-section-new">
                                <div class="metadata-col">
                                    <p class="metadata-label">Scholarship</p>
                                    <p class="scholarship-value">{{ $course->scholarship ?? 'N/A' }}</p>
                                </div>
                                <div class="metadata-col">
                                    <p class="metadata-label">Course Fee</p>
                                    <p class="scholarship-value" style="font-size: 1.1rem !important;">
                                        {{ !empty($course->course_fee) && is_numeric($course->course_fee) ? 'AUD ' . number_format($course->course_fee) : ($course->course_fee ?? 'N/A') }}
                                    </p>
                                </div>
                                <div class="metadata-col">
                                    <p class="metadata-label">Intake</p>
                                    <div class="intake-badges">
                                        @php
                                            $semesterMap = [
                                                1 => 'Sem 1 (Feb)',
                                                2 => 'Sem 2 (July)',
                                                3 => 'Sem 3 (Nov)',
                                            ];
                                            $semesters = is_array(json_decode($course->semester, true))
                                                ? json_decode($course->semester, true)
                                                : [];
                                        @endphp
                                        @forelse ($semesters as $s)
                                            <span class="intake-badge-new">{{ $semesterMap[$s] ?? $s }}</span>
                                        @empty
                                            <span class="text-muted">-</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('contact') }}"
                                    class="btn btn-connect-expert btn-sm rounded-pill px-3 font-weight-bold">Connect
                                    with Expert</a>
                                <a href="https://wa.me/918130820084" target="_blank"
                                    class="btn btn-chat-gradient btn-sm rounded-pill px-3 font-weight-bold"><i
                                        class="fab fa-whatsapp mr-1"></i>Chat with us</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No popular courses available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="https://educircle.io/course-finder"
                    class="btn btn-green-solid rounded-pill px-4 py-2 font-weight-bold shadow-sm">
                    Explore Course Finder <i class="fas fa-arrow-right ml-2 small"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Google Reviews Section -->
    <section class="section-padding bg-alice-blue-custom position-relative">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="reviews-section-title">What Students Say on <span class="text-accent">Google Reviews</span>
                </h2>
            </div>

            <div id="googleReviewsCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    @forelse($googleReviews as $index => $review)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-10">
                                    <div class="review-card p-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 text-center mb-4 mb-md-0">
                                                <div class="review-img-wrapper">
                                                    @if($review->photo)
                                                        <img src="{{ asset($review->photo) }}" alt="{{ $review->name }}"
                                                            class="review-img rounded-circle shadow-lg">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff"
                                                            alt="{{ $review->name }}" class="review-img rounded-circle shadow-lg">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-9 offset-lg-0">
                                                <div class="review-content">
                                                    <p class="review-text text-muted mb-4">"{{ $review->reviews }}"</p>
                                                    <h5 class="review-author font-weight-bold text-dark-blue mb-0">
                                                        {{ $review->name }}
                                                    </h5>
                                                    <p class="review-uni text-muted small mb-3">
                                                        {{ $review->university }}
                                                        @if($review->designation)
                                                            <span>, {{ $review->designation }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <div class="text-center p-5">
                                <p class="text-muted">No reviews available at the moment.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Custom Indicators -->
                <ol class="carousel-indicators custom-indicators mt-4 position-relative">
                    @foreach($googleReviews as $index => $review)
                        <li data-target="#googleReviewsCarousel" data-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="blog-section-title"><span class="text-accent">Latest From</span> <span class="text-dark-blue">Our
                        Blog</span></h2>
                <p class="blog-section-subtitle w-75 mx-auto">Read helpful articles on courses, universities, visas,
                    life in
                    Australia, scholarships, and <br> career planning — written for students, parents, and counsellors
                </p>
            </div>

            <div id="blogCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
                <div class="carousel-inner">
                    @forelse($blogs->chunk(3) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach($chunk as $blog)
                                    <div class="col-lg-4 mb-4">
                                        <div class="blog-card h-100 shadow-sm border rounded-lg overflow-hidden">
                                            <div class="blog-img position-relative">
                                                <a href="{{ route('blog.details', $blog->title_slug) }}">
                                                    <img src="{{ !empty($blog->image) && file_exists(public_path('uploads/blog_images/' . $blog->image)) ? asset('uploads/blog_images/' . $blog->image) : asset('home_new/images/logo.png') }}"
                                                        onerror="this.onerror=null;this.src='{{ asset('home_new/images/logo.png') }}';"
                                                        alt="{{ $blog->meta_title }}" class="img-fluid w-100"
                                                        style="height: 200px; object-fit: cover;">
                                                </a>

                                            </div>
                                            <div class="blog-body p-4">
                                                <h6 class="font-weight-bold text-dark-blue mb-2">{{ $blog->meta_title }}</h6>
                                                <p class="small text-muted mb-0">
                                                    {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No blogs available at the moment.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Custom Indicators -->
                @if($blogs->isNotEmpty())
                    <ol class="carousel-indicators custom-indicators mt-4 position-relative">
                        @foreach($blogs->chunk(3) as $index => $chunk)
                            <li data-target="#blogCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                @endif
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('blog') }}" class="btn btn-green-solid rounded-pill px-4 py-2 font-weight-bold shadow-sm">
                    Read more <i class="fas fa-arrow-right ml-2 small"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Book a Free Counselling Session -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="counselling-section-title"><span class="text-accent">Book a Free</span> <span
                        class="text-dark-blue">Counselling Session</span></h2>
                <p class="counselling-subtitle">Register Now to connect with our Expert Counsellors</p>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert" style="max-width: 600px;">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="row align-items-center">
                <!-- Left Side: Image & Text -->
                <div class="col-lg-5 mb-5 mb-lg-0 text-center">
                    <div class="counselling-img-wrapper mb-4">
                        <img src="{{ asset('home_new/images/counselling/expert_counsellors_new.png') }}"
                            alt="Expert Counsellors" class="img-fluid counselling-img-large">
                    </div>
                    <h3 class="font-weight-bold mb-4" style="line-height: 1.1;">
                        <span class="text-accent">Free</span> <span class="text-dark-blue">Counselling Session</span>
                    </h3>
                    <a href="https://wa.me/918130820084" target="_blank"
                        class="btn btn-green-solid rounded-pill px-5 py-3 font-weight-bold shadow-sm d-inline-flex align-items-center justify-content-center"
                        style="min-width: 250px; font-size: 1.2rem;">
                        <i class="fab fa-whatsapp mr-2 fa-lg"></i> Chat with us
                    </a>
                </div>

                <!-- Right Side: Registration Form -->
                <div class="col-lg-7">
                    <div class="counselling-form-container">
                        <!-- Corner Decorators -->
                        <div class="form-corner-circle circle-top-left"></div>
                        <div class="form-corner-circle circle-top-right"></div>
                        <div class="form-corner-circle circle-bottom-left"></div>
                        <div class="form-corner-circle circle-bottom-right"></div>

                        <form action="{{ route('lead_store', [], false) }}" method="POST" class="needs-validation"
                            id="processForm" novalidate>
                            @csrf
                            <input type="hidden" name="type" value="counseling">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control form-control-minimal"
                                        placeholder="Full Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control form-control-minimal"
                                        placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="contact_number" class="form-control form-control-minimal"
                                        placeholder="Contact Number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="whatsapp_number" class="form-control form-control-minimal"
                                        placeholder="WhatsApp Number">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="subject" class="form-control form-control-minimal"
                                    placeholder="Subject">
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control form-control-minimal textarea-minimal" rows="4"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="form-group form-check mb-4 pl-4 d-flex align-items-center">
                                <input type="checkbox" class="form-check-input mt-0" id="termsCheck" name="terms"
                                    style="width: 18px; height: 18px;" required>
                                <label class="form-check-label small text-muted ml-3" for="termsCheck">
                                    I agree to the <span class="text-dark font-weight-bold">Terms & Conditions</span> of
                                    Educircle.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-green-solid btn-block py-3">
                                Send your inquiry <i class="fas fa-arrow-right ml-2 small"></i>
                            </button>
                            <p class="text-center small text-muted mt-3 mb-0" style="font-size: 0.85rem;">
                                <i class="fas fa-lock mr-1 small"></i> We respect your privacy and your information is
                                kept fully confidential.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OTP Modal -->
    <div id="otpModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
        style="background: rgba(0,0,0,0.6);">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"> <!-- CSS handles styling -->
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="close" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Title Centered in Body or Header? usually Header for bootstrap, but Image 0 had it prominent. -->
                <!-- We'll put it in modal-body or a unified header/body look -->
                <div class="modal-body text-center pt-0">
                    <!-- OTP Section -->
                    <div id="otpSection">
                        <h3 class="modal-title font-weight-bold mb-2">Signup Via OTP</h3>
                        <p class="text-muted mb-4" style="font-size: 1rem;">Email: <strong id="displayEmail"
                                class="text-dark"></strong></p>
                        <div id="otpContainer" class="d-flex justify-content-center">
                            <!-- Inputs -->
                            <input type="text" class="otp-input" maxlength="1">
                            <input type="text" class="otp-input" maxlength="1">
                            <input type="text" class="otp-input" maxlength="1">
                            <input type="text" class="otp-input" maxlength="1">
                            <input type="text" class="otp-input" maxlength="1">
                            <input type="text" class="otp-input" maxlength="1">
                        </div>

                        <!-- Button Actions -->
                        <button type="button" id="verifyOtpButton" class="btn btn-block mt-4">Verify OTP</button>

                        <div id="countdown-container" class="mt-3">
                            <a href="javascript:void(0)" id="resendLink" onclick="resendOtp()"
                                style="color: #ff6a00; font-weight: 600; display: none;">Resend OTP</a>
                            <span id="timerBox">Resend OTP in <span id="countdown">90</span>s</span>
                        </div>
                    </div>

                    <!-- Password Section (Hidden) -->
                    <div id="passwordSection" style="display: none;">
                        <form action="{{ route('signup.store', [], false) }}" method="POST"
                            onsubmit="return validatePasswords();">
                            @csrf

                            <h3 class="font-weight-bold mb-3 text-center text-dark-blue">Create Your Account</h3>

                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control form-control-minimal"
                                    placeholder="Enter Email" readonly
                                    style="background-color: #fff !important; cursor: not-allowed;">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control form-control-minimal"
                                    placeholder="Enter Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-minimal" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="confirmPassword" name="password_confirmation"
                                    class="form-control form-control-minimal" placeholder="Confirm Password" required>
                                <small id="passwordError" class="text-danger" style="display:none;">Passwords do not
                                    match</small>
                            </div>
                            <button type="submit" class="btn btn-green-solid btn-block py-2"
                                style="font-size: 1.1rem;">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Already Registered Modal -->
    <div id="alreadyRegisteredModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
        style="background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg rounded-xl">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-dark-blue">Already Registered</h5>
                    <button type="button" class="close" onclick="$('#alreadyRegisteredModal').hide()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center px-4 py-4">
                    <p class="text-muted mb-4">It looks like you are already registered with us.</p>
                    <a href="{{ route('login') }}" class="btn btn-green-solid btn-block">Login Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @endsection --}}
@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script>
        /* ====    ===================================                            ===========                            =====              =====
            OTP INPUT HANDLING
            ============================================================ */
        $(document).ready(function () {

            const otpInputs = document.querySelectorAll('.otp-input');

            otpInputs.forEach((input, index) => {

                // Styling
                Object.assign(input.style, {
                    width: "60px",
                    height: "60px",
                    fontSize: "24px",
                    textAlign: "center",
                    border: "1px solid #ccc",
                    borderRadius: "8px"
                });

                // Only digits + move to next box
                input.addEventListener("input", function () {
                    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 1);
                    if (this.value && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });

                // Backspace → go back
                input.addEventListener("keydown", function (e) {
                    if (e.key === "Backspace" && !this.value && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });

                // Paste 6-digit OTP
                input.addEventListener("paste", function (e) {
                    e.preventDefault();
                    const pasteData = (e.clipboardData || window.clipboardData).getData('text')
                        .trim();

                    if (/^\d{6}$/.test(pasteData)) {
                        otpInputs.forEach((box, i) => box.value = pasteData[i] || '');
                        otpInputs[5].focus();
                    }
                });

            });


            /* ============================================================
               COUNTDOWN TIMER
               ============================================================ */
            let countdownInterval;

            function startCountdown() {
                let timeLeft = 90;
                const countdownEl = document.getElementById("countdown");
                const resendLink = document.getElementById("resendLink");
                const timerBox = document.getElementById("timerBox");

                // Reset UI
                if (resendLink) resendLink.style.display = 'none';
                if (timerBox) timerBox.style.display = 'inline';

                clearInterval(countdownInterval);
                if (countdownEl) countdownEl.textContent = timeLeft;

                countdownInterval = setInterval(() => {
                    timeLeft--;
                    if (countdownEl) countdownEl.textContent = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(countdownInterval);
                        if (timerBox) timerBox.style.display = 'none';
                        if (resendLink) resendLink.style.display = 'inline';
                    }
                }, 1000);
            }


            /* ============================================================
               SEND OTP (AJAX)
               ============================================================ */
            function sendOtpAjax(email) {
                $.ajax({
                    url: "{{ route('send.Otp', [], false) }}",
                    type: "POST",
                    data: {
                        email: email,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        if (!res.success) {
                            if (res.message.includes('already registered')) {
                                $('#otpModal').modal('hide');
                                $('#alreadyRegisteredModal').modal('show');
                            } else {
                                alert(res.message); // Show Mail Error
                            }
                        }
                    },
                    error: function (xhr) {
                        alert("Error sending OTP: " + xhr.statusText);
                    }
                });
            }


            /* ============================================================
               OPEN MODAL & SEND OTP
               ============================================================ */
            $('#beginButton').off('click').on('click', function () {
                const email = $('#userEmail').val().trim();

                if (email === "") {
                    alert("Please enter your email first.");
                    return;
                }

                $('#displayEmail').text(email);
                $('#otpModal').modal('show');
                startCountdown();
                sendOtpAjax(email);
            });


            /* ============================================================
               RESEND OTP
               ============================================================ */
            window.resendOtp = function () {
                const email = $('#userEmail').val().trim();

                if (!email) {
                    alert("Please enter your email.");
                    return;
                }

                // Countdown is restarted by startCountdown()
                startCountdown();
                sendOtpAjax(email);
            };


            /* ============================================================
               VERIFY OTP (AJAX)
               ============================================================ */
            $('#verifyOtpButton').off().on('click', function () {

                const email = $('#userEmail').val().trim();
                const otp = $('.otp-input').map(function () {
                    return this.value;
                }).get().join('');

                if (otp.length !== 6) {
                    alert("Please enter a valid 6-digit OTP.");
                    return;
                }

                $.ajax({
                    url: "{{ route('verify.Otp', [], false) }}",
                    type: "POST",
                    data: {
                        email: email,
                        otp: otp,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#passwordSection input[name="email"]').val(email);
                            $('#otpSection').hide();
                            $('#passwordSection').show();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            });


            /* ============================================================
               CLOSE MODAL
               ============================================================ */
            window.closeModal = function () {
                $('#otpModal').modal('hide');
            };

        });


        /* ---------------- PASSWORD VALIDATION ------------------ */
        function validatePasswords() {
            const pass = document.getElementById('password').value;
            const cpass = document.getElementById('confirmPassword').value;
            const error = document.getElementById('passwordError');

            if (pass !== cpass) {
                error.style.display = "block";
                return false;
            }
            return true;
        }

        document.getElementById('confirmPassword').addEventListener('input', () => {
            const pass = document.getElementById('password').value;
            const cpass = document.getElementById('confirmPassword').value;

            if (pass === cpass) {
                document.getElementById('passwordError').style.display = "none";
            }
        });


        // jQuery Validation for Counselling Form
        if ($("#processForm").length > 0) {
            $("#processForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    contact_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                        digits: true
                    },
                    whatsapp_number: {
                        // Optional but if entered must be digits
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    subject: {
                        required: true,
                    },
                    message: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                    },
                    contact_number: {
                        required: "Please enter your contact number",
                        digits: "Please enter only digits",
                    },
                    whatsapp_number: {
                        digits: "Please enter only digits",
                    },
                    subject: {
                        required: "Please enter subject",
                    },
                    message: {
                        required: "Please enter message",
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "terms") {
                        error.insertAfter(element.parent());
                        error.css('display', 'block');
                        error.css('margin-left', '1.5rem'); // Align with text
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    // Check if terms are agreed
                    if (!$('#termsCheck').is(':checked')) {
                        alert('Please agree to the Terms & Conditions.');
                        return false;
                    }

                    // AJAX Submission
                    var submitButton = $(form).find('button[type="submit"]');
                    var loaderImg = "{{ asset('theme/images/loader.gif') }}";
                    submitButton.prop('disabled', true).html('Sending... <img src="' + loaderImg + '" alt="loader" style="height: 20px; width: auto; display: inline-block; vertical-align: middle; margin-left: 5px;">');

                    $.ajax({
                        url: $(form).attr('action'),
                        type: "POST",
                        data: $(form).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            submitButton.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right ml-2"></i>');

                            if (response.success) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your inquiry has been sent successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false
                                }).then((result) => {
                                    window.location.reload();
                                });
                                form.reset();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        },
                        error: function (xhr) {
                            submitButton.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right ml-2"></i>');
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred. Please try again later.',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    });
                    return false; // Prevent default form submission
                }
            });
        }


        $(document).on('submit', '#leadForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let btn = form.find('button[type="submit"]');

            if (btn.prop('disabled')) {
                return;
            }

            btn.prop('disabled', true).html('Sending... <i class="fas fa-spinner fa-spin"></i>');

            let url = form.attr('action');
            let data = form.serialize();

            $.ajax({
                url: url,
                type: "POST",
                data: data,

                success: function (response) {
                    btn.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right fa-btn"></i>');

                    toastr["success"]("Your inquiry has been submitted successfully!");

                    toastr.options = {
                        "closeButton": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "timeOut": 4000,
                    };

                    form[0].reset();
                },

                error: function (xhr) {
                    btn.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right fa-btn"></i>');

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let msg = "";

                        $.each(errors, function (key, val) {
                            msg += val + "<br>";
                        });

                        toastr["error"](msg);

                        toastr.options = {
                            "closeButton": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "timeOut": 5000,
                        };

                    } else {
                        toastr["error"]("Something went wrong. Please try again.");

                        toastr.options = {
                            "positionClass": "toast-top-right",
                        };
                    }
                }
            });
        });

        $(document).ready(function () {
            $('.partner-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        });



        // Timeline Interaction & WhatsApp Submit
        document.addEventListener('DOMContentLoaded', function () {
            // Intake Selection
            const intakeBtns = document.querySelectorAll('.intake-btn');
            const inputIntake = document.getElementById('inputIntake');

            intakeBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    intakeBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    inputIntake.value = this.getAttribute('data-value');
                    // Optional: Trigger validation on change
                    if ($('#timelineForm').validate().element('#inputIntake')) {
                        // valid
                    }
                });
            });

            // English Selection
            const englishBtns = document.querySelectorAll('.english-btn');
            const inputEnglish = document.getElementById('inputEnglish');

            englishBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    englishBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    inputEnglish.value = this.getAttribute('data-value');
                    // Optional: Trigger validation on change
                    if ($('#timelineForm').validate().element('#inputEnglish')) {
                        // valid
                    }
                });
            });

            // jQuery Validation
            if ($("#timelineForm").length > 0) {
                $("#timelineForm").validate({
                    ignore: [], // Validate hidden inputs
                    rules: {
                        course: {
                            required: true
                        },
                        intake: {
                            required: true
                        },
                        english: {
                            required: true
                        }
                    },
                    messages: {
                        course: {
                            required: "Please enter a course name"
                        },
                        intake: {
                            required: "Please select an intake"
                        },
                        english: {
                            required: "Please select an option"
                        }
                    },
                    errorPlacement: function (error, element) {
                        if (element.attr("name") == "intake") {
                            error.appendTo("#intakeError");
                        } else if (element.attr("name") == "english") {
                            error.appendTo("#englishError");
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function (form) {
                        const courseName = $('#courseSearchInput').val().trim();
                        const intake = $('#inputIntake').val();
                        const english = $('#inputEnglish').val();

                        // Construct Message
                        const message = `Hello, I'm interested in a course.\n\n` +
                            `*Course:* ${courseName}\n` +
                            `*Intake:* ${intake}\n` +
                            `*English Proficiency Test:* ${english}`;

                        const whatsappNumber = '918130820084';
                        const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

                        // Use location.href instead of window.open to avoid security warnings on mobile
                        window.location.href = url;
                        return false; // Prevent form submission
                    }
                });
            }
        });

        // Course Auto-Suggest
        document.addEventListener('DOMContentLoaded', function () {
            // console.log('Course Auto-Suggest Script Loaded');
            const searchInput = document.getElementById('courseSearchInput');
            const suggestionsList = document.getElementById('courseSuggestions');

            if (!searchInput) {
                // console.error('Course search input not found!');
                return;
            }

            let timeoutId;

            searchInput.addEventListener('input', function () {
                clearTimeout(timeoutId);
                const query = this.value;
                // console.log('User typing:', query);

                if (query.length < 2) {
                    suggestionsList.style.display = 'none';
                    return;
                }

                timeoutId = setTimeout(() => {
                    const url = `{{ route('ajax.course.search', [], false) }}?term=${encodeURIComponent(query)}`;
                    // console.log('Fetching:', url);

                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // console.log('Data received:', data);
                            suggestionsList.innerHTML = '';
                            if (data.results && data.results.length > 0) {
                                data.results.forEach(course => {
                                    const item = document.createElement('li');
                                    item.className = 'list-group-item';
                                    item.textContent = course.text;
                                    item.addEventListener('click', function () {
                                        // Visual Feedback: Add selected class
                                        this.classList.add('suggestion-selected');

                                        // Store reference to this element
                                        const selectedItem = this;

                                        // Delay action to let animation play
                                        setTimeout(() => {
                                            searchInput.value = selectedItem.textContent;
                                            suggestionsList.style.display = 'none';
                                            // Reset class (optional as list gets rebuilt, but good practice)
                                            selectedItem.classList.remove('suggestion-selected');
                                        }, 300); // 300ms delay matches CSS transition/perception time
                                    });
                                    suggestionsList.appendChild(item);
                                });
                                suggestionsList.style.display = 'block';
                            } else {
                                suggestionsList.style.display = 'none';
                            }
                        })
                        .catch(error => console.error('Error fetching courses:', error));
                }, 300);
            });

            // Hide suggestions when clicking outside
            document.addEventListener('click', function (e) {
                if (e.target !== searchInput && e.target !== suggestionsList && !suggestionsList.contains(e.target)) {
                    suggestionsList.style.display = 'none';
                }
            });
        });

        // OTP Input Logic (Restored)
        document.addEventListener('DOMContentLoaded', function () {
            const otpInputs = document.querySelectorAll('.otp-input');

            otpInputs.forEach((input, index, allInputs) => {
                // Set attributes dynamically if missing
                input.setAttribute('inputmode', 'numeric');
                input.setAttribute('autocomplete', 'one-time-code');

                input.addEventListener('input', function () {
                    // Allow only numbers
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1);

                    if (this.value && index < allInputs.length - 1) {
                        allInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function (e) {
                    if (e.key === "Backspace" && !this.value && index > 0) {
                        allInputs[index - 1].focus();
                    }
                });

                input.addEventListener('paste', function (e) {
                    e.preventDefault();
                    const pasteData = (e.clipboardData || window.clipboardData).getData('text').trim();
                    // Match 6 digits
                    if (/^\d{6}$/.test(pasteData)) {
                        allInputs.forEach((box, i) => box.value = pasteData[i] || '');
                        // Focus last input
                        if (allInputs.length > 0) allInputs[allInputs.length - 1].focus();
                    }
                });
            });
        });
    </script>
@endpush