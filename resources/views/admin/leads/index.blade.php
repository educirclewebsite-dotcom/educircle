@extends('admin.layout.app')
@section('title', 'Lead List')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('theme2/assets/libs/toastr/build/toastr.min.css') }}">
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3 align-items-end">

                <div class="col-md-2">
                    <h4 class="mb-0">Leads</h4>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy"
                            data-date-autoclose="true">
                            <input type="text" class="form-control" name="startDate" id="startDate"
                                placeholder="Start Date" />
                            <input type="text" class="form-control" name="endDate" id="endDate" placeholder="End Date" />
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-end">
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="exportsExcel()" class="btn btn-success btn-sm px-3"
                            title="Export in Excel" id="exportBtn">
                            <i class="mdi mdi-file-excel me-1"></i>
                        </button>

                        <a href="{{ route('lead.create') }}" class="btn btn-primary btn-sm px-3 ml-2">
                            <i class="mdi mdi-plus me-1"></i> Add
                        </a>
                    </div>
                </div>

            </div>

            <!-- Lead List Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lead List</h4>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-bordered dt-responsive nowrap"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Actions</th>
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

    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/sweet-alerts.init.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/toastr/build/toastr.min.js') }}"></script>

    <script>
        $(function () {

            let table = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                responsive: true,

                ajax: {
                    url: "{{ route('lead.getData') }}",
                    data: function (d) {
                        d.start = $('#startDate').val();
                        d.end = $('#endDate').val();
                    }
                },

                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contact_number',
                    name: 'contact_number'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                ]
            });



            $('#startDate, #endDate').on('change', function () {
                $('#datatables').DataTable().draw(false);
            });



            $('#exportBtn').on('click', function () {
                let start = $('#startDate').val();
                let end = $('#endDate').val();

                let url = "{{ route('leads.export') }}" + "?start=" + encodeURIComponent(start) + "&end=" +
                    encodeURIComponent(end);
                window.location.href = url;
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
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
            }).then(function (e) {

                if (e.value) {

                    $.ajax({
                        url: "{{ url('admin/lead') }}/" + id,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },

                        success: function () {
                            $('#datatables').DataTable().draw(false);

                            Swal.fire({
                                title: "Deleted!",
                                text: "Lead has been deleted successfully.",
                                icon: "success"
                            });
                        },

                        error: function () {
                            Swal.fire({
                                title: "Cannot Delete!",
                                text: "First delete all related records.",
                                icon: "warning"
                            });
                        }
                    });

                } else {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Lead is safe!",
                        icon: "error"
                    });
                }

            });
        }
    </script>
@endpush