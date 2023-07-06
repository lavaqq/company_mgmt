<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estimate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'deal_id',
        'company_id',
        'reference',
        'tax_rate',
        'issue_date',
        'deadline',
        'prepayment',
        'status',
        'external_estimate',
    ];

    /**
     * Get the deal in relation with the record.
     */
    public function deal(): BelongsTo
    {
        return $this->BelongsTo(Deal::class);
    }

    /**
     * Get all items in relation with the record.
     */
    public function items(): HasMany
    {
        return $this->hasMany(EstimateItem::class);
    }

    /**
     * Get all discounts in relation with the record.
     */
    public function discounts(): HasMany
    {
        return $this->hasMany(EstimateDiscount::class);
    }
}
