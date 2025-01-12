<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10;$i++){
            Category::create([
                'title' => [
                    'en' => 'Category ' . $i . ' (en)',
                    'ru' => 'Category ' . $i . ' (ru)',
                    'uz' => 'Category ' . $i . ' (uz)',
                ],
                'is_public' => true,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
