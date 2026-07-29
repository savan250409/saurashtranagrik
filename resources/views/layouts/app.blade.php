<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Shree Saurashtra Nagrik Sharafi Mandali Ltd.')</title>
    <meta name="description" content="@yield('meta', 'Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara - a co-operative credit society serving members across Gujarat with deposits, loans and savings schemes.')">
    <meta name="theme-color" content="#b3202c" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#0e141c" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">

    {{-- Resolve the theme before first paint. Anything later would flash the
         wrong colours on a dark-mode visitor's screen. --}}
    <script>
        (function () {
            var root = document.documentElement;
            try {
                var stored = localStorage.getItem('theme');
                var dark = stored ? stored === 'dark'
                    : window.matchMedia('(prefers-color-scheme: dark)').matches;
                root.setAttribute('data-theme', dark ? 'dark' : 'light');
            } catch (e) { /* storage blocked - keep the light default */ }
            // Enables the reveal-on-scroll start state. Set here rather than in
            // CSS so that with JS off the content is never hidden.
            root.classList.add('js-anim');
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,500;0,600;0,700;0,900;1,500&family=Inter:wght@400;500;600;700;800&family=Anek+Gujarati:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    @stack('head')
    @stack('styles')
</head>

<body>
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="site-header">
        <div class="wrap bar">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-lg.png') }}" width="46" height="46"
                     alt="Shree Saurashtra Nagrik Sharafi Mandali Ltd.">
                <span class="brand-text">
                    <b>Shree Saurashtra Nagrik</b>
                    <span>Sharafi Sahakari Mandali Ltd.</span>
                </span>
            </a>

            <nav class="nav" aria-label="Primary">
                @foreach (config('site.nav') as $route => $label)
                    <a href="{{ route($route) }}" @class(['is-active' => request()->routeIs($route)])>{{ $label }}</a>
                @endforeach
            </nav>

            <div class="header-actions">
                <button type="button" class="icon-btn theme-toggle" aria-label="Switch theme">
                    @include('partials.icon', ['name' => 'sun', 'class' => 'i-sun'])
                    @include('partials.icon', ['name' => 'moon', 'class' => 'i-moon'])
                </button>
                <button type="button" class="icon-btn nav-toggle" aria-expanded="false"
                        aria-controls="mobile-nav" aria-label="Open menu">
                    @include('partials.icon', ['name' => 'menu'])
                </button>
            </div>
        </div>
    </header>

    {{-- Full-screen overlay menu (mobile / tablet). Kept outside <header> so its
         fixed inset:0 is never affected by the header's own stacking context. --}}
    <div class="mobile-nav" id="mobile-nav">
        <div class="mobile-nav-top">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-lg.png') }}" width="34" height="34" alt="">
            </a>
            <button type="button" class="mobile-nav-close" aria-label="Close menu">
                @include('partials.icon', ['name' => 'close'])
            </button>
        </div>
        <nav class="mobile-nav-links" aria-label="Mobile">
            @foreach (config('site.nav') as $route => $label)
                <a href="{{ route($route) }}" @class(['is-active' => request()->routeIs($route)])>{{ $label }}</a>
            @endforeach
        </nav>
        <p class="mobile-nav-foot">Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd.</p>
    </div>

    <main id="main" @class(['no-hero-pad' => request()->routeIs('home')])>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.pdf-modal')

    <script src="{{ asset('js/site.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
