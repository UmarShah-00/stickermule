<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{url('index')}}" class="header-logo">
                        <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
                        <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
                        <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
                        <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
         <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
   data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">

    <div class="d-flex align-items-center">
        <div class="d-sm-block d-none">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&size=100&rounded=true&color=fff&background=111c43&format=svg"
                    alt="Avatar"
                    style="width: 40px; height: 40px;"
                    class="me-2 rounded-circle"
                />
                <!-- Name & Email -->
                <div class="d-flex flex-column">
                    <span class="fw-semibold lh-1">{{ Auth::user()->name }}</span>
                    <small class="text-muted fs-11">{{ Auth::user()->email }}</small>
                </div>
            </div>
        </div>
    </div>
</a>

                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li><a class="dropdown-item d-flex" href="{{url('profile')}}"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                    <a class="dropdown-item d-flex" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="ti ti-logout fs-18 me-2 op-7"></i> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
            <!-- End::header-element -->


        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>