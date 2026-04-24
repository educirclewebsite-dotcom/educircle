<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-3">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('home_new/images/logo.png') }}" alt="educircle.io" class="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa-solid fa-bars text-dark"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->routeIs(['course.program', 'study.australia', 'application.visa']) ? 'active' : '' }}" href="#" id="servicesDropdown" role="button" data-toggle="dropdown">
                        Our Services <i class="fas fa-chevron-down ml-1 small text-dark"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('course.program') }}">Courses & Programs</a>
                        <a class="dropdown-item" href="{{ route('study.australia') }}">Study in Australia</a>
                        <a class="dropdown-item" href="{{ route('application.visa') }}">Application & Visa Guidance</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courseFinder.filter') ? 'active' : '' }}" href="{{ route('courseFinder.filter') }}">Course Finder</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('scholarship') ? 'active' : '' }}" href="{{ route('scholarship') }}">Scholarships</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('universities') ? 'active' : '' }}" href="{{ route('universities') }}">Explore Universities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                </li>

            </ul>
            <div class="d-flex flex-row align-items-center ml-lg-3">
                @auth
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.dashboard') }}"
                            class="btn btn-student-login btn-student-login-sm mr-1">Dashboard</a>
                    @else
                        <a href="{{ route('student.dashboard') }}"
                            class="btn btn-student-login btn-student-login-sm mr-1">Dashboard</a>
                    @endif
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-student-login btn-student-login-sm">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ url('register') }}" class="btn btn-student-login btn-student-login-sm mr-1">Sign Up</a>
                    <a href="{{ route('login') }}" class="btn btn-student-login btn-student-login-sm">Student Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>