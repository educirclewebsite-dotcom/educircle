@extends('admin.layout.app')
@section('title', 'Student Edit')

@push('header_script')
<link rel="stylesheet" href="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
<link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">

<style>
    .doc-row {
        border-bottom: 2px solid #dcdcdc !important;
    }
</style>
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div id="basic-pills-wizard" class="twitter-bs-wizard">

                                <!-- Wizard Header -->
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
                                            <span class="step-title">Documents</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Wizard Content -->
                                <div class="tab-content twitter-bs-wizard-tab-content">

                                    <!-- ---------------- PROFILE TAB ---------------- -->
                                    <div class="tab-pane" id="profile">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>First name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="name"
                                                        value="{{ old('name', $student->user->name) }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Last name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="last_name"
                                                        value="{{ old('last_name', $student->last_name) }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="email"
                                                        value="{{ old('email', $student->user->email) }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mobile No. <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="mobile_no"
                                                        value="{{ old('mobile_no', $student->mobile_no) }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>WhatsApp No.</label>
                                                    <input type="text" class="form-control"
                                                        name="whatsapp_no"
                                                        value="{{ old('whatsapp_no', $student->whatsapp_no) }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Gender <span class="text-danger">*</span></label>
                                                    <select class="custom-select" name="gender" required>
                                                        <option value="" disabled>Select Gender</option>
                                                        <option value="male" {{ $student->gender=='male'?'selected':'' }}>Male</option>
                                                        <option value="female" {{ $student->gender=='female'?'selected':'' }}>Female</option>
                                                        <option value="other" {{ $student->gender=='other'?'selected':'' }}>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Course Level <span class="text-danger">*</span></label>
                                                    <select id="course_type" name="course_type" class="form-control" required>
                                                        <option value="">Select Course level</option>
                                                        @foreach ($courses as $type => $list)
                                                            <option value="{{ $type }}"
                                                                {{ $student->course_type==$type?'selected':'' }}>
                                                                {{ strtoupper($type) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Study Area <span class="text-danger">*</span></label>
                                                    <select id="course_preference" name="course_preference" class="form-control" required>
                                                        <option value="">Select </option>
                                                        @foreach ($courses as $type => $list)
                                                            @foreach ($list as $course)
                                                                <option value="{{ $course->course_name }}"
                                                                    data-type="{{ $type }}"
                                                                    {{ $student->course_preference==$course->course_name?'selected':'' }}>
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
                                                        <option value="">Select</option>
                                                        @foreach ($country as $id => $name)
                                                            <option value="{{ $id }}"
                                                                {{ $student->country == $id ? 'selected' : '' }}>
                                                                {{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Marital Status <span class="text-danger">*</span></label>
                                                    <select class="custom-select" name="marital_status">
                                                        <option value="">Select Status</option>
                                                        <option value="single" {{ $student->marital_status=='single'?'selected':'' }}>Single</option>
                                                        <option value="married" {{ $student->marital_status=='married'?'selected':'' }}>Married</option>
                                                        <option value="divorced" {{ $student->marital_status=='divorced'?'selected':'' }}>Divorced</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="city"
                                                        value="{{ $student->city }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Study Completed</label>
                                                    <select class="custom-select" name="graduation_level" required>
                                                        <option {{ $student->graduation_level=='10th or equivalent'?'selected':'' }}>10th or equivalent</option>
                                                        <option {{ $student->graduation_level=='12th or equivalent'?'selected':'' }}>12th or equivalent</option>
                                                        <option {{ $student->graduation_level=='Certificate or Diploma'?'selected':'' }}>Certificate or Diploma</option>
                                                        <option {{ $student->graduation_level=='3-Year Bachelor Degree'?'selected':'' }}>3-Year Bachelor Degree</option>
                                                        <option {{ $student->graduation_level=='4-Year Bachelor Degree'?'selected':'' }}>4-Year Bachelor Degree</option>
                                                        <option {{ $student->graduation_level=='PG Certificate or Diploma'?'selected':'' }}>PG Certificate or Diploma</option>
                                                        <option {{ $student->graduation_level=='Masters'?'selected':'' }}>Masters</option>
                                                        <option {{ $student->graduation_level=='PhD'?'selected':'' }}>PhD</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- ---------------- DOCUMENT TAB ---------------- -->
                                    <div class="tab-pane" id="document">
                                        <div class="row">

                                            @php
                                                $docLabels = [
                                                    'passport' => 'Passport (1st & Last Page Photo)',
                                                    'ug_certificate' => 'UG Degree Certificate',
                                                    'ug_marksheets' => 'UG All Semester Marksheet (PDF/ZIP)',
                                                    'english_test_score' => 'English Test Score',
                                                    'work_experience' => 'Work Experience',
                                                    'marksheet_10th' => '10th Marksheet',
                                                    'marksheet_12th' => '12th Marksheet',
                                                    'diploma_certificate' => 'Diploma Certificate',
                                                    'resume' => 'Resume / CV',
                                                    'other_document' => 'Other Document',
                                                ];
                                            @endphp

                                            @php
                                                $documents = $student->documents ?? [];
                                            @endphp

                                            @foreach ($docLabels as $key => $label)
                                            <div class="col-12 mb-3 doc-row">
                                                <div class="d-flex align-items-center justify-content-between p-3">

                                                    <!-- LEFT SIDE -->
                                                    <div class="d-flex align-items-center gap-3">
                                                        <span class="icon-{{ $key }}">
                                                            @if (!empty($documents[$key]))
                                                            <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                                            @else
                                                            <i class="bi bi-exclamation-circle-fill text-danger fs-4"></i>
                                                            @endif
                                                        </span>

                                                        <strong class="label-{{ $key }} {{ !empty($documents[$key]) ? 'text-success' : 'text-danger' }}">
                                                            {{ $label }}
                                                        </strong>

                                                        <span id="status-{{ $key }}"
                                                            class="badge {{ !empty($documents[$key]) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                            {{ !empty($documents[$key]) ? 'Uploaded' : 'Pending' }}
                                                        </span>
                                                    </div>

                                                    <!-- RIGHT SIDE -->
                                                    <div class="d-flex align-items-center gap-3">

                                                        @if (!empty($documents[$key]))
                                                        <a href="{{ asset($documents[$key]) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            View
                                                        </a>
                                                        @endif

                                                        <a href="javascript:void(0)"
                                                            class="text-success fw-bold"
                                                            onclick="document.getElementById('file-{{ $key }}').click()">
                                                            Add Doc
                                                        </a>

                                                        <input type="file"
                                                            class="d-none doc-upload"
                                                            name="documents[{{ $key }}]"
                                                            id="file-{{ $key }}"
                                                            data-key="{{ $key }}">
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

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

<script>
document.addEventListener('DOMContentLoaded', function () {

    const typeSelect = document.getElementById('course_type');
    const courseSelect = document.getElementById('course_preference');

    function filterCoursesByType(type) {
        Array.from(courseSelect.options).forEach(opt => {
            if (!opt.value) return;
            opt.style.display = opt.dataset.type === type ? 'block' : 'none';
        });
    }

    filterCoursesByType(typeSelect.value);

    typeSelect.addEventListener('change', function () {
        courseSelect.value = '';
        filterCoursesByType(this.value);
    });


    document.querySelectorAll('.doc-upload').forEach(input => {
        input.addEventListener('change', () => updateDocStatus(input.dataset.key));
    });

    function updateDocStatus(key) {

        const badge = document.getElementById('status-' + key);
        badge.classList.remove('bg-danger-subtle','text-danger');
        badge.classList.add('bg-success-subtle','text-success');
        badge.innerText = "Uploaded";


        const icon = document.querySelector('.icon-' + key + ' i');
        icon.classList.remove('text-danger','bi-exclamation-circle-fill');
        icon.classList.add('text-success','bi-check-circle-fill');

        const label = document.querySelector('.label-' + key);
        label.classList.remove('text-danger');
        label.classList.add('text-success');
    }
      const nextButton = document.querySelector('.next a');
            const profileTab = document.getElementById('profile');

            nextButton.addEventListener('click', function(e) {


                const requiredFields = profileTab.querySelectorAll('[required]');
                let valid = true;

                requiredFields.forEach(field => {
                    if (!field.value || field.value.trim() === '') {
                        field.classList.add('is-invalid');
                        valid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });


                if (!valid) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert("Please fill all required fields before going to the next step.");
                }

            });


});
</script>
@endpush
