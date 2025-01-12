<?php

namespace App\Actions\Dashboard\Category;

use App\DTOs\CategoryDTO;
use App\Models\Category;
use App\Support\Traits\HasAuthorAction;
use DB;
use Throwable;

class CreateCategoryAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(CategoryDTO $data): Category
    {
        return DB::transaction(function () use ($data): Category
        {
            $category = new Category;
            $category->setTranslations('title',$data->getTitle());
            $category->icon = $data->icon;
            $category->is_public = is_null(auth()->user()->organization_id);
            $category->organization_id = auth()->user()->organization_id;
            $category->background = $data->background;
            $category->fill($this->createdBy());
            $category->save();

            return $category;
        });

    }

}
