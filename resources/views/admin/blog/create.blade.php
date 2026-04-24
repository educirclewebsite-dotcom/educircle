@extends('admin.layout.app')
@section('title', 'Blog')
@section('content')


    @push('header_script')
        <link href="{{ asset('theme2/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

        <link href="{{ asset('theme2/assets/libs/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .datepicker {
                z-index: 1055 !important;
            }
        </style>
    @endpush
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Create Blog</h4>
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">


                                @csrf

                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        required>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Short Description <span class="text-danger">*</span></label>
                                    <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="full_description">Full Description <span class="text-danger">*</span></label>
                                    <textarea name="full_description" class="summernote" rows="6" required>{{ old('full_description') }}</textarea>
                                    @error('full_description')
                                        <small class="summernote">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="image">Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control-file" required>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="blog_date">Date <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="blog_date" class="form-control"
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

                                <div class="form-group">
                                    <label for="meta_title">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description<span class="text-danger">*</span></label>
                                    <textarea name="meta_description" class="form-control" rows="3" required>{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-right">

                                    <button type="submit" class="btn btn-primary">Create Blog</button>
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
     <script src="{{asset('theme2/assets/js/pages/form-editor.init.js')}}"></script>
@endpush

