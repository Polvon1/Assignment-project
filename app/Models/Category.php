<?php

namespace App\Models;

use App\Support\Enums\RoleEnum;
use App\Support\Traits\HasAuthor;
use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property array $title
 * @property string|null $icon
 * @property string|null $background
 * @property bool $is_public
 * @property int|null $organization_id
 * @property int $created_by
 * @property int $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $organization
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quiz[] $quizzes
 * @property-read int|null $quizzes_count
 * @property-read \App\Models\User $updatedBy
 * @method static Builder|Category initQuery()
 * @method static Builder|Category isPublicQuery()
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static Builder|Category query()
 * @method static Builder|Category search(string $value)
 * @method static Builder|Category whereBackground($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereCreatedBy($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereDeletedBy($value)
 * @method static Builder|Category whereIcon($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereIsPublic($value)
 * @method static Builder|Category whereOrganizationId($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Builder|Category whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 * @property-read mixed $translations
 * @method static Builder|Category whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static Builder|Category whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static Builder|Category whereLocale(string $column, string $locale)
 * @method static Builder|Category whereLocales(string $column, array $locales)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use SoftDeletes,HasTranslations,HasLogsActivity,HasAuthor;

    public array $translatable = ['title'];

    protected $fillable = ['title','background','icon','is_public','created_by','updated_by','deleted_by','organization_id'];

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class,'category_id');
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(User::class,'organization_id');
    }

    public function scopeInitQuery(Builder $query): Builder
    {
        if (!auth()->check()) return $query->where('created_at',now()->addYears(3));

        if (auth()->user()->hasRole(RoleEnum::ORGANIZATION)){
            return $query->where('is_public',true)->orWhere('organization_id',auth()->user()->organization_id);
        }

        return $query;
    }

    public function scopeIsPublicQuery(Builder $query): Builder
    {
        return $query->where('is_public',true);
    }

    public function scopeSearch(Builder $query,string $value): Builder
    {
        return $query
            ->where('title', 'ILIKE', '%' . $value . '%')
            ->orWhere('id', 'ILIKE', '%' . $value . '%');
    }





}
