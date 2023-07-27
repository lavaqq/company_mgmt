<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the adress associated with the company.
     */
    public function adress(): HasOne
    {
        return $this->hasOne(CompanyAddress::class);
    }

    /**
     * Get the information associated with the company.
     */
    public function information(): HasOne
    {
        return $this->hasOne(CompanyInformation::class);
    }

    /**
     * The contacts that belong to the company.
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }

    /**
     * Get the leads for the company.
     */
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Get all of the deals for the company.
     */
    public function deals(): HasManyThrough
    {
        return $this->hasManyThrough(Deals::class, Lead::class);
    }

    /**
     * Get the estimates for the company.
     */
    public function estimates(): HasMany
    {
        return $this->hasMany(Estimate::class);
    }

    /**
     * Get the invoices for the company.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get all of the credit notes for the company.
     */
    public function creditNotes(): HasManyThrough
    {
        return $this->hasManyThrough(CreditNote::class, Invoice::class);
    }

    /**
     * Get the received invoices for the company.
     */
    public function receivedInvoices(): HasMany
    {
        return $this->hasMany(ReceivedInvoice::class);
    }
}
