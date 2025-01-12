<?php

namespace App\Listeners;

use App\Actions\SMS\SendVerificationCodeAction;
use App\Events\SMSVerificationEvent;
use App\Support\Helpers\TextMessageTemplate;

class SendSMSVerificationListener
{

    public function __construct(
        private SendVerificationCodeAction $sendVerificationCodeAction
    ){}

    public function handle(SMSVerificationEvent $event): void
    {
        $this->sendVerificationCodeAction->execute($event->user,TextMessageTemplate::REGISTER);
    }
}
