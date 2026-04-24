@extends('admin.layout.app')
@section('title', 'Create Course')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Create Course</h4>
                    <a href="{{ route('course.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf

                            <!-- Course Name -->
                            <div class="form-group">
                                <label for="course_name">Course <span class="text-danger">*</span></label>
                                <input type="text"
                                       name="course_name"
                                       class="form-control @error('course_name') is-invalid @enderror"
                                       value="{{ old('course_name') }}"
                                       required>

                                @error('course_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Course Type -->
                            <div class="form-group">
                                <label for="course_type">Course Type <span class="text-danger">*</span></label>
                                <select name="course_type"
                                        id="course_type"
                                        class="form-control @error('course_type') is-invalid @enderror"
                                        required>
                                    <option value="" disabled {{ old('course_type') ? '' : 'selected' }}>Select Course Type</option>
                                    <option value="UG" {{ old('course_type') == 'UG' ? 'selected' : '' }}>UG</option>
                                    <option value="PG" {{ old('course_type') == 'PG' ? 'selected' : '' }}>PG</option>
                                </select>

                                @error('course_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Study Area -->
                            @php
                                $studyAreas = [
                                    'Business/Commerce/Management',
                                    'Law/Humanities',
                                    'Engineering/IT/Computing',
                                    'Science/Medicine/Health',
                                    'Arts/Social Sciences',
                                    'Education',
                                    'Sports',
                                    'Environment',
                                    'Food',
                                    'Nutrition and Dietetics',
                                ];
                                $selected = old('study_area', []);
                            @endphp
                            <div class="form-group">
                                <label>Study Area</label>
                                <div class="border rounded p-3">
                                    @foreach ($studyAreas as $area)
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" name="study_area[]"
                                                   value="{{ $area }}"
                                                   id="area_create_{{ $loop->index }}"
                                                   {{ in_array($area, $selected) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="area_create_{{ $loop->index }}">{{ $area }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mt-3 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
