@extends('new_layout.app')
@section('title', 'Contact Us - Educircle.io')

@section('content')

    {{-- =============================================
    HERO SECTION: Trusted by Thousands of Students
    ============================================= --}}
    <section class="bg-alice-blue-custom contact-hero" style="padding: 180px 0 100px;">
        <div class="container">
            {{-- Hero Headline (spans full width above the two columns) --}}
            <h1 class="hero-title mb-4 font-weight-bold">
                <span class="text-accent">Trusted by</span> <br>
                <span class="text-dark-blue">Thousands of Students</span>
            </h1>
            <div class="row align-items-center">

                {{-- Left: Sub-text + Service Grid --}}
                <div class="col-lg-6 mb-5 mb-lg-0 pr-lg-5">
                    <p class="mb-5 lead text-muted" style="font-size: 1.1rem; line-height: 1.6;">
                        Get in touch with us for any questions about courses, admissions, scholarships, GS/GTE, or
                        student visas. Our team is here to support students, parents, counsellors, and partners
                        with clear and accurate information.
                    </p>

                    <div class="service-grid-card">
                        <div class="row">
                            {{-- Item 1 --}}
                            <div class="col-6">
                                <div class="service-grid-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p>Course &amp; University Guidance</p>
                                </div>
                            </div>
                            {{-- Item 2 --}}
                            <div class="col-6">
                                <div class="service-grid-item">
                                    <i class="fas fa-user-edit"></i>
                                    <p>Application Support</p>
                                </div>
                            </div>
                            {{-- Item 3 --}}
                            <div class="col-6">
                                <div class="service-grid-item">
                                    <i class="fas fa-hand-holding-usd"></i>
                                    <p>Scholarship Advice</p>
                                </div>
                            </div>
                            {{-- Item 4 --}}
                            <div class="col-6">
                                <div class="service-grid-item">
                                    <i class="fas fa-plane"></i>
                                    <p>Visa Assistance</p>
                                </div>
                            </div>
                            {{-- Item 5 --}}
                            <div class="col-6">
                                <div class="service-grid-item mb-0">
                                    <i class="fas fa-home"></i>
                                    <p>Accommodation &amp; Pre-Departure Help</p>
                                </div>
                            </div>
                            {{-- Item 6 --}}
                            <div class="col-6">
                                <div class="service-grid-item mb-0">
                                    <i class="fas fa-handshake"></i>
                                    <p>Partner &amp; School Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Contact Form --}}
                <div class="col-lg-6">
                    <div class="contact-form-container">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                    <div><i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form id="contactLeadForm" action="{{ route('lead_store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control form-control-minimal"
                                        placeholder="Full Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control form-control-minimal"
                                        placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="contact_number" class="form-control form-control-minimal"
                                        placeholder="Contact Number" value="{{ old('contact_number') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="whatsapp_number" class="form-control form-control-minimal"
                                        placeholder="WhatsApp Number" value="{{ old('whatsapp_number') }}" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="subject" class="form-control form-control-minimal"
                                    placeholder="Subject" value="{{ old('subject') }}" required>
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" class="form-control form-control-minimal textarea-minimal" rows="4"
                                    placeholder="Message" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group form-check mb-4 pl-4 d-flex align-items-center">
                                <input type="checkbox" class="form-check-input mt-0" id="termsCheck" name="terms"
                                    style="width: 18px; height: 18px;" checked required>
                                <label class="form-check-label small text-muted ml-3" for="termsCheck">
                                    I agree to the <span class="text-dark font-weight-bold">Terms &amp; Conditions</span>
                                    of Educircle.
                                </label>
                            </div>
                            <button type="submit" id="contactSubmitBtn" class="btn btn-green-solid btn-block py-3">
                                Send your inquiry <i class="fas fa-arrow-right ml-2 small"></i>
                            </button>
                            <div class="help-text-confidential text-center mt-3">
                                <i class="fas fa-lock small text-muted mr-2"></i>
                                <span class="small text-muted">We respect your privacy and your information is kept
                                    fully confidential.</span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =============================================
    GOOGLE REVIEWS CAROUSEL
    ============================================= --}}
    @isset($googleReviews)
    <section class="section-padding bg-alice-blue-custom position-relative">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="reviews-section-title">
                    What Students Say on <span class="text-accent">Google Reviews</span>
                </h2>
            </div>

            <div id="googleReviewsCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    @forelse($googleReviews as $index => $review)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-10">
                                    <div class="review-card p-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 text-center mb-4 mb-md-0">
                                                <div class="review-img-wrapper">
                                                    @if($review->photo)
                                                        <img src="{{ asset($review->photo) }}" alt="{{ $review->name }}"
                                                            class="review-img rounded-circle shadow-lg">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff"
                                                            alt="{{ $review->name }}" class="review-img rounded-circle shadow-lg">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-9 offset-lg-0">
                                                <div class="review-content">
                                                    <p class="review-text text-muted mb-4">"{{ $review->reviews }}"</p>
                                                    <h5 class="review-author font-weight-bold text-dark-blue mb-0">
                                                        {{ $review->name }}
                                                    </h5>
                                                    <p class="review-uni text-muted small mb-3">
                                                        {{ $review->university }}
                                                        @if($review->designation)
                                                            <span>, {{ $review->designation }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <div class="text-center p-5">
                                <p class="text-muted">No reviews available at the moment.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Custom Indicators --}}
                <ol class="carousel-indicators custom-indicators mt-4 position-relative">
                    @foreach($googleReviews as $index => $review)
                        <li data-target="#googleReviewsCarousel" data-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
    @endisset
    <section class="office-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold text-dark-blue" style="font-size: 2.5rem;">Office Locations</h2>
                <p class="text-muted">Visit us at our offices in India and Australia for personalized guidance.</p>
            </div>

            <div class="contact-info-box py-5 px-4 mb-5">
                <div class="row align-items-center">
                    <!-- India -->
                    <div
                        class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center justify-content-lg-end pr-lg-4 border-right-custom">
                        <div class="text-left" style="max-width: 352px;">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-circle-india mr-3">
                                    <i class="fas fa-gopuram fa-2x text-india-gold"></i>
                                </div>
                                <h3 class="font-weight-bold mb-0 text-dark-blue">India</h3>
                            </div>
                            <p class="text-muted mb-4 contact-address">Level 3, Landmark Cyber Park, Space Creattors<br>
                                Heights, Sector 67, Gurugram, Haryana 122101</p>
                            <div class="contact-icons-row d-flex">
                                <i class="fas fa-map-marker-alt mr-4 text-dark-icon"></i>
                                <i class="fas fa-phone-alt mr-4 text-dark-icon"></i>
                                <i class="fas fa-envelope text-dark-icon"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Australia -->
                    <div class="col-md-6 d-flex justify-content-center justify-content-lg-start pl-lg-4">
                        <div class="text-left" style="max-width: 352px;">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-circle-aus mr-3">
                                    <i class="fas fa-water fa-2x text-aus-blue"></i>
                                </div>
                                <h3 class="font-weight-bold mb-0 text-dark-blue">Australia</h3>
                            </div>
                            <p class="text-muted mb-4 contact-address">1601, 265 Exhibition st, Melbourne 3000</p>
                            <div class="contact-icons-row d-flex">
                                <i class="fas fa-map-marker-alt mr-4 text-dark-icon"></i>
                                <i class="fas fa-phone-alt mr-4 text-dark-icon"></i>
                                <i class="fas fa-envelope text-dark-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('footer_script')
    <script>
        $(document).on('submit', '#contactLeadForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let btn = form.find('button[type="submit"]');

            if (btn.prop('disabled')) return;

            btn.prop('disabled', true).html('Sending... <i class="fas fa-spinner fa-spin"></i>');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },

                success: function (response) {
                    btn.prop('disabled', false)
                        .html('Send your inquiry <i class="fas fa-arrow-right ml-2 small"></i>');

                    toastr.options = {
                        closeButton: false,
                        progressBar: true,
                        positionClass: 'toast-top-right',
                        timeOut: 5000,
                    };
                    toastr.success('Your inquiry has been submitted successfully! Our team will contact you shortly.');

                    form[0].reset();
                },

                error: function (xhr) {
                    btn.prop('disabled', false)
                        .html('Send your inquiry <i class="fas fa-arrow-right ml-2 small"></i>');

                    toastr.options = {
                        closeButton: false,
                        progressBar: false,
                        positionClass: 'toast-top-right',
                        timeOut: 5000,
                    };

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let msg = '';
                        $.each(errors, function (key, val) { msg += val[0] + '<br>'; });
                        toastr.error(msg);
                    } else {
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });
        });
    </script>
@endpush