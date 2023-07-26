<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditNote extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'tax_rate',
        'issue_date',
        'status',
    ];

    /**
     * Get the invoice that owns the credit note.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the items for the credit note.
     */
    public function items(): HasMany
    {
        return $this->hasMany(CreditNoteItem::class);
    }

    /**
     * Get the discounts for the credit note.
     */
    public function discounts(): HasMany
    {
        return $this->hasMany(CreditNoteDiscount::class);
    }

    /**
     * Get the attachment that owns the credit note.
     */
    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class);
    }
}
