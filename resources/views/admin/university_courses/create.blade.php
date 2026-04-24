@extends('admin.layout.app')
@section('title', 'University Course')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('theme2/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
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
                    <h4 class="mb-0">Create University Course</h4>
                    <a href="{{ route('university_course.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('university_course.store') }}" method="POST">
                        @csrf

                        <div class="mb-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-success btn-sm" id="addRow">
                                <i class="fas fa-plus"></i> Add Row
                            </button>
                        </div>

                        <table class="table table-bordered" id="courseTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Course *</th>
                                    <th>Course Fee *</th>
                                    <th>University *</th>
                                    <th style="width: 80px;">Duration (Year) *</th>
                                    <th>Intake *</th>
                                    <th>Scholarship</th>
                                    <th>Popular</th>
                                    <th>Top Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <!-- first row -->
                                <tr>
                                    <td>
                                        <select name="course_id[]" class="form-control course-select" required>
                                            <option value="" disabled selected>Select Course</option>
                                        </select>

                                        <!-- Course Link below Course select -->
                                        <input type="url" name="course_link[]" class="form-control mt-1"
                                            placeholder="University Course Link">
                                    </td>


                                    <td>
                                        <input type="number" name="course_fee[]" class="form-control course-fee"
                                            style="width: 90px;" required>
                                    </td>

                                    <td>
                                        <select name="university_id[]" class="form-control university-select" required>
                                            <option disabled selected>Select University</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="number" name="duration_months[]" class="form-control"
                                            style="width: 80px;" required>
                                    </td>

                                    <td>
                                        <select name="semester[0][]" class="form-control select2-multi" multiple required>
                                            <option value="1">Sem 1 (Feb)</option>
                                            <option value="2">Sem 2 (July)</option>
                                            <option value="3">Sem 3 (Nov)</option>
                                        </select>
                                    </td>

                                    <td>
                                        <textarea name="scholarship[]" class="form-control"></textarea>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="is_popular[0]" value="1">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="is_top_course[0]" value="1">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm removeRow">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
        $(document).ready(function () {
            let rowIndex = 1;

            // Initialize select2 globally
            function initSelect2(context = document) {
                // Semester Select2
                $(context).find('.select2-multi').select2({
                    placeholder: "Select Semester",
                    width: "100%"
                });

                // Course Select2 AJAX
                $(context).find('.course-select').select2({
                    placeholder: "Search for a Code/Name",
                    width: "100%",
                    ajax: {
                        url: '{{ route('university_course.searchCourses') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                term: params.term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data.results
                            };
                        },
                        cache: true
                    }
                });

                // University Select2 AJAX
                $(context).find('.university-select').select2({
                    placeholder: "Search for a University",
                    width: "100%",
                    ajax: {
                        url: '{{ route('university_course.searchUniversities') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                term: params.term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data.results
                            };
                        },
                        cache: true
                    }
                });
            }

            initSelect2(); // first row

            // Auto-fill course fee
            $(document).on("select2:select", ".course-select", function (e) {
                let data = e.params.data;
                let fee = data.course_price;
                $(this).closest("tr").find(".course-fee").val(fee ?? "");
            });

            // Add New Row
            $("#addRow").click(function () {
                let newRow = `
                <tr>
                     <td>
                         <select name="course_id[]" class="form-control course-select" required>
                             <option value="" disabled selected>Select Course</option>
                         </select>
                        <input type="url" name="course_link[]" class="form-control mt-1" placeholder="University Course Link">
                    </td>

                    <td>
                        <input type="text" name="course_fee[]" class="form-control course-fee" style="width: 90px;" required>
                    </td>

                    <td>
                        <select name="university_id[]" class="form-control university-select" required>
                            <option disabled selected>Select University</option>
                        </select>
                    </td>

                    <td>
                        <input type="number" name="duration_months[]" class="form-control" style="width: 80px;" required>
                    </td>

                    <td>
                       <select name="semester[${rowIndex}][]" class="form-control select2-multi" multiple required>
                       <option value="1">Sem 1 (Feb)</option>
                       <option value="2">Sem 2 (July)</option>
                       <option value="3">Sem 3 (Nov)</option>
                       </select>
                    </td>

                    <td>
                        <textarea name="scholarship[]" class="form-control"></textarea>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="is_popular[${rowIndex}]" value="1">
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="is_top_course[${rowIndex}]" value="1">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeRow">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`;

                let $newRow = $(newRow);
                $("#courseTable tbody").append($newRow);
                initSelect2($newRow); // initialize new row select2
                rowIndex++;
            });

            // Delete row
            $(document).on("click", ".removeRow", function () {
                if ($("#courseTable tbody tr").length > 1) {
                    $(this).closest("tr").remove();
                }
            });

        });
    </script>
@endpush