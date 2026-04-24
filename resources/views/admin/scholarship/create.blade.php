@extends('admin.layout.app')
@section('title', 'Create Scholarship')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Create Scholarship</h4>
                        <a href="{{ route('scholarship.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('scholarship.store') }}" method="POST">
                                @csrf

                                <div class="row">

                                    {{-- University --}}
                                    <div class="col-md-6 mb-3">
                                        <label>University <span class="text-danger">*</span></label>
                                        <select name="university_id"
                                            class="form-control @error('university_id') is-invalid @enderror" required>
                                            <option value="">Select University</option>

                                            @foreach ($universitycourses as $uc)
                                                <option value="{{ $uc->id }}"
                                                    {{ old('university_id') == $uc->id ? 'selected' : '' }}>
                                                    {{ $uc->university->university_name ?? 'N/A' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('university_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Course --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Course <span class="text-danger">*</span></label>
                                        <select name="course_id"
                                            class="form-control @error('course_id') is-invalid @enderror" required>
                                            <option value="">Select Course</option>

                                            @foreach ($universitycourses as $uc)
                                                <option value="{{ $uc->id }}"
                                                    {{ old('course_id') == $uc->id ? 'selected' : '' }}>
                                                    {{ $uc->course->course_name ?? 'N/A' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Title --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Scholarship Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" required>

                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Amount --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Amount of Scholarship <span class="text-danger">*</span></label>
                                        <input type="text" name="amount"
                                            class="form-control @error('amount') is-invalid @enderror"
                                            value="{{ old('amount') }}" required>

                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Application Link </label>
                                        <input type="url" name="application_link"
                                            class="form-control @error('application_link') is-invalid @enderror"
                                            value="{{ old('application_link') }}" placeholder="https://example.com/apply"
                                            >

                                        @error('application_link')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    {{-- Eligibility --}}
                                    <div class="col-md-12 mb-3">
                                        <label>Eligibility Criteria <span class="text-danger">*</span></label>
                                        <textarea name="eligibility" class="summernote @error('eligibility') is-invalid @enderror" rows="6" required>{{ old('eligibility') }}</textarea>

                                        @error('eligibility')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="summernote @error('description') is-invalid @enderror" rows="6" required>{{ old('description') }}</textarea>

                                        @error('description')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group mt-4">
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

@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
