@extends('admin.layout.app')
@section('title', 'Edit Google Review')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Google Review</h4>
                            <form action="{{ route('google-reviews.update', $review->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Student Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $review->name }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>University <span class="text-danger">*</span></label>
                                        <input type="text" name="university" class="form-control"
                                            value="{{ $review->university }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Review <span class="text-danger">*</span></label>
                                        <textarea name="reviews" class="form-control" rows="4"
                                            required>{{ $review->reviews }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                        @if($review->photo)
                                            <div class="mt-2">
                                                <img src="{{ asset($review->photo) }}" alt="Reviewer Photo" width="100">
                                            </div>
                                        @endif
                                    </div>
                                   
                                </div>
                                <button type="submit" class="btn btn-primary">Update Review</button>
                                <a href="{{ route('google-reviews.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection