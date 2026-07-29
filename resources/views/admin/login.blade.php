<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login &middot; Saurashtra Nagrik</title>
    <link rel="icon" href="{{ asset('images/fav.png') }}" type="image/png">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="login-wrap">
    <form class="login-card" method="POST" action="{{ route('admin.login.attempt') }}">
        @csrf
        <img src="{{ asset('images/logo-lg.png') }}" alt="Shree Saurashtra Nagrik Sharafi Mandali Ltd.">
        <h1>Admin Panel</h1>
        <p class="sub">Shree Saurashtra Nagrik Sharafi Mandali Ltd.</p>

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
</body>
</html>
