<?php

namespace App\Actions\SMS;

use App\Models\User;
use App\Support\Helpers\GenerateVerificationCode;
use App\Support\Helpers\TextMessageTemplate;

class SendVerificationCodeAction
{
    public function __construct(
        private SendSMSAction $sendSMSAction,
        private CreateSMSAction $createSMSAction,
    ){}


    public function execute(User $user,string $type): bool
    {
        $code = GenerateVerificationCode::get();
        $user->verification()->delete();
        $user->verification()->create([
            'code' => $code
        ]);
        $phone = $user->phone;
        $text = TextMessageTemplate::get($type,$code);
        $sms = $this->createSMSAction->execute($phone,$text);
        return $this->sendSMSAction->execute($sms);
    }

}
