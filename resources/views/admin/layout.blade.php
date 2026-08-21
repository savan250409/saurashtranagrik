<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') &middot; Saurashtra Nagrik</title>
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/fav.png') }}" alt="">
            <span>Saurashtra Nagrik<br>Admin Panel</span>
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])>Dashboard</a>

            <div class="group-label">Home page</div>
            <a href="{{ route('admin.hero-slides.index') }}" @class(['active' => request()->routeIs('admin.hero-slides.*')])>Hero Gallery</a>
            <a href="{{ route('admin.home-videos.index') }}" @class(['active' => request()->routeIs('admin.home-videos.*')])>Video Gallery</a>

            <div class="group-label">Pages</div>
            <a href="{{ route('admin.directors.index') }}" @class(['active' => request()->routeIs('admin.directors.*')])>Board of Directors</a>
            <a href="{{ route('admin.branches.index') }}" @class(['active' => request()->routeIs('admin.branches.*')])>Branches</a>
            <a href="{{ route('admin.branch-signboards.index') }}" @class(['active' => request()->routeIs('admin.branch-signboards.*')])>Branch Signboards</a>
            <a href="{{ route('admin.managers.index') }}" @class(['active' => request()->routeIs('admin.managers.*')])>Managers</a>
            <a href="{{ route('admin.downloads.index') }}" @class(['active' => request()->routeIs('admin.downloads.*')])>Downloads</a>

            <div class="group-label">Rates</div>
            <a href="{{ route('admin.loans.index') }}" @class(['active' => request()->routeIs('admin.loans.*')])>Loans</a>
            <a href="{{ route('admin.deposit-rates.index') }}" @class(['active' => request()->routeIs('admin.deposit-rates.*')])>Deposit Rates</a>
            <a href="{{ route('admin.recurring-deposits.index') }}" @class(['active' => request()->routeIs('admin.recurring-deposits.*')])>Recurring Deposits</a>

            <div class="group-label">Site</div>
            <a href="{{ url('/') }}" target="_blank" rel="noopener">View website &nearr;</a>
        </nav>
    </aside>

    <div class="main">
        <header class="topbar">
            <h1>@yield('heading', 'Dashboard')</h1>
            <div class="checkline">
                <span class="who">{{ auth('admin')->user()?->email }}</span>
                <form method="POST" action="{{ route('admin.clear-cache') }}">
                    @csrf
                    <button class="btn btn-sm" type="submit" style="background:#e67e22;color:#fff;border-color:#e67e22"
                            onclick="return confirm('Clear all caches?')">
                        Clear Cache
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-sm" type="submit">Log out</button>
                </form>
            </div>
        </header>

        <div class="content">
            @if (session('status'))
                <div class="alert alert-ok">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-err">
                    Please correct the following:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
