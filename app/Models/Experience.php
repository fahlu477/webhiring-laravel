<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Experience
 *
 * @property int $id
 * @property string $name
 * @property int $minimum_experience_of_year
 * @property int $maximum_experience_of_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Experience newModelQuery()
 * @method static Builder|Experience newQuery()
 * @method static Builder|Experience query()
 * @method static Builder|Experience whereCreatedAt($value)
 * @method static Builder|Experience whereId($value)
 * @method static Builder|Experience whereMaximumExperienceOfYear($value)
 * @method static Builder|Experience whereMinimumExperienceOfYear($value)
 * @method static Builder|Experience whereName($value)
 * @method static Builder|Experience whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Experience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'minimum_experience_of_year', 'maximum_experience_of_year'];
}
