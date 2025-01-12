<?php

namespace App\Models;

use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\District
 *
 * @property int $id
 * @property array $title
 * @property int $region_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Region $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|District filterByRegion($value)
 * @method static Builder|District newModelQuery()
 * @method static Builder|District newQuery()
 * @method static \Illuminate\Database\Query\Builder|District onlyTrashed()
 * @method static Builder|District query()
 * @method static Builder|District whereCreatedAt($value)
 * @method static Builder|District whereDeletedAt($value)
 * @method static Builder|District whereId($value)
 * @method static Builder|District whereOrder($value)
 * @method static Builder|District whereRegionId($value)
 * @method static Builder|District whereTitle($value)
 * @method static Builder|District whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|District withTrashed()
 * @method static \Illuminate\Database\Query\Builder|District withoutTrashed()
 * @property-read mixed $translations
 * @method static Builder|District whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder|District whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder|District whereLocale(string $column, string $locale)
 * @method static Builder|District whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
class District extends Model
{
    use HasFactory,SoftDeletes,HasLogsActivity,HasTranslations;

    protected $fillable = ['id','title','region_id','order'];

    public array $translatable = ['title'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'district_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function scopeFilterByRegion(Builder $query, $value): Builder
    {
        if ($value == "0") return $query;
        return $query->where('region_id',$value);
    }
}
