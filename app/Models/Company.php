<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the adress associated with the company.
     */
    public function adress(): HasOne
    {
        return $this->hasOne(CompanyAdress::class);
    }

    /**
     * Get the information associated with the company.
     */
    public function information(): HasOne
    {
        return $this->hasOne(CompanyInformation::class);
    }

    /**
     * The contacts that belong to the company.
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }
}
