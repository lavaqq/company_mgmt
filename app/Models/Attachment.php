<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    /**
     * Get the estimate associated with the attachment.
     */
    public function estimate(): HasOne
    {
        return $this->hasOne(Estimate::class);
    }

    /**
     * Get the invoice associated with the attachment.
     */
    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    /**
     * Get the credit note associated with the attachment.
     */
    public function creditNote(): HasOne
    {
        return $this->hasOne(CreditNote::class);
    }
}
