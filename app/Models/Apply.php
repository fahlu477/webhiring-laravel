<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Apply
 *
 * @property int $id
 * @property int $user_id
 * @property int $job_id
 * @property int $score_degree
 * @property int $score_education
 * @property int $score_experience
 * @property int $score_age
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Apply newModelQuery()
 * @method static Builder|Apply newQuery()
 * @method static Builder|Apply query()
 * @method static Builder|Apply whereCreatedAt($value)
 * @method static Builder|Apply whereId($value)
 * @method static Builder|Apply whereJobId($value)
 * @method static Builder|Apply whereScoreAge($value)
 * @method static Builder|Apply whereScoreDegree($value)
 * @method static Builder|Apply whereScoreEducation($value)
 * @method static Builder|Apply whereScoreExperience($value)
 * @method static Builder|Apply whereStatus($value)
 * @method static Builder|Apply whereUpdatedAt($value)
 * @method static Builder|Apply whereUserId($value)
 * @mixin Eloquent
 * @property-read string $job_name
 * @property-read string $user_name
 * @property-read Job $job
 * @property-read User $user
 */
class Apply extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'job_name', 'user_name'
    ];

    /**
     * Get the administrator flag for the user.
     *
     * @return string
     */
    public function getJobNameAttribute(): string
    {
        return $this->job->name;
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return string
     */
    public function getUserNameAttribute(): string
    {
        return $this->user->name;
    }

    /**
     * Get the job record associated with the apply.
     */
    public function job(): belongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the user record associated with the apply.
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
