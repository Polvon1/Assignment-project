<?php

namespace App\Policies;

use App\Models\IndividualUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndividualUserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, IndividualUser $individualUser): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, IndividualUser $individualUser): bool
    {
        //
    }

    public function delete(User $user, IndividualUser $individualUser): bool
    {
        //
    }

    public function restore(User $user, IndividualUser $individualUser): bool
    {
        //
    }

    public function forceDelete(User $user, IndividualUser $individualUser): bool
    {
        //
    }
}
