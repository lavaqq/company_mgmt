<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'description',
        'is_percentage',
        'amount',
    ];
}
