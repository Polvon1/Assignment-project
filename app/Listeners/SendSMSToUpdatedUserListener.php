<?php

namespace App\Listeners;

use App\Actions\SMS\SendAuthDataToUserAction;

use App\Events\UserProfileUpdatedEvent;

class SendSMSToUpdatedUserListener
{
    public function __construct(
        private readonly SendAuthDataToUserAction $sendAuthDataToUserAction
    ){}

    public function handle(UserProfileUpdatedEvent $event): void
    {
        $this->sendAuthDataToUserAction->execute($event->user,$event->password);
    }
}
