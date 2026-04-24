@extends('admin.layout.app')
@section('title', 'Student Profile')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admission.update', $student->id)  }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                 @method('PUT')
                                <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <li class="nav-item">
                                            <a href="#profile" class="nav-link" data-toggle="tab">
                                                <span class="step-number">01</span>
                                                <span class="step-title">Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#document" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02</span>
                                                <span class="step-title">Document</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        {{-- Profile --}}
                                        <div class="tab-pane" id="profile">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ old('name', $student->name ?? '') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            value="{{ old('last_name', $student->last_name ?? '') }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mobile No. <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="mobile_no"
                                                            value="{{ old('mobile_no', $student->mobile_no ?? '') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>WhatsApp No.</label>
                                                        <input type="text" class="form-control" name="whatsapp_no"
                                                            value="{{ old('whatsapp_no', $student->whatsapp_no ?? '') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>City <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="city"
                                                            value="{{ old('city', $student->city ?? '') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="gender" required>
                                                            <option disabled
                                                                {{ old('gender', $student->gender ?? '') == '' ? 'selected' : '' }}>
                                                                Select Gender</option>
                                                            <option value="male"
                                                                {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                                Male</option>
                                                            <option value="female"
                                                                {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                                Female</option>
                                                            <option value="other"
                                                                {{ old('gender', $student->gender ?? '') == 'other' ? 'selected' : '' }}>
                                                                Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Course Type <span class="text-danger">*</span></label>
                                                        <select id="course_type" name="course_type" class="form-control"
                                                            required>
                                                            <option disabled>Select Course Type</option>
                                                            @foreach ($courses as $type => $courseList)
                                                                <option value="{{ $type }}"
                                                                    {{ old('course_type', $student->course_type ?? '') == $type ? 'selected' : '' }}>
                                                                    {{ strtoupper($type) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Course Preference <span class="text-danger">*</span></label>
                                                        <select id="course_preference" name="course_preference"
                                                            class="form-control" required>
                                                            <option disabled>Select Course</option>
                                                            @foreach ($courses as $type => $list)
                                                                @foreach ($list as $course)
                                                                    <option value="{{ $course->course_name }}"
                                                                        data-type="{{ $type }}"
                                                                        {{ old('course_preference', $student->course_preference ?? '') == $course->course_name ? 'selected' : '' }}>
                                                                        {{ $course->course_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <select name="country" class="form-control" required>
                                                            <option disabled>Select Country</option>
                                                            @foreach ($country as $id => $name)
                                                                <option value="{{ $id }}"
                                                                    {{ old('country', $student->country ?? '') == $id ? 'selected' : '' }}>
                                                                    {{ $name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Marital Status <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="marital_status" required>
                                                            <option disabled>Select Status</option>
                                                            <option value="single"
                                                                {{ old('marital_status', $student->marital_status ?? '') == 'single' ? 'selected' : '' }}>
                                                                Single</option>
                                                            <option value="married"
                                                                {{ old('marital_status', $student->marital_status ?? '') == 'married' ? 'selected' : '' }}>
                                                                Married</option>
                                                            <option value="divorced"
                                                                {{ old('marital_status', $student->marital_status ?? '') == 'divorced' ? 'selected' : '' }}>
                                                                Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Status <span class="text-danger">*</span></label>
                                                        <select class="custom-select" name="status">
                                                            <option disabled>Status</option>
                                                            <option value="new"
                                                                {{ old('status', $student->status ?? '') == 'new' ? 'selected' : '' }}>
                                                                New</option>
                                                            <option value="admission"
                                                                {{ old('status', $student->status ?? '') == 'admission' ? 'selected' : '' }}>
                                                                Admission</option>
                                                            <option value="in process"
                                                                {{ old('status', $student->status ?? '') == 'in process' ? 'selected' : '' }}>
                                                                In Process</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Graduation Level</label>
                                                        <select class="custom-select" name="graduation_level" required>
                                                            @foreach (['10th or equivalent', '12th or equivalent', 'Certificate or Diploma', '3-Year Bachelor Degree', '4-Year Bachelor Degree', 'PG Certificate or Diploma', 'Masters', 'PhD'] as $level)
                                                                <option value="{{ $level }}"
                                                                    {{ old('graduation_level', $student->graduation_level ?? '') == $level ? 'selected' : '' }}>
                                                                    {{ $level }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>10th Marksheet</label>
                                                        <input type="file" class="form-control"
                                                            name="documents[marksheet_10th]">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>12th Marksheet</label>
                                                        <input type="file" class="form-control"
                                                            name="documents[marksheet_12th]">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Diploma Certificate</label>
                                                        <input type="file" class="form-control"
                                                            name="documents[diploma_certificate]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Document --}}
                                        <div class="tab-pane" id="document">
                                            <div class="row">
                                                @php
                                                    $docLabels = [
                                                        'passport' => 'Passport (1st & Last Page Photo)',
                                                        'ug_certificate' => 'UG Degree Certificate',
                                                        'ug_marksheets' => 'UG All Semester Marksheet (PDF/ZIP)',
                                                        'english_test_score' => 'English Test Score (IELTS/TOEFL)',
                                                        'work_experience' => 'Work Experience (if any)',
                                                    ];
                                                @endphp

                                                @foreach ($docLabels as $key => $label)
                                                    <div class="col-12 mb-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between border rounded p-3">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="fs-5 icon-{{ $key }}">
                                                                    @if (!empty($documents[$key]))
                                                                        <i
                                                                            class="bi bi-check-circle-fill text-success"></i>
                                                                    @else
                                                                        <i
                                                                            class="bi bi-exclamation-circle-fill text-danger"></i>
                                                                    @endif
                                                                </div>
                                                                <strong
                                                                    class="{{ !empty($documents[$key]) ? 'text-success' : 'text-danger' }} label-{{ $key }}">
                                                                    {{ $label }}
                                                                </strong>
                                                                <span
                                                                    class="badge ms-3 status-badge {{ !empty($documents[$key]) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}"
                                                                    id="status-{{ $key }}">
                                                                    {{ !empty($documents[$key]) ? 'Uploaded' : 'Pending' }}
                                                                </span>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-3">
                                                                @if (!empty($documents[$key]))
                                                                    <a href="{{ asset($documents[$key]) }}"
                                                                        target="_blank"
                                                                        class="btn btn-sm btn-outline-primary">View</a>
                                                                @endif
                                                                <label for="doc-{{ $key }}"
                                                                    class="btn btn-link text-success m-0">
                                                                    <i class="bi bi-plus-circle-fill"></i> Add Doc
                                                                </label>
                                                                <input type="file"
                                                                    name="documents[{{ $key }}]"
                                                                    class="form-control d-none doc-upload"
                                                                    id="doc-{{ $key }}"
                                                                    data-key="{{ $key }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="mt-4 text-right">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="#">Previous</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush
s
