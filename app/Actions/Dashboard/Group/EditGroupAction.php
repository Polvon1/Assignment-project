<?php

namespace App\Actions\Dashboard\Group;

use App\DTOs\GroupDTO;
use App\Models\Group;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class EditGroupAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(GroupDTO $data,Group $group): Group
    {
        return DB::transaction(function () use ($data, $group): Group{
            $insert = collect($data)->merge($this->updatedBy())->toArray();
            $group->update($insert);
            return $group;
        });
    }
}
