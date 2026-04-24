@extends('admin.layout.app')
@section('title', 'Add Google Review')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add Google Review</h4>
                            <form action="{{ route('google-reviews.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Student Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>University <span class="text-danger">*</span></label>
                                        <input type="text" name="university" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Review <span class="text-danger">*</span></label>
                                        <textarea name="reviews" class="form-control" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Save Review</button>
                                <a href="{{ route('google-reviews.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection