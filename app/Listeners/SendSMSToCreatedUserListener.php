<?php

namespace App\Listeners;

use App\Actions\SMS\SendAuthDataToUserAction;
use App\Events\UserProfileCreatedEvent;

class SendSMSToCreatedUserListener
{
    public function __construct(
        private readonly SendAuthDataToUserAction $sendAuthDataToUserAction
    ){}

    public function handle(UserProfileCreatedEvent $event): void
    {
        $this->sendAuthDataToUserAction->execute($event->user,$event->password);
    }
}
