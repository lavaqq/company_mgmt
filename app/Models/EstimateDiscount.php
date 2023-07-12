<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimateDiscount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'is_percentage',
        'amount',
    ];

    /**
     * Get the estimate in relation with the record.
     */
    public function estimate(): BelongsTo
    {
        return $this->belongsTo(Estimate::class);
    }
}
