<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'photo', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'bool', 'sort_order' => 'int'];

    /** Rows the public site should render, in display order. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }
}