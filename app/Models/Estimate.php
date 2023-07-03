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
        'company_id',
        'reference',
        'tax_rate',
        'deadline',
        'prepayment',
        'issue_date',
        'due_date',
        'status',
        'is_external',
        'external_file',
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

    public function getTotalExcludingTax(): float
    {
        $totalAmount = $this->items()->sum('amount');
        $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
        $totalAmount -= $totalFixedDiscount;
        $totalAmount *= (1 - ($totalPercentageDiscount / 100));

        return round($totalAmount, 2);
    }

    public function getTotalIncludingTax(): float
    {
        $totalAmount = $this->items()->sum('amount');
        $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalAmount -= $totalFixedDiscount;
        $totalAmount *= (1 - $totalPercentageDiscount / 100);
        $totalAmount *= (1 + $taxRate / 100);

        return round($totalAmount, 2);
    }

    public function getTax(): float
    {
        $totalAmount = $this->items()->sum('amount');
        $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalAmount -= $totalFixedDiscount;
        $totalAmount *= (1 - $totalPercentageDiscount / 100);
        $totalTax = $totalAmount * $taxRate / 100;

        return round($totalTax, 2);
    }
}
