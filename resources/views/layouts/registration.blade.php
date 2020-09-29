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
    <body class="login">
        
        @yield('content')

        <script src="{{ asset('mone/js/app.js') }}"></script>
    </body>
</html>