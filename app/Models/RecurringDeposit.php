<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringDeposit extends Model
{
    use HasFactory;

    protected $fillable = ['term', 'rate', 'rows', 'sort_order', 'is_active'];

    protected $casts = [
        'rows' => 'array',
        'is_active' => 'bool',
        'sort_order' => 'int',
    ];

    /** Rows the public site should render, in display order. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    /** Each entry is ['amount' => '100', 'maturity' => '1259']. */
    public function lines(): array
    {
        return collect($this->rows ?? [])
            ->filter(fn ($r) => filled($r['amount'] ?? null) || filled($r['maturity'] ?? null))
            ->values()
            ->all();
    }
}
