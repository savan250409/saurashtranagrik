<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchSignboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'established_year', 'building_photo', 'financial_summary',
        'about', 'board_members', 'management', 'supporting_employees',
        'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'sort_order' => 'int',
        'financial_summary' => 'array',
        'about' => 'array',
        'board_members' => 'array',
        'management' => 'array',
        'supporting_employees' => 'array',
    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /** Rows the public site should render, in display order. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }
}
