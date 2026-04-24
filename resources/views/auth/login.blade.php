@extends('new_layout.app')

@section('title', 'Login - Educircle.io')
@section('body_class', 'auth-page')

@push('header_script')
    <!-- Custom CSS (at the top as requested) -->
    <link rel="stylesheet" href="{{ asset('home_new/css/auth.css') }}?v={{ time() }}">
    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Adjust for fixed navbar when layout is included */
        .login-page-wrapper {
            padding-top: 140px;
        }
    </style>
@endpush

@section('content')
<div class="auth-page-content bg-alice-blue-custom">
    <!-- Watermark Background -->
    <img src="{{ asset('theme/images/logo.png') }}" class="login-watermark" alt="Watermark">

    <div class="login-page-wrapper">
        <div class="login-card" data-aos="zoom-in" data-aos-duration="1000">
            <a href="{{ url('/') }}">
                <img src="{{ asset('theme/images/logo.png') }}" alt="Educircle" class="login-logo-mini" data-aos="fade-down"
                    data-aos-delay="200">
            </a>
            <h1 class="login-title" data-aos="fade-up" data-aos-delay="300">Welcome Back</h1>
            <p class="login-subtitle" data-aos="fade-up" data-aos-delay="400">Please enter your details to sign in</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group" data-aos="fade-up" data-aos-delay="500">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control form-control-pill @error('email') is-invalid @enderror" 
                        id="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback text-left d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group" data-aos="fade-up" data-aos-delay="600">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-pill @error('password') is-invalid @enderror" 
                        id="password" placeholder="••••••••" required>
                    @error('password')
                        <span class="invalid-feedback text-left d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="login-meta" data-aos="fade-up" data-aos-delay="700">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-login" data-aos="fade-up" data-aos-delay="800">
                    Log In
                </button>

                <p class="register-link" data-aos="fade-up" data-aos-delay="900">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Partner Universities Section (Above Footer) -->
<section class="section-padding pt-0 pb-5 bg-alice-blue-custom">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title border-0 mb-0"><span class="text-accent">Partner</span> <span
                    class="text-dark-blue">Universities</span></h2>
        </div>

        <div class="partner-slider-container">
            <div class="partner-slider owl-carousel owl-theme">
                @forelse($partnerLogos as $logo)
                    <div class="partner-logo-item">
                        <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->alt_text }}">
                    </div>
                @empty
                    <div class="partner-logo-item">
                        <p class="text-center text-muted">No partner logos available</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection

@push('footer_script')
    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 100
        });

        // Initialize Partner Slider
        $(document).ready(function () {
            $('.partner-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        });
    </script>
@endpush

