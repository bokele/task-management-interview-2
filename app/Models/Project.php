<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'slug', 'code', 'name', 'description'];

    /**
     * Get all of the comments for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
