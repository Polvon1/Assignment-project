<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\User\CreateProfileAction;
use App\Actions\Dashboard\User\EditProfileAction;
use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\CreateUserRequest;
use App\Http\Requests\Dashboard\User\System\EditUserRequest;
use App\Models\Quiz;
use App\Models\User;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use App\Support\Enums\RoleEnum;
use Log;
use Spatie\Permission\Models\Role;
use Throwable;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('access.user')->only('update','show','edit','destroy','restore');
    }

    public function index()
    {
        $users = User::initQuery()->userQuery()->paginate(10);
        return view('dashboard.pages.user.index',compact('users'));
    }

    public function create()
    {
        $role = Role::query()->where('name',RoleEnum::USER)->first();
        return view('dashboard.pages.user.create',compact('role'));
    }

    public function attach(User $user){
        $quizzes = Quiz::all();
        return view('dashboard.pages.user.attach',compact('user','quizzes'));
    }

    public function store(CreateUserRequest $request,CreateProfileAction $createProfileAction)
    {
        try {
            $user = $createProfileAction->execute(UserDTO::fromCreateProfileRequest($request));
            return redirect()
                ->route('dashboard.user.index')
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            Log::error($exception->getMessage());
            return redirect()
                ->route('dashboard.user.show')
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function show(User $user)
    {
        return view('dashboard.pages.user.profile.index',compact('user'));
    }

    public function edit(User $user)
    {
        abort_if($user->type != RoleEnum::USER,404);
        return view('dashboard.pages.user.edit',compact('user'));
    }

    public function update(EditUserRequest $request, User $user, EditProfileAction $editProfileAction)
    {
        try {
            $user = $editProfileAction->execute(UserDTO::fromEditProfileRequest($request),$user);
            return redirect()
                ->route('dashboard.user.show',['user' => $user->id])
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::UPDATE());
        }catch(Throwable $exception){
            Log::error($exception->getMessage());
            dd($exception);
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            Log::error($exception->getMessage());
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::DELETE(false));
        }
    }

    public function trash(){
        $users = User::withTrashed()->initQuery()->userQuery()->paginate();
        return view('dashboard.pages.user.trash',compact('users'));
    }

    public function restore(User $user){
        try {
            $user->restore();
            return back()
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function forceDelete(User $user){
        try {
            $user->forceDelete();
            return back()
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::DELETE(false));
        }
    }
}
