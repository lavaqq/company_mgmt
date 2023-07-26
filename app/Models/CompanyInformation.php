<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyInformation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'legal_form',
        'vat_number',
        'vat_country_code',
    ];

    /**
     * Get the company that owns the phone.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
