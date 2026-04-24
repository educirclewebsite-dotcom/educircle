@extends('new_layout.app')

@section('title', $university_course->course->course_name . ' - ' . $university->university_name)

@push('header_script')
    <style>
        .uni-hero-wrapper {
            margin-top: 150px !important;
        }

        @media (max-width: 991px) {
            .uni-hero-wrapper {
                margin-top: 150px !important;
            }
        }

        .btn-visit-website {
            transition: all 0.3s ease;
        }

        .btn-visit-website:hover {
            background-color: #086b6f !important;
            transform: translateY(-2px);
            color: #fff !important;
            text-decoration: none;
        }

        .green-info-bar {
            box-shadow: 0 10px 30px rgba(95, 149, 53, 0.15);
        }

        .scholarship-badge {
            background: linear-gradient(135deg, #ffd700, #ffae00);
            color: #000;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 8px;
        }

        .course-title-green {
            color: #5F9535;
            font-weight: 700;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        /* Popular Card V2 Styling */
        .popular-card-v2 {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            height: 100%;
            background: #fff;
        }

        .popular-card-v2:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .most-popular-badge {
            background-color: #71a043;
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .uni-name-v2 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.3;
            margin-bottom: 2px;
        }

        .uni-rank-v2 {
            font-size: 0.85rem;
            color: #666;
            font-weight: 600;
        }

        .metadata-label-v2 {
            font-size: 10px;
            font-weight: 800;
            color: #999;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .scholarship-value-v2 {
            font-size: 1.5rem;
            font-weight: 900;
            color: #1a1a1a;
        }

        .intake-pill-yellow {
            background-color: #ffc107;
            color: #000;
            padding: 3px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 4px;
            display: block;
            text-align: center;
            width: fit-content;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-expert-v2 {
            background-color: #71a043;
            color: white !important;
            border-radius: 50px;
            font-weight: 700;
            font-size: 12px;
            padding: 10px 10px;
            transition: all 0.2s;
            border: none;
        }

        .btn-chat-v2 {
            background-color: #00a5b5;
            color: white !important;
            border-radius: 50px;
            font-weight: 700;
            font-size: 12px;
            padding: 10px 10px;
            transition: all 0.2s;
            border: none;
        }

        .btn-expert-v2:hover,
        .btn-chat-v2:hover {
            transform: scale(1.02);
            opacity: 0.95;
        }

        .border-right-v2 {
            border-right: 1px solid #f0f0f0;
        }

        .action-row-v2 {
            gap: 8px;
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
                            class="col-lg-3 col-xl-2 text-center d-flex flex-column align-items-center justify-content-center py-4">
                            @php
                                $logo_path = !empty($university->logo_img) && file_exists(public_path($university->logo_img))
                                    ? asset($university->logo_img)
                                    : asset('home_new/images/uni_logo.png');
                            @endphp
                            <img src="{{ $logo_path }}" class="uni-hero-logo" alt="{{ $university->university_name }} Logo"
                                style="margin-bottom: 30px; width: auto; max-width: 140px; height: auto; object-fit: contain;"
                                onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                            <div class="rank-text-col text-center"
                                style="color: #70b92b; line-height: 1; white-space: nowrap;">
                                <span
                                    style="font-size: 3.8rem; font-weight: 800; font-style: italic;">{{ strpos($university->rank, '#') === false ? '#' : '' }}{{ $university->rank ?? '1' }}</span>
                                <span
                                    style="font-size: 1.6rem; font-weight: 600; font-style: normal; margin-left: 6px;">Rank</span>
                            </div>
                        </div>

                        <!-- Column 2: Course Title & Actions -->
                        <div class="col-lg-5 col-xl-6 pl-lg-5 pr-lg-4 py-4">
                            <h1 class="about-title mb-1" style="font-size: 2.6rem; font-weight: 800; color: #002147;">
                                {{ $university_course->course->course_name }}</h1>
                            <p style="font-size: 1.15rem; font-weight: 600; color: #2c3e50; margin-bottom: 24px;">
                                {{ $university->university_name }},<br>{{ $university->state->name ?? '' }},
                                {{ $university->country->name ?? '' }}
                            </p>

                            <div class="d-flex flex-column align-items-start gap-3">
                                <a href="#expert-counselling-form" class="btn-apply-now"
                                    style="margin-bottom: 12px; font-size: 1.1rem; padding: 12px 40px; display: inline-block; background-color: #70b92b; color: #fff; border-radius: 50px; font-weight: 700; box-shadow: 0 4px 12px rgba(112, 185, 43, 0.2); text-decoration: none;">Apply
                                    Now</a>
                                <a href="{{ $university->website ?? '#' }}" target="_blank" class="btn-visit-website"
                                    style="margin-bottom: 0; font-size: 1.1rem; padding: 12px 40px; display: inline-block; background-color: #0b8a8f; color: #fff; border-radius: 50px; font-weight: 700; box-shadow: 0 4px 12px rgba(11, 138, 143, 0.2); text-decoration: none;">Visit
                                    University Website</a>
                            </div>
                        </div>

                        <!-- Column 3: Hero Image -->
                        @php
                            $banner_path = !empty($university->banner_img) && file_exists(public_path($university->banner_img))
                                ? asset($university->banner_img)
                                : asset('home_new/images/footer_sydney.png');
                        @endphp
                        <div class="col-lg-4 col-xl-4 mt-5 mt-lg-0 text-right pr-0 d-none d-lg-block">
                            <img src="{{ $banner_path }}" class="hero-img-box"
                                alt="{{ $university_course->course->course_name }}"
                                style="margin-top: 0; height: 380px; width: 100%; border-radius: 30px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Tucked Green Info Bar Pill -->
                <div class="green-info-bar-wrapper">
                    <div class="green-info-bar">
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value">{{ $university->country->name ?? '' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Scholarship</div>
                            <div class="info-value">{{ $university_course->scholarship ?? 'N/A' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Fees</div>
                            <div class="info-value">AUD {{ number_format($university_course->course_fee) }} / Year</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Duration</div>
                            <div class="info-value">{{ $university_course->duration_months ?? 'N/A' }} Years</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Intakes</div>
                            <div class="info-value">
                                @php
                                    $semesterMap = [1 => 'Feb', 2 => 'July', 3 => 'Nov'];
                                    $semesters = is_array(json_decode($university_course->semester, true))
                                        ? json_decode($university_course->semester, true)
                                        : (explode(',', $university_course->semester) ?: []);
                                    $semNames = [];
                                    foreach ($semesters as $s)
                                        if (isset($semesterMap[trim($s)]))
                                            $semNames[] = $semesterMap[trim($s)];
                                @endphp
                                {{ !empty($semNames) ? implode(', ', $semNames) : 'N/A' }}
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
                    <div style="font-size: 1.05rem; line-height: 1.9; color: #2c3e50;">
                        {!! $university->description ?? 'No information available.' !!}
                    </div>
                </div>
            </div>
        </div>



        <!-- ===================== TOP PROGRAMS & POPULAR SCHOLARSHIPS ===================== -->
        @if(isset($popularScholarships) && $popularScholarships->count() > 0)
            <section class="programs-section py-5">
                <div class="container container-wide">
                    <div class="text-center mb-5">
                        <h2 class="programs-section-title"><span>Top Courses & Popular</span> Scholarships</h2>
                        <p class="text-muted">Highly sought scholarships globally</p>
                    </div>

                    <div class="row">
                        @foreach($popularScholarships as $item)
                            <div class="col-lg-4 mb-4">
                                <div class="course-card popular-card bg-white p-3 h-100 position-relative">
                                    <span class="popular-badge-card"><i class="fas fa-fire mr-1"></i>Most Popular</span>
                                    <div class="card-header-new">
                                        <div class="uni-info-new">
                                            <h5 class="uni-name">{{ $item->university->university_name ?? '-' }}</h5>
                                            @if ($item->university->rank)
                                                <span class="uni-rank-new">{{ strpos($item->university->rank, '#') === 0 ? '' : '#' }}{{ $item->university->rank }} Rank</span>
                                            @endif
                                        </div>
                                        <div class="logo-placeholder-box">
                                            @php
                                                $logo = !empty($item->university?->logo_img) ? ltrim(str_replace('public/', '', $item->university->logo_img), '/') : '';
                                                $banner = !empty($item->university?->banner_img) ? ltrim(str_replace('public/', '', $item->university->banner_img), '/') : '';
                                                $finalLogoPath = 'theme/images/logo/default.png';
                                                if (!empty($logo) && file_exists(public_path($logo))) { $finalLogoPath = $logo; }
                                                elseif (!empty($banner) && file_exists(public_path($banner))) { $finalLogoPath = $banner; }
                                            @endphp
                                            <img src="{{ asset($finalLogoPath) }}" alt="Logo"
                                                style="max-height: 35px;"
                                                onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                                        </div>
                                    </div>

                                    <div class="metadata-section-new">
                                        <div class="metadata-col">
                                            <p class="metadata-label">Scholarship</p>
                                            <p class="scholarship-value">{{ $item->scholarship ?? 'N/A' }}</p>
                                        </div>
                                        <div class="metadata-col">
                                            <p class="metadata-label">Intake</p>
                                            <div class="intake-badges">
                                                @php
                                                    $itemSemesters = is_array(json_decode($item->semester, true)) ? json_decode($item->semester, true) : (explode(',', $item->semester) ?: []);
                                                    $semesterMap = [1 => 'Sem 1 (Feb)', 2 => 'Sem 2 (July)', 3 => 'Sem 3 (Nov)'];
                                                @endphp
                                                @forelse ($itemSemesters as $s)
                                                    <span class="intake-badge-new">{{ $semesterMap[trim($s)] ?? $s }}</span>
                                                @empty
                                                    <span class="text-muted">-</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-auto mt-4 px-2" style="gap: 12px;">
                                        <a href="{{ route('contact') }}"
                                            class="btn btn-connect-expert btn-sm flex-grow-1 font-weight-bold rounded-pill py-2 shadow-sm">Connect
                                            with Expert</a>
                                        <a href="https://wa.me/918130820084" target="_blank"
                                            class="btn btn-chat-gradient btn-sm flex-grow-1 font-weight-bold rounded-pill py-2 shadow-sm">
                                            <i class="fab fa-whatsapp mr-1"></i>Chat with us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-5 pb-3">
                        <a href="{{ route('courseFinder.filter') }}" class="btn btn-student-login px-4 px-lg-5 py-3 shadow-lg"
                            style="font-size: 1.15rem; font-weight: 700; border-radius: 50px;">
                            Explore Course Finder
                        </a>
                    </div>
                </div>
            </section>
        @else
            <!-- Fallback if no popular scholarships found -->
            <section class="programs-section py-5">
                <div class="container container-wide">
                    <div class="text-center mb-5">
                        <h2 class="programs-section-title"><span>Top Courses</span> Scholarships at
                            {{ $university->university_name }}</h2>
                    </div>
                    <div class="row">
                        @foreach($universitycourses as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="course-card popular-card bg-white p-3 h-100 position-relative">
                                    <span class="popular-badge-card"><i class="fas fa-fire mr-1"></i>Most Popular</span>
                                    <div class="card-header-new">
                                        <div class="uni-info-new">
                                            <h5 class="uni-name">{{ $university->university_name }}</h5>
                                            @if ($university->rank)
                                                <span class="uni-rank-new">{{ strpos($university->rank, '#') === 0 ? '' : '#' }}{{ $university->rank }} Rank</span>
                                            @endif
                                        </div>
                                        <div class="logo-placeholder-box">
                                            <img src="{{ $logo_path }}" alt="{{ $university->university_name }}"
                                                style="max-height: 35px;"
                                                onerror="this.src='{{ asset('home_new/images/uni_logo.png') }}'">
                                        </div>
                                    </div>

                                    <h6 class="course-title-green mb-4">{{ $item->course->course_name }}</h6>

                                    <div class="metadata-section-new">
                                        <div class="metadata-col">
                                            <p class="metadata-label">Scholarship</p>
                                            <p class="scholarship-value">{{ $item->scholarship ?? 'N/A' }}</p>
                                        </div>
                                        <div class="metadata-col">
                                            <p class="metadata-label">Intake</p>
                                            <div class="intake-badges">
                                                @php
                                                    $itemSemesters = is_array(json_decode($item->semester, true)) ? json_decode($item->semester, true) : (explode(',', $item->semester) ?: []);
                                                    $semesterMap = [1 => 'Sem 1 (Feb)', 2 => 'Sem 2 (July)', 3 => 'Sem 3 (Nov)'];
                                                @endphp
                                                @forelse ($itemSemesters as $s)
                                                    <span class="intake-badge-new">{{ $semesterMap[trim($s)] ?? $s }}</span>
                                                @empty
                                                    <span class="text-muted">-</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-auto mt-4 px-2" style="gap: 12px;">
                                        <a href="{{ route('contact') }}"
                                            class="btn btn-connect-expert btn-sm flex-grow-1 font-weight-bold rounded-pill py-2 shadow-sm">Connect
                                            with Expert</a>
                                        <a href="https://wa.me/918130820084" target="_blank"
                                            class="btn btn-chat-gradient btn-sm flex-grow-1 font-weight-bold rounded-pill py-2 shadow-sm">
                                            <i class="fab fa-whatsapp mr-1"></i>Chat with us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-5 pb-3">
                        <a href="{{ route('courseFinder.filter') }}" class="btn btn-student-login px-4 px-lg-5 py-3 shadow-lg"
                            style="font-size: 1.15rem; font-weight: 700; border-radius: 50px;">
                            Explore Course Finder
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <!-- ===================== CONTACT FORM ===================== -->
        <div id="expert-counselling-form" class="container pb-5 pt-2">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card p-0"
                        style="background-color: #F5F5F4 !important; border: none !important; border-radius: 25px !important; padding: 3rem 2rem 2rem 2rem !important; box-shadow: 0 10px 40px rgba(0,0,0,0.05) !important; position: relative;">
                        <!-- Heading -->
                        <div class="text-center mb-4">
                            <h3 class="font-weight-bold" style="color: #002147;">Connect with an expert</h3>
                            <p class="text-muted">Fill in your details and our expert will reach out shortly.</p>
                        </div>
                        
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
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control form-control-minimal" placeholder="Full Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control form-control-minimal" placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="contact_number" class="form-control form-control-minimal" placeholder="Contact Number" value="{{ old('contact_number') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="whatsapp_number" class="form-control form-control-minimal" placeholder="WhatsApp Number" value="{{ old('whatsapp_number') }}">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="subject" class="form-control form-control-minimal" placeholder="Subject" value="{{ old('subject') }}" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control form-control-minimal textarea-minimal" rows="4" placeholder="Message">{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group form-check mb-4 pl-4 d-flex align-items-center">
                                <input type="checkbox" class="form-check-input mt-0" id="termsCheckCourseDetail" style="width: 18px; height: 18px;" required>
                                <label class="form-check-label small text-muted ml-3" for="termsCheckCourseDetail">
                                    I agree to the <span class="text-dark font-weight-bold">Terms &amp; Conditions</span> of Educircle.
                                </label>
                            </div>
                            <div class="text-center mt-3 mb-2">
                                <button type="submit" class="btn btn-connect-counsellor px-4 px-lg-5 py-3"
                                    style="width: auto; max-width: 100%; font-weight: 700; font-size: 1.1rem; border-radius: 50px !important;">
                                    Connect with counsellor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_script')
    <script>
        $(document).ready(function () {
            // Smooth scroll for internal links
            $('a[href^="#"]').on('click', function (event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 120
                    }, 1000);
                }
            });
        });
    </script>
@endpush