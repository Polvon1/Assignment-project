<?php

namespace Database\Factories;

use App\Models\User;
use App\Support\Enums\RoleEnum;
use App\Support\Enums\UserStepEnum;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'phone_verified_at' => now(),
            'type' => RoleEnum::USER,
            'step' => UserStepEnum::READY,
            'status' => true,
            'password' => Hash::make('qwerty123$'), // qwerty123$
            'is_public' => (bool)rand(0,1)
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (User $user) {
            $user->profile()->create([
                "full_name" => $this->faker->firstName() . ' ' . $this->faker->lastName(),
                "address" => $this->faker->streetAddress(),
                "gender" => (rand(0,1) > 0) ? 'M' : 'F',
                "passport" => str(Str::random('2'))->upper()->toString() . (string)rand(1000000,9999999),
                "user_id" => $user->id
            ]);
            $user->syncRoles(Role::where('name',RoleEnum::USER)->first());
        });
    }

    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
