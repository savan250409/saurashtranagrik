<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Shree Saurastra Nagrik Sharafi Mandali Ltd.')</title>
    <!-- Fonts: fetched in parallel with the stylesheets rather than being
         discovered inside custom.css. display=swap avoids invisible text. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">
    {{-- The Revolution Slider stylesheets (~220 KB) are pushed by the only page
         that renders a slider - see pages/index.blade.php - rather than loaded
         on all 14 pages. --}}
    @stack('head')
    @stack('styles')
</head>

<body>
    @yield('prebody')

    <!--Wrapper Start-->
    <div class="wrapper">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')
    </div>
    <!--Wrapper End-->
    <div class="overlay"></div>

    <!-- JS -->
    {{-- owl.carousel, slick and prettyPhoto were dropped: no page contains the
         markup they bind to, and every call site in custom.js is already
         guarded by an $(selector).length check, so nothing references them. --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
