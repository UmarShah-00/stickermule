<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">

    <head>

        <!-- Meta Data -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="dashboard bootstrap, laravel template, admin panel in laravel, php admin panel, admin panel for laravel, admin template bootstrap 5, laravel admin panel, admin dashboard template, hrm dashboard, vite laravel, admin dashboard, ecommerce admin dashboard, dashboard laravel, analytics dashboard, template dashboard, admin panel template, bootstrap admin panel template">

        <!-- TITLE -->
		<title>Sticker Mule </title>

        <!-- FAVICON -->
       <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 128 128' width='150' height='150'%3E%3Cellipse cx='64' cy='80' rx='40' ry='38' fill='%23a9745a'/%3E%3Cpath d='M44 50 Q64 20 84 50 Z' fill='%23fff3e0'/%3E%3Cpath d='M38 30 Q30 10 44 18 Q44 30 38 30 Z' fill='%23a9745a'/%3E%3Cpath d='M90 30 Q98 10 84 18 Q84 30 90 30 Z' fill='%23a9745a'/%3E%3Cpath d='M39 28 Q34 15 44 20 Q43 26 39 28 Z' fill='%23e0b394'/%3E%3Cpath d='M89 28 Q94 15 84 20 Q85 26 89 28 Z' fill='%23e0b394'/%3E%3Ccircle cx='50' cy='75' r='8' fill='%23fff'/%3E%3Ccircle cx='50' cy='75' r='4' fill='%23000'/%3E%3Ccircle cx='78' cy='75' r='8' fill='%23fff'/%3E%3Ccircle cx='78' cy='75' r='4' fill='%23000'/%3E%3Ccircle cx='54' cy='95' r='2.5' fill='%234a2e2a'/%3E%3Ccircle cx='74' cy='95' r='2.5' fill='%234a2e2a'/%3E%3Cpath d='M54 105 Q64 112 74 105' stroke='%234a2e2a' stroke-width='3' fill='none'/%3E%3C/svg%3E">


        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
        
        <!-- APP SCSS -->
        @vite(['resources/sass/app.scss'])


        @include('layouts.components.landing.styles')


        @yield('styles')

	</head>

    <body class="landing-body">

        <!-- SWITCHER -->

        @include('layouts.components.landing.switcher')

        <!-- END SWITCHER -->

        <!-- PAGE -->
		<div class="landing-page-wrapper">

            <!-- HEADER -->

            @include('layouts.components.landing.header')

            <!-- END HEADER -->

            <!-- SIDEBAR -->

            @include('layouts.components.landing.sidebar')

            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content landing-main">

                @yield('content')

                
                    <!-- FOOTER -->
                    @include('layouts.components.landing.footer')

                    <!-- FOOTER -->

            </div> 
            <!-- END MAIN-CONTENT -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        @include('layouts.components.landing.scripts')

        @yield('scripts')
        
        <!-- STICKY JS -->
		<script src="{{asset('build/assets/sticky.js')}}"></script>

        <!-- END SCRIPTS -->

	</body>
</html>
