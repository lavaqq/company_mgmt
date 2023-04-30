<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'box',
        'city',
        'zipcode',
        'country',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
