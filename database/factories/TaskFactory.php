<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'task_name' => fake()->realText(10),
            'task_description' => fake()->realText(50),
            'priority' => rand(1, 3),
            'public' => true,
            'due_date' => fake()->dateTimeBetween('now', '+4 week'),
            'created_at' => fake()->dateTimeBetween('-20 days', 'now')
        ];
    }
}