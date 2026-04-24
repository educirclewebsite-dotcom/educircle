@extends('admin.layout.app')
@section('title', 'Student Profile')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">
    <style>
    .doc-row {
        border-bottom: 2px solid #dcdcdc !important; /* darker line */
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
                            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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

                                            {{-- Name --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}" required>
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('last_name') is-invalid @enderror"
                                                            name="last_name" value="{{ old('last_name') }}" required>
                                                        @error('last_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Email + Password --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required>
                                                        @error('email')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password <span class="text-danger">*</span></label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required>
                                                        @error('password')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Mobile + WhatsApp --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mobile NO. <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('mobile_no') is-invalid @enderror"
                                                            name="mobile_no" value="{{ old('mobile_no') }}" required>
                                                        @error('mobile_no')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>WhatsApp NO. (Optional)</label>
                                                        <input type="text"
                                                            class="form-control @error('whatsapp_no') is-invalid @enderror"
                                                            name="whatsapp_no" value="{{ old('whatsapp_no') }}">
                                                        @error('whatsapp_no')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- City + Gender --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>City <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('city') is-invalid @enderror"
                                                            name="city" value="{{ old('city') }}" required>
                                                        @error('city')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <select class="custom-select @error('gender') is-invalid @enderror"
                                                            name="gender" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="male"
                                                                {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                                            </option>
                                                            <option value="female"
                                                                {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                                            </option>
                                                            <option value="other"
                                                                {{ old('gender') == 'other' ? 'selected' : '' }}>Other
                                                            </option>
                                                        </select>
                                                        @error('gender')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Course Type + Preference --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Course Level
                                                            <span class="text-danger">*</span></label>
                                                        <select id="course_type" name="course_type"
                                                            class="form-control @error('course_type') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Course level</option>
                                                            @foreach ($courses as $type => $courseList)
                                                                <option value="{{ $type }}"
                                                                    {{ old('course_type') == $type ? 'selected' : '' }}>
                                                                    {{ strtoupper($type) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('course_type')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Study Area <span class="text-danger">*</span></label>
                                                        <select id="course_preference" name="course_preference"
                                                            class="form-control @error('course_preference') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Course</option>
                                                            @foreach ($courses as $type => $list)
                                                                @foreach ($list as $course)
                                                                    <option value="{{ $course->course_name }}"
                                                                        data-type="{{ $type }}"
                                                                        {{ old('course_preference') == $course->course_name ? 'selected' : '' }}>
                                                                        {{ $course->course_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                        @error('course_preference')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Country + Marital Status --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <select name="country"
                                                            class="form-control @error('country') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select country</option>
                                                            @foreach ($country as $id => $name)
                                                                <option value="{{ $id }}"
                                                                    {{ old('country') == $id ? 'selected' : '' }}>
                                                                    {{ $name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('country')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Marital status <span class="text-danger">*</span></label>
                                                        <select
                                                            class="custom-select @error('marital_status') is-invalid @enderror"
                                                            name="marital_status" required>
                                                            <option value="">Select Status</option>
                                                            <option value="single"
                                                                {{ old('marital_status') == 'single' ? 'selected' : '' }}>
                                                                Single
                                                            </option>
                                                            <option value="married"
                                                                {{ old('marital_status') == 'married' ? 'selected' : '' }}>
                                                                Married</option>
                                                            <option value="divorced"
                                                                {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>
                                                                Divorced</option>
                                                        </select>
                                                        @error('marital_status')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Status + Graduation --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Status <span class="text-danger">*</span></label>
                                                        <select
                                                            class="custom-select @error('status') is-invalid @enderror"
                                                            name="status" required>
                                                            <option value="">Select Status</option>
                                                            <option value="new"
                                                                {{ old('status') == 'new' ? 'selected' : '' }}>New</option>
                                                            <option value="admission"
                                                                {{ old('status') == 'admission' ? 'selected' : '' }}>
                                                                Admission
                                                            </option>
                                                            <option value="in process"
                                                                {{ old('status') == 'in process' ? 'selected' : '' }}>In
                                                                Process
                                                            </option>
                                                        </select>
                                                        @error('status')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Study Completed <span class="text-danger">*</span></label>
                                                        <select
                                                            class="custom-select @error('graduation_level') is-invalid @enderror"
                                                            name="graduation_level" required>
                                                            <option value="">Select Status</option>
                                                            <option value="10th or equivalent"
                                                                {{ old('graduation_level') == '10th or equivalent' ? 'selected' : '' }}>
                                                                10th or equivalent</option>
                                                            <option value="12th or equivalent"
                                                                {{ old('graduation_level') == '12th or equivalent' ? 'selected' : '' }}>
                                                                12th or equivalent</option>
                                                            <option value="Certificate or Diploma"
                                                                {{ old('graduation_level') == 'Certificate or Diploma' ? 'selected' : '' }}>
                                                                Certificate or Diploma</option>
                                                            <option value="3-Year Bachelor Degree"
                                                                {{ old('graduation_level') == '3-Year Bachelor Degree' ? 'selected' : '' }}>
                                                                3-Year Bachelor Degree</option>
                                                            <option value="4-Year Bachelor Degree"
                                                                {{ old('graduation_level') == '4-Year Bachelor Degree' ? 'selected' : '' }}>
                                                                4-Year Bachelor Degree</option>
                                                            <option value="PG Certificate or Diploma"
                                                                {{ old('graduation_level') == 'PG Certificate or Diploma' ? 'selected' : '' }}>
                                                                PG Certificate or Diploma</option>
                                                            <option value="Masters"
                                                                {{ old('graduation_level') == 'Masters' ? 'selected' : '' }}>
                                                                Masters</option>
                                                            <option value="PhD"
                                                                {{ old('graduation_level') == 'PhD' ? 'selected' : '' }}>
                                                                PhD
                                                            </option>
                                                        </select>
                                                        @error('graduation_level')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
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
                                                        'english_test_score' => 'English Test Score',
                                                        'work_experience' => 'Work Experience',
                                                        'marksheet_10th' => '10th Marksheet',
                                                        'marksheet_12th' => '12th Marksheet',
                                                        'diploma_certificate' => 'Diploma Certificate',
                                                        'resume' => 'Resume / CV',
                                                        'other_document' => 'Other Document',
                                                    ];
                                                @endphp


                                                @foreach ($docLabels as $key => $label)
                                                   <div class="col-12 mb-3 doc-row">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between border rounded p-3">

                                                            {{-- Left Side: Icon + Label --}}
                                                            <div class="d-flex align-items-center gap-3">

                                                                <span class="icon-{{ $key }}">
                                                                    <i
                                                                        class="bi bi-exclamation-circle-fill text-danger fs-4"></i>
                                                                </span>

                                                                <strong
                                                                    class="label-{{ $key }} text-danger">{{ $label }}</strong>

                                                                <span id="status-{{ $key }}"
                                                                    class="badge bg-danger-subtle text-danger">
                                                                    Pending
                                                                </span>
                                                            </div>

                                                            {{-- Right Side: Add Doc button --}}
                                                            <div>
                                                                <a href="javascript:void(0)" class="text-success fw-bold"
                                                                    onclick="document.getElementById('file-{{ $key }}').click()">
                                                                    Add Doc
                                                                </a>

                                                                <input type="file"
                                                                    name="document[{{ $key }}]"
                                                                    id="file-{{ $key }}"
                                                                    class="d-none doc-upload"
                                                                    data-key="{{ $key }}">
                                                            </div>

                                                        </div>

                                                        @error("documents.$key")
                                                            <small class="text-danger d-block">{{ $message }}</small>
                                                        @enderror
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
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('course_type');
            const courseSelect = document.getElementById('course_preference');

            function filterCoursesByType(type) {
                Array.from(courseSelect.options).forEach(option => {
                    if (!option.value) return;
                    option.style.display = option.dataset.type === type ? 'block' : 'none';
                });
            }


            const selectedType = typeSelect.value;
            if (selectedType) filterCoursesByType(selectedType);


            typeSelect.addEventListener('change', function() {
                courseSelect.selectedIndex = 0;
                filterCoursesByType(this.value);
            });
            document.querySelectorAll('.doc-upload').forEach(input => {
                input.addEventListener('change', () => {
                    const key = input.dataset.key;
                    updateDocStatus(key);
                });
            });

            function updateDocStatus(key) {
                const statusBadge = document.getElementById('status-' + key);

                if (statusBadge) {

                    statusBadge.classList.remove('bg-danger-subtle', 'text-danger');
                    statusBadge.classList.add('bg-success-subtle', 'text-success');
                    statusBadge.innerText = 'Uploaded';


                    const icon = document.querySelector('.icon-' + key + ' i');
                    if (icon) {
                        icon.classList.remove('bi-exclamation-circle-fill', 'text-danger');
                        icon.classList.add('bi-check-circle-fill', 'text-success');
                    }


                    const label = document.querySelector('.label-' + key);
                    if (label) {
                        label.classList.remove('text-danger');
                        label.classList.add('text-success');
                    }
                }
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
