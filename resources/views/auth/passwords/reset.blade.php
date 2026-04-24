@extends('layout.app')
@section('title', 'Educircle.io - Reset Password')

<div class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        {{-- <a href="{{ url('/') }}">
                            <img src="{{ asset('theme/images/logo.png') }}" height="40" alt="Educircle Logo" style="margin-bottom: 1rem;">
                        </a> --}}
                        <h4 style="color: #2c3e50; font-weight: 600;">Reset Your Password</h4>
                        <p class="text-muted">Enter your new password below</p>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-dark">Email</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ $email ?? old('email') }}" required autofocus
                                   placeholder="Enter your email"
                                   style="height: 45px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: none;">
                            @error('email')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-dark">New Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror pe-5"
                                       placeholder="Enter new password" required
                                       style="height: 45px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: none;">
                                <button type="button" id="togglePassword" 
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);
                                               background: transparent; border: none;">
                                    <i class="bi bi-eye-slash" id="toggleIcon" style="color: #6c757d;"></i>
                                </button>
                            </div>
                            @error('password')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold text-dark">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                   class="form-control" required
                                   placeholder="Re-enter new password"
                                   style="height: 45px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: none;">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2"
                                style="background-color: #5d69f6; border: none; font-weight: 500;">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
