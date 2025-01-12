<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\Group\CreateGroupAction;
use App\Actions\Dashboard\Group\EditGroupAction;
use App\DTOs\GroupDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GroupRequest;
use App\Models\Group;
use App\Models\Quiz;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use Throwable;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::initQuery()->paginate();
        return view('dashboard.pages.group.index',compact('groups'));
    }

    public function create()
    {
        $quizzes = Quiz::initQuery()->get();
        return view('dashboard.pages.group.create',compact('quizzes'));
    }

    public function store(GroupRequest $request, CreateGroupAction $createGroupAction)
    {
        try {
            $group = $createGroupAction->execute(GroupDTO::fromRequest($request));
            return redirect()->route('dashboard.group.index')
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function show(Group $group)
    {
        return view('dashboard.pages.group.show',compact('group'));
    }

    public function edit(Group $group)
    {
        $quizzes = Quiz::initQuery()->get();
        return view('dashboard.pages.group.edit',compact('quizzes','group'));
    }

    public function update(GroupRequest $request, Group $group,EditGroupAction $editGroupAction)
    {
        try {
            $group = $editGroupAction->execute(GroupDTO::fromRequest($request),$group);
            return redirect()->route('dashboard.group.index')
                ->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function destroy(Group $group)
    {
        try {
            $group->delete();
            return back()->with(NotificationTypeEnum::SUCCESS,NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()->with(NotificationTypeEnum::ERROR,NotificationTypedMessageEnum::DELETE(false));
        }
    }
}
