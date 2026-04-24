@extends('admin.layout.app')
@section('title', 'Application Details')

@push('header_script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .application-card {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            margin-bottom: 30px;
            padding: 1.5rem;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #416e9b;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 0.5rem;
        }

        .application-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem 1.5rem;
            font-size: 0.95rem;
            margin-bottom: 1.25rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            color: #495057;
        }

        .info-item i {
            margin-right: 0.5rem;
            color: #6c757d;
            font-size: 1.1rem;
        }

        .stage-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0 20px;
        }

        .stage-item {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .stage-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin: 0 auto 8px;
            background-color: #ccc;
        }

        .done {
            background-color: #28a745 !important;
        }

        .active {
            background-color: #fd7e14 !important;
        }

        .stage-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 12px;
            right: -50%;
            width: 100%;
            height: 2px;
            background-color: #28a745;
            z-index: -1;
        }

        @media (max-width: 767.98px) {
            .application-info-grid {
                grid-template-columns: 1fr;
            }

            .stage-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .stage-item::after {
                display: none !important;
            }
        }
    </style>
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h4 class="mb-4">Application #{{  $application->user->name }}</h4>

        @php
            $stages = [
                0 => 'Application Started',
                1 => 'Application In Progress',
                2 => 'Application Submitted',
                3 => 'Offer Sent',
                4 => 'Offer Accepted',
                5 => 'Pre Departure',
                6 => 'Completed',
            ];
            $currentStage = $application->status ?? 0;
            $course = $application->universityCourse->course ?? null;
            $university = $application->universityCourse->university ?? null;
            $uc = $application->universityCourse;
        @endphp
        <div class="stage-wrapper">
            @foreach ($stages as $index => $stage)
                <div class="stage-item">
                    <div class="stage-circle 
                        {{ $index <= 2 || $index < $currentStage ? 'done' : '' }} 
                        {{ $index == $currentStage && $index > 2 ? 'active' : '' }}">
                    </div>
                    <small>{{ $stage }}</small>
                </div>
            @endforeach
        </div>
        <div class="application-card">
            <div class="section-title">Student Details</div>
            <div class="application-info-grid">
                <div class="info-item"><i class="bi bi-person"></i> {{ $application->user->name ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-envelope"></i> {{ $application->user->email ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-gender-ambiguous"></i>
                    {{ $application->user->student->gender ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-telephone"></i>
                    {{ $application->user->student->mobile_no ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-geo-alt"></i>
                    {{ $application->user->student->city ?? 'N/A' }},
                    {{ $application->user->student->country->name ?? 'N/A' }}
                </div>
                <div class="info-item"><i class="bi bi-mortarboard"></i>
                    {{ $application->user->student->graduation_level ?? 'N/A' }}</div>
            </div>
        </div>

      
        <div class="application-card">
            <div class="section-title">Course & University</div>
            <div class="application-info-grid">
                <div class="info-item"><i class="bi bi-book"></i> {{ $course->course_name ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-building"></i> {{ $university->university_name ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-calendar-event"></i> {{ $uc->intake_month ?? 'N/A' }}</div>
                <div class="info-item"><i class="bi bi-clock"></i> {{ $uc->duration_months ?? 'N/A' }} months</div>
                <div class="info-item"><i class="bi bi-currency-pound"></i>  {{ number_format($uc->course_fee ?? 0) }}</div>
                <div class="info-item"><i class="bi bi-bar-chart-line"></i> #{{ $university->rank ?? 'N/A' }} - Webometrics</div>
            </div>
        </div>

         
        <form method="POST" action="{{ route('application.updateStage', $application->id) }}">
            @csrf
            <div class="row align-items-end mt-4">
                <div class="col-md-6 mb-3">
                    <label>Update Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Select Stage --</option>
                        @foreach ($stages as $key => $label)
                            @if ($key >= 3)
                                <option value="{{ $key }}" {{ $application->status == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
