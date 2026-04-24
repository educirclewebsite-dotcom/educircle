@extends('new_layout.app')

@section('title', 'Register - Educircle.io')

@push('header_script')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home_new/css/auth.css') }}?v={{ time() }}">
    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Adjust for fixed navbar when layout is included */
        .registar-page-wrapper {
            padding-top: 140px;
        }
    </style>
@endpush

@section('content')
<div class="auth-page-content">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <img src="{{ asset('theme/images/logo.png') }}" class="login-watermark" alt="Watermark">
    
    <div class="registar-page-wrapper">
        <div class="register-container" data-aos="fade-up" data-aos-duration="1000">
            <a href="{{ url('/') }}">
                <img src="{{ asset('theme/images/logo.png') }}" alt="Educircle" class="login-logo-mini" data-aos="fade-down" data-aos-delay="100">
            </a>
            <h2 class="register-welcome-title hero-title" data-aos="fade-down" data-aos-delay="200">
                <span style="color: #102C57;">EduCircle</span> <span style="color: #70A344;">Student Portal</span>
            </h2>
            <p class="register-hero-desc" data-aos="fade-up" data-aos-delay="200">Access personalised guidance for
                Australian university applications, GS
                preparation, and document planning.</p>
            <p class="register-subtitle" data-aos="fade-up" data-aos-delay="300">Register to access your personalised
                student dashboard</p>

            <div class="register-inner-card" data-aos="zoom-in" data-aos-delay="400">
                <!-- Registration Flow -->
                <div id="otpSection">
                    <form onsubmit="return false;">
                        <div class="form-group mb-4">
                            <label for="userEmail">Email Address</label>
                            <input type="email" id="userEmail" class="form-control form-control-pill" 
                                placeholder="Enter your email address" required>
                        </div>

                        <button type="button" id="beginButton" class="btn btn-register-send mb-4">
                            Verify & Get Started
                        </button>

                        <span class="trust-line mb-4 text-center d-block">
                            <i class="fas fa-lock text-muted"></i> Your information is secure and used only for application guidance purposes.
                        </span>
                    </form>
                </div>

                <!-- Password/Account Details Section (Initially Hidden) -->
                <form method="POST" action="{{ route('signup.store') }}" style="display:none;" id="passwordSection">
                    @csrf
                    <h3 class="register-inner-title">Create Your Account</h3>
                    
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control form-control-pill" readonly>
                    </div>

                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control form-control-pill" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                        <label>Create Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-pill" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control form-control-pill" placeholder="Confirm Password" required>
                        <p id="passwordError" style="color:red; display:none; font-size: 0.8rem; margin-top: 5px;">
                            Passwords don't match!
                        </p>
                    </div>

                    <button type="submit" class="btn btn-register-send mb-4">
                        Complete Registration
                    </button>
                </form>

                <div id="accountBenefits">
                    <h3 class="register-inner-title">Create Your Free Student Account</h3>

                    <!-- Why Create Account Section -->
                    <div class="why-account-section">
                        <span class="why-account-title">Why Create an Account?</span>
                        <ul class="features-list">
                            <li data-aos="fade-left" data-aos-delay="500"><i class="fas fa-check-circle"></i> Track your
                                course shortlist</li>
                            <li data-aos="fade-left" data-aos-delay="600"><i class="fas fa-check-circle"></i> Get GS/SOP
                                preparation guidance</li>
                            <li data-aos="fade-left" data-aos-delay="700"><i class="fas fa-check-circle"></i> Upload and
                                organise documents and apply to Universities
                            </li>
                            <li data-aos="fade-left" data-aos-delay="800"><i class="fas fa-check-circle"></i> Access
                                webinar recordings & checklists</li>
                            <li data-aos="fade-left" data-aos-delay="900"><i class="fas fa-check-circle"></i> Receive
                                structured financial documentation tips</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <p class="register-link text-center mt-4">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</div>

