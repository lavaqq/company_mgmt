<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lead_id',
        'company_id',
        'title',
        'status',
        'deal_value',
        'actual_deal_value',
        'start_date',
        'signature_date',
    ];

    /**
     * Get the lead in relation with the record.
     */
    public function lead(): BelongsTo
    {
        return $this->BelongsTo(Lead::class);
    }

    /**
     * Get all estimates in relation with the record.
     */
    public function estimates(): HasMany
    {
        return $this->HasMany(Estimate::class);
    }
}
