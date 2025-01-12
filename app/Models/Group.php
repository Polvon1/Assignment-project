<?php

namespace App\Models;

use App\Support\Enums\RoleEnum;
use App\Support\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Group
 *
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read \App\Models\User $organization
 * @property-read \App\Models\Quiz $quiz
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @property int $id
 * @property string|null $name
 * @property string $link
 * @property bool $status
 * @property string|null $start
 * @property string|null $finish
 * @property int $qty
 * @property int $organization_id
 * @property int $quiz_id
 * @property int $created_by
 * @property int $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @method static Builder|Group initQuery()
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasAuthor;

    protected $fillable = [
        'name',
        'link',
        'status',
        'start',
        'finish',
        'organization_id',
        'quiz_id',
        'qty',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(User::class,'organization_id');
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }

    public function scopeInitQuery(Builder $query): Builder
    {
        if (!auth()->check()) return $query->where('created_at', now()->addYear());

        $auth_user = auth()->user();

        if ($auth_user->hasRole(RoleEnum::ORGANIZATION)){
            $query = $query->where('organization_id',$auth_user->organization_id);
        }

        return $query;
    }
}
