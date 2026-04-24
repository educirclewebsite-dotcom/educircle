@extends('admin.layout.app')
@section('title', 'Edit University Course')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;
            border: 1px solid #ced4da !important;
            padding: 5px 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 24px !important;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit University Course</h4>
                    <a href="{{ route('university_course.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('university_course.update', $universityCourse->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Course</th>
                                    <th>Course Fee</th>
                                    <th>University</th>
                                    <th>Duration (Year)</th>
                                    <th>Intake</th>
                                    <th>Scholarship</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="course_id" class="form-control course-select" required>
                                            @if($universityCourse->course)
                                            <option value="{{ $universityCourse->course_id }}" selected
                                                data-fee="{{ $universityCourse->course->course_price }}">
                                                {{ $universityCourse->course->course_name }}
                                            </option>
                                            @endif
                                        </select>
                                        <!-- Course Link below Course select -->
                                        <input type="url" name="course_link" class="form-control mt-1"
                                            placeholder="Course Link (Optional)"
                                            value="{{ $universityCourse->course_link ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="number" name="course_fee" class="form-control course-fee"
                                            value="{{ $universityCourse->course_fee }}" style="width: 90px;" required>
                                    </td>
                                    <td>
                                        <select name="university_id" class="form-control university-select" required>
                                            @if($universityCourse->university)
                                            <option value="{{ $universityCourse->university_id }}" selected>
                                                {{ $universityCourse->university->university_name }}
                                            </option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="duration_months" class="form-control"
                                            value="{{ $universityCourse->duration_months }}" style="width: 100px;" required>
                                    </td>
                                    <td>
                                        <select name="semester[]" class="form-control select2-multi" multiple required>
                                            <option value="1"
                                                {{ in_array(1, $universityCourse->semester ?? []) ? 'selected' : '' }}>Sem
                                                1 (Feb)</option>
                                            <option value="2"
                                                {{ in_array(2, $universityCourse->semester ?? []) ? 'selected' : '' }}>Sem
                                                2 (July)</option>
                                            <option value="3"
                                                {{ in_array(3, $universityCourse->semester ?? []) ? 'selected' : '' }}>Sem
                                                3 (Nov)</option>
                                        </select>
                                    </td>

                                    <td>
                                        <textarea name="scholarship" class="form-control" placeholder="Enter Scholarship">{{ $universityCourse->scholarship }}</textarea>
                                        
                                        <div class="mt-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="isPopular" 
                                                    name="is_popular" value="1" 
                                                    {{ $universityCourse->is_popular ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-bold" for="isPopular">
                                                    Display in Popular Courses
                                                </label>
                                            </div>
                                            <div class="custom-control custom-checkbox mt-2">
                                                <input type="checkbox" class="custom-control-input" id="isTopCourse" 
                                                    name="is_top_course" value="1" 
                                                    {{ $universityCourse->is_top_course ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-bold" for="isTopCourse">
                                                    Display on University Landing Page (Top Course)
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Semester Select2
            $('.select2-multi').select2({
                placeholder: "Select Semester",
                width: "100%"
            });

            // Course Select2 AJAX
            $('.course-select').select2({
                placeholder: "Search for a Code/Name",
                width: "100%",
                ajax: {
                    url: '{{ route('university_course.searchCourses') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return { term: params.term };
                    },
                    processResults: function(data) {
                        return { results: data.results };
                    },
                    cache: true
                }
            });

            // University Select2 AJAX
            $('.university-select').select2({
                placeholder: "Search for a University",
                width: "100%",
                ajax: {
                    url: '{{ route('university_course.searchUniversities') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return { term: params.term };
                    },
                    processResults: function(data) {
                        return { results: data.results };
                    },
                    cache: true
                }
            });

            // Auto-fill course fee
            $('.course-select').on('select2:select', function(e) {
                let data = e.params.data;
                let fee = data.course_price;
                $('.course-fee').val(fee ?? '');
            });
        });
    </script>
@endpush
