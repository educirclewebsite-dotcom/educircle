<header class="ree-header fixed-top">
    <div class="menu-header horzontl">
        <div class="menu-logo">
            <div class="dskt-logo"><a class="nav-brand" href="{{ url('/') }}"> <img
                        src={{ asset('theme/images/logo.png') }} alt="Logo" class="ree-logo" /> </a> </div>
        </div>
        <div class="ree-nav" role="navigation">
            <ul class="nav-list">
                <li class="megamenu">
                    <a href="{{ route('scholarship') }}" class="menu-links">Scholarships</a>

                </li>
                <li class="megamenu">
                    <a href="{{ route('about') }}" class="menu-links">About</a>

                </li>
                <li class="megamenu mega-small">
                    <a href="{{ route('blog') }}" class="menu-links">Blogs</a>

                </li>

                <li class="megamenu mega-small">
                    <a href="#" class="menu-links">Our Services</a>
                    <div class="menu-dropdown">
                        <div class="menu-block-set">
                            <a class="dropdown-item" href="{{ route('course.program') }}">Courses & Programs</a>
                            <a class="dropdown-item" href="{{ route('study.australia') }}">Study in Australia</a>
                            <a class="dropdown-item" href="{{ route('application.visa') }}">Application & Visa
                                Guidance</a>
                        </div>
                    </div>
                </li>
                <li class="megamenu mega-small">
                    <a href="{{ route('contact') }}" class="menu-links">Contact</a>

                </li>
                <li class="megamenu mega-small">
                    <a href="{{ route('courseFinder.filter') }}?openModal=true" style="direction: none"
                        class="menu-links">Course Finder</a>
                </li>
                <li class="megamenu mega-small">
                    <a href="{{ route('universities') }}" style="direction: none" class="menu-links">Explore
                        Universities</a>
                </li>
            </ul>
        </div>
        <div class="ree-nav-cta">
            <ul>
                <li><a href="{{ route('login') }}" class="ree-btn ree-btn0 ree-btn-grdt2">Student Login</a> </li>
            </ul>
        </div>
        <div class="mobile-menu2">
            <ul class="mob-nav2">

                <li class="navm-"><a class="toggle" href="#"> <span></span> </a> </li>
            </ul>
        </div>
        <nav id="main-nav">
            <ul>
                <li><a href="{{ route('scholarship') }}">Scholarships</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('blog') }}">Blogs</a></li>
                <li><a href="#">Our Services</a>
                    <ul>
                        <li><a href="{{ route('course.program') }}">Courses & Programs</a></li>
                        <li><a href="{{ route('study.australia') }}">Study in Australia</a></li>
                        <li><a href="{{ route('application.visa') }}">Application & Visa
                                Guidance</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('courseFinder.filter') }}?openModal=true" style="direction: none">Course
                        Finder</a></li>
                <li><a href="{{ route('universities') }}">Explore Universities</a></li>
                <li><a href="{{ route('login') }}">Login</a> </li>
            </ul>
        </nav>
    </div>
</header>