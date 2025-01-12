<?php

namespace App\Actions\SMS;

use App\Models\SentTextMessage;

class CreateSMSAction
{

    public function execute(string $phone,string $text): SentTextMessage
    {
        return SentTextMessage::create([
            'recipient' => '998'.$phone,
            'message_id' => $this->generateID(),
            'originator' => "3700",
            'text' => $text
        ]);
    }


    private function generateID(): string
    {
        $last = SentTextMessage::latest()->first();
        if ($last) $message_id = (string)$last->message_id;

        if (isset($message_id)) $message_id++;
        else $message_id = "aaa0000000001";
        return $message_id;

    }



}
