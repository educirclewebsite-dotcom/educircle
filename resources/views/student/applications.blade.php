@extends('student.layout.app')

@section('title', 'My Applications')

@push('header_script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .application-card {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 16px;
            margin-bottom: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .application-card .card-body {
            padding: 1.5rem;
        }

        .application-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .course-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #212529;
            display: flex;
            align-items: center;
        }

        .colored-dot {
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            margin-right: 10px;
        }

        .status-badge {
            background-color: #fce8d7;
            color: #d1752b;
            border: 1px solid #d1752b;
            padding: 0.25em 0.75em;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .application-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem 2rem;
        }

        .application-info-grid>div {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #495057;
        }

        .application-info-grid i {
            margin-right: 0.5rem;
            color: #6c757d;
        }

        .intake-month-pill {
            background-color: #f1f3f5;
            padding: 0.25em 0.8em;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #495057;
        }

        @media (max-width: 767.98px) {
            .application-info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575.98px) {
            .application-info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    @forelse($applications as $app)
                        @php
                            $universityCourse = $app->universityCourse;
                            $course = $universityCourse?->course;
                            $university = $universityCourse?->university;
                            $country = $university?->country?->name ?? 'N/A';

                        @endphp

                        <div class="application-card">
                            <div class="card-body">

                                @php
                                    $statusSteps = [
                                        0 => ['label' => 'Started', 'class' => 'bg-secondary'],
                                        1 => ['label' => 'In Progress', 'class' => 'bg-primary'],
                                        2 => ['label' => 'Submitted', 'class' => 'bg-info'],
                                        3 => ['label' => 'Offer Received', 'class' => 'bg-warning'],
                                        4 => ['label' => 'Offer Accepted', 'class' => 'bg-success'],
                                        5 => ['label' => 'Pre Departure', 'class' => 'bg-success'],
                                        6 => ['label' => 'Completed', 'class' => 'bg-dark'],
                                        7 => ['label' => 'Closed', 'class' => 'bg-danger'],
                                    ];

                                    $currentStatus = $statusSteps[$app->status] ?? [
                                        'label' => 'Pending',
                                        'class' => 'bg-secondary',
                                    ];
                                @endphp

                                <div class="application-header d-flex justify-content-between align-items-center mb-2">
                                    <div class="course-name">
                                        <span class="colored-dot"></span>
                                        <a href="{{ route('student.application.view', $app->id) }}"
                                            class="text-decoration-none">
                                            {{ $course?->course_name ?? 'Course Unavailable' }}
                                        </a>
                                    </div>

                                   
                                    <span class="badge {{ $currentStatus['class'] }} text-white status-badge">
                                        {{ $currentStatus['label'] }}
                                    </span>
                                </div>


                                <div class="application-info-grid">
                                    <div>
                                        <i class="ri-bank-line"></i>
                                        <span>{{ $university?->university_name ?? 'University Unavailable' }}</span>
                                    </div>
                                    <div>
                                        <i class="bi bi-geo-alt"></i>
                                        <span>{{ $country }}</span>
                                    </div>
                                    <div>
                                        <i class="ri-calendar-event-line"></i>
                                        <span
                                            class="intake-month-pill">{{ $universityCourse?->intake_month ?? 'N/A' }}</span>
                                    </div>
                                    <div>
                                        <i class="bi bi-currency-pound"></i>
                                        <span> {{ number_format($universityCourse?->course_fee ?? 0) }}</span>
                                    </div>
                                    <div>
                                        <i class="bi bi-bar-chart-line"></i>
                                        <span>#{{ $university?->rank ?? 'N/A' }} - webometrics</span>
                                    </div>
                                    <div>
                                        <i class="bi bi-clock"></i>
                                        <span>{{ ($universityCourse?->duration_months ?? 'N/A') . ' Years' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @empty
                        <div class="alert alert-info">You haven't applied to any courses yet.</div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
