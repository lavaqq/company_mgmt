<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'reference',
        'vcs',
        'issue_date',
        'due_date',
        'tax_rate',
        'total_excl_tax',
        'total_incl_tax',
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

    public static function generateVCS(): string
    {
        $count = self::count();
        $vcsStart = str_pad($count + 1, 10, "0", STR_PAD_LEFT);
        $verificationNumber = (98 - ($count + 1) % 97) % 97;
        $tempVCS = $vcsStart . str_pad($verificationNumber, 2, "0", STR_PAD_LEFT);
        return "+++" . substr_replace(substr_replace(substr($tempVCS, 0, 3), "/", 1, 0), "/", 5, 0) . "+++";
    }

    protected static function generateReference(): string
    {
        $count = self::count();
        return "LS-" . str_pad($count + 1, 4, "0", STR_PAD_LEFT);
    }

    public function getTotalExcludingTax(): float
    {
        $totalItem = $this->items()->sum('amount');
        $totalDiscountEuro = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalDiscountPerc = $this->discounts()->where('is_percentage', true)->sum('amount');
        $totalItem -= $totalDiscountEuro;
        $totalItem *= (1 - $totalDiscountPerc / 100);
        return $totalItem;
    }

    public function getTotalIncludingTax(): float
    {
        $totalItem = $this->items()->sum('amount');
        $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem -= $totalFixedDiscount;
        $totalItem *= (1 - $totalPercentageDiscount / 100);
        $totalItem *= (1 + $taxRate / 100);
        return $totalItem;
    }

    public function getTax(): float
    {
        $totalItem = $this->items()->sum('amount');
        $totalFixedDiscount = $this->discounts()->where('is_percentage', false)->sum('amount');
        $totalPercentageDiscount = $this->discounts()->where('is_percentage', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem -= $totalFixedDiscount;
        $totalItem *= (1 - $totalPercentageDiscount / 100);
        $totalTax = $totalItem * $taxRate / 100;
        return $totalTax;
    }
}
