<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    /**
     * Return ***relation*** between `employer` and `jobs`
     * 
     * @return HasMany<list<Job>>
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Return ***relation*** between `employer` and `user`
     * 
     * @return HasMany<list<User>>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
