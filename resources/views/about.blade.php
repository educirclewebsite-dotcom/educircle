@extends('layout.app')
@section('title', ' About-Educircle.io')
@push('headerscript')
@endpush
@section('content')
    <section class="header-title head-opacity" data-background="{{ asset('theme/images/banner/office.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="mb15">About Us</h2>
                    <p class="h-light">Helping students make confident and informed study abroad decisions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-c sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-headings side-pghd">
                        <span class="sub-heading mb15">About Us</span>
                        <h2>Education hub - Educircle.Io</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h4 class="mb15">We are an Australian-led international education consultancy supporting your global
                        study journey</h4>
                    <p>Educircle.io is a trusted study-abroad consultancy specialising in Australian higher education
                        and global university admissions. Founded and managed by professionals with strong
                        experience in admissions, student counseling, and visa guidance, we help students choose
                        the right course, university, and country for their future.</p>
                    <p class="mt15">Our team works closely with students, parents, counsellors, and schools to offer
                        transparent advice and personalised guidance. We simplify every step — from course selection and
                        university applications to scholarships, GS/GTE support, and student visas.</p>
                    <p class="mt15">At Educircle.io, our goal is simple:
                        to provide honest, reliable, and student-centric support so every learner can build a
                        successful international career with confidence.</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="company-stats2 roww mt30">
                                <div class="statsnum counter-number mt30">
                                    <p>Graduates</p> <span class="counter">5000</span> <span>+</span>
                                </div>
                                <div class="statsnum counter-number mt30">
                                    <p>Active Students</p> <span class="counter">500</span> <span>+</span>
                                </div>
                                <div class="statsnum counter-number mt30">
                                    <p>Number of Counsellors</p> <span class="counter">50</span><span>+</span>
                                </div>
                                <div class="statsnum counter-number mt30">
                                    <p>Years of Experience</p> <span class="counter">14</span><span>+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-x sec-pad pt90">

        <div class="sec-pad r-bg-x">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sol-img img-hover"> <a href="case-study-details.html"> <img
                                    src="{{ asset('theme/images/case-study/founder_img.jpg') }}" alt="cash study"
                                    class="img-fluid img-hor"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="page-heading ml25 m-mt30">
                            {{-- <span class="sub-heading2 mb15">Prateek Arora</span> --}}
                            <h2 data-aos="fade-up" data-aos-delay="400"><span>Prateek Arora</span>
                            </h2>
                            <h5 class="mb15"><a href="case-study-details.html">Founder & Director – Educircle.io
                                    QEAC Certified Education Counsellor | Australia-Based International Education Specialist
                                </a></h5>
                            <p>Prateek Arora is the Founder and Director–Partnerships at Educircle.io, an international
                                education consultancy built on transparency, ethics, and student-first guidance. Based in
                                Melbourne, Prateek brings over a decade of experience in student counselling, Australian
                                higher education, university partnerships, visa documentation, and GS/GTE compliance.</p>
                            <p class="mt15">His journey in international education began in 2014, when he started
                                counselling students
                                and supporting consultants in India. During these early years, he developed strong
                                foundations in student profiling, application preparation, and documentation accuracy.
                                Between 2018 and 2021, Prateek expanded his work into broader international admissions
                                across Australia, the UK, and Canada, strengthening his skills in SOP writing, visa
                                guidance,
                                and university network building.
                            </p>
                            <p class="mt15">In 2021, Prateek moved to Melbourne to gain deeper exposure to the Australian
                                education
                                system and employment landscape. Alongside his education career, he also built and
                                managed successful hospitality businesses in Melbourne, giving him real-world insight into
                                local industries, workplace expectations, employability trends, and the practical challenges
                                international students face when settling in Australia. This lived experience allows him to
                                guide students not only academically but also with realistic career and settlement advice.
                            </p>
                            <p class="mt15">Prateek is a QEAC Certified Education Counsellor, a member of IEAA
                                (International
                                Education Association of Australia), and an experienced professional in GS/GTE
                                documentation, SOP drafting, visa preparation, course mapping, and student
                                profiling. His strong partnerships with universities and education agents, combined with his
                                hands-on experience managing real student cases, help him deliver accurate, honest, and
                                high-quality guidance to every learner.</p>
                            <p class="mt15">Since 2023, Prateek has been leading the growth of Educircle.io — developing
                                it into a
                                complete digital platform with tools like a Course Finder, Mentor Marketplace, Application
                                Centre, Document Support System, Scholarship Database, and guided visa solutions. His
                                mission is simple:
                                <b>to provide honest, accurate, and stress-free support so every student and parent can
                                    make informed decisions with confidence.</b>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="r-bg-a sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <ul class="vrt-tabb nav nav-pills nav-pills-custom" id="pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <li>
                            <a class="nav-link active" id="mission-tab" data-toggle="pill" href="#pills-mission"
                                role="tab" aria-controls="pills-mission" aria-selected="true">
                                <i class="fas fa-rocket"></i> Our Mission</a>
                        </li>
                        <li>
                            <a class="nav-link" id="vision-tab" data-toggle="pill" href="#pills-vision" role="tab"
                                aria-controls="pills-vision" aria-selected="false">
                                <i class="far fa-eye"></i> Our Vision</a>
                        </li>
                        <li>
                            <a class="nav-link" id="comit-tab" data-toggle="pill" href="#pills-comit" role="tab"
                                aria-controls="pills-comit" aria-selected="false">
                                <i class="fas fa-hands-helping"></i> Our Commitment</a>
                        </li>
                        <li>
                            <a class="nav-link" id="value-tab" data-toggle="pill" href="#pills-value" role="tab"
                                aria-controls="pills-value" aria-selected="false">
                                <i class="fas fa-hand-peace"></i> Core Values</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="tab-content tab-bg" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-mission" role="tabpanel"
                            aria-labelledby="mission-tab">
                            <h3 class="mb15">Our Mission</h3>
                            <p>To guide students with honest advice, clear information, and personalised support so they can
                                make confident decisions about their international education journey.
                            </p>
                            <p class="mt15">We aim to simplify the study abroad process for students, parents, and
                                counsellors by offering transparent guidance on courses, universities, applications,
                                scholarships, and visas.

                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="vision-tab">
                            <h3 class="mb15">Our Vision</h3>
                            <p>To be one of the most trusted and student-focused global education consultancies, known for
                                accuracy, integrity, and strong expertise in Australian and international admissions.
                            </p>
                            <p class="mt15">We envision a future where every student — regardless of background — has
                                access to reliable information, quality counselling, and equal opportunities to study
                                abroad.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-comit" role="tabpanel" aria-labelledby="comit-tab">
                            <h3 class="mb15">Our Commitment</h3>
                            <p>Providing honest, accurate, and up-to-date guidance to every student.
                            </p>
                            <p class="mt15">Supporting students at every stage — from choosing the right course to visa
                                approval.
                                Maintaining strong relationships with universities, schools, and counsellors.
                            </p>
                            <p class="mt15">Your goals become our priority from day one.
                            </p>
                            <p class="mt15">Ensuring a smooth, stress-free process for families through timely
                                communication and complete transparency.
                                Your goals become our priority from day one.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-value" role="tabpanel" aria-labelledby="value-tab">
                            <h3 class="mb15">Core Values</h3>
                            <p>Integrity – We give truthful advice, even if it means guiding students in a different
                                direction.
                            </p>
                            <p class="mt15">Transparency – Clear processes, clear documentation, and no hidden details.
                                Student-First Approach – Every recommendation is tailored to your academic goals and future
                                career.
                            </p>
                            <p class="mt15">Accuracy – Guidance backed by real experience with universities and visa
                                processes.
                                Respect & Empathy – We support students and parents with patience, care, and understanding.
                            </p>
                            <p class="mt15">Collaboration – We work closely with universities, schools, and counsellors
                                to offer the best opportunities.
                            </p>
                            <p class="mt15">These values guide everything we do at Educircle.io.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="r-bg-x sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="page-headings">
                        <h2>Transparency and Ethics</h2>
                        <p class="mt15">We follow clear, honest, and ethical practices in every step of the student
                            journey — from counselling and applications to scholarships and visa guidance. Our priority is
                            to
                            maintain trust with students, parents, universities, and partners.</p>
                    </div>
                </div>
            </div>
            <div class="row mt30">
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/target.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Student-First Guidance</h3>
                            <p>We always recommend the right course, university, and country based on the student’s profile,
                                goals, and budget.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/fast-time.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Timely Application Support</h3>
                            <p>We ensure students receive clear instructions, timely updates, and complete support during
                                applications, documentation, and visa preparation.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/united.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Transparent Communication</h3>
                            <p>We maintain open and honest communication with students, parents, and counsellors so
                                everyone stays informed at every step.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/team.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Ethical Practices</h3>
                            <p>We follow strict ethical guidelines when providing advice, handling documents, or working
                                with universities and education partners.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/partnership.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Community & Partner Engagement</h3>
                            <p>We work closely with universities, schools, and counsellors to provide updated information,
                                real opportunities, and strong support for students.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="ree-card r-bg-c mt60">
                        <div class="ree-card-img"><img src="{{ asset('theme/images/icons/qualitys.svg') }}"
                                alt="education service"></div>
                        <div class="ree-card-content mt40">
                            <h3 class="mb15">Quality Assurance</h3>
                            <p>We maintain high service standards by staying updated with university policies, visa rules,
                                GS/GTE requirements, and industry changes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="r-bg-a sec-pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Why Choose Educircle.io?</h4>

                    <p class="mt15"><strong>•</strong> Australia-Focused Expertise – Deep understanding of Australian
                        universities, GS/GTE
                        requirements, scholarships, and visa systems.</p>

                    <p class="mt15"><strong>•</strong> Honest & Transparent Guidance – We recommend only those options
                        that genuinely fit
                        the student’s profile and long-term goals.</p>

                    <p class="mt15"><strong>•</strong> Strong University Partnerships – Access to updated course
                        information, faster
                        application processing, and exclusive opportunities.</p>

                    <p class="mt15"><strong>•</strong> Real Experience in Australia – Practical knowledge of job markets,
                        career pathways,
                        and student life.</p>

                    <p class="mt15"><strong>•</strong> Personalised Case Handling – Every student receives tailored
                        support from
                        assessment to visa approval.</p>

                    <p class="mt15"><strong>•</strong> Fast Response & Documentation Accuracy – Clear communication and
                        professionally
                        prepared applications, SOPs, and GS/GTE responses.</p>

                    <p class="mt15"><strong>•</strong> End-to-End Support – From counseling to arrival planning and
                        post-admission
                        assistance.</p>
                </div>

                <div class="col-lg-6 m-mt30">
                    <h4>Our Approach</h4>
                    <p class="mt15"><strong>Step 1: Understanding Your Profile</strong><br>
                        We review your academics, interests, goals, and budget to identify the best options.</p>
                    <p class="mt15"><strong>Step 2: Course & University Shortlisting</strong><br>Based on your strengths
                        and future career plans.
                    </p>
                    <p class="mt15"><strong>Step 3: Application Preparation</strong><br>We assist with documentation,
                        SOP/GS answers, LORs, and application submissions.</p>
                    <p class="mt15"><strong>Step 4: Scholarship & Financial Guidance
                        </strong><br>We help students maximise scholarship opportunities and financial planning.</p>
                    <p class="mt15"><strong>Step 5: Visa Guidance</strong><br>Complete help with GS/GTE, financial
                        documents, COE process, and visa lodgement.</p>
                    <p class="mt15"><strong>Step 6: Pre-Departure & Post-Arrival Support</strong><br>Accommodation,
                        health insurance, airport assistance, and settling-in support.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="home-partners-block r-bg-x sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-heading text-center pera-block">
                        <h2>Partner <span>Universities</span></h2>
                    </div>
                </div>
            </div>
            <div class="row mt30 justify-content-center">
                <ul class="row text-center clearfix list-unstyled w-100">
                    @php
                        $logos = [
                            'theme/images/brand-logo/client_logo-1.png',
                            'theme/images/brand-logo/client_logo-2.png',
                            'theme/images/brand-logo/client_logo-3.png',
                            'theme/images/brand-logo/client_logo-4.png',
                            'theme/images/brand-logo/client_logo-5.png',
                            'theme/images/brand-logo/client_logo-6.png',
                            'theme/images/brand-logo/client_logo-7.png',
                            'theme/images/brand-logo/client_logo-8.png',
                        ];
                    @endphp

                    <div class="owl-carousel owl-theme" id="logo-carousel">
                        @foreach ($logos as $logo)
                            <div class="item d-flex justify-content-center align-items-center">
                                <img src="{{ asset($logo) }}" alt="client logo"
                                    style="max-height:80px; object-fit:contain;">
                            </div>
                        @endforeach
                    </div>

                </ul>
            </div>
        </div>
    </section>

@endsection
@push('footer_script')
<script>
    $(document).ready(function() {
    $('#logo-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 2 },
            576: { items: 3 },
            768: { items: 4 },
            992: { items: 5 },
            1200: { items: 6 }
        }
    });
});
    </script>
@endpush
