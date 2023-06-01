<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'estimate_id',
        'description',
        'is_percentage',
        'amount',
    ];
}
