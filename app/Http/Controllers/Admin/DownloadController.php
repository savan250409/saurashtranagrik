<?php

namespace App\Http\Controllers\Admin;

use App\Models\Download;
use Illuminate\Database\Eloquent\Model;

class DownloadController extends BaseCrudController
{
    protected string $model = Download::class;

    protected string $key = 'downloads';

    protected string $title = 'Downloads';

    protected string $singular = 'Download';

    protected array $searchable = ['title', 'file'];

    protected array $uploads = ['file' => 'documents'];

    protected function columns(): array
    {
        return [
            'Title' => fn (Download $d) => $d->title,
            'File' => fn (Download $d) => $d->file,
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'file' => [$record ? 'nullable' : 'required', 'file', 'mimes:pdf,doc,docx,xls,xlsx', 'max:51200'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
