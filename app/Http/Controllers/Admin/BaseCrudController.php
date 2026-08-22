<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Shared list/create/edit/delete behaviour for every content module, so search,
 * filtering, pagination, ordering and uploads behave identically everywhere.
 *
 * A concrete controller only declares what makes it different: its model, its
 * labels, which columns are searchable, which filters it offers, its validation
 * rules and which fields hold uploaded files.
 */
abstract class BaseCrudController extends Controller
{
    /** @var class-string<Model> */
    protected string $model;

    /** Route name segment, e.g. "branches" -> admin.branches.index */
    protected string $key;

    protected string $title;

    protected string $singular;

    /** Columns matched by the search box. */
    protected array $searchable = [];

    /**
     * Extra dropdown filters, as column => [value => label].
     * "Status" (is_active) is added automatically for every module.
     */
    protected array $filters = [];

    /** Field name => subdirectory under public/uploads. */
    protected array $uploads = [];

    /** Columns rendered by the generic list table: label => accessor. */
    abstract protected function columns(): array;

    abstract protected function rules(?Model $record): array;

    protected function perPage(): int
    {
        return 10;
    }

    public function index(Request $request): View
    {
        $query = $this->model::query();

        $search = trim((string) $request->query('search', ''));
        if ($search !== '' && $this->searchable) {
            $query->where(function (Builder $q) use ($search) {
                foreach ($this->searchable as $column) {
                    $q->orWhere($column, 'like', '%'.$search.'%');
                }
            });
        }

        $status = $request->query('status');
        if ($status === 'active' || $status === 'inactive') {
            $query->where('is_active', $status === 'active');
        }

        foreach ($this->filters as $column => $options) {
            $value = $request->query($column);
            if ($value !== null && $value !== '' && array_key_exists($value, $options)) {
                $query->where($column, $value);
            }
        }

        $records = $query->orderBy('sort_order')->orderBy('id')
            ->paginate($this->perPage())
            ->withQueryString();

        return view('admin.crud.index', $this->viewData([
            'records' => $records,
            'columns' => $this->columns(),
            'search' => $search,
            'status' => $status,
            'filters' => $this->filters,
            'activeFilters' => $request->query(),
        ]));
    }

    public function create(): View
    {
        return view('admin.crud.form', $this->viewData([
            'record' => new $this->model,
            'mode' => 'create',
        ]));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->prepare($request, $request->validate($this->rules(null)), null);

        $record = $this->model::create($data);

        return redirect()->route("admin.{$this->key}.index")
            ->with('status', "{$this->singular} created.");
    }

    public function edit(int $id): View
    {
        return view('admin.crud.form', $this->viewData([
            'record' => $this->model::findOrFail($id),
            'mode' => 'edit',
        ]));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $record = $this->model::findOrFail($id);
        $data = $this->prepare($request, $request->validate($this->rules($record)), $record);

        $record->update($data);

        return redirect()->route("admin.{$this->key}.index")
            ->with('status', "{$this->singular} updated.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $record = $this->model::findOrFail($id);

        foreach ($this->uploads as $field => $folder) {
            if (! empty($record->{$field})) {
                $this->deleteUpload($record->{$field});
            }
        }

        $record->delete();

        return redirect()->route("admin.{$this->key}.index")
            ->with('status', "{$this->singular} deleted.");
    }

    /** Flip is_active straight from the list, without opening the form. */
    public function toggle(int $id): RedirectResponse
    {
        $record = $this->model::findOrFail($id);
        $record->update(['is_active' => ! $record->is_active]);

        return back()->with('status', "{$this->singular} ".($record->is_active ? 'shown' : 'hidden').' on the site.');
    }

    /**
     * Normalises checkbox + upload fields. An upload field that receives no new
     * file keeps whatever the record already had.
     */
    protected function prepare(Request $request, array $data, ?Model $record): array
    {
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        foreach ($this->uploads as $field => $folder) {
            $file = $request->file($field);

            if ($file instanceof UploadedFile) {
                if ($record && ! empty($record->{$field})) {
                    $this->deleteUpload($record->{$field});
                }
                $data[$field] = $this->storeUpload($file, $folder);
            } else {
                unset($data[$field]);
            }
        }

        return $data;
    }

    /** Deletes an existing uploaded file from the public directory if it exists. */
    protected function deleteUpload(?string $path): void
    {
        if (! $path) {
            return;
        }

        // Safeguard: only remove files located inside the uploads directory, protecting static assets
        $uploadDir = config('admin.upload_dir', 'uploads');
        if (! str_starts_with($path, $uploadDir.'/')) {
            return;
        }

        $absolute = public_path($path);

        if (is_file($absolute)) {
            @unlink($absolute);
        }
    }

    /** Writes into public/uploads/<folder> and returns the public-relative path. */
    protected function storeUpload(UploadedFile $file, string $folder): string
    {
        $dir = config('admin.upload_dir').'/'.$folder;
        $absolute = public_path($dir);

        if (! is_dir($absolute)) {
            mkdir($absolute, 0755, true);
        }

        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $name = ($name !== '' ? $name : 'file').'-'.Str::lower(Str::random(6)).'.'.$file->getClientOriginalExtension();

        $file->move($absolute, $name);

        return $dir.'/'.$name;
    }

    protected function viewData(array $extra = []): array
    {
        return array_merge([
            'key' => $this->key,
            'title' => $this->title,
            'singular' => $this->singular,
            'uploads' => $this->uploads,
        ], $extra);
    }
}
