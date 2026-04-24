@extends('admin.layout.app')
@section('title', 'Student List')
@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
        <link href="{{asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Students List</h4>
                    <a href="{{ route('student.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus me-1"></i> Add Student
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
                            <table id="dataTable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Course Preference</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                   
                                </tbody>
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

    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('theme2/assets/js/pages/sweet-alerts.init.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            responsive: true,
            ajax: {
                url: '{{ route('admission.getData') }}',
               
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'users.name' },
                { data: 'email', name: 'users.email' },
                { data: 'course_preference', name: 'course_preference' },
                { data: 'country', name: 'country' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
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
            }).then(function (e) {
                if (e.value) {
                    $.ajax({
                        url: '{{ url('admin/admission') }}/' + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function () {
                            $("#datatable").DataTable().draw(false);
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            })
                        },
                        error: function (){
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
