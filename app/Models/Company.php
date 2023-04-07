<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    public function reccuringInvoices(): HasMany
    {
        return $this->hasMany(ReccuringInvoice::class);
    }
    public function adress(): HasOne
    {
        return $this->hasOne(Adress::class);
    }
}
