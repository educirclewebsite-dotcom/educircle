@extends('admin.layout.app')
@section('title', 'Edit University')
@push('header_script')
    <link href="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit University</h4>
                        <a href="{{ route('university.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('university.update', $university->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Country -->
                                    <div class="col-md-6 mb-3">
                                        <label>Country <span class="text-danger">*</span></label>
                                        <select name="country_id" class="form-control" required>
                                            <option disabled>Select country</option>
                                            @foreach ($country as $id => $name)
                                                <option value="{{ $id }}" {{ old('country_id', $university->country_id) == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- State -->
                                    <div class="col-md-6 mb-3">
                                        <label>State <span class="text-danger">*</span></label>
                                        <select name="state_id" class="form-control" required>
                                            <option disabled>Select state</option>
                                            @foreach ($states as $id => $name)
                                                <option value="{{ $id }}" {{ old('state_id', $university->state_id) == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- University Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="university_name">University Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="university_name" class="form-control"
                                            value="{{ old('university_name', $university->university_name) }}" required>
                                    </div>

                                    <!-- ESTD -->
                                    <div class="col-md-6 mb-3">
                                        <label for="estd">Established Year (Estd) <span class="text-danger">*</span></label>
                                        <input type="text" name="estd" class="form-control"
                                            value="{{ old('estd', $university->estd) }}" required>
                                    </div>

                                    <!-- Rank -->
                                    <div class="col-md-6 mb-3">
                                        <label for="rank">University Rank <span class="text-danger">*</span></label>
                                        <input type="text" name="rank" class="form-control"
                                            value="{{ old('rank', $university->rank) }}" required>
                                    </div>

                                    <!-- Banner Image -->
                                    <div class="col-md-6 mb-3">
                                        <label for="banner_img">Banner Image</label>
                                        <input type="file" name="banner_img" class="form-control" accept="image/*">
                                        @if ($university->banner_img)
                                            <div class="mt-2">
                                                <img src="{{ asset($university->banner_img) }}" alt="Banner" height="80">
                                            </div>
                                        @endif
                                        <small class="text-muted">Allowed: .jpg, .jpeg, .png, .webp | Max: 2MB</small>
                                    </div>

                                    <!-- Logo Image -->
                                    <div class="col-md-6 mb-3">
                                        <label for="logo_img">Logo Image</label>
                                        <input type="file" name="logo_img" class="form-control" accept="image/*">
                                        @if ($university->logo_img)
                                            <div class="mt-2">
                                                <img src="{{ asset($university->logo_img) }}" alt="Logo" height="60">
                                            </div>
                                        @endif
                                        <small class="text-muted">Allowed: .jpg, .jpeg, .png, .webp | Max: 2MB</small>
                                    </div>
                                </div>

                                <!-- University Website -->
                                <div class="col-md-6 mb-3">
                                    <label>University Website (Optional)</label>
                                    <input type="url" name="university_link" class="form-control"
                                        placeholder="https://www.universityname.edu"
                                        value="{{ old('university_link', $university->university_link) }}">
                                </div>

                                    <!-- Region Type -->
                                    <div class="col-md-6 mb-3">
                                        <label>Region Type <span class="text-danger">*</span></label>
                                        <select name="region_type" class="form-control" required>
                                            <option value="Non-Regional" {{ old('region_type', $university->region_type) == 'Non-Regional' ? 'selected' : '' }}>Non-Regional</option>
                                            <option value="Regional" {{ old('region_type', $university->region_type) == 'Regional' ? 'selected' : '' }}>Regional</option>
                                        </select>
                                    </div>

                                    <!-- University Info -->
                                    <div class="col-md-12 mb-3">
                                        <label>University Info</label>
                                        <textarea name="description" class="summernote form-control" rows="5">{{ old('description', $university->description) }}</textarea>
                                    </div>
                                </div>

                                <!-- Popular University -->
                                <div class="col-md-6 mb-3 d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_popular" class="form-check-input" id="is_popular"
                                            value="1" {{ old('is_popular', $university->is_popular) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_popular">Display in Popular
                                            University</label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('university.index') }}" class="btn btn-light">Cancel</a>
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