<?php

namespace App\Actions\Dashboard\Category;

use App\Models\Category;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class DeleteCategoryAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(Category $category)
    {
        return DB::transaction(function () use ($category){
            $category->update($this->deletedBy());
            $category->delete();
        });
    }

}
