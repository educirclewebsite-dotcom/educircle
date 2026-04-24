@extends('layout.app')
@section('title', $scholarship->title . ' - Scholarship Details')

@section('content')

    <style>
        html {
            scroll-behavior: smooth;
        }

        .sticky-tabs {
            position: sticky;
            top: 70px;
            background-color: #fff;
            z-index: 1000;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .sticky-tabs .nav-link {
            font-weight: 500;
            color: #444;
            padding: 10px 20px;
            margin: 0 8px;
            border-radius: 0;
        }

        .sticky-tabs .nav-link.active {
            color: #83bb40;
            border-bottom: 3px solid #83bb40;
        }

        .section-card {
            border: 1px solid #83bb40;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
            padding: 25px;
            margin-bottom: 40px;
        }

        .apply-btn {
            background: #83bb40;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .apply-btn:hover {
            background: #6ea330;
            color: #fff;
        }

        .section-card ul li {
            margin-bottom: 10px;
        }

        .section-card h4 {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .sticky-tabs {
                overflow-x: auto;
                white-space: nowrap;
            }

            .sticky-tabs .nav-link {
                padding: 8px 10px;
                font-size: 14px;
            }

            .d-flex.flex-wrap {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .d-flex img {
                margin-bottom: 15px;
            }
        }
    </style>

    <section class="mt-5 py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center flex-wrap mb-4 mt-3">
                <div class="d-flex align-items-center">
                    <h2 class="fw-bold mb-0" data-aos-delay="200" style="font-size: 24px; color: #444;">
                        {{ $scholarship->title }}
                    </h2>
                </div>
                {{--
                <a href="{{ route('register') }}" class="apply-btn btn btn-primary" style="padding: 10px 20px;">
            Apply Now
          </a>  --}}
            </div>
            <div class="sticky-tabs mb-4">
                <ul class="nav justify-content-center flex-nowrap">
                    <li class="nav-item"><a class="nav-link active" href="#general">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#eligibility">Eligibility</a></li>
                    <li class="nav-item"><a class="nav-link" href="#description">Description</a></li>
                    <li class="nav-item"><a class="nav-link" href="#application">Application</a></li>
                </ul>
            </div>
            <div id="general" class="section-card">
                <h4>General Details</h4>
                <ul class="list-unstyled">
                    <li><strong>University Name:</strong>
                        {{ $scholarship->universityCourse->university->university_name ?? '-' }}</li>
                    <li><strong>Country Name:</strong>
                        {{ $scholarship->universityCourse->university->country->name ?? '-' }}
                    </li>
                    <li><strong>Scholarship Name:</strong> {{ $scholarship->title }}</li>
                    <li><strong>Total Amount:</strong> {{ $scholarship->amount ?? 'N/A' }}</li>
                    <li><strong>Level of Education:</strong>
                        {{ ucfirst($scholarship->courseInfo->course->course_type ?? '-') }}</li>
                    {{-- <li><strong>Course:</strong> {{ $scholarship->courseInfo->course->course_name ?? '-' }}</li> --}}
                </ul>
            </div>

            <div id="eligibility" class="section-card">
                <h4>Eligibility</h4>
                {!! $scholarship->eligibility ?? '<p>No eligibility information available.</p>' !!}
            </div>


            <div id="description" class="section-card">
                <h4>Scholarship Description</h4>
                {!! $scholarship->description ?? '<p>No description available.</p>' !!}
            </div>


            <div id="application" class="section-card">
                <h4>Application Process</h4>

                @if ($scholarship->application_link)
                    <a href="{{ $scholarship->application_link }}" target="_blank" class="btn btn-primary">
                        Apply Now
                    </a>
                @else
                    <p>Application link will be available soon.</p>
                @endif
            </div>

        </div>
    </section>
@endsection

@push('footer_script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.sticky-tabs .nav-link');
            const sections = document.querySelectorAll('.section-card');

            window.addEventListener('scroll', () => {
                let scrollPos = window.scrollY + 130;
                sections.forEach((section, i) => {
                    if (scrollPos >= section.offsetTop) {
                        navLinks.forEach(link => link.classList.remove('active'));
                        navLinks[i].classList.add('active');
                    }
                });
            });
        });
    </script>
@endpush
