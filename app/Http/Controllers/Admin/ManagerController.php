<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;

class ManagerController extends BaseCrudController
{
    protected string $model = Manager::class;

    protected string $key = 'managers';

    protected string $title = 'Managers';

    protected string $singular = 'Manager';

    protected array $searchable = ['name', 'designation', 'phone'];

    protected array $filters = [
        'group' => [
            'head_office' => 'Head office',
            'branch' => 'Branch manager',
        ],
        'color_class' => [
            'c1' => 'Teal', 'c2' => 'Blue', 'c3' => 'Green',
            'c4' => 'Red', 'c5' => 'Brown', 'c6' => 'Slate',
        ],
    ];

    protected function columns(): array
    {
        return [
            'Title' => fn (Manager $m) => $m->designation,
            'Name' => fn (Manager $m) => $m->name,
            'Phone' => fn (Manager $m) => $m->phone ?: '—',
            'Group' => fn (Manager $m) => $m->group === 'branch' ? 'Branch manager' : 'Head office',
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:60'],
            'group' => ['required', 'in:head_office,branch'],
            'color_class' => ['required', 'in:c1,c2,c3,c4,c5,c6'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
