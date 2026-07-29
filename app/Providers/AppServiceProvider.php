<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\DepositRate;
use App\Models\Director;
use App\Models\Download;
use App\Models\HeroSlide;
use App\Models\HomeVideo;
use App\Models\Loan;
use App\Models\Manager;
use App\Models\RecurringDeposit;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * Bind the editable content to the pages that render it. Doing this with
     * view composers keeps routes/web.php as plain Route::view declarations,
     * so the route table stays cacheable and the public URLs are unchanged.
     */
    public function boot(): void
    {
        View::composer('pages.index', function ($view) {
            $view->with([
                'heroSlides' => HeroSlide::published()->get(),
                'homeVideos' => HomeVideo::published()->get(),
                // Every figure here is either drawn from the chairman's own
                // published statement (16 years) or counted live from the
                // database, never invented.
                'stats' => [
                    ['target' => 16, 'suffix' => '+', 'label' => 'Years of trust'],
                    ['target' => Branch::published()->count(), 'suffix' => '', 'label' => 'Branches'],
                    ['target' => Loan::published()->count(), 'suffix' => '', 'label' => 'Loan schemes'],
                    ['target' => Manager::published()->count(), 'suffix' => '', 'label' => 'Managers'],
                ],
            ]);
        });

        View::composer('pages.bord-of-directors', fn ($view) => $view->with('directors', Director::published()->get()));

        View::composer('pages.branches', fn ($view) => $view->with('branches', Branch::published()->get()));

        View::composer('pages.loan', fn ($view) => $view->with('loans', Loan::published()->get()));

        View::composer('pages.deposit', function ($view) {
            $rates = DepositRate::published()->get();

            // The rate grid is two columns wide. When the count is odd the last
            // card would sit alone against the left edge, so the page has always
            // rendered it centred on its own row - keep that behaviour.
            $featured = $rates->count() % 2 === 1 ? $rates->last() : null;

            $view->with([
                'depositRates' => $featured ? $rates->slice(0, -1)->values() : $rates,
                'depositRateFeatured' => $featured,
                'recurringDeposits' => RecurringDeposit::published()->get(),
            ]);
        });

        View::composer('pages.manager', function ($view) {
            $managers = Manager::published()->get();

            $view->with([
                'headOfficeManagers' => $managers->where('group', 'head_office')->values(),
                'branchManagers' => $managers->where('group', 'branch')->values(),
            ]);
        });

        View::composer('pages.downloads', fn ($view) => $view->with('downloads', Download::published()->get()));
    }
}
