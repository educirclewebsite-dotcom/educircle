@extends('admin.layout.app')
@section('title', 'Edit Blog')

@push('header_script')
    <link href="{{ asset('theme2/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .datepicker {
            z-index: 1055 !important;
        }


    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Header -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Blog</h4>
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('blog.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', $blog->title) }}" required>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Short Description -->
                                <div class="form-group">
                                    <label>Short Description <span class="text-danger">*</span></label>
                                    <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $blog->short_description) }}</textarea>
                                    @error('short_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Full Description -->
                                <div class="form-group">
                                    <label>Full Description <span class="text-danger">*</span></label>
                                    <textarea name="full_description" class="summernote" rows="6" required>{{ old('full_description', $blog->full_description) }}</textarea>
                                    @error('full_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">

                                    <!-- Image -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Blog Image</label>

                                        <input type="file" id="image" name="image" class="form-control">
                                        <small class="text-muted">Upload a new image to replace the existing one.</small>
                                         @if ($blog->image)
                                            <div class="mb-2">
                                                <img src="{{ asset('uploads/blog_images/' . $blog->image) }}"
                                                    alt="Current Image" width="150">
                                            </div>
                                        @endif
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Date -->
                                    <div class="form-group col-md-6">
                                        <label>Date <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="blog_date" class="form-control"
                                                value="{{ old('blog_date', \Carbon\Carbon::parse($blog->blog_date)->format('d-m-Y')) }}"
                                               data-provide="datepicker" data-date-format="dd-mm-yyyy"
                                                data-date-autoclose="true" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                        @error('blog_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Meta Title -->
                                <div class="form-group">
                                    <label>Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title', $blog->meta_title) }}" required>
                                    @error('meta_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Meta Description -->
                                <div class="form-group">
                                    <label>Meta Description <span class="text-danger">*</span></label>
                                    <textarea name="meta_description" class="form-control" rows="3" required>{{ old('meta_description', $blog->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update Blog</button>
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
    <script src="{{ asset('theme2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('theme2/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
