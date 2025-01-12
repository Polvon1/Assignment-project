<?php

namespace App\Policies;

use App\Models\District;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistrictPolicy
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

    public function view(User $user, District $district): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, District $district): bool
    {
        //
    }

    public function delete(User $user, District $district): bool
    {
        //
    }

    public function restore(User $user, District $district): bool
    {
        //
    }

    public function forceDelete(User $user, District $district): bool
    {
        //
    }
}
