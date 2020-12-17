<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use YoHang88\LetterAvatar\LetterAvatar;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|UserEducation[] $educations
 * @property-read string $avatar
 * @property-read Collection|UserImage[] $images
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read Collection|Permission[] $permissions
 * @property-read UserProfile $profile
 * @property-read Collection|Role[] $roles
 * @property-read Collection|UserWorkExperience[] $workExperiences
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read int|null $educations_count
 * @property-read int|null $images_count
 * @property-read int|null $notifications_count
 * @property-read int|null $permissions_count
 * @property-read int|null $roles_count
 * @property-read int|null $work_experiences_count
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set the user's password.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * Get the product image attribute.
     *
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        return new LetterAvatar($this->attributes['name'], 'square', 128);
    }

    /**
     * Get the profile record associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Get the roles record associated with the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assign Role
     * @param $role
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        return $this->roles()->attach($role);
    }

    /**
     * Revoke Role
     * @param $role
     * @return mixed
     */
    public function revokeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }

        return $this->roles()->detach($role);
    }

    /**
     * Check Role
     * @param $name
     * @return bool
     */
    public function hasRole($name): bool
    {
        foreach ($this->roles as $role) {
            if ($role->name === $name) {
                return true;
            }
        }

        return false;
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(UserWorkExperience::class);
    }
}
