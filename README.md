# Shree Saurashtra Nagrik Sharafi Mandali Ltd. — Laravel site

The static HTML site was converted to Laravel 12 (PHP 8.2). Every page is a
Blade view; the markup, CSS, JS and images are the originals, unchanged.

## Layout

```
resources/views/
  layouts/app.blade.php     <head>, common CSS/JS, wrapper, overlay
  partials/header.blade.php site header + primary nav
  partials/footer.blade.php footer widgets + copyright
  pages/*.blade.php         one view per original .html page
public/
  css/ js/ images/ webfonts/ the original asset folders, untouched
  media/                    the PDFs and videos (was: downloads/)
routes/web.php              page routes, legacy redirects
```

Each page view supplies `@section('title')`, `@section('content')` and, where
the original page had them, `@push('head')` / `@push('styles')` /
`@push('scripts')` / `@section('prebody')`.

## URLs

Each page keeps the file name of the `.html` page it replaced, so existing
links and bookmarks still resolve:

| Page | URL | Old URL (301s to the new one) |
| --- | --- | --- |
| Home | `/` | `/index.html` |
| Board of Directors | `/bord-of-directors` | `/bord-of-directors.html` |
| Branches | `/branches` | `/branches.html` |
| Schemes | `/schemes` | `/schemes.html` |
| Loans | `/loan` | `/loan.html` |
| Deposit | `/deposit` | `/deposit.html` |
| Managers | `/manager` | `/manager.html` |
| Downloads | `/downloads` | `/downloads.html` |
| Activities | `/activity` | `/activity.html` |
| Progress Report | `/progress-report` | `/progress-report.html` |
| Balance Sheet | `/paku-sarvaiyu` | `/paku-sarvaiyu.html` |
| Profit & Loss | `/profit-loss` | `/profit-loss.html` |
| Events | `/event` | `/event.html` |
| Chairman's statement | `/statement` | `/statement.html` |
| Privacy Policy | `/privacy-policy` | — |
| Terms and Conditions | `/terms-and-conditions` | — |

The two legal pages are static Blade views (not database-driven) and are linked
from the footer's "Important Links" column. Their typography lives in
`public/css/legal.css`, loaded only by those two pages.

The `/bord-of-directors` spelling is the original one; it was kept
deliberately so inbound links keep working.

### Why the downloadable files moved to `public/media`

They used to live in `public/downloads`, which collides with the `/downloads`
page route: a web server serves a real directory itself and never reaches the
front controller, so `/downloads` returned 404 on both Apache and the PHP dev
server. The files now live in `public/media`, and `routes/web.php` 301s the
legacy `/downloads/<file>` URLs to their new location, so old direct links to
the PDFs and videos still work.

## Admin panel

A single-operator CMS for the editable parts of the site.

**Location.** By default the panel is at `/admin`. To serve it from a subdomain
instead, set in `.env`:

```
ADMIN_DOMAIN=admin.saurashtranagrik.com
```

The panel then lives at that host's root (`https://admin.saurashtranagrik.com/`)
and `/admin` no longer exists on the main domain. Point the subdomain's document
root at the same `public/` directory. Only one of the two is ever registered, so
route names never collide.

**Credentials.** Seeded by `database/seeders/AdminSeeder.php`:

| Email | Password |
| --- | --- |
| admin@gmail.com | admin123 |

The `Admin` model casts `password => 'hashed'`, so it is stored bcrypt-hashed
(`$2y$12$…`) and can never be written in plain text. Login is rate-limited to
5 attempts per email+IP.

**Modules.** Each has create / edit / delete, a search box, a status filter
(visible / hidden), module-specific filters, pagination, and a display-order
field. Nothing is ever hard-deleted by accident — "Hide" removes an item from
the public site while keeping the record.

| Module | Drives |
| --- | --- |
| Home Hero Gallery | the home page slider |
| Home Video Gallery | the home page video row |
| Board of Directors | `/bord-of-directors` |
| Branches | `/branches` |
| Managers | `/manager` (head-office and branch groups) |
| Downloads | `/downloads` |
| Loans | `/loan` |
| Deposit Rates | the rate grid on `/deposit` |
| Recurring Deposits | the recurring cards on `/deposit`, each with its own list of deposit → maturity amounts |

