<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\DepositRate;
use App\Models\Loan;
use App\Models\Manager;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * A single branch's own page: its contact details, the manager(s)
     * seated there, its advisory board roster, and the mandali-wide rates -
     * everything a member visiting that branch's page would want, without
     * making them hop across four other pages to find it.
     */
    public function show(Branch $branch): View
    {
        abort_unless($branch->is_active, 404);

        $isHeadOffice = str_contains((string) $branch->address, 'Samarth Saurashtra Building');

        $managers = Manager::published()->get();
        $branchManagers = $managers->where('group', 'branch')->where('designation', $branch->name)->values();
        // Head office managers work out of whichever branch premises hosts the
        // head office - shown there, not repeated on every other branch page.
        $headOfficeManagers = $isHeadOffice ? $managers->where('group', 'head_office')->values() : collect();

        $boardGroup = collect(config('site.board_groups'))->firstWhere('branch', $branch->name);
        // Only a handful of branches have a physical signboard/poster this was
        // sourced from - when one exists it replaces the generic rate sections
        // below with that branch's own verbatim content instead. Admin-managed,
        // so it's kept out of config and pulled straight from the database.
        $signboardRecord = $branch->signboard()->published()->first();

        // A branch's own page only exists once its signboard content has been
        // set up in the admin panel - every other branch keeps using the
        // generic Branches listing page for now.
        abort_unless($signboardRecord, 404);

        $signboard = [
            'established_year' => $signboardRecord->established_year,
            'building_photo' => $signboardRecord->building_photo,
            'financial_summary' => $signboardRecord->financial_summary,
            'about' => $signboardRecord->about,
            'board_members' => $signboardRecord->board_members,
            'management' => $signboardRecord->management,
            'supporting_employees' => $signboardRecord->supporting_employees,
        ];

        return view('pages.branch-detail', [
            'branch' => $branch,
            'isHeadOffice' => $isHeadOffice,
            'branchManagers' => $branchManagers,
            'headOfficeManagers' => $headOfficeManagers,
            'boardGroup' => $boardGroup,
            'signboard' => $signboard,
            'loans' => Loan::published()->get(),
            'depositRates' => DepositRate::published()->get(),
        ]);
    }
}
