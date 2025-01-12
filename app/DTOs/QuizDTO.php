<?php

namespace App\DTOs;

use App\Http\Requests\Dashboard\Quiz\CreateQuizRequest;
use App\Http\Requests\Dashboard\Quiz\EditQuizRequest;
use Spatie\LaravelData\Data;

class QuizDTO extends Data
{
    public function __construct(
        public string      $title,
        public float       $mark,
        public int         $duration,
        public bool        $show_answer,
        public int         $language_id,
        public int         $category_id,
        public int         $difficulty_id,
        public bool|null   $is_public,
        public string|null $description,
        public string|null $start,
        public string|null $finish,
        public int|null    $qty,
        public int|null $organization_id
    ){}


    public static function fromRequest(CreateQuizRequest|EditQuizRequest $request): self
    {
        return new self(
            title: (string)str($request->input('title'))->trim(),
            mark: (float)$request->input('mark'),
            duration: (int)$request->input('duration'),
            show_answer: ($request->has('show_answer') and $request->input('show_answer') == 'true'),
            language_id: $request->input('language_id'),
            category_id: (int)$request->input('category_id'),
            difficulty_id: (int)$request->input('difficulty_id'),
            is_public: ($request->input('type') == 'true'),
            description: $request->input('description'),
            start: ($request->input('start') !== null) ? $request->input('start') : null,
            finish:($request->input('finish') !== null) ? $request->input('finish') : null,
            qty: ($request->input('qty') !== null) ? $request->input('qty') : null,
            organization_id: auth()->user()->organization_id
        );
    }

//    public static function fromEditRequest(EditQuizRequest $request): self
//    {
//        return new self(
//            title: (string)Str::of($request->input('title'))->trim(),
//            mark: (float)$request->input('mark'),
//            duration: (int)$request->input('duration'),
//            show_answer: ($request->has('show_answer') and $request->input('show_answer') == 'true'),
//            is_paid: ($request->has('is_paid') and $request->input('is_paid') == 'true'),
//            language_id: $request->input('language_id'),
//            category_id: (int)$request->input('category_id'),
//            difficulty_id: (int)$request->input('difficulty_id'),
//            type: $request->input('type') ?? 'private',
//            description: $request->input('description'),
//            start: (!is_null($request->input('start'))) ? $request->input('start') : null,
//            finish:(!is_null($request->input('finish'))) ? $request->input('finish') : null,
//            qty: (!is_null($request->input('qty'))) ? $request->input('qty') : null
//        );
//    }
}
