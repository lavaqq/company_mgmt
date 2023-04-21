<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function invoiceDiscounts(): HasMany
    {
        return $this->hasMany(InvoiceDiscount::class);
    }
    public function reccurringInvoice(): BelongsTo
    {
        return $this->belongsTo(ReccurringInvoice::class);
    }
    public static function genVCS()
    {
        $count = self::whereNull('deleted_at')->count();
        $vcsStart = str_pad($count + 1, 10, "0", STR_PAD_LEFT);
        $verificationNumber = round(($count + 1 / 97 - floor($count + 1 / 97)) * 97);
        if ($verificationNumber === 0) {
            $verificationNumber = 97;
        }
        $tempVCS = $vcsStart . str_pad($verificationNumber, 2, "0", STR_PAD_LEFT);
        $vcs = "+++" . substr($tempVCS, 0, 3) . "/" . substr($tempVCS, 3, 4) . "/" . substr($tempVCS, 7, 5) . "+++";
        return $vcs;
    }
    protected static function genInvoiceNum()
    {
        $count = self::whereNull('deleted_at')->count();
        $invoice_number = 'LS-' . str_pad((string) ($count + 1), 4, '0', STR_PAD_LEFT);
        return $invoice_number;
    }
    public function getTotalExclTax(): float
    {
        $totalItem = $this->invoiceItems()->sum('amount');
        $totalDiscountEuro = $this->invoiceDiscounts()->where('is_percentage', '!=', true)->sum('amount');
        $totalDiscountPerc = $this->invoiceDiscounts()->where('is_percentage', '=', true)->sum('amount');
        $totalItem -= $totalDiscountEuro;
        $totalItem -= $totalItem * ($totalDiscountPerc / 100);
        $totalExclTax = $totalItem;
        return $totalExclTax;
    }
    public function getTotalInclTax(): float
    {
        $totalItem = $this->invoiceItems()->sum('amount');
        $totalDiscountEuro = $this->invoiceDiscounts()->where('is_percentage', '!=', true)->sum('amount');
        $totalDiscountPerc = $this->invoiceDiscounts()->where('is_percentage', '=', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem -= $totalDiscountEuro;
        $totalItem -= $totalItem * ($totalDiscountPerc / 100);
        $totalItem += $totalItem * ($taxRate / 100);
        $totalInclTax = $totalItem;
        return $totalInclTax;
    }
    public function getTotalTax(): float
    {
        $totalItem = $this->invoiceItems()->sum('amount');
        $totalDiscountEuro = $this->invoiceDiscounts()->where('is_percentage', '!=', true)->sum('amount');
        $totalDiscountPerc = $this->invoiceDiscounts()->where('is_percentage', '=', true)->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem -= $totalDiscountEuro;
        $totalItem -= $totalItem * ($totalDiscountPerc / 100);
        $totalTax = $totalItem * ($taxRate / 100);
        return $totalTax;
    }
}
