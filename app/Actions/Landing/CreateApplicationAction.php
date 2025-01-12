<?php

namespace App\Actions\Landing;


use App\DTOs\ApplicationDTO;
use App\Models\Application;
use DB;
use Throwable;

class CreateApplicationAction
{

    /**
     * @throws Throwable
     */
    public function execute(ApplicationDTO $data): Application
    {
        return DB::transaction(static function () use ($data): Application
        {
            return Application::create($data->toArray());
        });
    }

}
