<?php

namespace App\DTOs;

use App\Http\Requests\Dashboard\Category\CreateCategoryRequest;
use App\Http\Requests\Dashboard\Category\EditCategoryRequest;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Data;

class CategoryDTO extends Data
{

    public function __construct(
        public string|array $title,
        public ?string $language,
        public ?string $icon,
        public ?string $background
    ){}

    public static function fromCreateRequest(CreateCategoryRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            language: $request->input('language'),
            icon: $request->input('icon'),
            background: $request->input('background')
        );
    }

    public static function fromEditRequest(EditCategoryRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            language: null,
            icon: $request->input('icon'),
            background: $request->input('background')
        );
    }

    public function getTitle(): array{
        if (is_array($this->title)){
            return $this->title;
        }else{
            return [
                $this->language => $this->title
            ];
        }
    }

    #[ArrayShape(["title" => "mixed", "icon" => "null|string", "background" => "null|string"])]
    public function getAll(): array
    {
        return [
            "title" => $this->getTitle(),
            "icon" => $this->icon,
            "background" => $this->background
        ];
    }
}
