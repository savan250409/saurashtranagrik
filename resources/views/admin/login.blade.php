<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login &middot; Saurashtra Nagrik</title>
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="login-wrap">
    <form class="login-card" method="POST" action="{{ route('admin.login.attempt') }}">
        @csrf
        <img src="{{ asset('images/logo-lg.png') }}" alt="Shree Saurashtra Nagrik Sharafi Mandali Ltd.">
        <h1>Admin Panel</h1>
        <p class="sub">Shree Saurashtra Nagrik Sharafi Mandali Ltd.</p>

        @if (session('status'))
            <div class="alert alert-ok">{{ session('status') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-ok">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-err">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-err">{{ $errors->first() }}</div>
        @endif

        <div class="field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
        </div>

        <div class="field checkline">
            <input id="remember" type="checkbox" name="remember" value="1">
            <label for="remember" style="margin:0">Keep me signed in</label>
        </div>

        <button class="btn btn-primary" type="submit">Log in</button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const alerts = document.querySelectorAll('.alert');
    if (alerts.length > 0) {
        setTimeout(function () {
            alerts.forEach(function (alert) {
                alert.style.transition = 'opacity 0.6s ease, max-height 0.6s ease, margin 0.6s ease, padding 0.6s ease';
                alert.style.overflow = 'hidden';
                alert.style.opacity = '0';
                alert.style.maxHeight = '0';
                alert.style.paddingTop = '0';
                alert.style.paddingBottom = '0';
                alert.style.marginTop = '0';
                alert.style.marginBottom = '0';
                setTimeout(function () {
                    if (alert && alert.parentNode) {
                        alert.remove();
                    }
                }, 650);
            });
        }, 5000);
    }
});
</script>
</body>
</html>
