<?php

namespace App\DTOs\SMS;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Data;

class SMSBodyDTO extends Data
{
    public function __construct(
        public string $id,
        public string $phone,
        public string $text
    ){}

    #[ArrayShape(["messages" => "array[]"])]
    public function verification(): array
    {
       return [
           "messages" => [
               [
                   "recipient" => $this->phone,
                   "message-id" => $this->id,
                   "sms" => [
                       "originator" => "3700",
                       "content" => [
                           "text" => $this->text
                       ]
                   ]
               ]
           ]
       ];
    }
}
