<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReccurringInvoiceItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function reccurringInvoice(): BelongsTo
    {
        return $this->belongsTo(ReccurringInvoice::class);
    }
}
