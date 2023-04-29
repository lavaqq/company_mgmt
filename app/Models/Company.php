<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function receivedInvoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function adress(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }
}
 