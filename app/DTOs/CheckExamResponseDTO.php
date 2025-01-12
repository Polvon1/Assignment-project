<?php

namespace App\DTOs;

use App\Models\Exam;
use Spatie\LaravelData\Data;

class CheckExamResponseDTO extends Data
{

    public const NEW = 'new';
    public const START = 'start';
    public const FINISH = 'finish';

    public function __construct(
        public bool $check,
        public string $status,
        public ?Exam $exam,
    ){}
}
