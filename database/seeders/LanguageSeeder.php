<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $en = [
            'en' => 'English',
            'ru' => 'Английский',
            'uz' => 'Inglizcha',
        ];
        $model_en = new Language(['slug' => 'en','icon' => 'fi fi-gb']);
        $model_en->setTranslations('title',$en);
        $model_en->save();

        $ru = [
            'en' => 'Russian',
            'ru' => 'Русский',
            'uz' => 'Ruscha',
        ];
        $model_ru = new Language(['slug' => 'ru','icon' => 'fi fi-ru']);
        $model_ru->setTranslations('title',$ru);
        $model_ru->save();

        $uz = [
            'en' => 'Uzbek',
            'ru' => 'Узбекский',
            'uz' => 'O`zbekcha'
        ];
        $model_uz = new Language(['slug' => 'uz','icon' => 'fi fi-uz']);
        $model_uz->setTranslations('title',$uz);
        $model_uz->save();
    }
}
