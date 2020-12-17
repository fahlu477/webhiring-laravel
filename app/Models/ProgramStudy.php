<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProgramStudy
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProgramStudy newModelQuery()
 * @method static Builder|ProgramStudy newQuery()
 * @method static Builder|ProgramStudy query()
 * @method static Builder|ProgramStudy whereCreatedAt($value)
 * @method static Builder|ProgramStudy whereId($value)
 * @method static Builder|ProgramStudy whereName($value)
 * @method static Builder|ProgramStudy whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProgramStudy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
