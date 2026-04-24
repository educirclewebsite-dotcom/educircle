@extends('student.layout.app')
@section('title', 'Application Details')

@push('header_script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .timeline-wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            margin: 40px 0 20px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .timeline-wrapper::before {
            content: "";
            position: absolute;
            top: 12px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #77d963;
            z-index: 0;
        }

        .timeline-step {
            flex: 1 0 120px;
            text-align: center;
            position: relative;
            z-index: 1;
            font-size: 13px;
            color: #6c757d;
        }

        .timeline-step .dot {
            width: 16px;
            height: 16px;
            margin: 0 auto 8px;
            border-radius: 50%;
            background-color: #dcdcdc;
            border: 2px solid #fff;
            position: relative;
            z-index: 2;
        }

        .timeline-step.active .dot {
            background-color: #28a745;
        }

        .timeline-step.active {
            color: #28a745;
            font-weight: 600;
        }

        .counsellor-card {
            background: #fff4ef;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.06);
            border: 1px solid #f1d0c3;
        }

        .counsellor-name {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .counselled-badge {
            background-color: #ff835c;
            color: white;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 8px;
        }

        .talk-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 14px;
            width: 100%;
        }

        .contact-icons i {
            font-size: 18px;
            margin-right: 10px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .timeline-wrapper {
                flex-wrap: nowrap;
                overflow-x: auto;
            }

            .timeline-step {
                flex: 0 0 auto;
                min-width: 100px;
            }
        }
    </style>
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <a href="{{ route('student.applications') }}" class="btn btn-sm btn-outline-primary mb-3">
            <i class="bi bi-arrow-left"></i> Back to Applications
        </a>

        <div class="row g-3">
            <!-- Course Info -->
            <div class="col-lg-8 col-md-7">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0 fw-semibold text-truncate" style="max-width: 70%;">
                                {{ $application->universityCourse->course->course_name ?? 'Course Name' }}
                            </h5>
                            <span class="badge bg-warning text-dark text-capitalize">
                                {{ $statusLabels[$application->status] ?? 'Pending' }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="text-muted mb-1">
                                <strong>University:</strong>
                                {{ $application->universityCourse->university->university_name ?? 'University Name' }}
                            </div>
                            <div class="text-muted mb-1">
                                <strong>Intake:</strong>
                                {{ \Carbon\Carbon::parse($application->intake ?? '2025-09-01')->format('M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counsellor Info -->
            <div class="col-lg-4 col-md-5">
                <div class="counsellor-card">
                    {{-- <div class="counsellor-name">dhara jain</div> --}}
                    {{-- <div class="counselled-badge">Counselled 2k+</div> --}}
                    <button class="talk-btn mb-2">Talk to Counsellor</button> 
                    <div class="contact-icons text-end">
                      
                       <a href="https://wa.me/+911234567890"> <i class="bi bi-whatsapp text-success" title="WhatsApp"></i></a>

                       <a href="tel:+911234567890"><span> <i class="bi bi-telephone-fill text-secondary" title="Phone Call"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <h6 class="mb-3 mt-4">Application Process</h6>
        <div class="timeline-wrapper">
            @foreach ($stages as $index => $stage)
                <div class="timeline-step {{ $index <= $application->status ? 'active' : '' }}">
                    <div class="dot"></div>
                    <div>{{ $stage }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