**Uploads** are written to `public/uploads/<type>/` and referenced by a path
relative to `public/`, exactly like the original theme assets. Existing content
keeps its original paths (`images/bod/…`, `media/…`), so nothing had to move.

**How the public pages get their data.** View composers in
`app/Providers/AppServiceProvider.php` bind each collection to the page that
renders it, which keeps `routes/web.php` as plain `Route::view` declarations and
the route table cacheable. The markup was not redesigned — the hard-coded blocks
were replaced with loops that emit the same HTML, verified by comparing rendered
output against the pre-CMS pages.

### Database

MySQL. Create the schema and load the current site content with:

```bash
php artisan migrate --seed
```

The seed data in `database/seeders/data/*.json` was extracted from the pages as
they stood, so seeding a clean database reproduces the site exactly.

## Pre-existing bugs fixed during the conversion

These were broken on the old static site too; the conversion was verified as
pixel-identical first, then each was fixed deliberately:

- `css/custom.css` — `.h2-Mayor-msg` referenced `images/flagbg.jpg`, which was
  never shipped with the theme. Every page load 404'd, then fell back to the
  flat colour. Now it just sets that colour.
- `branches` / `manager` — the card-header pin icon used
  `font-family: "Font Awesome 5 Free"`, but the bundled `all.css` declares the
  family as `FontAwesome`, so it rendered as a tofu box. Fixed to the real name.
- `branches` / `manager` — `fa-phone-alt` has no glyph in the bundled Font
  Awesome build, so landline numbers had a blank icon. Switched to `fa-phone`.
- `event` — a slider image was referenced as `/images/slider/2(4)` with no file
  extension. Corrected to `2(4).jpg`.
- footer — `href="www.dataverseanalytics.in"` was a relative link (it resolved
  to a path on this site). Now an absolute `https://` URL.

## Performance work

The site shipped raw camera originals (6000x4000 JPEGs, up to 21 MB each) and
loaded every library on every page. What changed:

- **Images recompressed in place** - 318 MB -> 24 MB. Filenames and paths are
  unchanged, so no markup needed updating. Content images are capped at 900px
  (they render at most 381px), slider images at 1920px, the logo at 400px
  (it renders at 100-220px).
- **Videos re-encoded** with `+faststart` so playback begins before the file
  finishes downloading. The home page's autoplaying popup went 16.5 MB -> 4.4 MB.
- **Three slider PNGs converted to JPEG** (photographs saved as PNG): 7.1 MB -> 0.9 MB.
- **74 below-the-fold images lazy-loaded.** The hero slide is deliberately
  *not* lazy - it is preloaded and carries `fetchpriority="high"`.
- **Dead libraries dropped** - owl.carousel, slick and prettyPhoto (167 KB per
  page). No page contains the markup they bind to.
- **Slider CSS moved off the other 13 pages** - 220 KB that only the home page needs.
- **Google Fonts moved out of `@import`** into `<link>` tags with `preconnect`
  and `display=swap`. An `@import` cannot start until custom.css has downloaded.
- **gzip + far-future caching** added to `public/.htaccess`. Shared CSS+JS
  compresses 623 KB -> 112 KB.

Result: a typical page went from ~1.2 MB to ~820 KB uncompressed (~310 KB with
gzip); `/event` went 7.2 MB -> 2.8 MB; all 14 pages combined, 28.5 MB -> 19.2 MB.

Two things deliberately *not* done:

- The nine Revolution Slider extensions must all stay loaded. Revolution
  auto-fetches any it thinks is missing from `jsFileLocation + "extensions/"`,
  which is not where they live here, so removing a script tag makes the loader
  404 and the slider never initialises.
- Unreferenced files were left on disk rather than deleted: `public/media/s1.mp4`
  and `v1.mp4` (86 MB) and six unused `public/images/slider/*.png` (~14 MB).
  They cost nothing at runtime but do bloat deployment.

## Running locally

```bash
php artisan serve
```

No database is required — sessions, cache and queue all use file/sync drivers.

## Deploying

Point the web server's document root at `public/`. `public/.htaccess` keeps the
HTTPS canonical-host redirect and the cPanel `ea-php82` handler from the old
site.

```bash
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Re-run `php artisan config:clear` after editing `.env`, otherwise the cached
config wins.
