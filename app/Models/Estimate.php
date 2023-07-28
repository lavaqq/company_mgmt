<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estimate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'tax_rate',
        'issue_date',
        'deadline',
        'prepayment',
        'status',
        'presigned'
    ];

    /**
     * Get the company that owns the estimate.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the items for the estimate.
     */
    public function items(): HasMany
    {
        return $this->hasMany(EstimateItem::class);
    }

    /**
     * Get the discounts for the estimate.
     */
    public function discounts(): HasMany
    {
        return $this->hasMany(EstimateDiscount::class);
    }
}
