<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $birth_place_id
 * @property int|null $religion_id
 * @property int|null $marital_status_id
 * @property int|null $last_education_id
 * @property int|null $program_study_id
 * @property string|null $picture
 * @property string|null $no_identity
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $phone
 * @property string|null $current_address
 * @property string|null $current_district_id
 * @property string|null $current_zip_code
 * @property string|null $address
 * @property string|null $district_id
 * @property string|null $zip_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|UserProfile newModelQuery()
 * @method static Builder|UserProfile newQuery()
 * @method static Builder|UserProfile query()
 * @method static Builder|UserProfile whereAddress($value)
 * @method static Builder|UserProfile whereBirthDate($value)
 * @method static Builder|UserProfile whereBirthPlaceId($value)
 * @method static Builder|UserProfile whereCreatedAt($value)
 * @method static Builder|UserProfile whereCurrentAddress($value)
 * @method static Builder|UserProfile whereCurrentDistrictId($value)
 * @method static Builder|UserProfile whereCurrentZipCode($value)
 * @method static Builder|UserProfile whereDistrictId($value)
 * @method static Builder|UserProfile whereGender($value)
 * @method static Builder|UserProfile whereId($value)
 * @method static Builder|UserProfile whereLastEducationId($value)
 * @method static Builder|UserProfile whereMaritalStatusId($value)
 * @method static Builder|UserProfile whereNoIdentity($value)
 * @method static Builder|UserProfile wherePhone($value)
 * @method static Builder|UserProfile wherePicture($value)
 * @method static Builder|UserProfile whereProgramStudyId($value)
 * @method static Builder|UserProfile whereReligionId($value)
 * @method static Builder|UserProfile whereUpdatedAt($value)
 * @method static Builder|UserProfile whereUserId($value)
 * @method static Builder|UserProfile whereZipCode($value)
 * @mixin Eloquent
 * @property-read string $birth_date_format
 * @property-read string $birth_place
 */
class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture', 'no_identity', 'birth_date', 'gender', 'phone', 'current_address', 'current_zip_code', 'address',
        'zip_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date'
    ];

    /**
     * Get the birth_date for the user_profile.
     *
     * @return string
     */
    public function getBirthDateFormatAttribute(): string
    {
        return \Carbon\Carbon::parse($this->attributes['birth_date'])->format('d-m-Y');
    }

    /**
     * Get the birth_date for the user_profile.
     *
     * @return string
     */
    public function getBirthPlaceAttribute(): string
    {
        $city = \Indonesia::findCity($this->attributes['birth_place_id']);

        return $city->name ?? '';
    }

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
