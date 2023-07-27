<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyAddress extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'number',
        'box',
        'city',
        'zipcode',
        'country',
    ];

    /**
     * Get the company that owns the address.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
