<?php

namespace App\Http\Controllers\Admin;

use App\Models\Director;
use Illuminate\Database\Eloquent\Model;

class DirectorController extends BaseCrudController
{
    protected string $model = Director::class;

    protected string $key = 'directors';

    protected string $title = 'Board of Directors';

    protected string $singular = 'Director';

    protected array $searchable = ['name', 'designation'];

    protected array $uploads = ['photo' => 'bod'];

    public function __construct()
    {
        // Filter by whichever designations actually exist, so the dropdown
        // stays useful as the board changes.
        $this->filters = [
            'designation' => Director::query()
                ->select('designation')->distinct()->orderBy('designation')
                ->pluck('designation', 'designation')->all(),
        ];
    }

    protected function columns(): array
    {
        return [
            'Photo' => fn (Director $d) => $d->photo,
            'Name' => fn (Director $d) => $d->name,
            'Designation' => fn (Director $d) => $d->designation,
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'photo' => [$record ? 'nullable' : 'required', 'image', 'max:8192'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
