@extends('admin.layout.app')
@section('title', 'University Courses')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <h4 class="mb-0">University Course List</h4>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="filterUniversity" class="form-control">
                                    <option value="">All Universities</option>
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select id="filterCourse" class="form-control">
                                    <option value="">All Courses</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="{{ route('university_course.create') }}" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus me-1"></i> Add 
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered dt-responsive nowrap"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Course</th>
                                            <th>University</th>
                                            <th>Duration (Year)</th>
                                            <th>Fee</th>
                                            <th>Intake</th>
                                            <th>Scholarship</th>
                                            <th>Top Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            const table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('university_course.getData') }}',
                    data: function(d) {
                        d.university_id = $('#filterUniversity').val();
                        d.course_id = $('#filterCourse').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'course_name',
                        name: 'courses.course_name'
                    },
                    {
                        data: 'university_name',
                        name: 'universities.university_name'
                    },
                    {
                        data: 'duration_months',
                        name: 'university_courses.duration_months'
                    },
                    {
                        data: 'course_fee',
                        name: 'university_courses.course_fee'
                    },
                    {
                        data: 'semester',
                        name: 'university_courses.semester'
                    },
                    {
                        data: 'scholarship',
                        name: 'university_courses.scholarship'
                    },
                    {
                        data: 'is_top_course',
                        name: 'university_courses.is_top_course'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#filterUniversity, #filterCourse').change(function() {
                table.ajax.reload();
            });
        });

        function deleteIt(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                customClass: {
                    confirmButton: "btn btn-success mt-2",
                    cancelButton: "btn btn-danger ms-2 mt-2"
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ url('admin/university_course') }}/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#dataTable').DataTable().draw(false);
                            Swal.fire("Deleted!", "University course has been deleted.", "success");
                        },
                        error: function() {
                            Swal.fire("Not Deleted!", "First delete related data.", "warning");
                        }
                    });
                }
            });
        }
    </script>
@endpush
