<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Dashboard\Category\CreateCategoryAction;
use App\Actions\Dashboard\Category\DeleteCategoryAction;
use App\Actions\Dashboard\Category\EditCategoryAction;
use App\DTOs\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CreateCategoryRequest;
use App\Http\Requests\Dashboard\Category\EditCategoryRequest;
use App\Models\Category;
use App\Models\Language;
use App\Support\Enums\NotificationTypedMessageEnum;
use App\Support\Enums\NotificationTypeEnum;
use App\Support\Enums\RoleEnum;
use Illuminate\Http\RedirectResponse;
use Throwable;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::admin_moderator_organization_roles_to_string());
        $this->middleware('permission:create.category', ['only' => ['store']]);
        $this->middleware('permission:edit.category', ['only' => ['update']]);
        $this->middleware('permission:delete.category', ['only' => ['destroy']]);

        $this->middleware('dashboard.category.access', ['only' => ['edit','update','show','delete']]);

    }

    public function index()
    {
        $categories = Category::initQuery()->paginate(4);
        $languages = Language::all();
        return view('dashboard.pages.quiz.category',compact('categories','languages'));
    }

    public function store(CreateCategoryRequest $request,CreateCategoryAction $createCategoryAction): RedirectResponse
    {
        try {
            $category = $createCategoryAction->execute(CategoryDTO::fromCreateRequest($request));
            return redirect()
                ->route('dashboard.category.index')
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::CREATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::CREATE(false));
        }
    }

    public function update(EditCategoryRequest $request, Category $category,EditCategoryAction $editCategoryAction): RedirectResponse
    {
        try {
            $category = $editCategoryAction->execute(CategoryDTO::fromEditRequest($request),$category);
            return redirect()
                ->route('dashboard.category.index')
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::UPDATE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::UPDATE(false));
        }
    }

    public function destroy(Category $category,DeleteCategoryAction $deleteCategoryAction): RedirectResponse
    {
        try {
            $deleteCategoryAction->execute($category);
            return redirect()
                ->route('dashboard.category.index')
                ->with(NotificationTypeEnum::SUCCESS, NotificationTypedMessageEnum::DELETE());
        }catch (Throwable $exception){
            return back()
                ->with(NotificationTypeEnum::ERROR, NotificationTypedMessageEnum::DELETE(false));
        }
    }


}
