<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin panel
|--------------------------------------------------------------------------
|
| With ADMIN_DOMAIN set the panel lives at the root of that subdomain
| (https://admin.example.com/); otherwise at /admin on the main domain. Only
| one of the two is registered, so route names stay unique and route('admin.*')
| always generates a URL that resolves.
|
| These are declared FIRST on purpose. The public routes below carry no domain
| constraint, so they match any host - including the admin subdomain. Laravel
| matches in registration order, so the panel has to claim the subdomain before
| the catch-all public routes get a chance to.
|
*/

if ($adminDomain = config('admin.domain')) {
    Route::domain($adminDomain)->group(base_path('routes/admin.php'));
} else {
    Route::prefix('admin')->group(base_path('routes/admin.php'));
}

/*
|--------------------------------------------------------------------------
| Public site
|--------------------------------------------------------------------------
|
| Every page is a Blade view under resources/views/pages. Each URI deliberately
| keeps the file name of the .html page it replaces (minus the extension) so
| existing inbound links, bookmarks and search results keep resolving.
|
*/

$pages = [
    'bord-of-directors',
    'branches',
    'schemes',
    'loan',
    'deposit',
    'manager',
    'downloads',
    'activity',
    'progress-report',
    'paku-sarvaiyu',
    'profit-loss',
    'event',
    'statement',
    'privacy-policy',
    'terms-and-conditions',
];

Route::view('/', 'pages.index')->name('home');

foreach ($pages as $page) {
    Route::view("/{$page}", "pages.{$page}")->name($page);
}

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact-us');
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact-us.send');

// Backwards compatibility: permanently redirect the old .html URLs.
Route::redirect('/index.html', '/', 301);

foreach ($pages as $page) {
    Route::redirect("/{$page}.html", "/{$page}", 301);
}

/*
| The downloadable PDFs and videos used to live in /downloads. That directory
| name shadows the /downloads page route - a real directory is served by the
| web server before the request ever reaches the front controller - so the
| files now live in public/media. Keep the old file URLs alive.
|
| The {file} pattern excludes slashes and backslashes, so it cannot escape
| public/media via traversal.
*/
Route::get('/downloads/{file}', function (string $file) {
    abort_unless(is_file(public_path("media/{$file}")), 404);

    return redirect('/media/'.rawurlencode($file), 301);
})->where('file', '[^/\\\\]+');
