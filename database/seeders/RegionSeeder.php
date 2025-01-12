<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class RegionSeeder extends Seeder
{
    public function getRegions(): Collection
    {
        $regions_json_file = file_get_contents(base_path('/resources/data/database/regions.json'));
        $regions = json_decode($regions_json_file,true,512,JSON_OBJECT_AS_ARRAY);
        return collect($regions);

    }

    public function run()
    {
        foreach ($this->getRegions() as $region){
            $model = Region::create([
                'id' => $region['id'],
                'title' => [
                    'uz' => $region['name_uz'],
                    'ru' => $region['name_ru'],
                    'en' => $region['name_en'],
                    'cy' => $region['name_cyr'],
                ],
                'order' => $region['id']
            ]);
        }
    }
}
