@extends('admin.layout.app')
@section('title', 'Course List')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-0">Course List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('course.create') }}" class="btn btn-primary btn-sm px-3">
                            <i class="mdi mdi-plus me-1"></i> Add Course
                        </a>
                    </div>
                </div>
            </div>

            <!-- Course Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Courses</h4>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-bordered dt-responsive nowrap"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Course Name</th>
                                            <th>Course Type</th>
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
    <script src="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            let table = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('courses.getData') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'course_name',
                        name: 'course_name'
                    },
                    {
                        data: 'course_type',
                        name: 'course_type'
                    },
                  
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });

        function deleteIt(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: !1,
            }).then(function(e) {
                if (e.value) {
                    $.ajax({
                        url: '{{ url('admin/course') }}/' + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function() {
                            $("#datatables").DataTable().draw(false);
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            })
                        },
                        error: function() {
                            Swal.fire({
                                title: "Not Be Deleted!",
                                text: "First Delete The All Related Details",
                                icon: "warning"
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    })
                }
            })
        }
    </script>
@endpush
