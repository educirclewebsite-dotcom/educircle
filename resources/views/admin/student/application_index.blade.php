@extends('admin.layout.app')
@section('title', 'Application List')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <h4 class="mb-0">Application List</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Applications</h4>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>University</th>
                                        <th>Applied On</th>
                                        <th>Status</th>
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
    $(document).ready(function () {
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ route("application.getData") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'user_name', name: 'users.name' },
                { data: 'course_name', name: 'courses.course_name' },
                { data: 'university_name', name: 'universities.university_name' },
                { data: 'created_at', name: 'applications.created_at' }, 
                { data: 'status', name: 'applications.status' }, 
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
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
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: false,
        }).then(function (result) { 
            if (result.value) {
                $.ajax({
                    url: '{{ url('admin/application') }}/' + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function () {
                        $('#datatables').DataTable().ajax.reload();
                        Swal.fire("Deleted!", "Application has been deleted.", "success");
                    },
                    error: function () {
                        Swal.fire("Error!", "Unable to delete. Related data exists.", "warning");
                    }
                });
            } else {
                Swal.fire("Cancelled", "Your application is safe :)", "error");
            }
        });
    }
</script>
@endpush
