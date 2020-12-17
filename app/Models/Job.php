<?php

namespace App\Models;

use App\Enums\Degree;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

/**
 * App\Models\Job
 *
 * @property int $id
 * @property int $education_id
 * @property int $experience_id
 * @property int $program_study_id
 * @property string $name
 * @property string $function
 * @property string $description
 * @property int $minimum_age
 * @property int $maximum_age
 * @property \Illuminate\Support\Carbon $open
 * @property \Illuminate\Support\Carbon $close
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Experience $experience
 * @property-read string $close_format
 * @property-read string $education_name
 * @property-read string $experience_name
 * @property-read string $open_format
 * @property-read string $program_study_name
 * @property-read ProgramStudy $programStudy
 * @method static Builder|Job newModelQuery()
 * @method static Builder|Job newQuery()
 * @method static Builder|Job published()
 * @method static Builder|Job query()
 * @method static Builder|Job search(Request $request)
 * @method static Builder|Job whereClose($value)
 * @method static Builder|Job whereCreatedAt($value)
 * @method static Builder|Job whereDescription($value)
 * @method static Builder|Job whereEducationId($value)
 * @method static Builder|Job whereExperienceId($value)
 * @method static Builder|Job whereFunction($value)
 * @method static Builder|Job whereId($value)
 * @method static Builder|Job whereMaximumAge($value)
 * @method static Builder|Job whereMinimumAge($value)
 * @method static Builder|Job whereName($value)
 * @method static Builder|Job whereOpen($value)
 * @method static Builder|Job whereProgramStudyId($value)
 * @method static Builder|Job wherePublished($value)
 * @method static Builder|Job whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Job extends Model
{
    protected $table = 'job_table';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'function', 'description', 'minimum_age', 'maximum_age', 'open', 'close', 'published', 'education_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
        'open'      => 'date',
        'close'     => 'date'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'experience_name', 'program_study_name', 'open_format', 'close_format'
    ];

    /**
     * Get the administrator flag for the user.
     *
     * @return string
     */
    public function getExperienceNameAttribute(): string
    {
        return $this->experience->name;
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return string
     */
    public function getProgramStudyNameAttribute(): string
    {
        return $this->programStudy->name;
    }

    /**
     * Get the administrator flag for the user.
     *
     * @return string
     */
    public function getEducationNameAttribute(): string
    {
        return Degree::getDescription($this->attributes['education_id']);
    }

    /**
     * Get the open for the user.
     *
     * @return string
     */
    public function getOpenFormatAttribute(): string
    {
        return Carbon::parse($this->attributes['open'])->format('d-m-Y');
    }

    /**
     * Get the close for the user.
     *
     * @return string
     */
    public function getCloseFormatAttribute(): string
    {
        return Carbon::parse($this->attributes['close'])->format('d-m-Y');
    }

    /**
     * Scope a query to only include active users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished($query): Builder
    {
        return $query->where('published', true);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeSearch($query, Request $request): Builder
    {
        $experience = $request->input('experience');
        if (!empty($experience)) {
            $query->where('experience_id', $experience);
        }

        return $query;
    }

    /**
     * Get the experience record associated with the job.
     */
    public function experience(): belongsTo
    {
        return $this->belongsTo(Experience::class);
    }

    /**
     * Get the experience record associated with the job.
     */
    public function programStudy(): belongsTo
    {
        return $this->belongsTo(ProgramStudy::class);
    }
}
