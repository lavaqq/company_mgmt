<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReceivedInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'reference',
        'issue_date',
        'due_date',
        'tax_rate',
        'total_excl_tax',
        'total_incl_tax',
        'status',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getTotalIncludingTax(): float
    {
        return $this->total_excl_tax * (1 + $this->tax_rate / 100);
    }
}