<!-- OTP Modal -->
<div id="otpModal" class="modal" style="display:none; position: fixed; top: 0; left: 0; width:100%; height:100%; background: rgba(0,0,0,0.6); z-index: 9999;">
    <div class="modal-content" style="width: 100%; max-width: 500px; margin: 100px auto; padding: 40px; border-radius: 20px; background: #fff; box-shadow: 0 10px 40px rgba(0,0,0,0.2); position: relative; border: none;">
        <span onclick="closeModal()" style="position: absolute; top: 15px; right: 20px; font-size: 28px; font-weight: bold; cursor: pointer; color: #666;">&times;</span>
        
        <div id="otpInputSection">
            <h3 style="text-align: center; font-weight: 800; color: #102C57; margin-bottom: 20px;">Verify OTP</h3>
            <p style="text-align: center; color: #6b7280; font-weight: 500;">We've sent a 6-digit code to <br><strong id="displayEmail" style="color: #102C57;"></strong></p>

            <div id="otpContainer" style="display:flex; gap:10px; justify-content:center; margin-top: 30px;">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
                <input type="text" class="otp-input-field" maxlength="1" inputmode="numeric" autocomplete="off">
            </div>
            
            <button id="verifyOtpButton" class="btn btn-register-send mt-4">
                Verify & Continue
            </button>

            <p style="margin-top:20px; text-align:center; color: #6b7280; font-weight: 500;" id="resendContainer">
                Resend OTP in <strong id="countdown">30</strong> seconds
            </p>
        </div>
    </div>
</div>

<style>
    .otp-input-field {
        width: 50px;
        height: 60px;
        font-size: 24px;
        text-align: center;
        border: 1.5px solid #d0d8e0;
        border-radius: 12px;
        background: #f9fafb;
        transition: all 0.3s ease;
        font-weight: 700;
        color: #102C57;
    }
    .otp-input-field:focus {
        border-color: #0081FA;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 129, 250, 0.15);
        outline: none;
        transform: scale(1.05);
    }
</style>

    </div>

    <!-- Partner Universities Section (Above Footer) -->
    <section class="section-padding pt-0 pb-5">
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

        function closeModal() {
            $('#otpModal').fadeOut();
        }

        document.querySelectorAll('.otp-input-field').forEach((input, index, allInputs) => {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1);
                if (this.value && index < allInputs.length - 1) {
                    allInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === "Backspace" && !this.value && index > 0) {
                    allInputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = (e.clipboardData || window.clipboardData).getData('text').trim();
                if (/^\d{6}$/.test(pasteData)) {
                    allInputs.forEach((box, i) => box.value = pasteData[i] || '');
                    allInputs[allInputs.length - 1].focus();
                }
            });
        });

        let countdownInterval;
        function startCountdown() {
            let timeLeft = 30;
            $('#resendContainer').html('Resend OTP in <strong id="countdown">30</strong> seconds');
            const countdown = $('#countdown');

            clearInterval(countdownInterval);
            countdownInterval = setInterval(() => {
                timeLeft--;
                countdown.text(timeLeft);
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    $('#resendContainer').html('<a href="#" onclick="resendOtp()" style="color: #0081FA; font-weight: 700;">Resend OTP</a>');
                }
            }, 1000);
        }

        $('#beginButton').on('click', function() {
            const email = $('#userEmail').val().trim();
            if (!email) return alert('Please enter your email.');

            $.post("{{ route('send.Otp') }}", {
                email,
                _token: '{{ csrf_token() }}'
            });

            $('#displayEmail').text(email);
            $('#otpModal').fadeIn();
            startCountdown();
        });

        $('#verifyOtpButton').on('click', function() {
            const email = $('#userEmail').val().trim();
            const otp = $('.otp-input-field').map(function() {
                return this.value;
            }).get().join('');

            if (otp.length < 6) return alert('Please enter the full 6-digit OTP.');

            $.post("{{ route('verify.Otp') }}", {
                email,
                otp,
                _token: '{{ csrf_token() }}'
            }).done(function(response) {
                if (response.success) {
                    $('#passwordSection input[name="email"]').val(email);
                    $('#otpSection, #otpModal, #accountBenefits').hide();
                    $('#passwordSection').show();
                    $('.register-subtitle').text('Please complete your profile details below');
                } else {
                    alert(response.message || 'Invalid OTP.');
                }
            });
        });

        function resendOtp() {
            const email = $('#userEmail').val().trim();
            if (!email) return alert('Please enter your email.');

            $.post("{{ route('send.Otp') }}", {
                email,
                _token: '{{ csrf_token() }}'
            }, function() {
                $('.otp-input-field').val('').first().focus();
                startCountdown();
            });
        }

        $('#passwordSection').on('submit', function(e) {
            const password = $('#password').val();
            const confirmPassword = $('#confirmPassword').val();
            const passwordError = $('#passwordError');

            if (password !== confirmPassword) {
                e.preventDefault(); 
                passwordError.show();
            } else {
                passwordError.hide();
            }
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
