<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class UserProfileCreatedEvent
{
    use Dispatchable;

    public function __construct(
        public User $user,
        public string $password
    ){}
}
