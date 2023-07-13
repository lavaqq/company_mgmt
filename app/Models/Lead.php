<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'title',
        'status',
        'origin',
        'note',
        'start_date',
    ];

    /**
     * Get the company in relation with the record.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get all deals in relation with the record.
     */
    public function deals(): HasMany
    {
        return $this->HasMany(Deal::class);
    }
}
