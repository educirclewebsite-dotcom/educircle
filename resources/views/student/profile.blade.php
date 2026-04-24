@extends('student.layout.app')
@section('title', 'My Profile')

@push('header_script')
    <link rel="stylesheet" href="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .bg-danger-subtle {
            background-color: #fdecea;
            color: #D85C4E;
            padding: 0.25em 0.75em;
            border-radius: 10px;
            font-size: 0.875rem;
        }

        .btn-link {
            text-decoration: none;
            cursor: pointer;
        }

        input[type="file"].d-none {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div id="toast-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

            @if (session('success_msg'))
                <script>
                    window.addEventListener('DOMContentLoaded', function() {
                        showToast(@json(session('success_msg')), 'success');
                    });
                </script>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span><strong>Profile</strong></span>
                <span class="text-success fw-bold">{{ $progress }}% Profile Completed</span>
            </div>
            <div class="progress mb-4" style="height: 8px; border-radius: 6px;">
                <div class="progress-bar bg-success" role="progressbar"
                    style="width: {{ $progress }}%; transition: width 0.4s ease-in-out;"
                    aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form id="multiStepForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div id="progrss-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav nav-justified">
                                        <li class="nav-item">
                                            <a href="#step1" class="nav-link active" data-toggle="tab">
                                                <span class="step-number">01</span>
                                                <span class="step-title">Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#step2" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02</span>
                                                <span class="step-title">Documents</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#step3" class="nav-link" data-toggle="tab">
                                                <span class="step-number">03</span>
                                                <span class="step-title">Acknowledgement</span>
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        <!-- Step 1: Profile -->
                                        <div class="tab-pane active" id="step1">

                                            {{-- First / Last Name --}}
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            value="{{ old('name', Auth::user()->name ?? '') }}" required>
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="last_name"
                                                            class="form-control @error('last_name') is-invalid @enderror"
                                                            value="{{ old('last_name', $student->last_name ?? '') }}"
                                                            required>
                                                        @error('last_name')
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
                                                        <input type="text" name="mobile_no"
                                                            class="form-control @error('mobile_no') is-invalid @enderror"
                                                            value="{{ old('mobile_no', $student->mobile_no ?? '') }}"
                                                            required>
                                                        @error('mobile_no')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>WhatsApp NO.</label>
                                                        <input type="text" name="whatsapp_no"
                                                            class="form-control @error('whatsapp_no') is-invalid @enderror"
                                                            value="{{ old('whatsapp_no', $student->whatsapp_no ?? '') }}">
                                                        @error('whatsapp_no')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Gender + Course Type --}}
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender <span class="text-danger">*</span></label>
                                                        <select name="gender"
                                                            class="form-control @error('gender') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Gender</option>
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
                                                        @error('gender')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Course Level <span class="text-danger">*</span></label>
                                                        <select id="course_type" name="course_type"
                                                            class="form-control @error('course_type') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Course level</option>
                                                            @foreach ($courses as $type => $courseList)
                                                                <option value="{{ $type }}"
                                                                    {{ old('course_type', $student->course_type ?? '') == $type ? 'selected' : '' }}>
                                                                    {{ strtoupper($type) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('course_type')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Course Preference + Country --}}
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Study Area<span class="text-danger">*</span></label>
                                                        <select id="course_preference" name="course_preference"
                                                            class="form-control @error('course_preference') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select</option>

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
                                                        @error('course_preference')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <select name="country"
                                                            class="form-control @error('country') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Country</option>
                                                            @foreach ($country as $countryItem)
                                                                <option value="{{ $countryItem->id }}"
                                                                    {{ old('country', $student->country ?? '') == $countryItem->id ? 'selected' : '' }}>
                                                                    {{ $countryItem->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('country')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Marital Status + City --}}
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Marital Status <span class="text-danger">*</span></label>
                                                        <select name="marital_status"
                                                            class="form-control @error('marital_status') is-invalid @enderror"
                                                            required>
                                                            <option value="">Select Status</option>
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
                                                        @error('marital_status')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>City <span class="text-danger">*</span></label>
                                                        <input type="text" name="city"
                                                            class="form-control @error('city') is-invalid @enderror"
                                                            value="{{ old('city', $student->city ?? '') }}" required>
                                                        @error('city')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Graduation Level --}}
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Study Completed</label>
                                                        <select class="custom-select" name="graduation_level" required>
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
                                                                PhD</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mt-3 text-right">
                                                <button type="button" class="btn btn-primary nextBtn"
                                                    data-step="1">Save & Next</button>
                                            </div>

                                        </div>


                                        <!-- Step 2: Documents -->
                                        <div class="tab-pane" id="step2">
                                            <div class="row">
                                                @php
                                                    $docLabels = [
                                                        'passport' => 'Passport (1st & Last Page Photo)',
                                                        'ug_certificate' => 'UG Degree Certificate',
                                                        'ug_marksheets' => 'UG All Semester Marksheet (PDF/ZIP)',
                                                        'english_test_score' => 'English Test Score (IELTS/TOEFL)',
                                                        'work_experience' => 'Work Experience (if any)',
                                                        'marksheet_10th' => '10th Marksheet',
                                                        'marksheet_12th' => '12th Marksheet',
                                                        'diploma_certificate' => 'Diploma Certificate',
                                                        'resume' => 'Resume / CV',
                                                        'other_document' => 'Other Document',
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
                                            </div>

                                            <div class="mt-3 text-right">

                                                <button type="button" class="btn btn-primary nextBtn"
                                                    data-step="2">Save & Next</button>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="step3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="border rounded p-4">
                                                        <h5><strong>Student Acknowledgement / Declaration</strong></h5>
                                                        <p class="mt-3">
                                                            I hereby declare that all information and documents provided by
                                                            me are true,
                                                            correct, and genuine to the best of my knowledge.
                                                            I take full responsibility for any incorrect or misleading
                                                            information.
                                                        </p>

                                                        <div class="mt-3">
                                                            <label class="d-flex align-items-center gap-2">
                                                                <input type="checkbox" name="accept_declaration" required>
                                                                <strong>I agree & accept</strong>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3 text-right">
                                                <button type="button" class="btn btn-success nextBtn"
                                                    data-step="3">Submit</button>
                                                <button type="button" class="btn btn-secondary prevBtn">Previous</button>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/form-wizard.init.js') }}"></script>

    <script>
        const form = document.getElementById('multiStepForm');

        function switchTab(step) {
            document.querySelector(`a[href="#step${step}"]`).click();
        }

        function getFormData(step) {
            const data = new FormData();
            const fields = form.querySelectorAll(`#step${step} input, #step${step} select, #step${step} textarea`);

            fields.forEach(field => {
                if (field.type === 'file') {
                    if (field.files.length > 0) {
                        data.append(field.name, field.files[0]);
                    }
                } else if (field.type === 'checkbox') {
                    if (field.checked) data.append(field.name, field.value);
                } else {
                    data.append(field.name, field.value);
                }
            });

            return data;
        }

        function showToast(message, type = 'success') {
            const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-x-circle-fill';
            const bgColor = type === 'success' ? 'bg-success' : 'bg-danger';

            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white ${bgColor} border-0 shadow mb-3`;
            toast.role = 'alert';
            toast.ariaLive = 'assertive';
            toast.ariaAtomic = 'true';
            toast.style.minWidth = '300px';

            toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi ${icon} me-2"></i> ${message}
                </div>
            </div>
        `;
            document.getElementById('toast-container').appendChild(toast);

            const bsToast = new bootstrap.Toast(toast, {
                delay: 4000
            });
            bsToast.show();

            toast.addEventListener('hidden.bs.toast', () => toast.remove());
        }

        async function submitStep(step) {
            const routes = {
                1: '{{ route('student.profile.saveStep1') }}',
                2: '{{ route('student.profile.saveStep2') }}',
                3: '{{ route('student.profile.saveStep3') }}',
            };

            const formData = getFormData(step);

            try {
                const response = await fetch(routes[step], {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showToast(result.message || 'Step saved successfully!');

                    if (step < 3) {
                        switchTab(step + 1);
                    } else {

                        setTimeout(() => location.reload(), 1500);
                    }
                } else {
                    throw new Error(result.message || 'Something went wrong!');
                }
            } catch (error) {
                showToast(error.message, 'error');
            }
        }


        document.querySelectorAll('.nextBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const step = parseInt(btn.dataset.step);
                submitStep(step);
            });
        });


        document.querySelectorAll('.prevBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const current = parseInt(
                    document.querySelector('.twitter-bs-wizard-nav .nav-link.active')
                    .getAttribute('href').replace('#step', '')
                );

                if (current > 1) {
                    switchTab(current - 1);
                }
            });
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

        const typeSelect = document.getElementById('course_type');
        const courseSelect = document.getElementById('course_preference');

        function filterCoursesByType(type) {
            Array.from(courseSelect.options).forEach(option => {
                if (!option.value) return;
                option.style.display = option.dataset.type === type ? 'block' : 'none';
            });
        }

        if (typeSelect.value) {
            filterCoursesByType(typeSelect.value);
        }

        typeSelect.addEventListener('change', function() {
            courseSelect.selectedIndex = 0;
            filterCoursesByType(this.value);
        });

        document.querySelectorAll('.nextBtn').forEach(btn => {
            btn.addEventListener('click', () => {

                const step = parseInt(btn.dataset.step);
                const currentTab = document.querySelector(`#step${step}`);


                const requiredFields = currentTab.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value || field.value.trim() === '') {


                        field.classList.add('is-invalid');


                        if (isValid) field.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        isValid = false;
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });


                if (!isValid) {
                    showToast("Please fill all required fields.", "error");
                    return;
                }


                submitStep(step);
            });
        });
    </script>
@endpush
