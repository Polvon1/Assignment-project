<?php

namespace App\Models;

use App\Support\Traits\HasLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Exam
 *
 * @property int $id
 * @property int $user_id
 * @property int $quiz_id
 * @property bool $retake
 * @property \Illuminate\Support\Carbon $start
 * @property \Illuminate\Support\Carbon $finish
 * @property int|null $answers
 * @property float|null $mark
 * @property bool $is_finished
 * @property string|null $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExamQuestion[] $examQuestions
 * @property-read int|null $exam_questions_count
 * @property-read \App\Models\Quiz $quiz
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newQuery()
 * @method static \Illuminate\Database\Query\Builder|Exam onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereIsFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereRetake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Exam withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Exam withoutTrashed()
 * @mixin \Eloquent
 */
class Exam extends Model
{
    use SoftDeletes,HasLogsActivity;

    protected $fillable = [
        'user_id','quiz_id','start','finish','answers','mark','retake'
    ];

    protected $hidden = [
        'updated_at','deleted_at'
    ];

    protected $casts = [
        'start' => 'datetime',
        'finish' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }

    public function examQuestions(): HasMany
    {
        return $this->hasMany(ExamQuestion::class,'exam_id');
    }
}
