<?php

namespace App\DTOs;

use App\Models\Exam;

class ExamResponseDTO extends \Spatie\LaravelData\Data
{

    public function __construct(
        public bool $status,
        public Exam $exam,
        public bool $is_valid
    ){}


}
