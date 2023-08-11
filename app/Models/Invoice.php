<?php

namespace App\Models;

use App\Enums\Country;
use App\Enums\CountryCode;
use App\Enums\InvoiceStatus;
use App\Enums\LegalForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'legal_form',
        'vat_number',
        'vat_country_code',
        'street',
        'number',
        'box',
        'city',
        'zipcode',
        'country',
        'reference',
        'vcs',
        'tax_rate',
        'issue_date',
        'due_date',
        'status',
        'in_accounting_software',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'legal_form' => LegalForm::class,
        'vat_country_code' => CountryCode::class,
        'country' => Country::class,
    ];

    /**
     * Get the items for the invoice.
     */
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Get the discounts for the invoice.
     */
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
