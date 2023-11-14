<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->text,
            'deadline' => fake()->date,
            'is_finished' => fake()->boolean,
            'category_id' => Category::inRandomOrder()->first()->id,

        ];
    }
}
