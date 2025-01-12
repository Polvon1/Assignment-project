<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition(): array
    {
        $is_public = $this->faker->boolean();
        $any_time = $this->faker->boolean();
        return [
            'title' => $this->faker->sentence,
            'mark' => rand(1,5),
            'duration' => rand(30,180),
            'description' => $this->faker->text(),
            'show_answer' => $this->faker->boolean(),
            'start' => ($any_time) ? null : now(),
            'finish' => ($any_time) ? null : now()->addWeek()->addHours(12),
            'difficulty_id' => rand(1,5),
            'is_public' => $is_public,
            'qty' => rand(10,50),
            'organization_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => rand(1,10),
            'language_id' => rand(1,3),
            'created_by' => 1,
            'updated_by' => 1
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Quiz $quiz) {
           for($i = 1; $i<= $quiz->qty;$i++){
               $quiz->questions()->create([
                   "title" => $this->faker->realText(),
                   "a" => $this->faker->text(),
                   "b" => $this->faker->text(),
                   "c" => $this->faker->text(),
                   "d" => $this->faker->text(),
                   "category_id" => $quiz->category_id,
                   "answer" => $this->faker->randomElement(['a','b','c','d']),
                   "answer_explain" => $this->faker->paragraph(),
                   'created_by' => 1,
                   'updated_by' => 1
               ]);
           }
        });
    }
}
