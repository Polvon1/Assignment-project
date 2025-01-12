<?php

namespace App\Models;

use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Region
 *
 * @property int $id
 * @property array $title
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Query\Builder|Region onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Region withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Region withoutTrashed()
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
class Region extends Model
{
    use HasFactory,SoftDeletes,HasLogsActivity,HasTranslations;

    protected $fillable = ['id','title','order'];

    public array $translatable = ['title'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'user_id');
    }

}
