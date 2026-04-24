@extends('layout.app')
@section('title', $university->university_name)

@push('header_script')
    <style>
        .university-banner {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .university-container:hover .university-banner {
            transform: scale(1.05);
        }

        .university-container {
            border-radius: 1.25rem;
            background-color: #fff;
            overflow: hidden;
            margin-top: 90px;
        }

        .university-content {
            padding: 4rem 2rem 2rem 2rem;
            background: linear-gradient(to bottom right, #fff7f0, #ffffff);
            text-align: center;
            position: relative;
        }

        .university-logo-wrapper {
            position: absolute;
            top: 0px;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 1px solid #c5e7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .university-logo-img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
        }

        .highlight-info {
            background: #fff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 20px rgba(255, 170, 0, 0.15);
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 1.25rem;
            margin: 2rem auto 1.5rem;
            max-width: 400px;
            flex-wrap: wrap;
        }

        .highlight-info div {
            text-align: center;
            flex: 1;
            min-width: 100px;
        }

        .highlight-info div h6 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #83bb40;
            margin-bottom: 0.25rem;
        }

        .highlight-info div small {
            font-size: 0.875rem;
            color: #555;
        }

        .apply-btn {
            background: #83bb40;
            border: none;
            color: #fff;
            padding: 0.75rem 2.25rem;
            font-weight: 600;
            border-radius: 2rem;
            font-size: 1rem;
            display: inline-block;
        }

        .course-list .col-md-4:nth-child(n+4) {
            margin-top: 30px;
        }

        #apply {
            background: #83bb40;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row university-container">

            <div class="col-md-6 p-0">
                <img src="{{ asset($university->banner_img ?? 'default.jpg') }}" alt="Banner"
                    class="university-banner h-100">
            </div>


            <div class="col-md-6 university-content d-flex flex-column justify-content-center align-items-center">

                @if ($university->logo_img)
                    <div class="university-logo-wrapper">
                        <img src="{{ asset($university->logo_img) }}" alt="{{ $university->university_name }}"
                            class="university-logo-img">
                    </div>
                @endif

                <h2 class="fw-bold text-dark mt-4">
                    {{ $university->university_name }}: Ranking, Programs, Scholarships & Fees
                </h2>
                <p class="text-muted mb-3">
                    {{ $university->state->name ?? '' }} | 
                    {{ $university->country->name ?? 'Country' }} |
                    Estd. {{ $university->estd ?? '-' }}
                </p>


                <div class="highlight-info">
                    <div>
                        <h6>#{{ $university->rank ?? '-' }}</h6>
                        <small>Rank</small>
                    </div>
                    @if ($universitycourses->first())
                        <div>
                            <h6>{{ $universitycourses->first()->semester ?? '-' }}</h6>
                            <small>Intake</small>
                        </div>
                    @endif
                </div>


                <a href="#" class="apply-btn">Apply Now</a>
            </div>
        </div>


        <div id="course-list" class="mt-5 mb-5">
            <h2 class="mb-4 fw-bold text-center">
                <span style="color: #83bb40;">Top</span> Programs
            </h2>

            <div class="row g-4 course-list">
                @forelse($universitycourses as $course)
                    <div class="col-md-4">
                        <div class="card border rounded-4 h-100 p-3">
                            <div class="d-flex align-items-start gap-3">
                                @if ($university->logo_img)
                                    <img src="{{ asset($university->logo_img) }}" alt="logo" class="rounded-circle" width="50"
                                        height="50">
                                @else
                                    <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px;">
                                        <span class="text-muted small">Logo</span>
                                    </div>
                                @endif
                                <div>
                                    <h6 class="fw-semibold mb-1 text-dark">
                                        {{ $course->course->course_name ?? '-' }}
                                    </h6>
                                    <small class="text-muted">{{ $course->course->course_type ?? 'Not Specified' }}</small>
                                </div>
                            </div>

                            <div class="row mt-4 mb-3">
                                <div class="col-6">
                                    <p class="mb-0 text-orange fw-semibold">Course Fees</p>
                                    <small class="text-dark">
                                        AUD {{ number_format($course->course_fee ?? 0) }}
                                    </small>
                                </div>

                                <div class="col-6">
                                    <p class="mb-0 text-orange fw-semibold">Intakes</p>
                                    <small class="text-dark">{{ $course->semester ?? '-' }}</small>
                                </div>
                                <div class="col-6 mt-3">
                                    <p class="mb-0 text-orange fw-semibold">Duration</p>
                                    <small class="text-dark">
                                        {{ $course->duration_months ? round($course->duration_months / 12, 1) : '-' }}
                                        years
                                    </small>
                                </div>
                            </div>

                            <a href="#" class="btn btn-success text-white fw-bold w-100 rounded-pill py-2" id="apply">
                                Apply Now
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">No courses available.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection