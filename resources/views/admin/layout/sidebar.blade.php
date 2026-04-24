<link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- New Students -->
                <li>
                    <a href="{{ route('student.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-plus"></i>
                        <span>New Students</span>
                    </a>
                </li>

                <!-- Applications -->
                <li>
                    <a href="{{ route('application.index') }}" class="waves-effect">
                        <i class="mdi mdi-file-account-outline"></i>
                        <span>Application</span>
                    </a>
                </li>

                <!-- Leads -->
                <li>
                    <a href="{{ route('lead.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span>Leads</span>
                    </a>
                </li>

                <!-- Blogs -->
                <li>
                    <a href="{{ route('blog.index') }}" class="waves-effect">
                        <i class="mdi mdi-note-text-outline"></i>
                        <span>Blogs</span>
                    </a>
                </li>

                <!-- Courses -->
                <li>
                    <a href="{{ route('course.index') }}" class="waves-effect">
                        <i class="mdi mdi-school-outline"></i>
                        <span>Courses</span>
                    </a>
                </li>

                <!-- University -->
                <li>
                    <a href="{{ route('university.index') }}" class="waves-effect">
                        <i class="mdi mdi-domain"></i>
                        <span>University</span>
                    </a>
                </li>

                <!-- University-Courses -->
                <li>
                    <a href="{{ route('university_course.index') }}" class="waves-effect">
                        <i class="mdi mdi-book-open-variant"></i>
                        <span>University-Courses</span>
                    </a>
                </li>

                <!-- Scholarship -->
                {{-- <li>
                    <a href="{{ route('scholarship.index') }}" class="waves-effect">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span>Scholarship</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('partner-logos.index') }}" class="waves-effect">
                        <i class="mdi mdi-office-building"></i>
                        <span>Partner Logos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('google-reviews.index') }}" class="waves-effect">
                        <i class="mdi mdi-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>