<link rel="stylesheet" href="{{ asset('theme2/assets/css/custom.css') }}">

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('student.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('student.profile') }}" class="waves-effect">
                        <i class="ri-user-line"></i> <span>Profile</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('student.courseFinder.filter') }}" class="waves-effect">
                        <i class="ri-list-check-2"></i> <span>Shortlisting</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('student.applications') }}" class="waves-effect">
                        <i class="ri-file-text-line"></i> <span>Application</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
