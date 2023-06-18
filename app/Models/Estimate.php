<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estimate extends Model
{
    protected $fillable = [
        'reference',
        'tax_rate',
        'deadline',
        'no_prepayment',
        'issue_date',
        'due_date',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(EstimateItem::class);
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(EstimateDiscount::class);
    }
}
