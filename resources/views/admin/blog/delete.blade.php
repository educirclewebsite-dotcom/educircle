@extends('admin.layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            <h4 class="mb-0">Confirm Delete</h4>
                        </div>

                        <div class="card-body">
                            <p>Are you sure you want to delete the blog titled:</p>
                            <h5 class="text-danger">{{ $blog->title }}</h5>

                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
