<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    public function run()
    {
        $difficulties = [
            [
                'en' => 'Very easy degree',
                'uz' => 'Juda yengil daraja',
                'ru' => 'Очень легкая степень'
            ],
            [
                'en' => 'Easy degree',
                'uz' => 'Yengil daraja',
                'ru' => 'Легкая степень'
            ],
            [
                'en' => 'Medium degree',
                'uz' => "O'rta daraja",
                'ru' => 'Средняя степень'
            ],
           [
                'en' => 'Hard degree',
                'uz' => 'Qiyin daraja',
                'ru' => 'Сложная степень'
            ],
            [
                'en' => 'Very hard degree',
                'uz' => "Juda Qiyin daraja",
                'ru' => 'Очень сложная степень'
            ],

        ];

        foreach ($difficulties as $key => $difficulty){
            Difficulty::create([
                'title' => $difficulty,
                'level' => $key+1
            ]);
        }
    }
}
