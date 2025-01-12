<?php

namespace App\Actions\SMS;

use App\Models\SentTextMessage;
use App\Transformers\SMSTransformer;
use Http;

class SendSMSAction
{
    public function execute(SentTextMessage $sentTextMessage): bool
    {
        $data = fractal()
            ->item($sentTextMessage)
            ->transformWith(new SMSTransformer)
            ->toArray();
        $response = Http::withBasicAuth(config('sms.username'), config('sms.password'))
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post(config('sms.url'),$data);
        if ($response->successful()){
            $sentTextMessage->update(['status' => true]);
            return true;
        }else{
            return false;
        }

    }


}

