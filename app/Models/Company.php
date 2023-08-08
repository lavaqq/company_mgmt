<?php

namespace App\Models;

use App\Enums\CompanyLegalFormEnum;
use App\Enums\Country;
use App\Enums\CountryCode;
use App\Enums\LegalForm;
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
        'name',
        'legal_form',
        'vat_number',
        'vat_country_code',
        'street',
        'number',
        'box',
        'city',
        'zipcode',
        'country'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'legal_form' => LegalForm::class,
        'vat_country_code' => CountryCode::class,
        'country' => Country::class
    ];

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
        return $this->hasManyThrough(Deal::class, Lead::class);
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
