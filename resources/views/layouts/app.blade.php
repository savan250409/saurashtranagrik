<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Shree Saurashtra Nagrik Sharafi Mandali Ltd.')</title>
    <meta name="description" content="@yield('meta', 'Shree Saurashtra Nagrik Sharafi Sahakari Mandali Ltd., Bagasara - a co-operative credit society serving members across Gujarat with deposits, loans and savings schemes.')">
    <meta name="theme-color" content="#b3202c">
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">

    <script>
        (function () {
            var root = document.documentElement;
            // Enables the reveal-on-scroll start state. Set here rather than in
            // CSS so that with JS off the content is never hidden.
            root.classList.add('js-anim');
            // Marks that JS is available, so progressive-enhancement components
            // (e.g. the tabbed branch roster) can collapse. Without it every
            // panel stays open and nothing is unreachable.
            root.classList.add('js-on');
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

    <button type="button" class="back-to-top" aria-label="Back to top">
        @include('partials.icon', ['name' => 'chevron-up'])
    </button>

    <script src="{{ asset('js/site.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
