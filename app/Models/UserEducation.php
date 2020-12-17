<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserEducation
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserEducation newModelQuery()
 * @method static Builder|UserEducation newQuery()
 * @method static Builder|UserEducation query()
 * @method static Builder|UserEducation whereCreatedAt($value)
 * @method static Builder|UserEducation whereId($value)
 * @method static Builder|UserEducation whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property int $degree_id
 * @property string $city_id
 * @property string $school_name
 * @property float|null $gpa
 * @property string $graduation
 * @property string $entry
 * @property-read User $user
 * @method static Builder|UserEducation whereCityId($value)
 * @method static Builder|UserEducation whereDegreeId($value)
 * @method static Builder|UserEducation whereEntry($value)
 * @method static Builder|UserEducation whereGpa($value)
 * @method static Builder|UserEducation whereGraduation($value)
 * @method static Builder|UserEducation whereSchoolName($value)
 * @method static Builder|UserEducation whereUserId($value)
 * @property int|null $program_study_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserEducation latestEducation()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserEducation whereProgramStudyId($value)
 */
class UserEducation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_name', 'gpa', 'graduation', 'entry'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to sort by latest educations.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeLatestEducation($query): Builder
    {
        $query->latest('degree_id');
        $query->latest('graduation');

        return $query;
    }
}
