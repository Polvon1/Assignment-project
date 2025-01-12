<?php

namespace App\Actions\Exam;

use App\DTOs\CheckExamResponseDTO;
use App\DTOs\ExamDTO;
use App\DTOs\ExamResponseDTO;
use App\Models\Exam;
use App\Models\Quiz;
use DB;
use Str;
use Throwable;

class StartExamAction
{

    /**
     * @throws Throwable
     */
    public function execute(ExamDTO $data): ExamResponseDTO
    {
        return $this->check($data->quiz);
    }

    public function executeCheckExam(Quiz $quiz): CheckExamResponseDTO
    {
        return $this->checkQuiz($quiz);
    }


    private function checkQuiz(Quiz $quiz): CheckExamResponseDTO
    {
        $exam = $this->findExam($quiz);
        if ($exam){
            $is_valid = $this->isValidExam($exam);
            $response = new CheckExamResponseDTO(
                check: $is_valid,
                status: ($is_valid) ? CheckExamResponseDTO::START : CheckExamResponseDTO::FINISH,
                exam: $exam
            );
        }else{
            $response = new CheckExamResponseDTO(
                check: false,
                status: CheckExamResponseDTO::NEW,
                exam: null
            );
        }

        return $response;
    }

    /**
     * @throws Throwable
     */
    private function checkExam(Quiz $quiz): ExamResponseDTO
    {
        $exam = $this->findExam($quiz);
        if ($exam){
            $response = new ExamResponseDTO(status: false,exam: $exam,is_valid: $this->isValidExam($exam));
        }else{
            $exam = $this->create($quiz);
            $response = new ExamResponseDTO(status: true,exam: $exam,is_valid: true);
        }

        return $response;
    }

    /**
     * @throws Throwable
     */
    private function check(Quiz $quiz): ExamResponseDTO
    {
        return $this->checkExam($quiz);
    }

    private function findExam(Quiz $quiz): ?Exam
    {
       return Exam::query()->where('quiz_id',$quiz->id)->where('user_id',auth()->user()->id)->first();
    }

    private function isValidExam(Exam $exam): bool
    {
        if ($exam->is_finished) return false;
        if (is_null($exam->token)) return false;
        return (now()->diffInMilliseconds($exam->finish, false) > 0);
    }

    /**
     * @throws Throwable
     */
    private function create(Quiz $quiz): Exam
    {
        return DB::transaction(function () use($quiz): Exam
        {
            $start = now();
            $exam = new Exam;
            $exam->user_id = auth()->user()->id;
            $exam->quiz_id = $quiz->id;
            $exam->start = $start->addSecond();
            $exam->finish = $start->addMinutes($quiz->duration);
            $exam->token = (string)Str::of(Str::random())->slug();
            $exam->save();

            $questions = $exam->quiz->questions()->inRandomOrder()->get();
            $qty = $exam->quiz->qty;

            if (!is_null($qty) and $qty > 0){
                $questions = $questions->take($qty);
            }

            foreach ($questions as $question){
                $exam->examQuestions()->create([
                    'question_id' => $question->id,
                    'correct_answer' => $question->answer
                ]);
            }

            return $exam;
        });
    }


}
