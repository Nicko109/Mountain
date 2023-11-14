<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Owner;
use App\Models\Performer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PerformerTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => Task::inRandomOrder()->first(),
            'performer_id' => Performer::inRandomOrder()->first(),
        ];
    }
}
