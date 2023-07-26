<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivedInvoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'issue_date',
        'total_excl_vat',
        'tax',
        'in_accounting_software',
    ];

    /**
     * Get the company that owns the received invoice.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the attachment that owns the received invoice.
     */
    public function attachment(): BelongsTo
    {
        return $this->belongsTo(Attachment::class);
    }
}
