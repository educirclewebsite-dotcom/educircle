<!-- Footer -->


<!-- New Footer -->
<footer
    class="footer-new text-white position-relative {{ (Request::is('/') || Request::is('home') || Request::is('contact*') || Request::is('scholarship*') || Request::is('university*') || Request::is('universities*') || Request::is('*course*') || Request::is('*login*') || Request::is('*register*') || Request::is('*signup*')) ? 'footer-no-contact' : '' }}">
    <div class="container">
        <div class="row">
            <!-- Col 1: Brand & Social -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <a href="{{ route('home') }}" class="d-inline-block mb-3 text-decoration-none">
                    <img src="{{ asset('home_new/images/logo_footer.png') }}" alt="educircle.io" class="img-fluid"
                        style="max-height: 45px;">
                </a>
                <p class="text-light-gray mb-4 small" style="line-height: 1.6; font-size: 0.95rem;">
                    Join over 10,000 students<br>
                    who trust educircle for their<br>
                    learning journey.
                </p>
                <p class="mb-2 small font-weight-bold follow-more-label">Follow For More</p>
                <div class="social-icons-footer d-flex">
                    <a href="https://www.facebook.com/share/1DBRFVmTai/" class="social-btn facebook mr-3"
                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/educircle.io?igsh=MTVreGRjdWx4c3F3Mw=="
                        class="social-btn instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/educircle-io/" class="social-btn linkedin mr-3"
                        target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://youtube.com/@studywitheducircle?si=8bsEdTv_UrfNilxh" class="social-btn youtube"
                        target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Col 2: Contact Us -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-white">Contact Us</h5>
                <ul class="list-unstyled footer-contact-list">
                    <li class="mb-2"><a href="tel:+918130820084" class="text-light-gray small">+918130820084</a>
                    </li>
                    <li class="mb-2"><a href="tel:+61449554542" class="text-light-gray small">+61449554542</a></li>
                    <li><a href="mailto:admissions@educircle.io" class="text-light-gray small">admissions@educircle.io</a></li>
                </ul>
            </div>

            <!-- Col 3: About Educircle -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-white">About Educircle</h5>
                <ul class="list-unstyled footer-links small">
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-light-gray">About Us</a></li>
                    <li class="mb-2"><a href="{{ route('course.program') }}" class="text-light-gray">Courses</a></li>
                    <li class="mb-2"><a href="{{ route('blog') }}" class="text-light-gray">Blog</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-light-gray">Contact Us</a></li>
                    <li><a href="{{ route('faq') }}" class="text-light-gray">FAQs</a></li>
                </ul>
            </div>

            <!-- Col 4: Study Destination -->
            <div class="col-lg-3">
                <h5 class="text-white">Study Destination</h5>
                <ul class="list-unstyled footer-links small">
                    <li class="mb-2"><a href="{{ route('courseFinder.filter') }}" class="text-light-gray">Course Finder</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('study.australia') }}" class="text-light-gray">Study in
                            Australia</a></li>
                    <li><a href="{{ route('application.visa') }}" class="text-light-gray">Application & Visa
                            Guidance</a></li>
                     <li class="mb-2"><a href="{{ route('scholarship') }}" class="text-light-gray">Explore scholarships </a></li>
                    <li class="mb-2"><a href="{{ route('universities') }}" class="text-light-gray">Explore universities</a></li>
                    <li class="mb-2"><a href="{{ route('login') }}" class="text-light-gray">Login</a></li>
                    <li class="mb-2"><a href="{{ route('register') }}" class="text-light-gray">Sign up </a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>