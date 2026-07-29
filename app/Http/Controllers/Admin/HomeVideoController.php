<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeVideo;
use Illuminate\Database\Eloquent\Model;

class HomeVideoController extends BaseCrudController
{
    protected string $model = HomeVideo::class;

    protected string $key = 'home-videos';

    protected string $title = 'Home Video Gallery';

    protected string $singular = 'Video';

    protected array $searchable = ['title', 'video'];

    protected array $uploads = ['video' => 'videos'];

    protected function columns(): array
    {
        return [
            'Title' => fn (HomeVideo $v) => $v->title ?: '—',
            'File' => fn (HomeVideo $v) => $v->video,
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'video' => [$record ? 'nullable' : 'required', 'file', 'mimetypes:video/mp4,video/webm', 'max:262144'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
