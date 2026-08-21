<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BranchSignboardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepositRateController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\HomeVideoController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\RecurringDepositController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin panel routes
|--------------------------------------------------------------------------
|
| Included once from routes/web.php, either under the ADMIN_DOMAIN subdomain
| or under the /admin prefix - never both, so route names stay unique.
|
*/

Route::get('login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('admin.login.attempt');

Route::middleware('auth:admin')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::post('clear-cache', function () {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        return back()->with('status', 'All caches cleared successfully.');
    })->name('admin.clear-cache');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    $modules = [
        'hero-slides' => HeroSlideController::class,
        'home-videos' => HomeVideoController::class,
        'directors' => DirectorController::class,
        'branches' => BranchController::class,
        'branch-signboards' => BranchSignboardController::class,
        'loans' => LoanController::class,
        'deposit-rates' => DepositRateController::class,
        'recurring-deposits' => RecurringDepositController::class,
        'managers' => ManagerController::class,
        'downloads' => DownloadController::class,
    ];

    foreach ($modules as $key => $controller) {
        Route::prefix($key)->name("admin.{$key}.")->controller($controller)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('{id}/edit', 'edit')->whereNumber('id')->name('edit');
            Route::put('{id}', 'update')->whereNumber('id')->name('update');
            Route::delete('{id}', 'destroy')->whereNumber('id')->name('destroy');
            Route::patch('{id}/toggle', 'toggle')->whereNumber('id')->name('toggle');
        });
    }
});
