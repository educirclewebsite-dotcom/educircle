@extends('admin.layout.app')
@section('title', 'Blogs')

@push('header_script')
    <!-- DataTables CSS -->
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Blogs</h4>
                        <a href="{{ route('blog.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus me-1"></i> Add Blog
                        </a>
                    </div>
                </div>
            </div>

            <!-- Blog Data Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Data is loaded via AJAX --}}
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
    <!-- DataTables JS -->
    <script src="{{ asset('theme2/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                responsive: true,
                ajax: '{{ route('blog.getData') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'blog_date',
                        name: 'blog_date'
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
                        url: "{{ url('admin/blog') }}/" + id,
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function() {
                            $("#dataTable").DataTable().draw(false);

                            Swal.fire({
                                title: "Deleted!",
                                text: "Blog deleted successfully.",
                                icon: "success"
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: "Error!",
                                text: "Cannot delete this blog. Remove related records first.",
                                icon: "warning"
                            });
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
