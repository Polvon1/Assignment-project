<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ExamQuestion
 *
 * @property int $id
 * @property int $exam_id
 * @property int $question_id
 * @property bool $is_correct
 * @property string $correct_answer
 * @property string|null $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Exam $exam
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereCorrectAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExamQuestion extends Model
{

    protected $fillable = ['exam_id','question_id','is_correct','correct_answer','answer'];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
