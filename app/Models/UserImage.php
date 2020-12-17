<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserImage
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $type
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserImage newModelQuery()
 * @method static Builder|UserImage newQuery()
 * @method static Builder|UserImage query()
 * @method static Builder|UserImage whereCreatedAt($value)
 * @method static Builder|UserImage whereId($value)
 * @method static Builder|UserImage whereImage($value)
 * @method static Builder|UserImage whereName($value)
 * @method static Builder|UserImage whereType($value)
 * @method static Builder|UserImage whereUpdatedAt($value)
 * @method static Builder|UserImage whereUserId($value)
 * @mixin Eloquent
 */
class UserImage extends Model
{
    //
}
