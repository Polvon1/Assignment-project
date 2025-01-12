<?php

namespace App\Actions\SMS;

use App\Models\User;
use App\Support\Helpers\TextMessageTemplate;
use DB;
use Throwable;

class SendAuthDataToUserAction
{

    public function __construct(
        private readonly SendSMSAction   $sendSMSAction,
        private readonly CreateSMSAction $createSMSAction,
    ){}

    public function execute(User $user, $password): bool
    {
        $phone = $user->phone;
        $text = TextMessageTemplate::get(TextMessageTemplate::AUTH, $user->username, $password);

        $sms = $this->createSMSAction->execute($phone, $text);
        return $this->sendSMSAction->execute($sms);

    }
}
