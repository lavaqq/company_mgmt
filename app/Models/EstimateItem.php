<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimateItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
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
