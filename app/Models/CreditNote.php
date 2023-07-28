<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditNote extends Model
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
        'status',
    ];

    /**
     * Get the invoice that owns the credit note.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the items for the credit note.
     */
    public function items(): HasMany
    {
        return $this->hasMany(CreditNoteItem::class);
    }

    /**
     * Get the discounts for the credit note.
     */
    public function discounts(): HasMany
    {
        return $this->hasMany(CreditNoteDiscount::class);
    }

    // TODO: adapt for credit notes
    // public function getTotalExcludingTax(): float
    // {
    //     $totalAmount = $this->items()->sum('amount');
    //     $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
    //     $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
    //     $totalAmount -= $totalFixedDiscount;
    //     $totalAmount *= (1 - ($totalPercentageDiscount / 100));

    //     return round($totalAmount, 2);
    // }

    // public function getTotalIncludingTax(): float
    // {
    //     $totalAmount = $this->items()->sum('amount');
    //     $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
    //     $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
    //     $taxRate = $this->tax_rate;
    //     $totalAmount -= $totalFixedDiscount;
    //     $totalAmount *= (1 - $totalPercentageDiscount / 100);
    //     $totalAmount *= (1 + $taxRate / 100);

    //     return round($totalAmount, 2);
    // }

    // public function getTax(): float
    // {
    //     $totalAmount = $this->items()->sum('amount');
    //     $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
    //     $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
    //     $taxRate = $this->tax_rate;
    //     $totalAmount -= $totalFixedDiscount;
    //     $totalAmount *= (1 - $totalPercentageDiscount / 100);
    //     $totalTax = $totalAmount * $taxRate / 100;

    //     return round($totalTax, 2);
    // }
}
