<?php

namespace App\Policies;

use App\Models\Region;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
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

    public function view(User $user, Region $region): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Region $region): bool
    {
        //
    }

    public function delete(User $user, Region $region): bool
    {
        //
    }

    public function restore(User $user, Region $region): bool
    {
        //
    }

    public function forceDelete(User $user, Region $region): bool
    {
        //
    }
}
