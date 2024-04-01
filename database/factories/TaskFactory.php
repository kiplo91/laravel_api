<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
            'title' => fake()->title(),
            'description' => fake()->asciify('********************'),
            'assigned_user_id' => User::all()->random()->id,
            'completed_at' => fake()-> dateTimeBetween('2024-01-30', '2024-03-28'),
        ];
    }
}
