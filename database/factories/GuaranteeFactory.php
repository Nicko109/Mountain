<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guarantee>
 */
class GuaranteeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $taskId = Task::inRandomOrder()->first()->id;

        return [
            'number' => fake()->numberBetween(100000, 999999),
            'task_id' => $taskId,

        ];
    }
}
