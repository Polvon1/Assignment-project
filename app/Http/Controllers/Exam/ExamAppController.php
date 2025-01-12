<?php

namespace App\Http\Controllers\Exam;

use App\Actions\Exam\CheckAnswerAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Exam\AnswerExamQuestionRequest;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\JsonResponse;

class ExamAppController extends Controller
{
    public function index(Exam $exam)
    {
        $questions = $exam->examQuestions()->orderBy('id')->paginate(1);
        $question_answer = $exam->examQuestions()->orderBy('id')->pluck('answer')->toArray();
        $left = now()->diffInMilliseconds($exam->finish,false);

        return view('exam.pages.app', compact('questions','question_answer','left','exam'));
    }

    public function answer(AnswerExamQuestionRequest $request,Exam $exam,CheckAnswerAction $checkAnswerAction): JsonResponse
    {
        $left = now()->diffInMilliseconds($exam->finish,false);
        if ($left > 0){
            $question = ExamQuestion::query()->where('id',$request->get('exam_question_id'))->first();
            $examQuestion = $checkAnswerAction->execute($question,$request->get('answer'));
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }


}
