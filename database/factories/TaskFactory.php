<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'completed' => $this->faker->boolean(20),
            'due_date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
        ];
    }
}