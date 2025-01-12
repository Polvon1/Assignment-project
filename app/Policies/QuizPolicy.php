<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\User;
use App\Support\Enums\RoleEnum;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before(User $user): null|bool
    {
        if ($user->hasAnyRole(RoleEnum::ADMIN,RoleEnum::SUPER_ADMIN)){
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Quiz $quiz): bool
    {
        return true;
//        return $user->quizzes->contains('id',$quiz->id);
////        if ($user->hasRole(RoleEnum::ORGANIZATION)){
////            return ($user->organization_id == $quiz->organization_id);
////        }elseif ($user->hasRole(RoleEnum::MODERATOR)){
////            return ($user->id == $quiz->created_by);
////        }else return false;
    }

    public function take(User $user, Quiz $quiz): bool
    {
        return $user->quizzes->contains('id',$quiz->id);
    }

    public function paid(User $user, Quiz $quiz): bool
    {
        return (bool)$user->paid($quiz);
    }

    public function buy(User $user, Quiz $quiz): bool
    {
        return !(bool)$user->paid($quiz);
    }

    public function create(User $user): bool
    {

    }

    public function update(User $user, Quiz $quiz): bool
    {
        //
    }

    public function delete(User $user, Quiz $quiz): bool
    {
        //
    }

    public function restore(User $user, Quiz $quiz): bool
    {
        //
    }

    public function forceDelete(User $user, Quiz $quiz): bool
    {
        //
    }
}
