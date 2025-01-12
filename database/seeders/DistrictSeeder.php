<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DistrictSeeder extends Seeder
{
    public function getDistricts(): Collection
    {
        $districts_json_file = file_get_contents(base_path('/resources/data/database/districts.json'));
        $districts = json_decode($districts_json_file,true,512,JSON_OBJECT_AS_ARRAY);
        return collect($districts);
    }

    public function run()
    {
        foreach ($this->getDistricts() as $district){
            $model = District::create([
                'id' => $district['id'],
                'title' => [
                    'uz' => $district['name_uz'],
                    'ru' => $district['name_ru'],
                    'en' => $district['name_en'],
                    'cy' => $district['name_cyr'],
                ],
                'region_id' => $district['region'],
                'order' => $district['id']
            ]);
        }
    }
}
