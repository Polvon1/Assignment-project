<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\SystemUser\CreateSystemUserAction;
use App\Actions\Dashboard\SystemUser\EditSystemUserAction;
use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\EditSystemUserRequest;
use App\Http\Requests\Dashboard\User\System\CreateSystemUserRequest;
use App\Models\User;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use App\Support\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Throwable;

class SystemUserController extends Controller
{
    public function __construct()
    {
        $this
            ->middleware('access.system-user')
            ->only('edit','show','update','destroy','restore','trash');
    }

    public function index()
    {
        $users = User::initQuery()->systemUserQuery()->paginate();
        return view('dashboard.pages.system-user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::query()->whereIn('name',RoleEnum::adminCreateUser())->get();
        return view('dashboard.pages.system-user.create',compact('roles'));
    }

    public function store(CreateSystemUserRequest $request,CreateSystemUserAction $createSystemUserAction)
    {
        try {
            $user = $createSystemUserAction->execute(UserDTO::fromCreateSystemRequest($request));
            return redirect()
                ->route('dashboard.system.user.index')
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        $roles = Role::query()->whereIn('name',RoleEnum::adminCreateUser())->get();
        return view('dashboard.pages.system-user.edit',compact('user','roles'));
    }

    public function update(EditSystemUserRequest $request, User $user, EditSystemUserAction $editSystemUserAction)
    {
        try {
            $user = $editSystemUserAction->execute(UserDTO::fromEditSystemRequest($request),$user);
            return redirect()
                ->route('dashboard.system.user.index')
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::DELETE(false));
        }
    }

    public function trash(){

    }

    public function restore(User $user){

    }

    public function forceDelete($user){

    }
}
