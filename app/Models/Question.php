<?php

namespace App\Models;

use App\Support\Traits\HasAuthor;
use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $title
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $answer_explain
 * @property string $answer
 * @property string|null $image
 * @property string|null $video
 * @property int $quiz_id
 * @property int $category_id
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
 * @property-read \App\Models\Quiz $quiz
 * @property-read \App\Models\User $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Query\Builder|Question onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereAnswerExplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereVideo($value)
 * @method static \Illuminate\Database\Query\Builder|Question withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Question withoutTrashed()
 * @property-read \App\Models\Category $category
 * @mixin \Eloquent
 */
class Question extends Model
{
    use SoftDeletes, HasLogsActivity, HasAuthor;

    protected $fillable = [
        'quiz_id', 'title', 'a', 'b', 'c', 'd', 'answer', 'answer_explain', 'image', 'video', 'created_by', 'updated_by', 'deleted_by','category_id'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    #[ArrayShape(['a' => "mixed", 'b' => "mixed", 'c' => "mixed", 'd' => "mixed"])]
    public function getOptions(): array
    {
        return [
            'a' => $this->getAttribute('a'),
            'b' => $this->getAttribute('b'),
            'c' => $this->getAttribute('c'),
            'd' => $this->getAttribute('d'),
        ];
    }
}
