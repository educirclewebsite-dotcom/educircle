<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">


                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('theme2/assets/images/logo-sm-dark.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme2/assets/images/logo-dark.png') }}" alt="" height="30">
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('theme2/assets/images/logo-sm-light.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme2/assets/images/logo-light.png') }}" alt="" height="30">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>
        <div class="dropdown d-inline-block user-dropdown">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user"
                    src="{{ asset('theme/images/users/avatar-9.png') }}" alt="Header Avatar">
                <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                    <i class="ri-user-line align-middle mr-1"></i> Profile
                </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
        </div>




    </div>
    </div>
</header>
