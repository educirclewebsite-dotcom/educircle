@extends('layout.app')
@section('title', 'Educircle.io - Forgot Password')

@section('content')
<div class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 style="color: #2c3e50; font-weight: 600;">Forgot Your Password?</h4>
                        <p class="text-muted">Enter your email and we'll send you a link to reset your password.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" value="{{ old('email') }}" required autofocus
                                style="height: 45px; border-radius: 8px; border: 1px solid #ced4da;">
                            @error('email')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2"
                            style="background-color: #5d69f6; border: none; font-weight: 500;">
                            Send Reset Link
                        </button>

                        <div class="text-center mt-3">
                            <p style="font-size: 0.9rem; color: #6c757d;">
                                Back to <a href="{{ route('login') }}" style="color: #5d69f6; text-decoration: none;">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
