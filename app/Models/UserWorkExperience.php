<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserWorkExperience
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserWorkExperience newModelQuery()
 * @method static Builder|UserWorkExperience newQuery()
 * @method static Builder|UserWorkExperience query()
 * @method static Builder|UserWorkExperience whereCreatedAt($value)
 * @method static Builder|UserWorkExperience whereId($value)
 * @method static Builder|UserWorkExperience whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property string $company
 * @property string $industry
 * @property string $title
 * @property string $description
 * @property string $join
 * @property string $out
 * @property-read User $user
 * @method static Builder|UserWorkExperience latestWorkExperience()
 * @method static Builder|UserWorkExperience whereCompany($value)
 * @method static Builder|UserWorkExperience whereDescription($value)
 * @method static Builder|UserWorkExperience whereIndustry($value)
 * @method static Builder|UserWorkExperience whereJoin($value)
 * @method static Builder|UserWorkExperience whereOut($value)
 * @method static Builder|UserWorkExperience whereTitle($value)
 * @method static Builder|UserWorkExperience whereUserId($value)
 */
class UserWorkExperience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'industry', 'title', 'description', 'join', 'out'
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
     * @return Collection
     */
    public function scopeLatestWorkExperience($query): Collection
    {
        $query->latest('out');
        $query->latest('join');

        return $query->get();
    }
}
