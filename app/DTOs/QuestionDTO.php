<?php

namespace App\DTOs;

use App\Http\Requests\Dashboard\Question\QuestionRequest;
use Spatie\LaravelData\Data;

class QuestionDTO extends Data
{

    public function __construct(
        public string      $title,
        public string      $a,
        public string      $b,
        public string      $c,
        public string      $d,
        public string      $answer,
        public string|null $answer_explain,
        public string|null $image,
        public string|null $video
    ){}

    public static function fromRequest(QuestionRequest $request): self
    {
        return new self(
            title: str($request->input('title'))->toString(),
            a: $request->input('a'),
            b: $request->input('b'),
            c: $request->input('c'),
            d: $request->input('d'),
            answer: $request->input('answer'),
            answer_explain: $request->input('answer_explain'),
            image: $request->input('image'),
            video: $request->input('video')
        );
    }
}
