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

    protected array $uploads = ['icon' => 'loan'];

    protected function columns(): array
    {
        return [
            'Icon' => fn (Loan $l) => $l->icon,
            'Loan' => fn (Loan $l) => $l->title,
            'Rate' => fn (Loan $l) => $l->rate ?: '—',
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
