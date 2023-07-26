<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'note',
        'status',
        'duration_tmp_start',
        'duration_tmp_stop',
        'duration',
        'estimated_duration',
        'schedule_start',
        'schedule_end',
    ];

    /**
     * The users that belong to the task.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
