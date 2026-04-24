@extends('admin.layout.app')
@section('title', 'Google Reviews')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-3 align-items-end">
                <div class="col-md-6">
                    <h4 class="mb-0">Google Reviews</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('google-reviews.create') }}" class="btn btn-primary btn-sm px-3">
                        <i class="mdi mdi-plus me-1"></i> Add Review
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Reviews List</h4>
                            <div class="table-responsive">
                                <table id="datatables" class="table table-bordered dt-responsive nowrap"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>University</th>
                                            <th>Review</th>
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
    <script src="{{ asset('theme2/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(function () {
            let table = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('google-reviews.getData') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
                    { data: 'name', name: 'name' },
                    { data: 'photo', name: 'photo', orderable: false, searchable: false },
                    { data: 'university', name: 'university' },
                    { data: 'reviews', name: 'reviews' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });

        function deleteReview(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: false
            }).then(function (e) {
                if (e.value) {
                    $.ajax({
                        url: "{{ url('admin/google-reviews') }}/" + id,
                        type: "DELETE",
                        data: { "_token": "{{ csrf_token() }}" },
                        success: function () {
                            $('#datatables').DataTable().draw(false);
                            Swal.fire("Deleted!", "Review has been deleted.", "success");
                        },
                        error: function () {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
        }
    </script>
@endpush