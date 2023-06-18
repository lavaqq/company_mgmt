<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstimateDiscount extends Model
{
    protected $fillable = [
        'description',
        'is_percentage',
        'amount',
    ];

    public function estimate(): BelongsTo
    {
        return $this->belongsTo(Estimate::class);
    }
}
