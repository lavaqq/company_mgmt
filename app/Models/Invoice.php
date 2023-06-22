<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'company_id',
        'reference',
        'vcs',
        'tax_rate',
        'issue_date',
        'due_date',
        'status',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function discounts(): HasMany
    {
        return $this->hasMany(InvoiceDiscount::class);
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
