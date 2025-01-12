<?php

namespace App\Transformers;

use App\Models\SentTextMessage;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class SMSTransformer extends TransformerAbstract
{

    #[ArrayShape(["messages" => "array[]"])]
    public function transform(SentTextMessage $sentTextMessage): array
    {
        return [
            "messages" => [
                [
                    "recipient" => (string)$sentTextMessage->recipient,
                    "message-id" => (string)$sentTextMessage->message_id,
                    "sms" => [
                        "originator" => (string)$sentTextMessage->originator,
                        "content" => [
                            "text" => $sentTextMessage->text
                        ]
                    ]
                ]
            ]
        ];
    }
}
