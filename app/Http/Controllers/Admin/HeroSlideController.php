<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroSlide;
use Illuminate\Database\Eloquent\Model;

class HeroSlideController extends BaseCrudController
{
    protected string $model = HeroSlide::class;

    protected string $key = 'hero-slides';

    protected string $title = 'Home Hero Gallery';

    protected string $singular = 'Slide';

    protected array $searchable = ['image', 'transition'];

    protected array $uploads = ['image' => 'slider'];

    protected array $filters = [
        'transition' => [
            'fade' => 'Fade',
            'slidehorizontal' => 'Slide horizontal',
            'slidevertical' => 'Slide vertical',
        ],
    ];

    protected function columns(): array
    {
        return [
            'Image' => fn (HeroSlide $s) => $s->image,
            'Transition' => fn (HeroSlide $s) => $s->transition,
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'image' => [$record ? 'nullable' : 'required', 'image', 'max:8192'],
            'transition' => ['required', 'in:fade,slidehorizontal,slidevertical'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
