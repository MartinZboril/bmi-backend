<?php

namespace Database\Factories;

use App\Enums\SexEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BodyMassIndex>
 */
class BodyMassIndexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id, 
            'sex' => rand(0, 1) ? SexEnum::Male->value : SexEnum::Female->value,
            'age' => rand(20, 50),
            'height' => rand(170, 190),
            'weight' => rand(70, 90),
            'note' => fake()->text(200),
        ];
    }
}
