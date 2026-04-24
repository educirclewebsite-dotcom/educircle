@extends('layout.app')
@section('title', ' Contact-Educircle.io')
@push('header_script')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme2/assets/libs/toastr/build/toastr.min.css') }}">
@endpush
@section('content')
    <div class="contact-form-sec sec-pad r-bg-d">
        <div class="container">
            <div class="row flx-end">
                <div class="col-lg-6">
                    <div class="sec-heading m-center">
                        <span class="sub-heading mb15">INQUIRY</span>
                        <h2 class="mb15"><span>Trusted</span> by Thousands of Students</h2>
                        <p>Get in touch with us for any questions about courses, admissions, scholarships, GS/GTE, or
                            student visas. Our team is here to support students, parents, counsellors, and partners with
                            clear and accurate information.
                        </p>
                    </div>
                    <div class="trust-logo-block mt60">
                        <ul class="ree-card d-flex justify-content-center flex-wrap text-center">
                            <li class="mx-4 my-3"><i class="fas fa-graduation-cap fa-2x mb-2"></i>
                                <div>Course & University Guidance</div>
                            </li>
                            <li class="mx-4 my-3"><i class="fas fa-file-signature fa-2x mb-2"></i>
                                <div>Application Support</div>
                            </li>
                            <li class="mx-4 my-3"><i class="fas fa-hand-holding-usd fa-2x mb-2"></i>
                                <div>Scholarship Advice</div>
                            </li>
                            <li class="mx-4 my-3"><i class="fas fa-plane-departure fa-2x mb-2"></i>
                                <div>Visa Assistance</div>
                            </li>
                            <li class="mx-4 my-3"><i class="fas fa-house-user fa-2x mb-2"></i>
                                <div>Accommodation & Pre-Departure Help</div>
                            </li>
                            <li class="mx-4 my-3"><i class="fas fa-handshake fa-2x mb-2"></i>
                                <div>Partner & School Support</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form id="leadForm" action="{{ route('lead_store') }}" method="POST" name="feedback-form">
                        @csrf
                        <div class="form-contact-hom fourc-up-b">
                            <div class="form-block">
                                <div class="form-head">
                                    <h4>Please fill in the form below — our team will contact you soon.</h4>
                                </div>
                                <div class="form-body">
                                    <div class="fieldsets row">
                                        <div class="col-md-6"><input type="text" placeholder="Full Name" name="name">
                                        </div>
                                        <div class="col-md-6"><input type="email" placeholder="Email Address" name="email">
                                        </div>
                                    </div>
                                    <div class="fieldsets row">
                                        <div class="col-md-6"><input type="text" placeholder="Contact Number"
                                                name="contact_number"></div>
                                        <div class="col-md-6"><input type="text" placeholder="WhatsApp Number"
                                                name="whatsapp_number"></div>
                                    </div>
                                    <div class="fieldsets row">
                                        <div class="col-md-12"><input type="text" placeholder="Subject" name="subject">
                                        </div>


                                    </div>
                                    <div class="fieldsets">
                                        <textarea placeholder="Message" name="message"></textarea>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1"
                                            checked="checked">
                                        <label class="custom-control-label label-f-form" for="customCheck">I agree to the <a
                                                href="javascript:void(0)">Terms &amp; Conditions</a> of Educircle.</label>
                                    </div>
                                    <div class="fieldsets mt20">
                                        <button type="submit" name="submit" class="ree-btn ree-btn-grdt1 w-100">Send your
                                            inquiry <i class="fas fa-arrow-right fa-btn"></i></button>
                                    </div>
                                    <p class="trm"><i class="fas fa-lock"></i>We respect your privacy and your
                                        information is kept fully confidential.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="location-home sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="location-block- mt60">
                        <div class="loc-icon-nam">
                            <img src="{{ asset('theme/images/icons/new-delhi.svg') }}" alt="new-delhi">
                            <p><span>India</span></p>
                        </div>
                        <p class="pt20 pb20">Level 3, Landmark Cyber Park, Space Creattors Heights, Sector 67,
                            Gurugram, Haryana 122101
                        </p>
                        <div class="loc-contct">
                            <a href="https://www.google.com/maps?q=Level+3,+Landmark+Cyber+Park,+Sector+67,+Gurugram+122101"
                                target="_blank" class="btn-outline rount-btn ml-2" data-toggle="tooltip"
                                title="Map Location">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                            <a href="tel:+918130820084" target="_blank" class="btn-outline rount-btn" data-toggle="tooltip"
                                title="Phone Number">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                            <a href="mailto:admissions@educircle.io" target="_blank" class="btn-outline rount-btn"
                                data-toggle="tooltip" title="Email Address">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="location-block- mt60">
                        <div class="loc-icon-nam">
                            <img src="{{ asset('theme/images/icons/burj-al-arab.svg') }}" alt="burj-al-arab">
                            <p><span>Australia</span></p>
                        </div>
                        <p class="pt20 pb20">
                            1601, 265 Exhibition st, Melbourne 3000
                        </p>
                        <div class="loc-contct">
                            <a href="https://www.google.com/maps?q=1601,+265+Exhibition+St,+Melbourne+3000" target="_blank"
                                class="btn-outline rount-btn ml-2" data-toggle="tooltip" title="Map Location">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                            <a href="tel:+61449554542" target="_blank" class="btn-outline rount-btn" data-toggle="tooltip"
                                title="Phone Number">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                            <a href="mailto:admissions@educircle.io" target="_blank" class="btn-outline rount-btn"
                                data-toggle="tooltip" title="Email Address">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer_script')
    <script src="{{ asset('theme2/assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script>
        $(document).on('submit', '#leadForm', function (e) {
            e.preventDefault();

            let form = $(this);
            let btn = form.find('button[type="submit"]');

            if (btn.prop('disabled')) {
                return;
            }

            btn.prop('disabled', true).html('Sending... <i class="fas fa-spinner fa-spin"></i>');

            let url = form.attr('action');
            let data = form.serialize();

            $.ajax({
                url: url,
                type: "POST",
                data: data,

                success: function (response) {
                    btn.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right fa-btn"></i>');

                    toastr["success"]("Your inquiry has been submitted successfully!");

                    toastr.options = {
                        "closeButton": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "timeOut": 4000,
                    };

                    form[0].reset();
                },

                error: function (xhr) {
                    btn.prop('disabled', false).html('Send your inquiry <i class="fas fa-arrow-right fa-btn"></i>');

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let msg = "";

                        $.each(errors, function (key, val) {
                            msg += val + "<br>";
                        });

                        toastr["error"](msg);

                        toastr.options = {
                            "closeButton": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "timeOut": 5000,
                        };

                    } else {
                        toastr["error"]("Something went wrong. Please try again.");

                        toastr.options = {
                            "positionClass": "toast-top-right",
                        };
                    }
                }
            });
        });
    </script>
@endpush