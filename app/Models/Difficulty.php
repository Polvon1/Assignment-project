<?php

namespace App\Models;

use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Difficulty
 *
 * @property int $id
 * @property array $title
 * @property string $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quiz[] $quizzes
 * @property-read int|null $quizzes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereUpdatedAt($value)
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Difficulty whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
class Difficulty extends Model
{
    use HasLogsActivity,HasTranslations;

    public array $translatable = ['title'];

    protected $fillable = ['title','score'];

    protected $hidden = ['created_at','deleted_at','updated_at'];

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class,'difficulty_id');
    }

}
