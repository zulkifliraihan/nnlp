<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{ asset('mone/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Pembelajaran dan pelatihan gratis">
        <meta name="keywords" content="LPKN - Referal registration Pembelajaran dan pelatihan gratis">
        <meta name="author" content="erikwii, z02">
        <title>Referral Registration</title>

        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('mone/css/app.css') }}" />
        <!-- END: CSS Assets-->

        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <!-- END: JS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            @include('layouts.nav.admin')
            
            @yield('content')
        </div>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('mone/js/app.js') }}"></script>
    </body>
</html>