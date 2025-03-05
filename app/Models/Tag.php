<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    /**
     * Return the ***Relation*** between `job` and `tags`.
     * 
     * @return BelongsToMany<list<Job>>
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'job_tag', null, 'job_listing_id');
    }
}
