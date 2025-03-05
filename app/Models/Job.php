<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    protected $table = 'job_listings';
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['title', 'salary', 'employer_id'];

    /**
     * Return the ***Relation*** between `job` and `employer`.
     * 
     * @return BelongsTo<Employer>
     */
    public function employer(): BelongsTo{
        return $this->belongsTo(Employer::class);
    }

    /**
     * Return the ***Relation*** between `job` and `tags`.
     * 
     * @return BelongsToMany<list<Tag>>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_listing_id', null);
    }
}
