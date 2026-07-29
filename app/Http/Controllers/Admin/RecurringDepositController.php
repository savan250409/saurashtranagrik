<?php

namespace App\Http\Controllers\Admin;

use App\Models\RecurringDeposit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RecurringDepositController extends BaseCrudController
{
    protected string $model = RecurringDeposit::class;

    protected string $key = 'recurring-deposits';

    protected string $title = 'Recurring Deposits';

    protected string $singular = 'Recurring deposit';

    protected array $searchable = ['term', 'rate'];

    protected function columns(): array
    {
        return [
            'Term' => fn (RecurringDeposit $r) => $r->term,
            'Rate' => fn (RecurringDeposit $r) => $r->rate ?: '—',
            'Rows' => fn (RecurringDeposit $r) => count($r->lines()).' amount lines',
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'term' => ['required', 'string', 'max:100'],
            'rate' => ['nullable', 'string', 'max:60'],
            'rows' => ['nullable', 'array'],
            'rows.*.amount' => ['nullable', 'string', 'max:60'],
            'rows.*.maturity' => ['nullable', 'string', 'max:60'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * The card's "deposit -> maturity" lines arrive as a repeatable field set.
     * Blank pairs are dropped so an empty spare row never reaches the site.
     */
    protected function prepare(Request $request, array $data, ?Model $record): array
    {
        $data = parent::prepare($request, $data, $record);

        $data['rows'] = collect($request->input('rows', []))
            ->map(fn ($row) => [
                'amount' => trim((string) ($row['amount'] ?? '')),
                'maturity' => trim((string) ($row['maturity'] ?? '')),
            ])
            ->filter(fn ($row) => $row['amount'] !== '' || $row['maturity'] !== '')
            ->values()
            ->all();

        return $data;
    }
}
