@extends('new_layout.app')
@section('title', $university->university_name)

@push('header_script')
    <style>
        .uni-hero-wrapper {
            margin-top: 180px !important;
        }

        @media (max-width: 991px) {
            .uni-hero-wrapper {
                margin-top: 150px !important;
            }
        }

        @media (max-width: 576px) {
            .uni-hero-wrapper {
                margin-top: 140px !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="bg-alice-blue-custom">
        <!-- ===================== HERO CARD ===================== -->
        <div class="container uni-hero-wrapper" style="max-width: 1350px; padding-bottom: 40px;">

            <!-- Complex Overlap Wrapper -->
            <div style="position: relative; margin-bottom: 20px;">

                <!-- White Hero Card Container -->
                <div class="uni-card-main p-0 mb-0 d-flex flex-column"
                    style="background: #fff; border-radius: 30px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); position: relative; z-index: 2; margin-bottom: 0 !important;">

                    <!-- Top Section: 3 Columns -->
                    <div class="row align-items-center m-0 px-4 px-lg-5 py-2 py-lg-3">

                        <!-- Column 1: Logo & Rank -->
                        <div
                            class="col-lg-3 col-xl-3 d-flex flex-column justify-content-between align-items-center py-4 hero-card-col">
                            @php
                                $logo_path = !empty($university->logo_img) && file_exists(public_path($university->logo_img))
                                    ? asset($university->logo_img)
                                    : asset('home_new/images/uni_logo.png');
                            @endphp
                            <div class="text-center">
                                <img src="{{ $logo_path }}" class="uni-hero-logo"
                                    alt="{{ $university->university_name }} Logo"
                                    style="width: auto; max-width: 200px; height: auto; object-fit: contain;"
                                    onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                            </div>


                            <div class="rank-text-col text-center"
                                style="color: #70b92b; line-height: 1; white-space: nowrap; margin-top: auto;">
                                <span style="font-size: 4rem; font-weight: 800; font-style: italic;">
                                    {{ strpos($university->rank, '#') === false ? '#' : '' }}{{ $university->rank ?? '1' }}</span>
                                <span
                                    style="font-size: 1.8rem; font-weight: 600; font-style: normal; margin-left: 8px;">Rank</span>
                            </div>
                        </div>

                        <!-- Column 2: Title & Buttons -->
                        <div
                            class="col-lg-5 col-xl-5 d-flex flex-column justify-content-start align-items-start pl-lg-5 hero-card-col">
                            <h1 class="about-title mb-3">
                                {{ $university->university_name }}<br>
                                <span
                                    style="font-size: 1.5rem; opacity: 0.8;">{{ $university->city ?? '' }}{{ $university->city ? ', ' : '' }}{{ $university->country->name ?? 'Australia' }}</span>
                            </h1>

                            <div class="d-flex flex-column align-items-start mt-4 gap-3">
                                <div class="badge-regional"
                                    style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; padding: 12px 40px; background-color: #f1c40f; color: #fff; border-radius: 50px; font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                    {{ $university->university_type ?? 'Non Regional' }}
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-hero-main">Apply Now</a>
                                <a href="{{ $university->university_link ?? '#' }}" class="btn btn-hero-alt">Visit
                                    University Website</a>
                            </div>
                        </div>

                        <!-- Column 3: Hero Image -->
                        <div class="col-lg-4 col-xl-4 mt-5 mt-lg-0 text-right pr-0 d-none d-lg-block">
                            @php
                                $banner_path = !empty($university->banner_img) && file_exists(public_path($university->banner_img))
                                    ? asset($university->banner_img)
                                    : asset('home_new/images/uni_logo.png');
                            @endphp
                            <img src="{{ $banner_path }}" class="hero-img-box" alt="{{ $university->university_name }}"
                                style="margin-top: 0; height: 380px; width: 100%; border-radius: 30px; object-fit: cover;"
                                onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                        </div>
                    </div>
                </div>

                <!-- Tucked Green Info Bar Pill -->
                <div class="green-info-bar-wrapper">
                    <div class="green-info-bar">
                        <div class="info-item">
                            <div class="info-label">Country</div>
                            <div class="info-value">{{ $university->country->name ?? 'Australia' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">State</div>
                            <div class="info-value">{{ $university->state->name ?? ($university->city ?? 'VIC') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Established</div>
                            <div class="info-value">{{ $university->estd ?? '1964' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Ranking (QS)</div>
                            <div class="info-value">
                                {{ strpos($university->rank, '#') === false ? '#' : '' }}{{ $university->rank ?? '1' }} Rank
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ===================== UNIVERSITY INFO ===================== -->
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="uni-info-section-title">University <span>Info</span></h2>
                    <p style="font-size: 1.05rem; line-height: 1.9; color: #2c3e50;">
                        {!! $university->description ?? '<p>Welcome to ' . $university->university_name . ', a world-class institution providing exceptional education and research excellence for students across various disciplines.</p>' !!}
                    </p>

                </div>
            </div>
        </div>

        <!-- ===================== TOP PROGRAMS ===================== -->
        <section class="programs-section">
            <div class="container container-wide">
                <div class="text-center mb-5">
                    <h2 class="programs-section-title"><span>Top</span> Courses {{ $university->university_name }}</h2>
                </div>

                <div class="row">
                    @forelse($universitycourses as $course)
                        <!-- Program Card -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="course-card popular-card bg-white p-3 h-100 position-relative">
                                <div class="card-header-new">
                                    <div class="uni-info-new">
                                        <h5 class="uni-name">{{ $university->university_name }}</h5>
                                        <p class="uni-location-v3">
                                            {{ $university->city ?? '' }}{{ $university->city ? ', ' : '' }}<span
                                                class="country-text">{{ $university->country->name ?? 'Australia' }}</span>
                                        </p>
                                    </div>
                                    <div class="logo-placeholder-box">
                                        @if($university->logo_img)
                                            <img src="{{ asset($university->logo_img) }}" alt="{{ $university->university_name }}"
                                                style="max-height: 35px;" onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                                        @endif
                                    </div>
                                </div>

                                <h6 class="course-title-green mb-4">
                                    <a href="{{ route('course.details', [$university->slug, $course->id]) }}"
                                        class="text-decoration-none" style="color: inherit;">
                                        {{ $course->course->course_name ?? '-' }}
                                    </a>
                                </h6>

                                <div class="metadata-section-new">
                                    <div class="metadata-col">
                                        <p class="metadata-label">Course Fee</p>
                                        <p class="scholarship-value">AUD
                                            {{ is_numeric($course->course_fee) ? number_format($course->course_fee) : $course->course_fee }}
                                            / Year
                                        </p>
                                    </div>
                                    <div class="metadata-col">
                                        <p class="metadata-label">Scholarship</p>
                                        <p class="scholarship-value text-green">{{ $course->scholarship ?? 'Up to 25%' }}</p>
                                    </div>
                                </div>

                                <div class="metadata-section-new">
                                    <div class="metadata-col">
                                        <p class="metadata-label">Duration</p>
                                        <p class="scholarship-value">{{ $course->duration_months ?? '-' }} Years</p>
                                    </div>
                                    <div class="metadata-col">
                                        <p class="metadata-label">Intakes</p>
                                        <p class="scholarship-value text-green">
                                            @php
                                                $semesterMap = [1 => 'Feb', 2 => 'July', 3 => 'Nov'];
                                                $semesters = is_string($course->semester) ? json_decode($course->semester, true) : (is_array($course->semester) ? $course->semester : []);
                                                echo !empty($semesters) ? implode(', ', array_map(fn($s) => $semesterMap[$s] ?? $s, $semesters)) : 'Feb, July';
                                            @endphp
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <a href="#expert-counselling-form"
                                        class="btn btn-connect-expert btn-sm rounded-pill px-3 font-weight-bold">Connect
                                        with Expert</a>
                                    <a href="https://wa.me/61414417065" target="_blank"
                                        class="btn btn-chat-gradient btn-sm rounded-pill px-3 font-weight-bold">
                                        <i class="fab fa-whatsapp mr-1"></i>Chat with us
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-info">No top courses listed for {{ $university->university_name }}.</div>
                        </div>
                    @endforelse
                </div>

                <!-- Explore Course Finder CTA -->
                <div class="text-center mt-5 pb-5">
                    <a href="{{ route('courseFinder.filter') }}" class="btn btn-student-login px-5 py-3 shadow-lg"
                        style="font-size: 1.15rem; font-weight: 700; border-radius: 50px;">
                        Explore Course Finder
                    </a>
                </div>
            </div>
        </section>

        <!-- ===================== CONTACT FORM ===================== -->
        <div class="container pb-5 pt-0">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div id="expert-counselling-form" class="counselling-form-container">
                        <!-- Corner Decorators -->
                        <div class="form-corner-circle circle-top-left"></div>
                        <div class="form-corner-circle circle-top-right"></div>
                        <div class="form-corner-circle circle-bottom-left"></div>
                        <div class="form-corner-circle circle-bottom-right"></div>

                        <h3 class="text-center mb-5 font-weight-bold" style="color: #002244;">Get Expert Counselling</h3>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert"
                                style="border-radius: 15px;">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger mb-4" style="border-radius: 15px;">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('lead_store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control form-control-minimal"
                                        placeholder="Full Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control form-control-minimal"
                                        placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="contact_number" class="form-control form-control-minimal"
                                        placeholder="Contact Number" value="{{ old('contact_number') }}" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="whatsapp_number" class="form-control form-control-minimal"
                                        placeholder="WhatsApp Number" value="{{ old('whatsapp_number') }}">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <input type="text" name="subject" class="form-control form-control-minimal"
                                    placeholder="Subject" value="{{ old('subject') }}" required>
                            </div>


                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control form-control-minimal textarea-minimal" rows="4"
                                    placeholder="Message">{{ old('message') }}</textarea>
                            </div>

                            <div class="form-group mb-5">
                                <div class="form-check custom-checkbox-container">
                                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                    <label class="form-check-label" for="termsCheck"
                                        style="font-size: 1.05rem; color: #5d6d7e; margin-left: 10px;">
                                        I agree to the <strong>Terms & Conditions</strong> of Educircle.
                                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-connect-counsellor">
                                    Connect with counsellor
                                </button>
                            </div>

                            <div class="privacy-disclaimer mt-4">
                                <i class="fas fa-lock" style="color: #8CCB26;"></i> We respect your privacy and your
                                information is kept fully confidential.
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection