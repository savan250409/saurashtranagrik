<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\DepositRate;
use App\Models\Director;
use App\Models\Download;
use App\Models\HeroSlide;
use App\Models\HomeVideo;
use App\Models\Loan;
use App\Models\Manager;
use App\Models\RecurringDeposit;
use Illuminate\Database\Seeder;
use RuntimeException;

class ContentSeeder extends Seeder
{
    /**
     * Loads the JSON in database/seeders/data, which was extracted verbatim
     * from the pages before they became database-driven. Seeding a clean
     * database therefore reproduces the site exactly as it looked.
     */
    private const MAP = [
        'hero_slides' => HeroSlide::class,
        'home_videos' => HomeVideo::class,
        'directors' => Director::class,
        'branches' => Branch::class,
        'loans' => Loan::class,
        'deposit_rates' => DepositRate::class,
        'recurring_deposits' => RecurringDeposit::class,
        'managers' => Manager::class,
        'downloads' => Download::class,
    ];

    public function run(): void
    {
        foreach (self::MAP as $file => $model) {
            $path = database_path("seeders/data/{$file}.json");

            if (! is_file($path)) {
                throw new RuntimeException("Missing seed data file: {$path}");
            }

            $rows = json_decode(file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);

            // Truncate-then-insert keeps re-seeding idempotent.
            $model::query()->delete();

            foreach ($rows as $row) {
                $model::create($row);
            }

            $this->command?->info(sprintf('  %-20s %d rows', $file, count($rows)));
        }
    }
}
