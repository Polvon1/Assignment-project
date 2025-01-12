<?php

namespace App\Actions\Dashboard\Category;

use App\DTOs\CategoryDTO;
use App\Models\Category;
use App\Support\Traits\HasAuthorAction;
use DB;
use Storage;
use Throwable;

class EditCategoryAction
{
    use HasAuthorAction;

    /**
     * @throws Throwable
     */
    public function execute(CategoryDTO $data, Category $category): Category
    {
        return DB::transaction(function () use ($data,$category): Category
        {
            $category->setTranslations('title',$data->getTitle());
            if (is_null($category->icon) and !is_null($data->icon))
                $category->icon = $data->icon;
            elseif (!is_null($category->icon) and !is_null($data->icon)){
                if ($category->icon != $data->icon) Storage::delete($category->icon);
                $category->icon = $data->icon;
            }

            if (is_null($category->background) and !is_null($data->background))
                $category->background = $data->background;
            elseif (!is_null($category->background) and !is_null($data->background)){
               if ($category->background != $data->background) Storage::delete($category->background);
               $category->background = $data->background;
            }
            $category->fill($this->updatedBy());
            $category->save();

            return $category;

        });
    }

}
