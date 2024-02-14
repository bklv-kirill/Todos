<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Group;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->unique()->word(),
            "discription" => $this->faker->sentence(50),
            "is_done" => $this->faker->boolean(),
            "group_id" => Group::query()->get()->random()->id,
            "user_id" => User::query()->get()->random()->id,
        ];
    }
}
