<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;

class BranchController extends BaseCrudController
{
    protected string $model = Branch::class;

    protected string $key = 'branches';

    protected string $title = 'Branches';

    protected string $singular = 'Branch';

    protected array $searchable = ['name', 'address', 'phone', 'mobile'];

    protected array $filters = [
        'color_class' => [
            'c1' => 'Teal', 'c2' => 'Blue', 'c3' => 'Green',
            'c4' => 'Red', 'c5' => 'Brown', 'c6' => 'Slate',
        ],
    ];

    protected function columns(): array
    {
        return [
            'Branch' => fn (Branch $b) => $b->name,
            'Address' => fn (Branch $b) => str($b->address)->replace("\n", ', ')->limit(60),
            'Phone' => fn (Branch $b) => $b->phone ?: '—',
            'Mobile' => fn (Branch $b) => $b->mobile ?: '—',
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:1000'],
            'phone' => ['nullable', 'string', 'max:60'],
            'mobile' => ['nullable', 'string', 'max:60'],
            'color_class' => ['required', 'in:c1,c2,c3,c4,c5,c6'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
