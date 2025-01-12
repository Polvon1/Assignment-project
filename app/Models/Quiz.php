<?php

namespace App\Models;

use App\Support\Enums\RoleEnum;
use App\Support\Traits\HasAuthor;
use App\Support\Traits\HasLogsActivity;
use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Interfaces\ProductInterface;
use Bavix\Wallet\Interfaces\ProductLimitedInterface;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Quiz
 *
 * @property int $id
 * @property string $title
 * @property float $mark
 * @property int $duration
 * @property string|null $description
 * @property string|null $image
 * @property bool $show_answer
 * @property \Illuminate\Support\Carbon|null $start
 * @property \Illuminate\Support\Carbon|null $finish
 * @property int $category_id
 * @property int $difficulty_id
 * @property int $language_id
 * @property bool $is_public
 * @property int|null $qty
 * @property int|null $organization_id
 * @property int $created_by
 * @property int $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Difficulty $difficulty
 * @property-read \App\Models\Language $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @property-read \App\Models\User $updatedBy
 * @method static Builder|Quiz attachQuiz()
 * @method static Builder|Quiz categoryFilter(int $value)
 * @method static Builder|Quiz difficultyFilter(int $value)
 * @method static \Database\Factories\QuizFactory factory(...$parameters)
 * @method static Builder|Quiz initQuery()
 * @method static Builder|Quiz isPublicFilter(?int $value)
 * @method static Builder|Quiz languageFilter(int $value)
 * @method static Builder|Quiz newModelQuery()
 * @method static Builder|Quiz newQuery()
 * @method static \Illuminate\Database\Query\Builder|Quiz onlyTrashed()
 * @method static Builder|Quiz query()
 * @method static Builder|Quiz search(string $value)
 * @method static Builder|Quiz whereCategoryId($value)
 * @method static Builder|Quiz whereCreatedAt($value)
 * @method static Builder|Quiz whereCreatedBy($value)
 * @method static Builder|Quiz whereDeletedAt($value)
 * @method static Builder|Quiz whereDeletedBy($value)
 * @method static Builder|Quiz whereDescription($value)
 * @method static Builder|Quiz whereDifficultyId($value)
 * @method static Builder|Quiz whereDuration($value)
 * @method static Builder|Quiz whereFinish($value)
 * @method static Builder|Quiz whereId($value)
 * @method static Builder|Quiz whereImage($value)
 * @method static Builder|Quiz whereIsPublic($value)
 * @method static Builder|Quiz whereLanguageId($value)
 * @method static Builder|Quiz whereMark($value)
 * @method static Builder|Quiz whereOrganizationId($value)
 * @method static Builder|Quiz whereQty($value)
 * @method static Builder|Quiz whereShowAnswer($value)
 * @method static Builder|Quiz whereStart($value)
 * @method static Builder|Quiz whereTitle($value)
 * @method static Builder|Quiz whereUpdatedAt($value)
 * @method static Builder|Quiz whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Quiz withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Quiz withoutTrashed()
 * @mixin \Eloquent
 */
class Quiz extends Model
{
    use SoftDeletes,HasLogsActivity,HasAuthor,HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'start',
        'finish',
        'mark',
        'show_answer',
        'language_id',
        'duration',
        'organization_id',
        'difficulty_id',
        'qty',
        'is_public',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $with = ['language'];

    public array $translatable = [
        'title','description',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'start' => 'datetime',
        'finish' => 'datetime'
    ];

    public function scopeCategoryFilter(Builder $query, int $value): Builder
    {
        if ($value == 0){
            return $query;
        }
        return $query->where('category_id',$value);

    }

    public function scopeDifficultyFilter(Builder $query, int $value): Builder
    {
        if ($value == 0){
            return $query;
        }
        return $query->where('difficulty_id',$value);
    }

    public function scopeLanguageFilter(Builder $query, int $value): Builder
    {
        if ($value == 0){
            return $query;
        }
        return $query->where('language_id',$value);
    }

    public function scopeSearch(Builder $query, string $value): Builder
    {
        return $query
            ->where('title','ILIKE','%'.$value.'%')
            ->orWhere('description','ILIKE','%'.$value.'%');
    }

    public function scopeInitQuery(Builder $query): Builder
    {
        if (!auth()->check()) return $query->where('created_at', now()->addYear());

        $auth_user = auth()->user();

        if ($auth_user->hasRole(RoleEnum::ORGANIZATION)){
            $query = $query->where('organization_id',$auth_user->organization_id)->orWhere('is_public',true);
        }elseif($auth_user->hasRole(RoleEnum::USER)){
            $query = $query->whereIn('id',$auth_user->quizzes->pluck('id')->toArray());
        }
        return $query;
    }

    public function scopeAttachQuiz(Builder $query): Builder
    {
        return $query->where('is_public',false);
    }

    public function scopeIsPublicFilter(Builder $query, int|null $value): Builder
    {
        if ($value < 0 or $value > 1){
            return $query;
        }

        return $query->where('is_public',(bool)$value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class,'quiz_id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class,'language_id');
    }

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class,'difficulty_id');
    }
}
