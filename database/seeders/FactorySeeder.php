<?php

namespace Database\Seeders;

//use App\Models\Organization;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    public function run()
    {
//        User::factory(20)->create();
        Quiz::factory(100)->create();
//        Organization::factory(15)->create();
    }
}
