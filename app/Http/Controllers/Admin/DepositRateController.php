<?php

namespace App\Http\Controllers\Admin;

use App\Models\DepositRate;
use Illuminate\Database\Eloquent\Model;

class DepositRateController extends BaseCrudController
{
    protected string $model = DepositRate::class;

    protected string $key = 'deposit-rates';

    protected string $title = 'Deposit Rates';

    protected string $singular = 'Deposit rate';

    protected array $searchable = ['title', 'rate'];

    protected array $uploads = ['icon' => 'loan'];

    protected function columns(): array
    {
        return [
            'Icon' => fn (DepositRate $d) => $d->icon,
            'Term' => fn (DepositRate $d) => $d->title,
            'Rate' => fn (DepositRate $d) => $d->rate ?: '—',
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'image', 'max:4096'],
            'rate' => ['nullable', 'string', 'max:60'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
