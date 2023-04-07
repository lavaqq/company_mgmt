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
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
