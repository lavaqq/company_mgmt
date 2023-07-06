<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

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
    ];

    /**
     * Get all contacts in relation with the record.
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }

    /**
     * Get all leads in relation with the record.
     */
    public function leads(): HasMany
    {
        return $this->HasMany(Lead::class);
    }

    /**
     * Get all deals in relation with the record.
     */
    public function deals(): HasManyThrough
    {
        return $this->hasManyThrough(Deal::class, Lead::class);
    }

    /**
     * Get all estimates in relation with the record.
     */
    public function estimates(): HasManyThrough
    {
        return $this->hasManyThrough(Estimate::class, Deal::class, 'lead_id', 'deal_id')
            ->with('lead');
    }

    /**
     * Get all invoices in relation with the record.
     */
    public function invoices(): HasManyThrough
    {
        return $this->hasManyThrough(Invoice::class, Deal::class, 'lead_id', 'deal_id')
            ->with('lead');
    }

    /**
     * Get all received invoices in relation with the record.
     */
    public function receivedInvoices(): HasMany
    {
        return $this->HasMany(ReceivedInvoice::class);
    }
}
