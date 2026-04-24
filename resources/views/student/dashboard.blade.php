@extends('student.layout.app')
@section('title', 'Student Dashboard')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>

    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <h2 class="mb-4">Hello, {{ Auth::user()->name ?? '' }}!</h2>


            <div class="row">
                <!-- Left Side: Applications Section -->
                <div class="col-lg-8 col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Applications</span>
                            <span class="badge bg-warning rounded-pill">{{ count($applications ?? []) }}</span>
                        </div>
                        <div class="card-body">
                            <div class="scroll-card">
                                @forelse($applications as $app)
                                    @php
                                        $statusSteps = [
                                            0 => 'Started',
                                            1 => 'In Progress',
                                            2 => 'Submitted',
                                            3 => 'Offer Received',
                                            4 => 'Offer Accepted',
                                            5 => 'Pre Departure',
                                            6 => 'Completed',
                                        ];
                                        $stepName = $statusSteps[$app->status] ?? 'Pending';
                                    @endphp

                                    <div class="app-status-card d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="university-name">
                                                {{ $app->universityCourse->university->university_name ?? 'University Name' }}
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-check text-success me-2"></i>
                                                <span class="status-label text-success">{{ $stepName }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">No Applications Found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card shadow-sm p-4 text-center" style="border-radius: 12px;">
                        <h5 class="mb-3">Profile</h5>


                        <div class="d-flex justify-content-center mb-2">
                            <img class="rounded-circle" src="{{ asset('theme2/assets/images/users/avatar-9.png') }}"
                                alt="Header Avatar" width="80" height="80" style="object-fit: cover;">
                        </div>

                        <h6 class="mb-0">{{ Auth::user()->name ?? 'Student Name' }}</h6>
                        <p class="text-muted mb-2 small">{{ Auth::user()->email ?? 'email@example.com' }}</p>


                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <div class="progress w-75" style="height: 6px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ $progress ?? 0 }}%;" aria-valuenow="{{ $progress ?? 0 }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <span class="ms-2 small text-muted">{{ $progress ?? 0 }}%</span>
                        </div>
                        <p class="small text-success mb-3">{{ $progress ?? 0 }}% Profile is completed</p>


                        <ul class="list-unstyled text-start mb-3 px-3">
                            <li class="d-flex justify-content-between align-items-center mb-2">
                                <span>Basic Details</span>
                                <i
                                    class="bi {{ isset($student) && $student->mobile_no && $student->country && $student->city
                                        ? 'bi-check-circle-fill text-success'
                                        : 'bi-exclamation-circle-fill text-danger' }}">

                                </i>
                            </li>
                            <li class="d-flex justify-content-between align-items-center mb-2">
                                <span>Other Documents</span>
                                <i
                                    class="bi 
                                      {{ isset($documents['ug_marksheets'])
                                          ? 'bi-check-circle-fill text-success'
                                          : 'bi-exclamation-circle-fill text-danger' }}">
                                </i>
                            </li>
                        </ul>

                        <!-- Button -->
                        <a href="{{ route('student.profile') }}" class="btn btn-outline-success w-100">
                            Complete Profile
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
