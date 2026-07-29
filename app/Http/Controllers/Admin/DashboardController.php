<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\DepositRate;
use App\Models\Director;
use App\Models\Download;
use App\Models\HeroSlide;
use App\Models\HomeVideo;
use App\Models\Loan;
use App\Models\Manager;
use App\Models\RecurringDeposit;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /** Every module, in sidebar order. Also drives the dashboard tiles. */
    public const MODULES = [
        'hero-slides' => ['Home Hero Gallery', HeroSlide::class],
        'home-videos' => ['Home Video Gallery', HomeVideo::class],
        'directors' => ['Board of Directors', Director::class],
        'branches' => ['Branches', Branch::class],
        'loans' => ['Loans', Loan::class],
        'deposit-rates' => ['Deposit Rates', DepositRate::class],
        'recurring-deposits' => ['Recurring Deposits', RecurringDeposit::class],
        'managers' => ['Managers', Manager::class],
        'downloads' => ['Downloads', Download::class],
    ];

    public function index(): View
    {
        $tiles = [];

        foreach (self::MODULES as $key => [$label, $model]) {
            $tiles[] = [
                'key' => $key,
                'label' => $label,
                'total' => $model::count(),
                'hidden' => $model::where('is_active', false)->count(),
                'updated' => $model::max('updated_at'),
            ];
        }

        return view('admin.dashboard', ['tiles' => $tiles]);
    }
}
