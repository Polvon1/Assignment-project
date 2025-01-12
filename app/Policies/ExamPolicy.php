<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Exam $exam): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Exam $exam): bool
    {
    }

    public function delete(User $user, Exam $exam): bool
    {
    }

    public function restore(User $user, Exam $exam): bool
    {
    }

    public function forceDelete(User $user, Exam $exam): bool
    {
    }
}
