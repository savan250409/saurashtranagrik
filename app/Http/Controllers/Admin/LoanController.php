<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Model;

class LoanController extends BaseCrudController
{
    protected string $model = Loan::class;

    protected string $key = 'loans';

    protected string $title = 'Loans';

    protected string $singular = 'Loan';

    protected array $searchable = ['title', 'rate'];

    /** Same pictogram set every card links back to via partials.icon. */
    public const ICON_OPTIONS = [
        'coins' => 'Coins',
        'building' => 'Building',
        'shield' => 'Shield',
        'file' => 'Document',
        'star' => 'Star',
        'bank' => 'Bank',
        'chart' => 'Chart',
        'clipboard' => 'Clipboard',
        'sparkles' => 'Sparkles',
    ];

    protected function columns(): array
    {
        return [
            'Icon name' => fn (Loan $l) => self::ICON_OPTIONS[$l->icon] ?? $l->icon,
            'Loan' => fn (Loan $l) => $l->title,
            'Rate' => fn (Loan $l) => $l->rate ?: '—',
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'in:'.implode(',', array_keys(self::ICON_OPTIONS))],
            'rate' => ['nullable', 'string', 'max:60'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
