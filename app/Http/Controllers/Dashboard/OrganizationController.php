<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\Organization\CreateOrganizationAction;
use App\Actions\Dashboard\Organization\EditOrganizationAction;
use App\DTOs\OrganizationDTO;
use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\Organization\CreateOrganizationRequest;
use App\Http\Requests\Dashboard\User\Organization\EditOrganizationRequest;
use App\Models\Organization;
use App\Models\User;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use App\Support\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Throwable;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = User::initQuery()->organizationQuery()->paginate();
        return view('dashboard.pages.organization.index',compact('organizations'));
    }

    public function create()
    {
        $role = Role::query()->where('name',RoleEnum::ORGANIZATION)->first();
        return view('dashboard.pages.organization.create',compact('role'));
    }

    public function store(CreateOrganizationRequest $request,CreateOrganizationAction $createOrganizationAction)
    {
        try {
            $organization = $createOrganizationAction->execute(UserDTO::fromCreateOrganizationRequest($request));
            return redirect()
                ->route('dashboard.organization.index')
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function show(User $organization)
    {
        return view('dashboard.pages.organization.show',compact('organization'));
    }

    public function edit(User $organization)
    {
        return view('dashboard.pages.organization.edit',compact('organization'));
    }

    public function update(EditOrganizationRequest $request, User $organization,EditOrganizationAction $editOrganizationAction)
    {
        try {
            $organization = $editOrganizationAction->execute(UserDTO::fromEditOrganizationRequest($request),$organization);
            return back()
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::UPDATE(false));

        }
    }

    public function destroy(User $organization)
    {
        try {
            $organization->delete();
            return back()->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE(false));
        }

    }

    public function restore(User $organization){

    }

    public function trash(){
        $organization = User::onlyTrashed()->get();
    }

    public function forceDelete(User $organization){

    }

}
