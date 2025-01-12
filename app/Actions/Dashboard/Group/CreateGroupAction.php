<?php

namespace App\Actions\Dashboard\Group;

use App\DTOs\GroupDTO;
use App\Models\Group;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class CreateGroupAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(GroupDTO $data): Group
    {
        return DB::transaction(function () use ($data): Group{
            $insert = collect($data)->merge($this->createdBy())->toArray();
            return Group::create($insert);
        });
    }

}
