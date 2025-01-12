<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Support\Enums\RoleEnum;
use App\Support\Enums\UserStepEnum;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    #[ArrayShape(['name' => "string", 'address' => "string", 'inn' => "int", 'description' => "string", 'created_at' => "\Illuminate\Support\Carbon", 'updated_at' => "\Illuminate\Support\Carbon", 'created_by' => "int", 'updated_by' => "int"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'inn' => rand(10000000000000,99999999999999),
            'description' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Organization $organization) {
            $organization->mainUser()->create([
                'username' => $organization->inn,
                'email' => $organization->inn."@mail.uz",
                'email_verified_at' => now(),
                'phone' => $this->faker->phoneNumber(),
                'phone_verified_at' => now(),
                'type' => RoleEnum::ORGANIZATION,
                'step' => UserStepEnum::READY,
                'status' => true,
                'password' => Hash::make('qwerty123$'), // qwerty123$
                'is_public' => true,
                'region_id' => 14,
                'district_id' => 193,
            ]);
        });
    }
}
