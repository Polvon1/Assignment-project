<?php

namespace App\DTOs;

use App\Http\Requests\Dashboard\GroupRequest;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use Str;

class GroupDTO extends Data
{
    public function __construct(
        public string $name,
        public string $link,
        public int $quiz_id,
        public int $organization_id,
        public int $qty,
        public Carbon|null $start,
        public Carbon|null $end
    ){}

    public static function fromRequest(GroupRequest $request): self
    {
        return new self(
            name: $request->input('name'),
            link: self::generateUUID(),
            quiz_id: $request->input('quiz_id'),
            organization_id: $request->input('organization_id'),
            qty: $request->input('qty'),
            start: $request->has('start') ? Carbon::create($request->input('start')) : now(),
            end: $request->has('end') ? Carbon::create($request->input('end')) : now()->addYears(2),
        );
    }

    private static function generateUUID(): string
    {
        return Str::uuid()->toString();
    }

}
