<?php

namespace App\Policies;

use App\Models\LegalUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LegalUserPolicy
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

    public function view(User $user, LegalUser $legalUser): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, LegalUser $legalUser): bool
    {
        //
    }

    public function delete(User $user, LegalUser $legalUser): bool
    {
        //
    }

    public function restore(User $user, LegalUser $legalUser): bool
    {
        //
    }

    public function forceDelete(User $user, LegalUser $legalUser): bool
    {
        //
    }
}
