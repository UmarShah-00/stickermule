<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header text-center" style="padding: 10px;">
        <!-- SVG Mule Icon -->
        <!-- <div class="mule-icon" style="margin-bottom: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" width="80" height="80">
                <ellipse cx="64" cy="80" rx="40" ry="38" fill="#a9745a" />

                <path d="M44 50 Q64 20 84 50 Z" fill="#fff3e0" />

                <path d="M38 30 Q30 10 44 18 Q44 30 38 30 Z" fill="#a9745a"/>
                <path d="M90 30 Q98 10 84 18 Q84 30 90 30 Z" fill="#a9745a"/>

                <path d="M39 28 Q34 15 44 20 Q43 26 39 28 Z" fill="#e0b394"/>
                <path d="M89 28 Q94 15 84 20 Q85 26 89 28 Z" fill="#e0b394"/>

                <circle cx="50" cy="75" r="8" fill="#fff"/>
                <circle cx="50" cy="75" r="4" fill="#000"/>
                <circle cx="78" cy="75" r="8" fill="#fff"/>
                <circle cx="78" cy="75" r="4" fill="#000"/>

                <circle cx="54" cy="95" r="2.5" fill="#4a2e2a"/>
                <circle cx="74" cy="95" r="2.5" fill="#4a2e2a"/>

                <path d="M54 105 Q64 112 74 105" stroke="#4a2e2a" stroke-width="3" fill="none"/>
            </svg>
        </div> -->

        <!-- Title -->
        <h5 style="margin: 5px 0; font-weight: bold; color:white;" >Sticker Mule</h5>

        <!-- Logo Images -->
        <!-- <a href="{{url('index')}}" class="header-logo">
            <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
            <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
            <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
            <img src="{{asset('build/assets/images/brand-logos/toggle-dark.png')}}" alt="logo" class="toggle-dark">
            <img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
            <img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
        </a> -->
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">

            <!-- Scroll Buttons -->
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>

            <ul class="main-menu">

                <!-- Dashboards Menu -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                    <ul class="slide-menu child1">
                       
                       
                    </ul>
                </li>


                <!-- Dashboards Menu -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-box side-menu__icon"></i>
                        <span class="side-menu__label">Products</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0);">Dashboards</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('sticker.create')}}" class="side-menu__item">Create Product</a>
                        </li>
                         <li class="slide">
                            <a href="{{ route('sticker.list') }}" class="side-menu__item">Product List</a>
                        </li>
                    </ul>
                </li>

                        <li class="slide">
                            <a href="{{ route('setting') }}" class="side-menu__item">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">Setting</span>
                            </a>
                        </li>
                  
            </ul>

            <!-- Scroll Right Button -->
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>

        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
