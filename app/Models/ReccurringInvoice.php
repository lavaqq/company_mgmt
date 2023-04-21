<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ReccurringInvoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function reccurringInvoiceItems(): HasMany
    {
        return $this->hasMany(ReccurringInvoiceItem::class);
    }
    public function getTotalExclTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $totalExclTax = $totalItem;
        return $totalExclTax;
    }
    public function getTotalInclTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $taxRate = $this->tax_rate;
        $totalItem += $totalItem * ($taxRate / 100);
        $totalInclTax = $totalItem;
        return $totalInclTax;
    }
    public function getTotalTax(): float
    {
        $totalItem = $this->reccurringInvoiceItems()->sum('amount');
        $taxRate = $this->tax_rate;
        $totalTax = $totalItem * ($taxRate / 100);
        return $totalTax;
    }

    public function scopeActive(Builder $query)
    {
        return $query->where(function($query) {
                $query->where('end_date', '>=', now())
                      ->orWhere('is_indefinite_duration', true);
            });
    }
    
}
