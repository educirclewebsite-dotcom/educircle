@extends('student.layout.app')
@section('title', 'Student Profile')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-white text-start py-3">
                                    <h4 class="mb-0 fw-bold">Update Profile</h4>
                                </div>

                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf

                                    <div class="card-body">


                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                                class="form-control" required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-white text-start py-3">
                                    <h4 class="mb-0 fw-bold">Change Password</h4>
                                </div>

                                <form action="{{ route('profile.update_password') }}" method="POST">
                                    @csrf

                                    <div class="card-body">



                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @if ($errors->has('old_password'))
                                                        <li>Old password is incorrect</li>
                                                    @endif
                                                    @if ($errors->has('password'))
                                                        <li>{{ $errors->first('password') }}</li>
                                                    @endif
                                                    @if ($errors->has('password_confirmation'))
                                                        <li>Passwords do not match</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
