<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'mobile', 'color_class', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'bool', 'sort_order' => 'int'];

    /** Rows the public site should render, in display order. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->orderByRaw("CASE WHEN name LIKE '%Head Office%' THEN 0 ELSE 1 END")
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function getRouteKey(): string
    {
        return Str::slug($this->name);
    }

    public function resolveRouteBinding($value, $field = null): ?static
    {
        return static::where('is_active', true)->get()
            ->first(fn ($b) => Str::slug($b->name) === $value);
    }

    public function signboard(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BranchSignboard::class);
    }
}