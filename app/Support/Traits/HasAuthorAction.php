<?php

namespace App\Support\Traits;

use JetBrains\PhpStorm\ArrayShape;

trait HasAuthorAction
{

    #[ArrayShape(['created_by' => "int|null|string", 'updated_by' => "int|null|string"])]
    public function createdBy(): array
    {
        return [
            'created_by' => auth()->id() ?? 1,
            'updated_by' => auth()->id() ?? 1,
        ];
    }

    #[ArrayShape(['updated_by' => "int|null|string"])]
    public function updatedBy(): array
    {
        return [
            'updated_by' => auth()->id() ?? 1,
        ];
    }


    #[ArrayShape(['deleted_by' => "int|null|string"])]
    public function deletedBy(): array
    {
        return [
            'deleted_by' => auth()->id() ?? 1,
        ];
    }

}
